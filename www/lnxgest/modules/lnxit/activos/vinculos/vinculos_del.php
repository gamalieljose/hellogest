<?php

$idactivo = $_GET["id"];
$aborrar = $_GET["del"];
$xborrar = explode("-", $aborrar);

$vinculado = $xborrar[1];
$idactivo = $xborrar[0];

$sqlactivovinculado = $mysqli->query("delete from ".$prefixsql."ita_activos_vinc where idactivo = '".$idactivo."' and idvinculado = '".$vinculado."' "); 
$sqlactivovinculado = $mysqli->query("delete from ".$prefixsql."ita_activos_vinc where idactivo = '".$vinculado."' and idvinculado = '".$idactivo."' "); 

		
$url_atras = "index.php?module=lnxit&section=activos&ss=vinculos&id=".$idactivo."&tab=3";
header('Location: '.$url_atras);


?>

