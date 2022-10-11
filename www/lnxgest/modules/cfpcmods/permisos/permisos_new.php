<?php

?>
<form name="form1" action="index.php?module=cfpcmods&section=permisos&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col-sm-2" align="left">
    Modulo
  </div>
  <div class="col" align="left">
  <select name="lstmodulo" style="width: 100%;"/>
    <?php 
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."modulos order by display");
	$color = '1';
	while($modulo = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$modulo["idmod"].'">'.$modulo["display"].'</option>';
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    ID Permiso
  </div>
  <div class="col" align="left">
    <?php echo '<input type="number" value="0" name="txtidpermiso" required="" style="width: 100%;">'; ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Nombre del permiso
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbdisplay.'" name="txtdisplay" required="" style="width: 100%;">'; ?>
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=cfpcmods&section=permisos">Cancelar</a>

</div>
</form>