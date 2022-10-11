<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$ftxtnumdigitos = $_POST["txtnumdigitos"];

$sqlconfigconta = $mysqli->query("delete from ".$prefixsql."conta_cfpc where idempresa = '".$idempresa."'");

$sqlconfigconta = $mysqli->query("insert into ".$prefixsql."conta_cfpc (idempresa, opcion, valor) values('".$idempresa."', 'numdigitos', '".$ftxtnumdigitos."')");

$url_atras = "index.php?module=conta&section=config";
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">mensaje:</td></tr>
<tr><td>Cambios efectuados con éxito</td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';
?>

