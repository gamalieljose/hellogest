<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_lopd where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbactividad = $row['lopdcat'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=lopdcats&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=lopdcats&action=save" method="post">
<input type="hidden" name="haccion" value="update">

<div class="row">
  <div class="col-sm-2" align="left">
    Categoria LOPD
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbactividad.'" name="txtactividad" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=lopdcats">Cancelar</a>

</div>



<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

</form>