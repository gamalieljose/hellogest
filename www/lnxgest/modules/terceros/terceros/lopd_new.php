<?PHP
$idtercero = $_GET["idtercero"];

//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	
include("modules/terceros/botones.php");
?>
<p>Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

                                      
<?php echo '<form name="frmplantillalopd" action="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=save" enctype="multipart/form-data" method="POST" >'; ?>
<input type="hidden" name="haccion" value="new" />
<?php echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'" />'; ?>

<div class="row">
  <div class="col maintitle">
    Nueva documento LOPD
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Empresa asociada
  </div>
  <div class="col" align="left">
    <select name="lstempresas" style="width: 100%;">
	<option value="0">No requiere</option>
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	while($col = mysqli_fetch_array($cnsaux))
	{		
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
    <input type="text" value="" name="txtnombredoc" required="" style="width: 100%;" maxlength="50" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fichero LibreOffice
  </div>
  <div class="col" align="left">
     <input type="file" name="fileficherito" accept=".pdf" required=""  style="width: 100%;"/>
  </div>
</div>
     
             
  

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'">Cancelar</a>'; ?>

</div>

</form>