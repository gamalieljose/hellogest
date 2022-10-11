<?php
$fhidpermiso = $_POST["hidpermiso"];
$flstmodulo = $_POST["lstmodulo"];
$ftxtidpermiso = $_POST["txtidpermiso"];
$ftxtdisplay = $_POST["txtdisplay"];
$fhaccion = $_POST["haccion"];


if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."permisos (idmod, idpermiso, display) VALUES ('".$flstmodulo."', '".$ftxtidpermiso."', '".$ftxtdisplay."')");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."permisos set idmod = '".$flstmodulo."', idpermiso = '".$ftxtidpermiso."', display = '".$ftxtdisplay."' where id = '".$fhidpermiso."'");
		
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."permisos where id = '".$fhidpermiso."'");
}
header( "Location: index.php?module=cfpcmods&section=permisos" );


?>