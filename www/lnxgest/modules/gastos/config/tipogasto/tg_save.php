<?php
$idgasto = $_POST["hidgasto"];
$haccion = $_POST["haccion"];

$ftxttipogasto = addslashes($_POST["txttipogasto"]);




if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."gastos_tipo (tipogasto) VALUES ('".$ftxttipogasto."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."gastos_tipo set tipogasto = '".$ftxttipogasto."' where id = '".$idgasto."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."gastos_tipo where id = '".$idgasto."'");
	
}

$urlatras = "index.php?module=gastos&section=cfg_tg";
header( "Location: ".$urlatras );
	

?>