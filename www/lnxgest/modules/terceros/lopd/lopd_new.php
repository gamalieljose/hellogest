<?php

?>

<form name="frmplantillalopd" action="index.php?module=terceros&section=lopd&action=save" enctype="multipart/form-data" method="POST" >
<input type="hidden" name="haccion" value="new" />

<div class="row">
  <div class="col maintitle">
    Nueva plantilla LOPD
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Empresa asociada
  </div>
  <div class="col" align="left">
    <select name="lstempresas" style="width: Calc(100% - 200px);">
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
    <select name="lstlopdcat" style="width: Calc(100% - 200px);">
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
     <input type="file" name="fileficherito" accept=".fodt" required=""  style="width: 100%;"/>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=terceros&section=lopd">Cancelar</a>

</div>
</form>