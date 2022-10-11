<?php
$idfpago = $_GET["idfpago"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$idfpago."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$bancotexto = $row['formapago'];
echo '<form name="form1" action="index.php?module=bancos&section=fpago&action=save&idbanco='.$idfpago.'" method="post">';

echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidtipo" value="'.$idfpago.'">';

echo '<div align="center">
	<table width="400" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar esta forma de pago?</td></tr>
	<tr><td align="center"><b>'.$bancotexto.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=bancos&section=fpago">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
	

?>