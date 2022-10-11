<?php

?>

<form name="nuevodic" action="index.php?module=ficheros&section=catsave" method="post">
<input type="hidden" name="haccion" value="new">


<div class="row">
  <div class="col-sm-2" align="left">
    Categoria de archivo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="" name="txtcategoria" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=ficheros&section=cat">Cancelar</a>

</div>


</form>