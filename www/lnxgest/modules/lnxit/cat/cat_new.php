<?php

?>

					   
<form name="form1" action="index.php?module=lnxit&section=cat&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="new">
<table>
<tr class="maintitle"><td colspan="4" align="center">Nueva categoria</td></tr>

<tr><td>Categoria</td>
<td><input type="text" name="txtcategoria" required="" size="50"></td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=tickets&subsection=list">Cancelar</a>
</td></tr>
</table>
</div>
</form>