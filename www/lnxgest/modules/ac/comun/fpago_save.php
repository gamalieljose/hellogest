<?php
$fhiddocumento = $_POST["hiddoc"];
$flstfpago = $_POST["lstfpago"];
$flstcuenta = $_POST["lstcuenta"];

$flst_cp = $_POST["lst_cp"]; //condiciones pago 
$flst_dp = $_POST["lst_dp"]; //Documento pago

$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set pc_cp = '".$flst_cp."', pc_dp = '".$flst_dp."' where id = '".$fhiddocumento."'");


// ------------------ INICIO Calculo fecha vencimiento -----------------

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$fhiddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbfecha = $row["fecha"];

$xtemp = explode("-", $dbfecha);
$fechahoy = $xtemp[0]."-".$xtemp[1]."-".$xtemp[2];
$fvencimiento = $fechahoy;

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago where id = '".$flst_cp."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$pc_cp_dias = $row["dias"];
$pc_cp_dia = $row["diapago"];

	//Caso 0 - pago dia actual
	//Caso 1 - pago a x dias (sin especificar el dia)
	//Caso 2 - Pago el dia X de cada mes
	//Caso 3 - Pago a X dias el dia Y de cada mes

	//Caso 0
	if($pc_cp_dias == 0 && $pc_cp_dia == 0)
	{
		$fvencimientonueva = $fechahoy;
	}
	//Caso 1
	if($pc_cp_dias > 0 && $pc_cp_dia == 0)
	{
		$fecha_actual = date("d-m-Y");
		$xtemp = "";
		$xtemp = date("d-m-Y",strtotime($fecha_actual."+ ".$pc_cp_dias." days")); 

		$xtemp2 = explode("-", $xtemp);
		$fvencimientonueva = $xtemp2[2]."-".$xtemp2[1]."-".$xtemp2[0];
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
			$fvencimientonueva = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimientonueva = $fpago_db;
		}

		
	}

	//Caso 3
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
			$fvencimientonueva = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimientonueva = $fpago_db;
		}

		
	}


$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set vencimiento = '".$fvencimientonueva."' where id = '".$fhiddocumento."'");



// ------------------ FIN Calculo fecha vencimiento -----------------


$urlatras = 'index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$fhiddocumento;

header( "Location: ".$urlatras );
	
	
?>