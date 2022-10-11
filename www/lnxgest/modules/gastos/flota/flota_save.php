<?php
$idvehiculo = $_POST["hidvehiculo"];
$haccion = $_POST["haccion"];

$ftxtvehiculo = addslashes($_POST["txtvehiculo"]);
$ftxtmatricula = addslashes($_POST["txtmatricula"]);
$ftxtkms = $_POST["txtkms"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."flota (vehiculo, matricula, kms) VALUES ('".$ftxtvehiculo."', '".$ftxtmatricula."', '".$ftxtkms."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."flota set vehiculo = '".$ftxtvehiculo."', matricula = '".$ftxtmatricula."', kms = '".$ftxtkms."' where id = '".$idvehiculo."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."flota where id = '".$idvehiculo."'");
	
}

$urlatras = "index.php?module=gastos&section=flota";
header( "Location: ".$urlatras );

?>