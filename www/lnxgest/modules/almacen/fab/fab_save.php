<?php
$fhaccion = $_POST["haccion"];
$idfabricante = $_POST["hidfabricante"];
$ftxtfabricante = $_POST["txtfabricante"];




if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."fabricantes (fabricante) VALUES ('".$ftxtfabricante."')");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."fabricantes set fabricante = '".$ftxtfabricante."' where id = '".$idfabricante."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."fabricantes where id = '".$idfabricante."'");
}


$url_atras = "index.php?module=almacen&section=fab";
header( "Location: ".$url_atras );
	

?>