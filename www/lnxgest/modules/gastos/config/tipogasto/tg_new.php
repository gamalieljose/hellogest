<?php

?>

					   
<form name="form1" action="index.php?module=gastos&section=cfg_tg&action=save" method="post">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=cfg_tg" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>



<input type="hidden" name="haccion" value="new">
<div class="row">
<div class="col-sm-2">
Tipo de gasto
</div>
<div class="col">
<input type="text" name="txttipogasto" required="" maxlength="50" class="campoencoger" >
</div>
</div>
</form>