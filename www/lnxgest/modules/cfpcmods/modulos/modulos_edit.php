<?php
$idmodulo = $_GET["id"];


$sqlbuscar = $mysqli->query("select * from ".$prefixsql."modulos where id = '".$idmodulo."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbidmod = $row["idmod"];
$dbdisplay = $row["display"];
$dbactivo = $row["activo"];
$dbdirectorio = $row["directorio"];



echo '<a class="btnenlacecancel" href="index.php?module=cfpcmods&section=modulos&action=del&id='.$idmodulo.'">Eliminar</a>';

?>
<form name="form1" action="index.php?module=cfpcmods&section=modulos&action=save" method="post">


<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <?php 
if($dbactivo == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<input type="checkbox" name="chkactivo" value="1" '.$seleccionado.'>'; 
?> Modulo Activo
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    ID del modulo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="number" value="'.$dbidmod.'" name="txtidmodulo" required="" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nombre del modulo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbdisplay.'" name="txtmodulo" required="" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Directorio
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbdirectorio.'" name="txtdir" required="" style="width: 100%;">'; ?>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=cfpcmods&section=modulos">Cancelar</a>

</div>


<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hidmodulo" value="'.$idmodulo.'">'; ?>

</form>