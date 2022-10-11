<?php
$fhaccion = $_POST["haccion"];
$fhidcamp = $_POST["hidcamp"];
$ftxtcamp = addslashes($_POST["txtcamp"]);
$ftxtnotas = addslashes($_POST["txtnotas"]);


if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."crm_camp (camp, notas) VALUES ('".$ftxtcamp."', '".$ftxtnotas."')");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."crm_camp set camp = '".$ftxtcamp."', notas = '".$ftxtnotas."' where id = '".$fhidcamp."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."crm_camp where id = '".$fhidcamp."'");
	//Eliminamos los terceros asignados
	$sqltercero= $mysqli->query("delete from ".$prefixsql."crm_camp_terceros where idcamp = '".$fhidcamp."'");
}

$url_atras = "index.php?module=crm&section=camp";
header( "Location: ".$url_atras );


?>