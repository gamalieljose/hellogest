<?php

?>
<form name="form1" method="post" action="index.php?module=biblio&section=categorias&action=save">
<input name="haccion" type="hidden" value="new">
<div class="row">
	<div class="col-sm-2">
		Nombre categoria
	</div>
	<div class="col">
		<input type="text" name="txtcategoria" maxlength="50" required="" class="campoencoger">
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=biblio&section=categorias" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>

</form>
