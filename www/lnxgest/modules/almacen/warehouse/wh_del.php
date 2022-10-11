<?php
$idalmacen = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."almacenes where id = '".$idalmacen."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbid = $row["id"];
$dbalmacen = $row["almacen"];


?>


<div align="center">
<form name="form1" method="POST" action="index.php?module=almacen&section=wh&action=save" >
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidalmacen" value="'.$idalmacen.'"/>'; ?>	
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Desea eliminar este almacen:</td></tr>
	<tr><td><?php echo $dbid.' - '.$dbalmacen; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="submit" class="btnsubmit" value="Eliminar"*/> <a href="index.php?module=almacen&section=wh" class="btncancel">Cancelar</a></td></tr>';
	</table></div>

</form>
</div>
