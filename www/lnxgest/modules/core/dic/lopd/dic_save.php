<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtactividad = addslashes($_POST["txtactividad"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_lopd (lopdcat) VALUES ('".$ftxtactividad."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_lopd set lopdcat = '".$ftxtactividad."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_lopd where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=lopdcats" );

?>

