<?php
$idproducto = $_GET["id"];
?>

<div align="center">

<p> </p>
<form name="form1" method="POST" action="index.php?module=almacen&section=pro&action=save" >
<input type="hidden" name="haccion" value="new"/>
<?php echo '<input type="hidden" name="hidproducto" value="'.$idproducto.'"/>'; ?>


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
		echo '<option value="'.$columna["id"].'">'.$columna["razonsocial"].'</option>';
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
    <input type="text" maxlength="20" value="" name="txtreferencia" required="" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Precio compra
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="20" value="0" name="txtprecio" required="" style="width: 100%;">
  </div>
</div>





<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=almacen&section=pro&id='.$idproducto.'">Cancelar</a>'; ?>

</div>


</form>