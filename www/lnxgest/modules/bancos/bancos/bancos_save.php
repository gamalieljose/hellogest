<?php

	
$idbanco = $_GET["idbanco"];
$ftxtbanco = addslashes($_POST["txtbanco"]);
$haccion = $_POST["haccion"];


if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."bancos (banco) VALUES ('".$ftxtbanco."')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."bancos set banco = '".$ftxtbanco."' where id = '".$idbanco."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."bancos where id = '".$idbanco."'");
}
header( "Location: index.php?module=bancos&section=bancos" );
	

?>