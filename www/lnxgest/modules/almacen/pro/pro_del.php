<?php
$idproducto = $_GET["id"];
$idlinea = $_GET["idlinea"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos_pro where id = '".$idlinea."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbreferencia = $row["referencia"];
$dbidtercero = $row["idtercero"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbrazonsocial = $row["razonsocial"];

?>


<div align="center">
<form name="form1" method="POST" action="index.php?module=almacen&section=pro&action=save">
<input type="hidden" name="haccion" value="delete"/>

<?php 
echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'"/>'; 
echo '<input type="hidden" name="hidproducto" value="'.$idproducto.'"/>'; 

?>	
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td align="center">¿Desea eliminar esta referencia?</td></tr>
	<tr><td align="center"><?php echo $dbreferencia.' - '.$dbrazonsocial; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="submit" class="btnsubmit" name="btnguardar" value="Eliminar"/> 
	<?php echo ' <a href="index.php?module=almacen&section=pro&id='.$idproducto.'" class="btncancel">Cancelar</a>'; ?></td></tr>
	</table>

</form>
</div>
