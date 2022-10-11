<?PHP
$idregistro = $_GET["id"];
$idtercero = $_GET["idtercero"];

//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros_lopd_files where id = '".$idregistro."'");
$row = mysqli_fetch_assoc($buscatercero);
    $dbidempresa = $row["idempresa"];
    $dbidcatlopd = $row["idcatlopd"];
    $dbdescripcion = $row["descripcion"];


$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	
include("modules/terceros/botones.php");
?>
<p>
<?php

echo '<a href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=del&id='.$idregistro.'" class="btnenlacecancel">Eliminar Fichero</a> ';
?>
    Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<?php echo '<form name="frmplantillalopd" action="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=save" enctype="multipart/form-data" method="POST" >'; ?>
<input type="hidden" name="haccion" value="update" />
<?php 
    echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'" />'; 
    echo '<input type="hidden" name="hidregistro" value="'.$idregistro.'" />';
?>

<div class="row">
  <div class="col maintitle">
    Editando documento LOPD
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Empresa asociada
  </div>
  <div class="col" align="left">
    <select name="lstempresas" style="width: 100%;">
	<?php
        if($dbidempresa == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="0" '.$seleccionado.'>No requiere</option>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	while($col = mysqli_fetch_array($cnsaux))
	{
            if($col["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
    <input type="text" value="<?php echo $dbdescripcion; ?>" name="txtnombredoc" required="" style="width: 100%;" maxlength="50" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fichero LibreOffice
  </div>
  <div class="col" align="left">
      <?php
      $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'terceros_lopdfiles' and idlinea0 = '".$idregistro."' ");
        $row = mysqli_fetch_assoc($sqlaux);
        $fichero_id = $row["idfichero"];
      
      echo '<a href="modules/ficheros/download.php?id='.$fichero_id.'" class="btnedit">Descargar documento actual</a> ';
      ?>
      <input type="file" name="fileficherito" accept=".pdf"  />
  </div>
</div>
     
             
  

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'">Cancelar</a>'; ?>

</div>

</form>