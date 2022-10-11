<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];

$ftxtorden = $_POST["txtorden"];
$ftxticono = $_POST["txticono"];
$ftxtdisplay = $_POST["txtdisplay"];
$ftxtenlace = $_POST["txtenlace"];
$flstventana = $_POST["lstventana"];



if ($fhaccion == 'new')
{
	$sqlviajes = $mysqli->query("insert into ".$prefixsql."users_mainview (iduser, display, enlace, ventana, orden, icono) VALUES ('".$_COOKIE["lnxuserid"]."', '".$ftxtdisplay."', '".$ftxtenlace."', '".$flstventana."', '".$ftxtorden."', '".$ftxticono."')");

}
if ($fhaccion == 'update')
{

	 $sqlviajes = $mysqli->query("update ".$prefixsql."users_mainview set iduser = '".$_COOKIE["lnxuserid"]."', display = '".$ftxtdisplay."', enlace = '".$ftxtenlace."', ventana = '".$flstventana."', orden = '".$ftxtorden."', icono = '".$ftxticono."' where id = '".$fhidregistro."'");

}
if ($fhaccion == 'delete')
{

	$sqlviajes = $mysqli->query("delete from ".$prefixsql."users_mainview where id = '".$fhidregistro."'");

}


$urlatras = "index.php?module=userpanel&section=bloques";
header( "Location: ".$urlatras );
?>