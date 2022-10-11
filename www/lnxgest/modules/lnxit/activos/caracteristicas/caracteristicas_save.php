<?php
$idactivo = $_POST["hidactivo"];
$idcaracter = $_POST["hidcaracter"];
$haccion = $_POST["haccion"];

$ftxtopcion = addslashes($_POST["txtopcion"]);
$ftxtvalor = addslashes($_POST["txtvalor"]);
$ftxtvalor2 = addslashes($_POST["txtvalor2"]);
$ftxtvalor3 = addslashes($_POST["txtvalor3"]);
$ftxtvalor4 = addslashes($_POST["txtvalor4"]);

$fsltcolor = $_POST["sltcolor"];

if ($haccion == 'new')
{
	
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$idactivo."', '".$ftxtopcion."', '".$ftxtvalor."', '".$ftxtvalor2."', '".$ftxtvalor3."', '".$ftxtvalor4."', '".$fsltcolor."' )");
	
	$sqltercero= $mysqli->query("update ".$prefixsql."ita_caracteristicas set color = '".$fsltcolor."' where idactivo = '".$idactivo."' and opcion = '".$ftxtopcion."'");
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_caracteristicas set idactivo = '".$idactivo."', opcion = '".$ftxtopcion."', valor = '".$ftxtvalor."', valor2 = '".$ftxtvalor2."', valor3 = '".$ftxtvalor3."', valor4 = '".$ftxtvalor4."', color = '".$fsltcolor."' where id = '".$idcaracter."'");
	$sqltercero= $mysqli->query("update ".$prefixsql."ita_caracteristicas set color = '".$fsltcolor."' where idactivo = '".$idactivo."' and opcion = '".$ftxtopcion."'");	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where id = '".$idcaracter."'");
	
}

$urlatras = "index.php?module=lnxit&section=activos&ss=caracteristicas&id=".$idactivo;
header( "Location: ".$urlatras );




?>