<?php
?>
<form name="form1" action="index.php?module=terceros&section=expterceros&proceso=file" method="post">';

<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle" colspan="2">Exportacion fichero Terceros:</td></tr>
	<tr><td colspan="2">Haga clic en exportar para generar el fichero de terceros</td></tr>
	<tr><td><input type="checkbox" value="1" name="chkokcliente">Es Cliente</td><td><input type="radio" value="1" name="chkcliente"> SI <input type="radio" value="0" name="chkcliente" checked=""> NO </td></tr>
	<tr><td><input type="checkbox" value="1" name="chkokpro">Es Proveedor</td><td><input type="radio" value="1" name="chkproveedor"> SI <input type="radio" value="0" name="chkproveedor" checked=""> NO </td></tr>
	<tr><td>Razon Social</td><td><input type="text" value="" name="txtrazonsocial"></td></tr>
	<tr><td>Nombre Comercial</td><td><input type="text" value="" name="txtnomcomercial"></td></tr>
	<tr><td>Poblacion</td><td><input type="text" value="" name="txtpobla"></td></tr>
	<tr><td>Origen</td><td><input type="text" value="" name="txtorigen"></td></tr>
	<tr><td>Notas</td><td><input type="text" value="" name="txtnotas"></td></tr>	
	<tr><td>Telefono</td><td><input type="radio" value="1" name="chktel"> SI <input type="radio" value="0" name="chktel" checked=""> NO </td></tr>
	<tr><td>e-mail</td><td><input type="radio" value="1" name="chkemail"> SI <input type="radio" value="0" name="chkemail" checked=""> NO </td></tr>
	
	<tr><td>Exportacion</td>
	<td>
	
	<select name="sltexportacion">
		<option value="csv" selected>CSV</option>
		<option value="html">HTML</option>
	</select>
	</td></tr>
	
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"> <input class="btnsubmit" name="btneliminar" value="Exportar" type="submit"></td></tr>
</table></div>

</form>
