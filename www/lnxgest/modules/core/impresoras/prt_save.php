<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtnombre = addslashes($_POST["txtnombre"]);
$ftxttipo = $_POST["lsttipo"];
$ftxtnotas = addslashes($_POST["txtnotas"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."impresoras (nombre, tipo, notas) VALUES ('".$ftxtnombre."', '".$ftxttipo."', '".$ftxtnotas."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."impresoras set nombre = '".$ftxtnombre."', tipo = '".$ftxttipo."', notas = '".$ftxtnotas."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."impresoras where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=printers" );

?>

