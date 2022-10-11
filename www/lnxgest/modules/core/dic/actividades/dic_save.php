<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtactividad = addslashes($_POST["txtactividad"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_actividades (actividad) VALUES ('".$ftxtactividad."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_actividades set actividad = '".$ftxtactividad."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_actividades where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=actividades" );
	
?>

