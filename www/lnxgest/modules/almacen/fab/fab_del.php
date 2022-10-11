<?php
$idfabricante = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."fabricantes where id = '".$idfabricante."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbid = $row["id"];
$dbfabricante = $row["fabricante"];


?>


<div align="center">
<form name="form1" method="POST" action="index.php?module=almacen&section=fab&action=save" >
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidfabricante" value="'.$idfabricante.'"/>'; ?>	
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Desea eliminar este fabricante:</td></tr>
	<tr><td><?php echo $dbid.' - '.$dbfabricante; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="submit" class="btnsubmit" value="Eliminar"*/> <a href="index.php?module=almacen&section=fab" class="btncancel">Cancelar</a></td></tr>';
	</table></div>

</form>
</div>
