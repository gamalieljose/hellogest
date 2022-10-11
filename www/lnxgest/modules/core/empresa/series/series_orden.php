<?php
$idregla = $_GET["id"];
$accion = $_GET["newid"]; //down -> baja la posición del orden +1
                          //up -> sube la posición del orden -1
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where id = '".$idregla."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
	$ordenactual = $row['orden'];
	$idserie = $row['idserie'];

if ($accion == 'down') {$nuevoorden = $ordenactual +1;}
if ($accion == 'up') {$nuevoorden = $ordenactual -1;}


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where orden = '".$nuevoorden."' and idserie = '".$idserie."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
	$idsubstituir = $row['id'];
	
//idsubstituir = id del otro registro superior o inferior a substituir

$ConsultaMySql= $mysqli->query("update ".$prefixsql."impuestosrules set orden = '".$nuevoorden."' where id = '".$idregla."'");

$ConsultaMySql= $mysqli->query("update ".$prefixsql."impuestosrules set orden = '".$ordenactual."' where id = '".$idsubstituir."'");

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$idserie."' order by orden");


$ordenok = 0;

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$ordenok = $ordenok +1;
	
	$ConsultaMySqlb= $mysqli->query("update ".$prefixsql."impuestosrules set orden = '".$ordenok."' where id = '".$columna["id"]."'");
	
}



header( "location: index.php?&module=core&section=series&action=edit&tab=2&id=".$idserie );


?>