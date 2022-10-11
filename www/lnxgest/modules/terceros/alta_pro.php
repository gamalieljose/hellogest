<?php
$idtercero = $_GET["idtercero"];

$buscacodigo = $mysqli->query("SELECT max( codpro ) AS codigo FROM ".$prefixsql."terceros");
$row = mysqli_fetch_assoc($buscacodigo);
$codpro = $row["codigo"] +1;


$tercero = $mysqli->query("update ".$prefixsql."terceros set codpro = '".$codpro."' where id = '".$idtercero."'");



header("Location: index.php?module=terceros&section=terceros&action=edit&idtercero=".$idtercero);
?>