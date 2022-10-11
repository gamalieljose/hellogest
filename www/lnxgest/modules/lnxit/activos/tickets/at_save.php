<?php
$hidticket = $_POST["hidticket"];
$haccion = $_POST["haccion"];

$hidline = $_POST["hidline"];

$idactivo = $_POST["sltactivoobjeto"];



if ($haccion == 'new' && $idactivo > 0)
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_tickets (idticket, idactivo) VALUES ('".$hidticket."', '".$idactivo."' )");
	
}

if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."ita_tickets where id = '".$hidline."'");
	
}

$urlatras = "index.php?module=lnxit&section=ticketactivos&id=".$hidticket;
header( "Location: ".$urlatras );


?>