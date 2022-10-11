<?php

?>

					   
<form name="form1" action="index.php?module=lnxit&section=tipoticket&action=save" method="post">
<input type="hidden" name="haccion" value="new" />
    
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" name="chlactivo" checked="" value="1"/> Activo</label>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tipo de Ticket
    </div>
    <div class="col" align="left">
        <input type="text" name="txttipoticket" required="" class="campoencoger">
    </div>
</div>
    
<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=tipoticket">Cancelar</a>
</div>
</form>