<?php
$idcat = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat where id = '".$idcat."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcategoria = $row["categoria"];


echo '<p><a class="btnenlacecancel" href="index.php?module=ficheros&section=catdel&id='.$idcat.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=ficheros&section=catsave" method="post">
<input type="hidden" name="haccion" value="update">

<div class="row">
  <div class="col-sm-2" align="left">
  Categoria de archivo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbcategoria.'" name="txtcategoria" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnsubmit" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=ficheros&section=cat">Cancelar</a>

</div>



<?php echo '<input type="hidden" name="hidcat" value="'.$idcat.'">'; ?>

</form>