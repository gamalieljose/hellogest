<?php

$idtipocuenta = $_GET["id"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."bancostipo where id = '".$idtipocuenta."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$bancotexto = $row["tipo"];
echo '<form name="form1" action="index.php?module=bancos&section=tiposcuenta&action=save&idbanco='.$idtipocuenta.'" method="post">';

echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidtipocuenta" value="'.$idtipocuenta.'">';


echo '<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar este tipo de cuenta?</td></tr>
	<tr><td align="center"><b>'.$bancotexto.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=bancos&section=tiposcuenta">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
	

?>