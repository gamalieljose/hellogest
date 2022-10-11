<?php
$fhaccion = $_POST["haccion"];
$fhidgrupo = $_POST["hidgrupo"];
$flstusuarios = $_POST["lstusuarios"];
$fhidregistro = $_POST["hidregistro"];


if($fhaccion == "new")
{
$mensaje = 'Nuevo grupo añadido';	
$sqlgrupos = $mysqli->query("insert into ".$prefixsql."usersgroup (iduser, idgroup) VALUES ('".$flstusuarios."', '".$fhidgrupo."')");
}
if($fhaccion == "delete")
{
$sqlgrupos = $mysqli->query("delete from ".$prefixsql."usersgroup where id = '".$fhidregistro."' ");	
}

$urlatras = 'index.php?&module=core&section=gusers&id='.$fhidgrupo;


header( "Location: ".$urlatras );
	
	
	
	?>