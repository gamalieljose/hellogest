<?php

?>

					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=tipos&action=save" method="post">

<div class="row">
<div class="col-sm-2">
    Tipo de Activo
</div>
<div class="col">
<input type="text" name="txtservicio" required="" class="campoencoger" >
</div>
</div>


<input type="hidden" name="haccion" value="new">

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=lnxit&section=activos&ss=tipos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

</form>