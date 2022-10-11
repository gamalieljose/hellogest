<?php
echo '<a class="btnedit" href="index.php?module=lnxit&section=workorders">Volver al listado</a> ';

echo ' <a class="btnedit" href="#">Procesar este parte</a> ';

$ficheritoxml = $_GET["fichero"];

echo '<p>partes: '.$ficheritoxml.'</p>';

?>
<div align="center">
<table>
<tr class="maintitle"><td colspan="2">Rellenar campos parte de trabajo</td></tr>
<tr><td>Numero Parte de trabajo</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr><td>Tercero</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr><td>Tecnico</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr><td>Fecha</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr><td>Hora entrada</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr><td>Hora de salida</td><td><input type="text" name="txtcodigoparte" /></td></tr>
<tr class="maintitle"><td colspan="2">Texto albaran</td></tr>
<tr><td colspan="2"><textarea name="txtnotas"></textarea></td></tr>
</table>


<?php
$ficheroftp = "modules/lnxit/workorders/files/".$ficheritoxml;


echo '<iframe width="90%" height="300" src="'.$ficheroftp.'"></iframe>';


?>
</div>