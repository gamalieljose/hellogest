<?php
$fhaccion = $_POST["haccion"];
$fidtercero = $_POST["hidtercero"];
$flsttercero = $_POST["lsttercero"];
$flstrelacion = $_POST["lstrelacion"];
	$xrelacion = explode("-", $flstrelacion);
	$idvincula = $xrelacion[0];
	if($xrelacion[1] == 'A'){$idvinculaletra1 = 'A'; $idvinculaletra2 = 'B';}
	if($xrelacion[1] == 'B'){$idvinculaletra1 = 'B'; $idvinculaletra2 = 'A';;}

if($fhaccion == 'new' || $fhaccion == 'update')
{
	
	$sqltercerovinc = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercero = '".$fidtercero."' and idtercerob = '".$flsttercero."' ");
	$sqltercerovinc = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercero = '".$flsttercero."' and idtercerob = '".$fidtercero."' ");
		
	$sqltercerovinc = $mysqli->query("insert into ".$prefixsql."terceros_vinc (idtercero, idtercerob, idvinc, vinclabel) values ('".$fidtercero."', '".$flsttercero."', '".$idvincula."', '".$idvinculaletra1."')");
	$sqltercerovinc = $mysqli->query("insert into ".$prefixsql."terceros_vinc (idtercero, idtercerob, idvinc, vinclabel) values ('".$flsttercero."', '".$fidtercero."', '".$idvincula."', '".$idvinculaletra2."')");
        
}

if($fhaccion == 'delete' )
{
	$fidtercerob = $_POST["hidtercerob"];
	$sqltercerovinc = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercero = '".$fidtercero."' and idtercerob = '".$fidtercerob."' ");
	$sqltercerovinc = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercero = '".$fidtercerob."' and idtercerob = '".$fidtercero."' ");
}



$url_atras = "index.php?module=terceros&section=tercerosvinc&idtercero=".$fidtercero;


header( "Location: ".$url_atras );

?>
