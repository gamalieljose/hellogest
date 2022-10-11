<?php
$idcategoria = $_POST["hidcategoria"];
$ftxtcategoria = addslashes($_POST["txtcategoria"]);
$haccion = $_POST["haccion"];


if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$sqlpfxbiblio."categorias (categoria) VALUES ('".$ftxtcategoria."')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$sqlpfxbiblio."categorias set categoria = '".$ftxtcategoria."' where id = '".$idcategoria."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$sqlpfxbiblio."categorias where id = '".$idcategoria."'");
}
$urlatras = "index.php?module=biblio&section=categorias";
header( "Location: ".$urlatras );


?>