<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=tt&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
<div class="col-sm-2">
Tipo tercero
</div>
<div class="col">
<input name="txtdocserie" required="" type="text" class="campoencoger">
</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=dic&subs=tt" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>


</form>