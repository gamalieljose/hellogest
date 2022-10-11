<?php
	
$idfpago = $_GET["idfpago"];

	$sqltipofpago= $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$idfpago."'");
	$row = mysqli_fetch_assoc($sqltipofpago);
	$fptexto = $row['formapago'];
	$dbidcuentacaja = $row['idcuentacaja'];


echo '<a class="btnenlacecancel" href="index.php?module=bancos&section=fpago&action=del&idfpago='.$idfpago.'">Eliminar</a>';

echo '<form name="form1" action="index.php?module=bancos&section=fpago&action=save&idfpago='.$_GET["idfpago"].'" method="post">';
?>

<input type="hidden" name="haccion" value="update">
<div class="row">
	<div class="col-sm-2" align="left">
		Forma de pago
	</div>
	<div class="col" align="left">
		<input type="text" name="txtfpago" required="" maxlength="20" value="<?php echo $fptexto; ?>" class="campoencoger">
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
	if($dbidcuentacaja == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>Sin seleccionar</option>';
	if($dbidcuentacaja == "-1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="-1" '.$seleccionado.'>Cuenta bancaria Tercero</option>';
	while($cuenta = mysqli_fetch_array($ConsultaMySql))
	{
		if($dbidcuentacaja == $cuenta["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$cuenta["id"].'" '.$seleccionado.'>'.$cuenta["ref"].' - '.$cuenta["cuenta"].'</option>';
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

