<?php

?>
<form name="form1" action="index.php?module=bancos&section=fpago&action=save" method="post">
<input type="hidden" name="haccion" value="new">
<div class="row">
	<div class="col-sm-2" align="left">
		Forma de pago
	</div>
	<div class="col" align="left">
		<input type="text" name="txtfpago" required="" maxlength="20" class="campoencoger">
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Cuenta asociada
	</div>
	<div class="col" align="left">
	<select name="lstcuentas" class="campoencoger">
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."cuentascajas order by ref");
	echo '<option value="0">Sin seleccionar</option>';
	echo '<option value="-1">Cuenta bancaria Tercero</option>';
	while($cuenta = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$cuenta["id"].'">'.$cuenta["ref"].' - '.$cuenta["cuenta"].'</option>';
	}

?>
		</select>
	</div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=bancos&section=fpago">Cancelar</a>

</div>

</form>
