<?php
$fhaccion = $_POST["haccion"];
$fhidcat = $_POST["hidcat"];
$ftxtcategoria = addslashes($_POST["txtcategoria"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."ficheros_cat (categoria) VALUES ('".$ftxtcategoria."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."ficheros_cat set categoria = '".$ftxtcategoria."' where id = '".$fhidcat."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."ficheros_cat where id = '".$fhidcat."'");
	
}



	header( "Location: index.php?module=ficheros&section=cat" );
	
?>

