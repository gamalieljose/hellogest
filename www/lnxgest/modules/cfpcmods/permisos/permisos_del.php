<?php

$idpermiso = $_GET["id"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."permisos where id = '".$idpermiso."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$dbidpermiso = $row['idpermiso'];
	$dbdisplay = $row['display'];
	
?>
<form name="form1" action="index.php?module=cfpcmods&section=permisos&action=save" method="post">
<input type="hidden" name="haccion" value="delete">


<?php

echo '<input type="hidden" name="hidpermiso" value="'.$idpermiso.'">';

echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td align="center">¿Desea Eliminar este permiso?</td></tr>
	<tr><td align="center"><b>'.$dbidpermiso.' - '.$dbdisplay.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btnenlacecancel" href="index.php?module=bancos&section=bancos">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
?>