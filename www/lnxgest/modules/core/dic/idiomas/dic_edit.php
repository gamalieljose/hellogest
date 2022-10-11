<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidioma = $row["idioma"];
$dbfichero = $row["fichero"];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=idiomas&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=idiomas&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    Idioma
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbidioma.'" name="txtformacontacto" required="" class="campoencoger">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Fichero
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbfichero.'" name="txtfichero" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=idiomas">Cancelar</a>

</div>
</form>
