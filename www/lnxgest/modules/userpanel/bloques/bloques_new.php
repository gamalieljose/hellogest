<?php

?>
<form name="frmbloques" method="POST" action="index.php?module=userpanel&section=bloques&action=save" >
<input type="hidden" name="haccion" value="new" />

<div class="row maintitle">
<div class="col">
Nuevo bloque
</div>
</div>

<div class="row">
<div class="col-sm-2">
Orden
</div>
<div class="col-sm-1">
<input type="number" name="txtorden" value="0" required="" style="width: 100%;"/>
</div>
<div class="col-sm-2">
Icono
</div>
<div class="col">
<input type="text" name="txticono" value="" maxlength="20"/>
</div>
</div>
<div class="row">
<div class="col-sm-2">
Display
</div>
<div class="col">
<input type="text" name="txtdisplay" value="" required="" maxlength="50" class="campoencoger"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Enlace
</div>
<div class="col">
<input type="text" name="txtenlace" value="" required="" maxlength="255" style="width: 100%;"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Ventana
</div>
<div class="col">
<select name="lstventana" style="width: 100%;">
<option value="" selected="">Misma ventana</option>
<option value="_blank">Ventana nueva</option>
</select>
</div>
</div>


<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
        <i class="hidephonview fa fa-save fa-lg"></i> Guardar
    </button>
		
    <a href="index.php?module=userpanel&section=bloques" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>


</form>