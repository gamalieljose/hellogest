<?php
$iddocprint = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$iddocprint."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidmod = $rowaux["idmod"];
$dbcodinforme = $rowaux["codinforme"];
$dbdescripcion = $rowaux["descripcion"];
$dbidempresa = $rowaux["idempresa"];
$dbhabilitado = $rowaux["habilitado"];



?>

<form name="frmdocprint" method="POST" enctype="multipart/form-data" action="index.php?module=core&section=docprint&action=save" >
<input type="hidden" name="haccion" value="delete" />
<?php echo '<input type="hidden" name="hiddocprint" value="'.$iddocprint.'" />'; ?>





<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar este impreso?</td></tr>
	<tr><td align="center"><b><?php echo $dbcodinforme; ?></b> </br><?php echo $dbdescripcion; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=core&section=docprint">Cancelar</a></td></tr>
	</table>
</div>

	


</form>
