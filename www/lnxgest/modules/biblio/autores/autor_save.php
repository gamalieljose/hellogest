<?php
$idautor = $_POST["hidautor"];
$ftxtautor = addslashes($_POST["txtautor"]);
$haccion = $_POST["haccion"];


if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$sqlpfxbiblio."autores (autor) VALUES ('".$ftxtautor."')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$sqlpfxbiblio."autores set autor = '".$ftxtautor."' where id = '".$idautor."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$sqlpfxbiblio."autores where id = '".$idautor."'");
}
$urlatras = "index.php?module=biblio&section=autores";
header( "Location: ".$urlatras );


?>