<?php
$idregla = $_GET["idregla"];
$idimpuesto = $_GET["id"];
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql."impuestosrules where id = '".$idimpuesto."'");
header( "location: index.php?&module=core&section=series&action=edit&tab=2&id=".$idregla );

?>