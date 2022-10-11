<?php
$idcpago = $_GET["idcpago"];

$sqltipofpago= $mysqli->query("select * from ".$prefixsql."bancos_cpago where id = '".$idcpago."'");
$row = mysqli_fetch_assoc($sqltipofpago);
$fptexto = $row['cpago'];
$dbdias = $row['dias'];
$dbdiapago = $row['diapago'];
$dbidcuenta = $row['idcuenta'];

echo '<a class="btnenlacecancel" href="index.php?module=bancos&section=cpago&action=del&idcpago='.$idcpago.'">Eliminar</a>';

echo '<form name="form1" action="index.php?module=bancos&section=cpago&action=save" method="post">';
?>

<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hidcpago" value="'.$idcpago.'">'; ?>

<div class="row">
  <div class="col maintitle" align="left">
    Editando condición de pago
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Condicion de pago
  </div>
  <div class="col" align="left">
      <?php echo '<input type="text" name="txtcpago" required="" value="'.$fptexto.'" class="campoencoger" />'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Dias
  </div>
  <div class="col" align="left">
      <input type="number" value="<?php echo $dbdias; ?>" min="0" max="999" name="txtdias" required="" class="campoencoger" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Dia de pago
  </div>
  <div class="col" align="left">
      <input type="number" value="<?php echo $dbdiapago; ?>" min="0" max="31" name="txtdiapago" required="" style="width: 100%" />
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Cuenta
  </div>
  <div class="col" align="left">
      <select name="lstcuenta" style="width: 100%" />


<?php
if($dbidcuenta == 0){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>- Ninguna -</option>';
if($dbidcuenta == -1){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="-1" '.$seleccionado.'>Usar cuenta bancaria del tercero</option>';

echo '<optgroup label="Cuentas">';
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."cuentascajas order by ref and activo = '1' or id = '".$dbidcuenta."'");
while($colaux = mysqli_fetch_array($cnsaux))
{
  if($colaux["id"] == $dbidcuenta){$seleccionado = ' selected=""';}else{$seleccionado = '';}
  echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["ref"].'</option>';
}
?>
 </optgroup>
      </select>
  </div>
</div>




<div class="row">
  <div class="col maintitle" align="left">
    Ayuda
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Dia pago
  </div>
  <div class="col" align="left">
      Aqui se especifican los dias desde la fecha de emisión, por ejemplo si se quiere pagar a 30 dias desde la fecha de 
	  emisión de la factura indicaremos como numero 30
	  </br></br>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Dia de pago
  </div>
  <div class="col" align="left">
      Se especifica el dia de pago en el que calcular la fecha de vencimiento, por ejemplo si el dia de pago es el 10 de cada mes
	  y la fecha de emisión es 01-01-2001 y no hay dias a contar (por ejemplo a 30 dias) la fecha de vencimiento será 10-01-2001, 
	  si por el contrario fuera a 30 dias, el programa sumará a la fecha 01-01-2001, 30 dias = 31-01-2001 pero como el dia de pago es el 10,
	  entonces la fecha correcta será 10-02-2001.
	  </br></br>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Ventas al contado
  </div>
  <div class="col" align="left">
      Para ventas al contado en dias = 0 y dia de pago = 0 </br>
	  dia de pago = 0 NO especifica ningun dia de pago
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=bancos&section=cpago">Cancelar</a>

</div>


</form>
