<?php
$fhaccion = $_POST["haccion"];
$fhidusuario = $_POST["hidusuario"];
$flstgrupo = $_POST["lstgrupo"];
$fhidregistro = $_POST["hidregistro"];


if($fhaccion == "new")
{
$mensaje = 'Nuevo grupo añadido';	
$sqlgrupos = $mysqli->query("insert into ".$prefixsql."usersgroup (iduser, idgroup) VALUES ('".$fhidusuario."', '".$flstgrupo."')");
}
if($fhaccion == "delete")
{
$sqlgrupos = $mysqli->query("delete from ".$prefixsql."usersgroup where id = '".$fhidregistro."' ");	
}

$urlatras = 'index.php?&module=core&section=ugroups&id='.$fhidusuario;


header( "Location: ".$urlatras );
	
	
	
	?>