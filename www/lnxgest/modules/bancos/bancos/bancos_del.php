<?php

$idbanco = $_GET["idbanco"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."bancos where id = '".$idbanco."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$bancotexto = $row['banco'];
echo '<form name="form1" action="index.php?module=bancos&section=bancos&action=save&idbanco='.$idbanco.'" method="post">';

echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidtipo" value="'.$idbanco.'">';

echo '<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar este banco?</td></tr>
	<tr><td align="center"><b>'.$bancotexto.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=bancos&section=bancos">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
	

?>