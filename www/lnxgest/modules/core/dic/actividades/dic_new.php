<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=actividades&action=save" method="post">
<input type="hidden" name="haccion" value="new">


<div class="row">
  <div class="col-sm-2" align="left">
    Tipo de actividad
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="" name="txtactividad" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=actividades">Cancelar</a>

</div>


</form>