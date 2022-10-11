<?php
$idtercero = $_GET["idtercero"];

$buscacodigo = $mysqli->query("SELECT max( codcli ) AS codigo FROM ".$prefixsql."terceros");
$row = mysqli_fetch_assoc($buscacodigo);
$codcli = $row["codigo"] +1;


$tercero = $mysqli->query("update ".$prefixsql."terceros set codcli = '".$codcli."' where id = '".$idtercero."'");


header("Location: index.php?module=terceros&section=terceros&action=edit&idtercero=".$idtercero);
?>