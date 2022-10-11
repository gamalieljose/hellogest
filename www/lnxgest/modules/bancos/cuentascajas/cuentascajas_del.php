<?php
if(lnx_check_perm(34) > '0') // chekea permiso Bancos - Cuentas / Cajas
{
$idcuenta = $_GET["idcuenta"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."cuentascajas where id = '".$idcuenta."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$dbref = $row['ref'];
	$dbcuenta = $row['cuenta'];
echo '<form name="form1" action="index.php?module=bancos&section=cuentascajas&action=save&idcuenta='.$idcuenta.'" method="post">';

echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidtipo" value="'.$idcuenta.'">';

echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar esta cuenta?</td></tr>
	<tr><td align="center"><b>'.$dbref.' - '.$dbcuenta.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btnenlacecancel" href="index.php?module=bancos&section=cuentascajas">Cancelar</a></td></tr>
	</table></div>';

	echo '</form>';
	
}
else
{
	lnx_permdenegado();
}
?>