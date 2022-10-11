<?php
//$ftxttipogasto = addslashes($_POST["txttipogasto"]);
$fhaccion = $_POST["haccion"];
$fchk_aprobar = $_POST["chk_aprobar"];
if($fchk_aprobar == ''){$fchk_aprobar = "NO";}


if ($fhaccion == 'savecfg')
{
    $sqltercero= $mysqli->query("delete from ".$prefixsql."gastos_cfg");
	$sqltercero= $mysqli->query("insert into ".$prefixsql."gastos_cfg (opcion, valor) VALUES ('APROBAR', '".$fchk_aprobar."' )");
	
}


$urlatras = "index.php?module=gastos&section=cfg";
header( "Location: ".$urlatras );
?>