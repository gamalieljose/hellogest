<?php
$ftxtnomcampo = $_POST["txtnomcampo"];
$ftxtdisplay = $_POST["txtdisplay"];
$flsttipocampo = $_POST["lsttipocampo"];
$fhaccion = $_POST["haccion"];
$fchkmostrarlist = $_POST["chkmostrarlist"];

$fhidcampo = $_POST["hidcampo"];

if($fhaccion == "new")
{
    $sqlcamposcustom = $mysqli->query("insert into ".$prefixsql."tpv_cfg_cg (campo, display, tipo, mostrarlist) VALUES ('".$ftxtnomcampo."', '".$ftxtdisplay."', '".$flsttipocampo."', '".$fchkmostrarlist."')");

}
if($fhaccion == "update")
{
    $sqlcamposcustom = $mysqli->query("update ".$prefixsql."tpv_cfg_cg set campo = '".$ftxtnomcampo."', display = '".$ftxtdisplay."', tipo = '".$flsttipocampo."', mostrarlist = '".$fchkmostrarlist."' where id = '".$fhidcampo."'");

}
if($fhaccion == "delete")
{
    $sqlcamposcustom = $mysqli->query("delete from ".$prefixsql."tpv_cfg_cg where id = '".$fhidcampo."'");

}

$url_atras = "index.php?module=tpv&section=cfgcg";
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