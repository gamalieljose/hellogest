<form name="form1" action="index.php?module=bancos&section=cuentascajas&action=save" method="post">
<input type="hidden" name="haccion" value="new">
<div class="row">
	<div class="col-sm-2" align="left">
	
	</div>
	<div class="col" align="left">
	<label><input type="checkbox" value="1"name="chkactivo" checked="checked"> Activo</label>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Referencia
	</div>
	<div class="col" align="left">
		<input type="text" name="txtref" required="" maxlength="20" class="campoencoger" />
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Empresa
	</div>
	<div class="col" align="left">
	<select name="lstempresa" class="campoencoger">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	
	while($col = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
	}
	?>
	</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Banco
	</div>
	<div class="col" align="left">
	<select name="lstbancos" style="width: 100%;">
	<option value="0">Caja / efectivo</option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos order by banco");
	
	while($banco = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$banco["id"].'">'.$banco["banco"].'</option>';
	}
	?>
	</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Tipo
	</div>
	<div class="col" align="left">
	<select name="lsttipos" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancostipo");
	
	while($banco = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$banco["id"].'">'.$banco["tipo"].'</option>';
	}
	?>
	</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		cuenta
	</div>
	<div class="col" align="left">
		<input type="text" name="txtcuenta" required="" style="width: 100%;">
	</div>
</div>
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=bancos&section=cuentascajas">Cancelar</a>

</div>


</form>

