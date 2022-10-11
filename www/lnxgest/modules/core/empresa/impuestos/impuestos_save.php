<?php
$ftxtnombre = addslashes($_POST["txtnombre"]);
$ftxtvalor = $_POST["txtvalor"];
$fchkactivo = $_POST["chkactivo"];

$fhaccion = $_POST["haccion"];
$fhidimpuesto = $_POST["hidimpuesto"];

if ($fhaccion == 'new')
{
	$ConsultaMySql= $mysqli->query("insert into ".$prefixsql."impuestos (impuesto, valor, activo) values ('".$ftxtnombre."', '".$ftxtvalor."', '".$fchkactivo."')");

}

if ($fhaccion == 'update')
{
	$ConsultaMySql= $mysqli->query("update ".$prefixsql."impuestos set impuesto = '".$ftxtnombre."', valor = '".$ftxtvalor."', activo = '".$fchkactivo."' where id = '".$fhidimpuesto."'");

}

if ($fhaccion == 'delete')
{
	$ConsultaMySql= $mysqli->query("delete from ".$prefixsql."impuestos where id = '".$fhidimpuesto."'");
		
}

$urlatras = "index.php?&module=core&section=impuestos";
header("Location: ".$urlatras);
?>