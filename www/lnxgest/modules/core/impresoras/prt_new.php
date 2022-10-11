<?php

?>

<form name="nuevodic" action="index.php?module=core&section=printers&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
<div class="col-sm-2">
    Nombre
</div>
<div class="col">
    <input name="txtnombre" required="" type="text" class="campoencoger">
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Tipo
</div>
<div class="col">
    <select name="lsttipo" class="campoencoger">
    <option value="2">WIN_PRINTER</option>
    <option value="3">TEXT_PRINTER</option>
    </select>
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Notas
</div>
<div class="col">
    <input name="txtnotas" required="" type="text" class="campoencoger"/>
</div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a href="index.php?module=core&section=printers" class="btncancel">Cancelar</a>

</div>

</form>