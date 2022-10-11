<?php
$idplantilla = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."lopd where id = '".$idplantilla."' ");
$row = mysqli_fetch_assoc($sqlaux);
$dbidempresa = $row["idempresa"];
$dbidcatlopd = $row["idcatlopd"];
$dbnomdoc = $row["nomdoc"];


echo '<p><a href="index.php?module=terceros&section=lopd&action=del&id='.$idplantilla.'" class="btnenlacecancel" >Eliminar</a></p>';

?>

<form name="frmplantillalopd" action="index.php?module=terceros&section=lopd&action=save" enctype="multipart/form-data" method="POST" >
<input type="hidden" name="haccion" value="update" />
<?php echo '<input type="hidden" name="hidplantilla" value="'.$idplantilla.'" />'; ?>

<div class="row">
  <div class="col maintitle">
    Editando plantilla LOPD
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Empresa asociada
  </div>
  <div class="col" align="left">
    <select name="lstempresas" style="width: Calc(100% - 200px);">
	<?php
	if($dbidempresa == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>No requiere</option>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidempresa == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Categoria
  </div>
  <div class="col" align="left">
    <select name="lstlopdcat" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."dic_lopd order by lopdcat");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["lopdcat"].'</option>';
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Nombre documento
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbnomdoc; ?>" name="txtnombredoc" required="" style="width: 100%;" maxlength="50" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fichero LibreOffice
  </div>
  <div class="col" align="left">
  <?php
  $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lopd' and idlinea0 = '".$idplantilla."' ");
	$row = mysqli_fetch_assoc($sqlaux);
	$fichero_id = $row["idfichero"];
	
	echo '<a class="btnedit" href="modules/ficheros/download.php?id='.$fichero_id.'">Descargar documento actual</a> ';
  
  ?>
     <input type="file" name="fileficherito" accept=".fodt" />
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=terceros&section=lopd">Cancelar</a>

</div>
</form>