<?php
$idcontacto = $_POST["lstcontacto"];
$idlibro = $_POST["optlibro"];
$ftxtfecha = $_POST["txtfecha"];
$haccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];

$xfecha = explode("/", $ftxtfecha);
$sqlfecha = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$ftxtfechaentrega = $_POST["txtfechaentrega"];
$xfecha = explode("/", $ftxtfechaentrega);
$sqlfechaentrega = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

if ($haccion == 'new')
{
	$sqlprestamo = $mysqli->query("insert into ".$prefixsql."biblio_prestamos (idlibro, idusuario, fechaout, fechain) VALUES ('".$idlibro."', '".$idcontacto."', '".$sqlfecha."', '0000-00-00')");
}
if ($haccion == 'update')
{
	$sqlprestamo= $mysqli->query("update ".$prefixsql."biblio_prestamos set idlibro = '".$idlibro."', idusuario = '".$idcontacto."', fechaout = '".$sqlfecha."' where id = '".$fhidregistro."'");
}
if ($haccion == 'entrega')
{
	$sqlprestamo= $mysqli->query("update ".$prefixsql."biblio_prestamos set  fechain = '".$sqlfechaentrega."' where id = '".$fhidregistro."'");
}



if ($haccion == 'delete')
{
	//$sqltercero= $mysqli->query("delete from ".$prefixsql."biblio_autores where id = '".$idautor."'");
}

$urlatras = "index.php?module=biblio&section=prestamos";
header( "Location: ".$urlatras );



?>