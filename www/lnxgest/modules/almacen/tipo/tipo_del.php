<?php
$idtipo = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos_tipo where id = '".$idtipo."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbid = $row["id"];
$dbtipo = $row["tipo"];


?>


<div align="center">
<form name="form1" method="POST" action="index.php?module=almacen&section=tipo&action=save" >
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidtipo" value="'.$idtipo.'"/>'; ?>	
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Desea eliminar este tipo de articulo:</td></tr>
	<tr><td><?php echo $dbid.' - '.$dbtipo; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="submit" class="btnsubmit" value="Eliminar"*/> <a href="index.php?module=almacen&section=tipo" class="btncancel">Cancelar</a></td></tr>';
	</table></div>

</form>
</div>
