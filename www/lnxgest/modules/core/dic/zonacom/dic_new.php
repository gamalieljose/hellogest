<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=zonacom&action=save" method="post">
<input type="hidden" name="haccion" value="new">


<div class="row">
  <div class="col-sm-2" align="left">
    Zona
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="" name="txtzona" required="" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=dic&subs=zonacom" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>


</div>


</form>