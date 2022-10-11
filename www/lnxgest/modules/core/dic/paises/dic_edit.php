<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbpais = $row['pais'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=paises&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=paises&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbpais.'" name="txtpais" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnaceptar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=paises">Cancelar</a>

</div>


</form>