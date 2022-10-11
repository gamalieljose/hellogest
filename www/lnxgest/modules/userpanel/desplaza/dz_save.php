<?php
$idviaje = $_POST["hidviaje"];
$haccion = $_POST["haccion"];

$fdpkfecha = $_POST["dpkfecha"];
$flstuser = $_POST["lstuser"];
$ftxtdesplazamiento = $_POST["txtdesplazamiento"];
$fchktercero = $_POST["chktercero"];
$Flsttercero = $_POST["lsttercero"];
$flstflota = $_POST["lstflota"];
$ftxtkms = $_POST["txtkms"];


$fano = substr($fdpkfecha, 6, 4);
$fmes = substr($fdpkfecha, 3, 2);
$fdia = substr($fdpkfecha, 0, 2);

$fdpkfecha = $fano.'-'.$fmes.'-'.$fdia;

if($fchktercero == '1')
{
   $flsttercero = $_POST["lsttercero"];
}
else
{
   $flsttercero = '0';
}


if ($haccion == 'new')
{
	$sqlviajes = $mysqli->query("insert into ".$prefixsql."viajes (idflota, fecha, idtercero, iduser, kms, desplazamiento) VALUES ('".$flstflota."', '".$fdpkfecha."', '".$flsttercero."', '".$flstuser."', '".$ftxtkms."', '".$ftxtdesplazamiento."')");

}
if ($haccion == 'update')
{

	 $sqlviajes = $mysqli->query("update ".$prefixsql."viajes set idflota = '".$flstflota."', fecha = '".$fdpkfecha."', idtercero = '".$flsttercero."', iduser = '".$flstuser."', kms = '".$ftxtkms."', desplazamiento = '".$ftxtdesplazamiento."'  where id = '".$idviaje."'");

}
if ($haccion == 'delete')
{

	$sqlviajes = $mysqli->query("delete from ".$prefixsql."viajes where id = '".$idviaje."'");

}


$urlatras = "index.php?module=userpanel&section=dz";
header( "Location: ".$urlatras );


?>
