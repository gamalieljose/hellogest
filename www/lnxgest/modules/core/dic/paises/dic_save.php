<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtpais = addslashes($_POST["txtpais"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."paises (pais) VALUES ('".$ftxtpais."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."paises set pais = '".$ftxtpais."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."paises where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=paises" );

?>

