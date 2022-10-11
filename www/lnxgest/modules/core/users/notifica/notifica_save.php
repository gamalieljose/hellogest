<?php
$ffemailchkactivo = $_POST["femailchkactivo"];
if($fffemailchkactivo == ''){$ffemailchkactivo = '0';}
$femailtxtdisplay = addslashes($_POST["emailtxtdisplay"]);
$femailtxtemail = $_POST["emailtxtemail"];
$femailtxtlogin = $_POST["emailtxtlogin"];
$femailtxtpassword = addslashes($_POST["emailtxtpassword"]);
$femailtxtsmtp = $_POST["emailtxtsmtp"];

$ftlgmchkactivo = $_POST["tlgmchkactivo"];
if($ftlgmchkactivo == ''){$ftlgmchkactivo = '0';}
$ftlgmbotid = addslashes($_POST["tlgmbotid"]);

$ftlgmtexto = addslashes($_POST["tlgmtexto"]);
$ftlgmfiles = addslashes($_POST["tlgmfiles"]);



$sqlnotifica = $mysqli->query("delete from ".$prefixsql."notifica ");

$sqlnotifica = $mysqli->query("insert into ".$prefixsql."notifica (opcion, valor) VALUES ('TLGM_ACTIV', '".$ftlgmchkactivo."')");
$sqlnotifica = $mysqli->query("insert into ".$prefixsql."notifica (opcion, valor) VALUES ('TLGM_BOTID', '".$ftlgmbotid."')");
$sqlnotifica = $mysqli->query("insert into ".$prefixsql."notifica (opcion, valor) VALUES ('TLGM_TEXT', '".$ftlgmtexto."')");
$sqlnotifica = $mysqli->query("insert into ".$prefixsql."notifica (opcion, valor) VALUES ('TLGM_FILE', '".$ftlgmfiles."')");



$url_atras = "index.php?&module=core&section=notifica";
header("Location: ".$url_atras);
?>