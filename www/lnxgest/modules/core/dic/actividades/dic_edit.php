<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_actividades where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbactividad = $row['actividad'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=actividades&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=actividades&action=save" method="post">
<input type="hidden" name="haccion" value="update">

<div class="row">
  <div class="col-sm-2" align="left">
    Tipo de actividad
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbactividad.'" name="txtactividad" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=actividades">Cancelar</a>

</div>



<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

</form>