<?php

?>




<form name="form1" method="POST" action="index.php?module=almacen&section=fab&action=save" >

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=almacen&section=fab" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="new"/>

<div class="row">
	<div class="col-sm-2">
		Fabricante
	</div>
	<div class="col">
		<input type="text" value="" name="txtfabricante" required="" class="campoencoger"/>
	</div>
</div>

</form>
