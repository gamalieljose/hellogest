<form name="frmcamp" method="POST" action="index.php?module=crm&section=camp&action=save">
    <input type="hidden" name="haccion" value="new" />
<div class="row">
    <div class="col-sm-2" align="left">
        Campaña
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txtcamp" maxlength="50" class="campoencoger" required="" /> </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Notas
    </div>
    <div class="col" align="left">
        <textarea name="txtnotas" maxlength="5000" class="campoencoger" ></textarea> </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=crm&section=camp">Cancelar</a>

</div>
    
</form>