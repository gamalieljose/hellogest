
<form id="form1" name="form1" method="post" action="index.php?module=core&section=impuestos&action=save">
<input type="hidden" name="haccion" value="new">

<div class="row">
<div class="col-sm-2">
</div>
<div class="col">
    <label><input type="checkbox" name="chkactivo" value="1" checked> Activo</label>
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Nombre
</div>
<div class="col">
    <input name="txtnombre" value="" type="text" required="" class="campoencoger">
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Valor %
</div>
<div class="col">
    <input name="txtvalor" value="0" type="text" required="" class="campoencoger">
</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=impuestos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>
</form>
