<?php
$idtipo = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos_tipo where id = '".$idtipo."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbtipo = $row["tipo"];


echo '<p><a href="index.php?module=almacen&section=tipo&action=del&id='.$idtipo.'" class="btncancel">Eliminar fabricante</a></p>';

?>


<div align="center">

<p> </p>
<form name="form1" method="POST" action="index.php?module=almacen&section=tipo&action=save" >
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidtipo" value="'.$idtipo.'"/>'; ?>


<table>
<tr class="maintitle"><td colspan="2">Editando tipo de articulo</td></tr>
<tr>
	<td>Tipo de articulo</td>
	<td><?php echo '<input type="text" value="'.$dbtipo.'" name="txttipo" required=""/>'; ?></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Guardar" class="btnsubmit"/> <a href="index.php?module=almacen&section=tipo" class="btncancel">Cancelar</a> </td></tr>
</table>
</form>
</div>