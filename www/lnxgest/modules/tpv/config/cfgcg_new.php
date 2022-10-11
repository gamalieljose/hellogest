<?php

?>
<form name="frmcamposcustomlopd" action="index.php?module=tpv&section=cfgcg&action=save" method="POST">
    <input type="hidden" name="haccion" value="new" />
    
<div class="row">
    <div class="col maintitle">
        Nuevo campo personalizado
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" value="1" name="chkmostrarlist"/> Mostrar en listado</label>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Nombre Campo
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txtnomcampo" maxlength="10" class="campoencoger" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txtdisplay" maxlength="50" class="campoencoger" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tipo campo
    </div>
    <div class="col" align="left">
        <!-- maximo campo 5 carcateres en la bbdd -->
        <select name="lsttipocampo" style="width: 100%;" >
            <option value="text">Campo de texto</option>
            <option value="float">Campo numero decimal</option>
            <option value="sino">Campo de SI/NO</option>
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<!-- <input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> -->

<a class="btncancel" href="index.php?module=tpv&section=cfgcg">Cancelar</a>


</div>
    
</form>