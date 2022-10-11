<?php
$idcpago = $_POST["hidcpago"];
$ftxtcpago = $_POST["txtcpago"];
$fhaccion = $_POST["haccion"];

$ftxtdias = $_POST["txtdias"];
$ftxtdiapago = $_POST["txtdiapago"];
$flstcuenta = $_POST["lstcuenta"];

if ($fhaccion == 'new')
{
	$sqltercero = $mysqli->query("insert into ".$prefixsql."bancos_cpago (cpago, dias, diapago, idcuenta) values ('".$ftxtcpago."', '".$ftxtdias."', '".$ftxtdiapago."', '".$flstcuenta."')");

}
if ($fhaccion == 'update')
{
	$sqltercero = $mysqli->query("update ".$prefixsql."bancos_cpago set cpago = '".$ftxtcpago."', dias = '".$ftxtdias."', diapago =  '".$ftxtdiapago."', idcuenta = '".$flstcuenta."' where id = '".$idcpago."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero = $mysqli->query("delete from ".$prefixsql."bancos_cpago where id = '".$idcpago."'");
}
header( "Location: index.php?module=bancos&section=cpago" );
	


?>