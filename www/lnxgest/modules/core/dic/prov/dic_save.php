<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtprovincia = addslashes($_POST["txtprovincia"]);
$flstpais = $_POST["lstpais"];


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."provincias (provincia, idpais) VALUES ('".$ftxtprovincia."', '".$flstpais."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."provincias set provincia = '".$ftxtprovincia."', idpais = '".$flstpais."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."provincias where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=prov" );
	
?>

