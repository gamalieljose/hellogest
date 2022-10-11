<?php
$fhidfv = $_POST["hidfv"];
$foptconvert = $_POST["optconvert"];


//obtenemos los datos del documento que queremos copiar
$sqlorigen = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$fhidfv."'");
$roworigen = mysqli_fetch_assoc($sqlorigen);

//$dboidserie = $roworigen["codigoint"];
$dbocodigoint = $roworigen["codigoint"];
$dbocodigo = $roworigen["codigo"];
$dboidcliente = $roworigen["idtercero"];
$dboestado = $roworigen["estado"]; // = 0
$dbofecha = $roworigen["fecha"];
$dbovencimiento = $roworigen["vencimiento"];
$dboidusuario = $roworigen["idusuario"];
$dbopagado = '0';
$dboeditfv = $roworigen["editfv"];
$dbopc_cp = $roworigen["pc_cp"];
$dbopc_dp = $roworigen["pc_dp"];

//selects

$flsto = $_POST["lsto"];
$flstp = $_POST["lstp"];
$flsta = $_POST["lsta"];
$flstf = $_POST["lstf"];
$flstfr = $_POST["lstfr"];


//cv 1 - compras 2 - ventas
if ($foptconvert == "ov"){$tipodoc = "O"; $cv = "2"; $idseriedestino = $flsto;}
if ($foptconvert == "pv"){$tipodoc = "P"; $cv = "2"; $idseriedestino = $flstp;}
if ($foptconvert == "av"){$tipodoc = "A"; $cv = "2"; $idseriedestino = $flsta;}
if ($foptconvert == "fv"){$tipodoc = "F"; $cv = "2"; $idseriedestino = $flstf;}
if ($foptconvert == "fvr"){$tipodoc = "FR"; $cv = "2"; $idseriedestino = $flstfr;}

if ($foptconvert == "oc"){$tipodoc = "O"; $cv = "1"; $idseriedestino = $flsto;}
if ($foptconvert == "pc"){$tipodoc = "P"; $cv = "1"; $idseriedestino = $flstp;}
if ($foptconvert == "ac"){$tipodoc = "A"; $cv = "1"; $idseriedestino = $flsta;}
if ($foptconvert == "fc"){$tipodoc = "F"; $cv = "1"; $idseriedestino = $flstf;}
if ($foptconvert == "fcr"){$tipodoc = "FR"; $cv = "1"; $idseriedestino = $flstfr;}


$campomasteriddestino = "id".$foptconvert;


$sqldestino = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$idseriedestino."'");
$rowdestino = mysqli_fetch_assoc($sqldestino);

$dbdidserie = $rowdestino["id"]; //id serie en destino
$destinoserie = $rowdestino["serie"]; //nombre de la serie de destino


$fechahoy = date('Y-m-d');


$sqldestino = $mysqli->query("insert into ".$prefixsql.$foptconvert." (idserie, codigoint, codigo, idtercero, estado, fecha, vencimiento, idusuario, pagado, editfv, pc_cp, pc_dp) values ('".$dbdidserie."', '0', '0', '".$dboidcliente."', '0', '".$fechahoy."', '".$fechahoy."', '".$dboidusuario."', '0', '0', '".$dbopc_cp."', '".$dbopc_dp."')");

$sqldestino = $mysqli->query("select max(id) as contador from ".$prefixsql.$foptconvert." ");
$row = mysqli_fetch_assoc($sqldestino);
$valorid = $row["contador"];
$codigo = "(PROV ".$valorid.")";

$iddocumento = $valorid;

$sqldestino = $mysqli->query("update ".$prefixsql.$foptconvert." set codigo = '".$codigo."' where id = '".$valorid."'");

//hasta aqui se ha creado la primera linea y hemos obtenido el nuevo ID del documento de destino $iddocumento

//obtenemos los impuestos de la serie de destino para FV_tax

$sqldestino_taxes = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbdidserie."' order by orden");
while($colimpdestino = mysqli_fetch_array($sqldestino_taxes))
{
	$sqldestinoaux = $mysqli->query("insert into ".$prefixsql.$foptconvert."_tax (".$campomasteriddestino.", idimpuesto, valor) values ('".$iddocumento."', '".$colimpdestino["idimpuesto"]."', '".$colimpdestino["valor"]."') ");
}

//una vez que ya hemos colocado los nuevos impuestos de la serie de destino
//procedemos a copiar las lineas pero con los impuestos por defecto de la 
//serie de destino.

//Traspasamos todas lineas

$sqlorigen = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$fhidfv."' ");
while($colorigen = mysqli_fetch_array($sqlorigen))
{
	$sqldestino = $mysqli->query("insert into ".$prefixsql.$foptconvert."_lineas (".$campomasteriddestino.", cod, concepto, unid, precio, dto, importe, orden, exclufactu) values ('".$iddocumento."', '".$colorigen["cod"]."', '".$colorigen["concepto"]."', '".$colorigen["unid"]."', '".$colorigen["precio"]."', '".$colorigen["dto"]."', '".$colorigen["importe"]."', '".$colorigen["orden"]."', '".$colorigen["exclufactu"]."')");
	
	$sqlaux1 = $mysqli->query("select max(id) as contador from ".$prefixsql.$foptconvert."_lineas ");
	$rowaux1 = mysqli_fetch_assoc($sqlaux1);
	$destinoidlinea = $rowaux1["contador"];
	
	//ahora calculamos los impuestos por linea para crear lineas_tax
	$sqlaux2 = $mysqli->query("SELECT * from ".$prefixsql.$foptconvert."_tax where ".$campomasteriddestino." = '".$iddocumento."' ");
	while($colaux2 = mysqli_fetch_array($sqlaux2))
	{
		if($colorigen["exclufactu"] == "1")
		{
			$valor = "0";
			$importe = "0";
		}
		else
		{
			$valor = $colaux2["valor"];
			$importe = $colorigen["importe"] * ($valor / 100);
		}
		
		$sqldestino = $mysqli->query("insert into ".$prefixsql.$foptconvert."_lineas_tax (".$campomasteriddestino.", idfvlinea, idtax, valor, importe) values ('".$iddocumento."', '".$destinoidlinea."', '".$colaux2["idimpuesto"]."', '".$valor."', '".$importe."')");
	}
	
}






header( "refresh:2;url=index.php?module=".$foptconvert."&section=main&action=view&id=".$iddocumento );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Documento copiado con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module='.$foptconvert.'&section=main&action=view&id='.$iddocumento.'">Aceptar</a></td></tr>
	</table></div>';

?>