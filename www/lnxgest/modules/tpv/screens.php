<?php

$numscreen = "";
$displaytitle = "TPV";



if ($_GET["section"] == 'list' ) {$numscreen = ""; $displaytitle = "Listado Tickets abierto o pendientes de pago";}

if ($_GET["section"] == 'mov' ) {$numscreen = ""; $displaytitle = "Movimientos de caja";}

if ($_GET["section"] == 'tpv' &&  $_GET["action"] == 'view')
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$_GET["id"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $codigotickettpv = $rowaux["codigo"];
    $displaytitle = $codigotickettpv." - TPV";
}

if ($_GET["section"] == 'cajon' &&  ($_GET["action"] == 'edit' || $_GET["action"] == 'view') )
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$_GET["id"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $codigocajon = $rowaux["codigo"];
    $displaytitle = $codigocajon." - (movimiento) - TPV";
}
if($_GET["section"] == 'tpvactions')
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$_GET["id"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $codigocajon = $rowaux["codigo"];
    $displaytitle = $codigocajon." - (operaciones) - TPV";

}

?>