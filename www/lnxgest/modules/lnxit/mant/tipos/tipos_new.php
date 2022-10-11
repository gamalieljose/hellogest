<?php

?>

					   
<form name="form1" action="index.php?module=lnxit&section=tiposmant&action=save" method="post">
						   

<div align="center">
<input type="hidden" name="haccion" value="new">
<table>
<tr class="maintitle"><td colspan="4" align="center">Nuevo tipo de mantenimiento</td></tr>

<tr><td>Tipo de mantenimiento</td>
<td><input type="text" name="txttipomant" required="" ></td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=tiposmant">Cancelar</a>
</td></tr>
</table>
</div>
</form>