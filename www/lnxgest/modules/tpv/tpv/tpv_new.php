<?php
$iduser = $_COOKIE["lnxuserid"];
$fcbtiendas = $_POST["cbtiendas"];
$fcbterminales = $_POST["cbterminales"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg where idterminal = '".$fcbterminales."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidserie = $rowaux["idserie"];
$dbidtercero = $rowaux["idtercero"];


$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."tpv "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$maxid = $rowaux["contador"] +1;
$maxid = "(PROV ".$maxid.")";

$xfecha = date("Y-m-d");
$xhora = date("H:i:s");

$fechahoy = $xfecha." ".$xhora;
/* 
estado 0,1, 2
0 - Ticket ya cerrado
1 - Abierto / en uso
2 - Aparcado

*/



$sqltpv = $mysqli->query("insert into ".$prefixsql."tpv (idtienda, iduser, idterminal, idserie, codigoint, codigo, fecha, idtercero, estado ) VALUES ('".$fcbtiendas."', '".$iduser."', '".$fcbterminales."', '".$dbidserie."', '0', '".$maxid."', '".$fechahoy."', '".$dbidtercero."', '1')");

$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."tpv "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$ultimoid = $rowaux["contador"];

header ("Location: index.php?module=tpv&section=tpv&action=view&id=".$ultimoid."#tpvview");
?>
