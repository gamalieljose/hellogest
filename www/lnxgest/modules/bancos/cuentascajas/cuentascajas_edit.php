<?php
$idcuenta = $_GET["idcuenta"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."cuentascajas where id = '".$idcuenta."'");
$row = mysqli_fetch_assoc($ConsultaMySql);

$dbidbanco = $row['idbanco'];
$dbidbancotipo = $row['idbancotipo'];
$dbcuenta = $row['cuenta'];
$dbactivo = $row['activo'];
$dbref = $row['ref'];
$dbidempresa = $row['idempresa'];

if ($dbactivo == '1'){$cajaactivo = ' checked=""';}else{$cajaactivo = '';}

echo '<p><a class="btnenlacecancel" href="index.php?module=bancos&section=cuentascajas&action=del&idcuenta='.$idcuenta.'">Eliminar Cuenta / Caja</a></p>';

echo '<form name="form1" action="index.php?module=bancos&section=cuentascajas&action=save&idcuenta='.$idcuenta.'" method="post">';
?>
<input type="hidden" name="haccion" value="update">
<div class="row">
	<div class="col-sm-2" align="left">
	
	</div>
	<div class="col" align="left">
	<label><input type="checkbox" value="1"name="chkactivo" <?php echo $cajaactivo; ?> /> Activo</label>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Referencia
	</div>
	<div class="col" align="left">
		<input type="text" name="txtref" required="" maxlength="20" value="<?php echo $dbref; ?>" class="campoencoger" />
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
		if($dbidempresa == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
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
	
	<?php
	
	if($dbidbanco == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>Caja / efectivo</option>';
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos order by banco");
	
	while($banco = mysqli_fetch_array($ConsultaMySql))
	{
		if($banco["id"] == $dbidbanco){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$banco["id"].'" '.$seleccionado.'>'.$banco["banco"].'</option>';
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
		
		if($banco["id"] == $dbidbancotipo){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$banco["id"].'" '.$seleccionado.'>'.$banco["tipo"].'</option>';
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
		<input type="text" name="txtcuenta" required="" value="<?php echo $dbcuenta; ?>"style="width: 100%;">
	</div>
</div>
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=bancos&section=cuentascajas">Cancelar</a>

</div>


</form>
