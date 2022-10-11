<?php 
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."groups where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbgrupo = $row["grupo"];




?>

<p>&nbsp;</p>
<form name="editgrupo" action="index.php?module=core&section=groups&action=save" method="post">
<div align="center">
<input type="hidden" name="haccion" value="delete" />
<?php echo '<input type="hidden" name="hidgrupo" value="'.$_GET["id"].'" />'; ?>
	<table>
	<tr class="maintitle"><td colspan="2">¿Desea eliminar el siguiente grupo?</td></tr>
	<tr><td>Nombre del grupo</td><td>
	<?php echo $dbgrupo; ?></td></tr>

	<tr><td colspan="2" align="center">&nbsp; </td></tr>
	<tr><td colspan="2" align="center">
	<?php
	echo'<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> ';

	echo '<a class="btncancel" href="index.php?&module=core&section=groups">Cancelar</a>';
	?>
	</td></tr></table>
</div>
</form>
