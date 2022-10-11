<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtdocserie = addslashes($_POST["txtdocserie"]);
$ftxtvalor = addslashes($_POST["txtvalor"]);

if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_docseries (docserie, valor) VALUES ('".$ftxtdocserie."', '".$ftxtvalor."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_docseries set docserie = '".$ftxtdocserie."' , valor = '".$ftxtvalor."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_docseries where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=tfp" );
	
?>

