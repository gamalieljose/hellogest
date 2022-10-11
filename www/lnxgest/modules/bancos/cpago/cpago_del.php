<?php
$idfpago = $_GET["idcpago"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."bancos_cpago where id = '".$idfpago."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$bancotexto = $row['cpago'];
echo '<form name="form1" action="index.php?module=bancos&section=cpago&action=save" method="post">';

echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidcpago" value="'.$idfpago.'">';

echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar esta forma de pago?</td></tr>
	<tr><td align="center"><b>'.$bancotexto.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btnenlacecancel" href="index.php?module=bancos&section=cpago">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
	
?>