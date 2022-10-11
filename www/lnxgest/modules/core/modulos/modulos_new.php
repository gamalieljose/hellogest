<?php

?>
<form name="form1" action="index.php?module=core&section=modulos&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" name="chkactivo" value="1" checked=""/> Modulo Activo
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    ID del modulo
  </div>
  <div class="col" align="left">
    <input type="number" value="" name="txtidmodulo" required="" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nombre del modulo
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="" name="txtmodulo" required="" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Directorio
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="" name="txtdir" required="" style="width: 100%;">
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=modulos">Cancelar</a>

</div>


</form>

<p>&nbsp;</p>
<p>&nbsp;</p>

