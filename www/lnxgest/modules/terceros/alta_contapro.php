<?php
$idtercero = $_GET["idtercero"];

$buscacodigo = $mysqli->query("SELECT max( conta_pro ) AS codigo FROM ".$prefixsql."terceros");
$row = mysqli_fetch_assoc($buscacodigo);
$codpro = $row["codigo"];

if ($codpro == '0')
{
	$contacodpro = "40000001";
}
else
{
	$contacodpro = $codpro +1;
}

$tercero = $mysqli->query("update ".$prefixsql."terceros set conta_pro = '".$contacodpro."' where id = '".$idtercero."'");

$tercero = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($tercero);
$dbrazonsocial = $row["razonsocial"];

$conta = $mysqli->query("insert into ".$prefixsql."conta_master (conta, grupo, detalle) values ('".$contacodpro."', '4', '".$dbrazonsocial."')");

$buscacodigo = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscacodigo);
$dbcodpro = $row["codpro"];

if ($dbcodpro == '0')
{
	$buscacodigo = $mysqli->query("SELECT max( codpro ) AS codigo FROM ".$prefixsql."terceros");
	$row = mysqli_fetch_assoc($buscacodigo);
	$codpro = $row["codigo"] +1;

	$tercero = $mysqli->query("update ".$prefixsql."terceros set codpro = '".$codpro."' where id = '".$idtercero."'");
}


header("Location: index.php?module=terceros&section=terceros&action=edit&idtercero=".$idtercero);
?>
