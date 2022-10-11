<?php


$idcuenta = $_GET["idcuenta"];
$haccion = $_POST["haccion"];

$ftxtref = $_POST["txtref"];
$flstbancos = $_POST["lstbancos"];
$flsttipos = $_POST["lsttipos"];
$ftxtcuenta = $_POST["txtcuenta"];
$fchkactivo = $_POST["chkactivo"];
if ($fchkactivo == ''){$fchkactivo = '0';}
$flstempresa = $_POST["lstempresa"];

if ($haccion == 'new')
{	
	$sqltercero= $mysqli->query("insert into ".$prefixsql."cuentascajas (idbanco, idbancotipo, cuenta, activo, ref, idempresa) VALUES ('".$flstbancos."', '".$flsttipos."', '".$ftxtcuenta."', '".$fchkactivo."', '".$ftxtref."', '".$flstempresa."')");
	
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."cuentascajas set idbanco = '".$flstbancos."', idbancotipo = '".$flsttipos."', cuenta = '".$ftxtcuenta."', activo = '".$fchkactivo."', ref = '".$ftxtref."', idempresa = '".$flstempresa."' where id = '".$idcuenta."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."cuentascajas where id = '".$idcuenta."'");
}

header( "Location: index.php?module=bancos&section=cuentascajas" );


?>