<?php

?>


<form name="form1" method="POST" action="index.php?module=almacen&section=wh&action=save" >
<input type="hidden" name="haccion" value="new"/>

<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" value="1" name="chkdefecto"> Almacen por defecto
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Almacen
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="" name="txtalmacen" required="" style="width: 100%;">
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=almacen&section=wh">Cancelar</a>

</div>


</form>

<p>&nbsp;</p>
<p>&nbsp;</p>