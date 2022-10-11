<?php
$idfichero = $_GET["id"];

$auxsumas = $mysqli->query("SELECT * from ".$prefixsql."ficheros where id = '".$idfichero."' ");
$auxrow = mysqli_fetch_assoc($auxsumas);
$dbdescripcion = $auxrow["descripcion"];

?>

<div align="center">

<form name="form1" action ="index.php?module=ficheros&section=save" method="POST">
<?php

echo '<input type="hidden" name="hidfichero" value="'.$idfichero.'"/>';
?>

<table>

<tr class="maintitle"><td colspan="2">Confirmacion borrar archivo</td></tr>
<input type="hidden" name="haccion" value="delete"/>
<tr>
	<td>Fichero</td>
	<td><?php echo '<a class="btnsubmit"  href="modules/ficheros/download.php?id='.$idfichero.'">Download</a>'; ?></td>
</tr>
<tr><td colspan="2">¿Desea eliminar definitivamente este archivo?</td>
</tr>
<tr>
	<td>Descripción</td>
	<td><?php echo $dbdescripcion; ?></td>
</tr>
<tr><td colspan="2" align="center">
<input type="submit" class="btnsubmit" value="Eliminar archivo" />
<a class="btncancel" href="index.php?module=ficheros" >Cancelar</a>
</td></tr>
</table>
</form>

</div>