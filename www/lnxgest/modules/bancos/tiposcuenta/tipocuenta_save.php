<?php
	
$idbanco = $_GET["idbanco"];
$ftxttipocuenta = addslashes($_POST["txttipocuenta"]);
$fhidtipocuenta = $_POST["hidtipocuenta"];
$haccion = $_POST["haccion"];


if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."bancostipo (tipo, conta) VALUES ('".$ftxttipocuenta."', '0')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."bancostipo set tipo = '".$ftxttipocuenta."' where id = '".$fhidtipocuenta."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."bancostipo where id = '".$fhidtipocuenta."'");
}
header( "Location: index.php?module=bancos&section=tiposcuenta" );
	

?>