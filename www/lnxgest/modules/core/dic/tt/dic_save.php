<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtdocserie = addslashes($_POST["txtdocserie"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."terceros_tipos (tipotercero) VALUES ('".$ftxtdocserie."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."terceros_tipos set tipotercero = '".$ftxtdocserie."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."terceros_tipos where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=tt" );
	
?>

