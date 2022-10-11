
<form name="form1" action="index.php?module=bancos&section=tiposcuenta&action=save" method="post">
<input type="hidden" name="haccion" value="new">
<div class="row">
	<div class="col-sm-2" align="left">
		Tipo Cuenta
	</div>
	<div class="col" align="left">
		<input type="text" name="txttipocuenta" required="" class="campoencoger">
	</div>
</div>
<div align="center" class="rectangulobtnsguardar">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=bancos&section=tiposcuenta" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

</form>
