<?php
$fhidscreen = $_POST["hidscreen"];
$fhaccion = $_POST["haccion"];

$ftxtscreen = strtoupper($_POST["txtscreen"]);
$ftxtidpermiso = addslashes($_POST["lstidpermiso"]);
$ftxtdisplay = addslashes($_POST["txtdisplay"]);
$ftxturl = $_POST["txturl"];

if($fhaccion == "new")
{
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql."screens (screen, idpermiso, display, url) values('".$ftxtscreen."', '".$ftxtidpermiso."', '".$ftxtdisplay."', '".$ftxturl."')");
}

if($fhaccion == "update")
{
	$ConsultaMySql = $mysqli->query("update ".$prefixsql."screens set screen = '".$ftxtscreen."', idpermiso = '".$ftxtidpermiso."', display = '".$ftxtdisplay."', url = '".$ftxturl."' where id = '".$fhidscreen."'");
}

if($fhaccion == "delete")
{
	$ConsultaMySql = $mysqli->query("delete from ".$prefixsql."screens where id = '".$fhidscreen."'");
}



$urlatras = 'index.php?module=core&section=screens';

header( "Location: ".$urlatras );
	
	?>