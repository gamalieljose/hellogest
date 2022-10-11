<?php
$fhopcion = $_POST["hopcion"];
$fhiddocumento = $_POST["hiddocumento"];

$flstseries = $_POST["lstseries"]; //serie factura
$flsttercero = $_POST["lsttercero"]; //tercero
$flstusuario = $_POST["lstusuario"]; //idusuario


$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$flstseries."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbidempresa = $rowaux["idempresa"];


$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."' ");
$rowaux = mysqli_fetch_assoc($cnsaux);

if($lnxinvoice == "fv" || $lnxinvoice == "fvr" || $lnxinvoice == "ov" || $lnxinvoice == "pv" || $lnxinvoice == "av")
{
	$xclipro = "C"; //cliente

	$pc_cp = $rowaux["clifp"];
	$pc_dp = $rowaux["clidp"];

}

if($lnxinvoice == "fc")
{
	$xclipro = "P"; //Proveedor

	$pc_cp = $rowaux["profp"];
	$pc_dp = $rowaux["prodp"];

}







if ($fhopcion == 'new')
{
	//Se crea un nuevo presupuesto
	
	
	$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."series where id = '".$flstseries."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$textoserie = $row["serie"];
	
	
	
	$fechahoy = date('Y-m-d');

	if($lnxinvoice == "fc")
	{
		$sqlinsertar = "insert into ".$prefixsql.$lnxinvoice." (idserie, codigoint, codigo, idtercero, estado, fecha, vencimiento, idusuario, pc_cp, pc_dp, pagado, editfv, factura) values ('".$flstseries."', '0', '0', '".$flsttercero."', '0', '".$fechahoy."', '".$fechahoy."', '".$flstusuario."', '".$pc_cp."', '".$pc_dp."', '0', '0', '')";
	}
	
	if($lnxinvoice == "fv" || $lnxinvoice == "fvr" || $lnxinvoice == "ov" || $lnxinvoice == "pv" || $lnxinvoice == "av")
	{
		$sqlinsertar = "insert into ".$prefixsql.$lnxinvoice." (idserie, codigoint, codigo, idtercero, estado, fecha, vencimiento, idusuario, pc_cp, pc_dp, pagado, editfv) values ('".$flstseries."', '0', '0', '".$flsttercero."', '0', '".$fechahoy."', '".$fechahoy."', '".$flstusuario."', '".$pc_cp."', '".$pc_dp."', '0', '0')";
	}

	$ConsultaMySql = $mysqli->query($sqlinsertar);
	
	$ConsultaMySql= $mysqli->query("select max(id) as contador from ".$prefixsql.$lnxinvoice." ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$iddocumento = $row["contador"];
	$codigo = "(PROV ".$iddocumento.")";
	
	//$iddocumento = $valorid;
	
	//Calculamos el vencimiento
	$fvencimiento = $fechahoy;

	$cnsmysqlaux = $mysqli->query("select * from ".$prefixsql."bancos_cpago where id = '".$pc_cp."' ");
	$rowaux = mysqli_fetch_assoc($cnsmysqlaux);
	$pc_cp_dias = $rowaux["dias"];
	$pc_cp_dia = $rowaux["diapago"];

	//Caso 0 - pago dia actual
	//Caso 1 - pago a x dias (sin especificar el dia)
	//Caso 2 - Pago el dia X de cada mes
	//Caso 3 - Pago a X dias el dia Y de cada mes

	//Caso 0
	if($pc_cp_dias == 0 && $pc_cp_dia == 0)
	{
		$fvencimiento = $fechahoy;
	}
	//Caso 1
	if($pc_cp_dias > 0 && $pc_cp_dia == 0)
	{
		$fecha_actual = date("d-m-Y");
		$xtemp = "";
		$xtemp = date("d-m-Y",strtotime($fecha_actual."+ ".$pc_cp_dias." days")); 

		$xtemp2 = explode("-", $xtemp);
		$fvencimiento = $xtemp2[2]."-".$xtemp2[1]."-".$xtemp2[0];
	}

	//Caso 2
	if($pc_cp_dias == 0 && $pc_cp_dia > 0)
	{
		$pc_cp_dia = substr(str_repeat(0, 2).$pc_cp_dia, - 2);


		$fechahoy = date("d-m-Y");
		$xtemp = explode("-", $fechahoy);
		$fecha_actual = $xtemp[2].$xtemp[1].$xtemp[0];

		$fpago = $xtemp[2].$xtemp[1].$pc_cp_dia;
		$fpago_db = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;

		
		if($fpago < $fecha_actual)
		{
			//Sumamos un mes
			$fvencimiento = date("d-m-Y",strtotime($fechahoy."+ 1 months")); 
			$xtemp = explode("-", $fvencimiento );
			$fvencimiento = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimiento = $fpago_db;
		}

		
	}

	//Caso 3
	if($pc_cp_dias > 0 && $pc_cp_dia > 0)
	{
		$pc_cp_dia = substr(str_repeat(0, 2).$pc_cp_dia, - 2);


		$fechahoy = date("d-m-Y");
		$xtemp = explode("-", $fechahoy);
		$fecha_actual = $xtemp[2].$xtemp[1].$xtemp[0];

		$fpago = $xtemp[2].$xtemp[1].$pc_cp_dia;
		$fpago_db = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;

		
		if($fpago < $fecha_actual)
		{
			//Sumamos un mes
			$fvencimiento = date("d-m-Y",strtotime($fechahoy."+ 1 months")); 
			$xtemp = explode("-", $fvencimiento );
			$fvencimiento = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimiento = $fpago_db;
		}
	}
	//Fin calculo vencimiento



	$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set codigo = '".$codigo."', vencimiento = '".$fvencimiento."' where id = '".$iddocumento."'");
	
// Recupera campos creados dinamicamente
	$timpuestos = $_POST['txtimpuesto'];
	$idtemp = '0';
	foreach($timpuestos as $impimpuesto){
		$valor = $impimpuesto;
			
		$var = $_POST['hidimpuesto'][$idtemp];
				
			$idimpuesto = $var;
			$valorimpuesto = $valor;
			
			$ssql_insimp = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_tax (".$campomasterid.", idimpuesto, valor) values ('".$iddocumento."', '".$idimpuesto."', '".$valorimpuesto."')");
			
			//insertamos los impuestos a la bbdd
			
		$idtemp = $idtemp +1;
			
	}
	

}


if ($fhopcion == 'update')
{
	//Se guardan los cambios del documento
	
	$ConsultaMySql = $mysqli->query("update ".$prefixsql.$lnxinvoice." set idserie = '".$flstseries."', idtercero = '".$flsttercero."', idusuario = '".$flstusuario."', pc_cp = '".$pc_cp."', pc_dp = '".$pc_dp."' where id = '".$fhiddocumento."'");

	//eliminamos los fv_tax por los nuevos
	
	$ConsultaMySql = $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$fhiddocumento."'");
	
	// Recupera campos creados dinamicamente
	$timpuestos = $_POST['txtimpuesto'];
	$idtemp = '0';
	foreach($timpuestos as $impimpuesto){
		$valor = $impimpuesto;
			
		$var = $_POST['hidimpuesto'][$idtemp];
				
			$idimpuesto = $var;
			$valorimpuesto = $valor;
			
			$ssql_insimp = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_tax (".$campomasterid.", idimpuesto, valor) values ('".$fhiddocumento."', '".$idimpuesto."', '".$valorimpuesto."')");
			
			//insertamos los impuestos a la bbdd
			
		$idtemp = $idtemp +1;
			
	}
	
	
	//ahora que tenemos los nuevos valores por defecto, a ir linea por linea dela factura y reemplazando por los nuevos valores
	
	
	$iddocumento = $fhiddocumento;
	
}



$url_atras = "index.php?module=".$lnxinvoice."&section=main&action=view&id=".$iddocumento;

header("Location: ".$url_atras);


?>