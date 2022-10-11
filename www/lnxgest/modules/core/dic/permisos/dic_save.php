<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];

$flstmodulo = $_POST["lstmodulo"];
$ftxtidpermiso = $_POST["txtidpermiso"];
$ftxtdisplay = addslashes($_POST["txtdisplay"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."permisos (idmod, idpermiso, display) VALUES ('".$flstmodulo."', '".$ftxtidpermiso."', '".$ftxtdisplay."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."permisos set idmod = '".$flstmodulo."', idpermiso = '".$ftxtidpermiso."', display = '".$ftxtdisplay."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."permisos where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=permisos" );

?>

