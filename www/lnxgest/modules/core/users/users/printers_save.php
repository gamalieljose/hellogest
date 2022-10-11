<?php
$iduser = $_POST["hiduser"];
$fhaccion = $_POST["haccion"];
$flstimpresora = $_POST["lstimpresora"];
$fchkdft = $_POST["chkdft"];

if ($fhaccion == "addprinter")
{
	$ssql = "insert into ".$prefixsql."usersprinters (iduser, idprinter, dft) VALUES ('".$iduser."', '".$flstimpresora."', '0')";
	$sqlimpresora = $mysqli->query($ssql);
}


if ($fhaccion == "predeterminar")
{
	$ssql = "update ".$prefixsql."usersprinters set dft = '0' where iduser = '".$iduser."'";
	$sqlimpresora = $mysqli->query($ssql);
	
	$ssql = "update ".$prefixsql."usersprinters set dft = '1' where id = '".$fchkdft."'";
	$sqlimpresora = $mysqli->query($ssql);
}




$url_atras = "index.php?&module=core&section=users_printers&id=".$iduser."&upd=ate";

header( "Location: ".$url_atras );

?>
