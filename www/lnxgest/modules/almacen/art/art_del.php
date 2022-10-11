<?php
$idarticulo = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos where id = '".$idarticulo."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbactivo = $row["activo"];
$dbcodventa = $row["codventa"];
$dbconcepto = $row["concepto"];
$dbprecio = $row["precio"];
$dbstock_ctrl = $row["stock_ctrl"];
$dbstock_actual = $row["stock_actual"];


include("modules/almacen/art/botonera.php");

?>


<div align="center">
<form name="form1" method="POST" action="index.php?module=almacen&section=articulos&action=save" >
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidarticulo" value="'.$idarticulo.'"/>'; ?>	
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Desea eliminar este articulo:</td></tr>
	<tr><td><?php echo $dbcodventa.' - '.$dbconcepto; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="submit" class="btnsubmit" value="Eliminar"*/> <a href="index.php?module=almacen&section=articulos" class="btncancel">Cancelar</a></td></tr>';
	</table></div>

</form>
</div>
