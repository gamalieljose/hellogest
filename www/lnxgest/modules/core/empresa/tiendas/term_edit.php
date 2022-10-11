<?php
$idterminal = $_GET["id"];
// echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=etiendas&action=delete&id='.$_GET["id"].'">Eliminar</a></p>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."pos_terminales where id = '".$idterminal."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidtienda = $row["idtienda"];
$dbidalmacen = $row["idalmacen"];
$dbdescripcion = $row["descripcion"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidempresa = $row["idempresa"];
$dbtienda = $row["tienda"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$dbidempresa."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbrazonsocial = $row["razonsocial"];


?>



<div class="row">
  <div class="col maintitle">
	Editando Terminal
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Empresa
  </div>
  <div class="col" align="left">
	<?php echo $dbrazonsocial; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Tienda
  </div>
  <div class="col" align="left">
  <?php echo $dbtienda; ?>
  </div>
</div>




<div class="row">
  <div class="col maintitle">
	Cajas
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Editando Caja / Terminal
  </div>
  <div class="col" align="left">

<form id="frmaddterminal" name="frmaddterminal" method="post" action="index.php?module=core&section=etiendas&action=saveterm">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hidterminal" value="'.$idterminal.'">'; ?>
<?php echo '<input type="hidden" name="hidtienda" value="'.$dbidtienda.'">'; ?>

  <input name="txtterminal" value="<?php echo $dbdescripcion; ?>" type="text" required="" maxlength="10" style="width: 100%;">
   
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Almacen asociado
  </div>
  <div class="col" align="left">
	<select name="lstalmacen" style="width: 100%;">
<?php
$cnsseries = $mysqli->query("select * From ".$prefixsql."almacenes order by almacen");
while($colter = mysqli_fetch_array($cnsseries))
	{
		if($colter["id"] == $dbidalmacen){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["almacen"].'</option>'; 
	}
?>
	</select>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<?php echo '<a class="btncancel" href="index.php?&module=core&section=etiendas&action=edit&id='.$dbidtienda.'">'.LABEL_BTN_CANCEL.'</a>'; ?>

</div>

 </form>




