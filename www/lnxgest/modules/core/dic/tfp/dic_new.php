<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=tfp&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col-sm-2" align="left">
    Documento series
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="" name="txtdocserie" required="" class="campoencoger">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Valor
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="20" value="" name="txtvalor" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=tfp">Cancelar</a>

</div>


</form>