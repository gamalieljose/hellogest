<?php
$ftxtnomcampo = $_POST["txtnomcampo"];
$ftxtdisplay = $_POST["txtdisplay"];
$flsttipocampo = $_POST["lsttipocampo"];
$fhaccion = $_POST["haccion"];

$fhidcampo = $_POST["hidcampo"];

if($fhaccion == "new")
{
    $sqlcamposcustom = $mysqli->query("insert into ".$prefixsql."terceros_lopd_cfg (campo, display, tipo) VALUES ('".$ftxtnomcampo."', '".$ftxtdisplay."', '".$flsttipocampo."')");

}
if($fhaccion == "update")
{
    $sqlcamposcustom = $mysqli->query("update ".$prefixsql."terceros_lopd_cfg set campo = '".$ftxtnomcampo."', display = '".$ftxtdisplay."', tipo = '".$flsttipocampo."' where id = '".$fhidcampo."'");

}
if($fhaccion == "delete")
{
    $sqlcamposcustom = $mysqli->query("delete from ".$prefixsql."terceros_lopd_cfg where id = '".$fhidcampo."'");

}

$url_atras = "index.php?module=terceros&section=lopdcampos";
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';
?>