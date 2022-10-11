<?php
$idtpv = $_POST["hidtpv"];
$flstseries = $_POST["lstseries"];
$flsttercero = $_POST["lsttercero"];
$lstusuarios = $_POST["lstusuarios"];

$cnstpv = $mysqli->query("update ".$prefixsql."tpv set iduser = '".$lstusuarios."', idserie = '".$flstseries."', idtercero = '".$flsttercero."' where id = '".$idtpv."'");


$url_atras = "index.php?module=tpv&section=tpv&action=view&id=".$idtpv;
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';

?>