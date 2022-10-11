<?php
$idtercero = $_GET["idtercero"];

$buscacodigo = $mysqli->query("SELECT max( conta_cli ) AS codigo FROM ".$prefixsql."terceros");
$row = mysqli_fetch_assoc($buscacodigo);
$codcli = $row["codigo"];

if ($codcli == '0')
{
	$contacodcli = "43000001";
}
else
{
	$contacodcli = $codcli +1;
}

$tercero = $mysqli->query("update ".$prefixsql."terceros set conta_cli = '".$contacodcli."' where id = '".$idtercero."'");

$tercero = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($tercero);
$dbrazonsocial = $row["razonsocial"];

$conta = $mysqli->query("insert into ".$prefixsql."conta_master (conta, grupo, detalle) values ('".$contacodcli."', '4', '".$dbrazonsocial."')");

$buscacodigo = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscacodigo);
$dbcodcli = $row["codcli"];

if ($dbcodcli == '0')
{
	$buscacodigo = $mysqli->query("SELECT max( codcli ) AS codigo FROM ".$prefixsql."terceros");
	$row = mysqli_fetch_assoc($buscacodigo);
	$codcli = $row["codigo"] +1;

	$tercero = $mysqli->query("update ".$prefixsql."terceros set codcli = '".$codcli."' where id = '".$idtercero."'");
}




header("Location: index.php?module=terceros&section=terceros&action=edit&idtercero=".$idtercero);
?>
