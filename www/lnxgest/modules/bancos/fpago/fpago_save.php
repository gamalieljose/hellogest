<?php
$idfpago = $_GET["idfpago"];
$ftxtfpago = $_POST["txtfpago"];
$haccion = $_POST["haccion"];
$flstcuentas = $_POST["lstcuentas"];

if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."formaspago (formapago, idcuentacaja) VALUES ('".$ftxtfpago."', '".$flstcuentas."')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."formaspago set formapago = '".$ftxtfpago."', idcuentacaja = '".$flstcuentas."' where id = '".$idfpago."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."formaspago where id = '".$_POST["hidtipo"]."'");
}
header( "Location: index.php?module=bancos&section=fpago" );
	


?>