<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtzona = addslashes($_POST["txtzona"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_zonas (zona) VALUES ('".$ftxtzona."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_zonas set zona = '".$ftxtzona."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_zonas where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=zonacom" );
	
?>

