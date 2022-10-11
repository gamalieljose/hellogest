<?php
$idalmacen = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."almacenes where id = '".$idalmacen."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbalmacen = $row["almacen"];
$dbdft = $row["dft"];


include("modules/almacen/warehouse/botonera.php");
?>





<form name="form1" method="POST" action="index.php?module=almacen&section=wh&action=save" >
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidalmacen" value="'.$idalmacen.'"/>'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
	<?php
	if ($dbdft == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
    echo '<input type="checkbox" value="1" name="chkdefecto" '.$seleccionado.'> Almacen por defecto';
	?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Almacen
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbalmacen.'" name="txtalmacen" required="" style="width: 100%;">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=almacen&section=wh">Cancelar</a>

</div>


</form>
