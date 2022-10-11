<?php
$idproducto = $_GET["id"];
$idlinea = $_GET["idlinea"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos_pro where id = '".$idlinea."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbidtercero = $row["idtercero"];
$dbprecio = $row["precio"];
$dbreferencia = $row["referencia"];


echo '<p><a href="index.php?module=almacen&section=pro&action=del&id='.$idproducto.'&idlinea='.$idlinea.'" class="btnenlacecancel">Eliminar fabricante</a></p>';

if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%; ba">
Cambios aplicados con éxito
</div>';
}
?>


<form name="form1" method="POST" action="index.php?module=almacen&section=pro&action=save" >
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidproducto" value="'.$idproducto.'"/>'; ?>
<?php echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'"/>'; ?>


<div class="row">
  <div class="col-sm-2" align="left">
    Proveedor
  </div>
  <div class="col" align="left">
	<select name="lsttercero" style="width: 100%;">
	<?php
	$ssql = "SELECT id, razonsocial, codpro from ".$prefixsql."terceros where codpro > '0' order by razonsocial";
	$ConsultaMySql= $mysqli->query($ssql);

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if($columna["id"] == $dbidtercero){$defecto = ' selected=""';}else{$defecto = '';}
		echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["razonsocial"].'</option>';
	}
	?>
		
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Referencia
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="20" value="'.$dbreferencia.'" name="txtreferencia" required="" style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Precio compra
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="20" value="'.$dbprecio.'" name="txtprecio" required="" style="width: 100%;">'; ?>
  </div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> 
<?php echo '<a class="btncancel" href="index.php?module=almacen&section=pro&id='.$idproducto.'">Cancelar</a>'; ?>

</div>

</form>
