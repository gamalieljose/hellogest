<?php

?>

<div align="center">

<p> </p>
<form name="form1" method="POST" action="index.php?module=almacen&section=tipo&action=save" >
<input type="hidden" name="haccion" value="new"/>
<table>
<tr class="maintitle"><td colspan="2">Nuevo tipo de articulo</td></tr>
<tr>
	<td>Tipo de articulo</td>
	<td><input type="text" value="" name="txttipo" required=""/></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Guardar" class="btnsubmit"/> <a href="index.php?module=almacen&section=tipo" class="btncancel">Cancelar</a> </td></tr>
</table>
</form>
</div>