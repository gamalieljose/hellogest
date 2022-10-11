<?php
$idfabricante = $_GET["id"];

$sqlarticulo = $mysqli->query("select * from ".$prefixsql."fabricantes where id = '".$idfabricante."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbfabricante = $row["fabricante"];


echo '<p><a href="index.php?module=almacen&section=fab&action=del&id='.$idfabricante.'" class="btnenlacecancel">Eliminar fabricante</a></p>';

?>



<form name="form1" method="POST" action="index.php?module=almacen&section=fab&action=save" >

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=almacen&section=fab" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidfabricante" value="'.$idfabricante.'"/>'; ?>

<div class="row">
	<div class="col-sm-2">
		Fabricante
	</div>
	<div class="col">
		<input type="text" value="<?php echo $dbfabricante; ?>" name="txtfabricante" required="" class="campoencoger"/>
	</div>
</div>

</form>
