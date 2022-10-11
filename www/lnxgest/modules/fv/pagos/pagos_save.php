<?php
$fhidfv = $_POST["hidfv"];
$fhidpago = $_POST["hidpago"];
$fhaccion = $_POST["haccion"];

$fdpkfupago = $_POST["dpkfupago"];
$ftxtimporte = $_POST["txtimporte"];
$flstfpago = $_POST["lstfpago"];
$flstcpago = $_POST["lstcpago"];




$fano = substr($fdpkfupago, 6, 4);  
$fmes = substr($fdpkfupago, 3, 2);  
$fdia = substr($fdpkfupago, 0, 2);  

$cfecha = $fano.'-'.$fmes.'-'.$fdia;

if($fhaccion == 'new')
{
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_pagos (".$campomasterid.", fecha, importe, idfpago, idcpago) values ('".$fhidfv."', '".$cfecha."', '".$ftxtimporte."', '".$flstfpago."', '".$flstcpago."')");	
}
if($fhaccion == 'update')
{
	$ConsultaMySql = $mysqli->query("update ".$prefixsql.$lnxinvoice."_pagos set fecha = '".$cfecha."', importe = '".$ftxtimporte."', idfpago = '".$flstfpago."', idcpago = '".$flstcpago."' where id = '".$fhidpago."'");
}
if($fhaccion == 'delete')
{
	$ConsultaMySql = $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_pagos  where id = '".$fhidpago."'");
}



$urlatras = 'index.php?module='.$lnxinvoice.'&section=pagos&id='.$fhidfv;

header( "Location: ".$urlatras );
	
	
?>