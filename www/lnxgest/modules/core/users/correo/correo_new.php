<?php include("modules/core/users/users/botonera.php"); 

$iduser = $_GET["id"];

$sqlcorreo = $mysqli->query("SELECT * from ".$prefixsql."users_correo where iduser = '".$iduser."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdft = $row["dft"];

$existe = $sqlcorreo->num_rows;




?>

<form name="editausuario" action="index.php?module=core&section=correo&action=save" method="post">


<div class="row">
  <div class="col maintitle" align="left">
    Correo del usuario
  </div>
</div>


<input type="hidden" name="haccion" value="new">
<?php echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; ?>


<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">
    <?php 

if($existe == '0' || $existe == '' ){$seleccionado = 'checked=""';}else{$seleccionado = '';}

echo '<input type="checkbox" value="1" name="chkdft" '.$seleccionado.'/> '; 

?>
E-mail por defecto
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Nombre de la cuenta
  </div>
  <div class="col" align="left">
    <input name="txtcuenta" value="" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Remitente
  </div>
  <div class="col" align="left">
    <input name="txtdisplay" value="" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	usuario
  </div>
  <div class="col" align="left">
    <input name="txtuser" value="" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Password
  </div>
  <div class="col" align="left">
    <input name="txtpassword" value="" type="password" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Servidor SMTP
  </div>
  <div class="col" align="left">
    <input name="txtsmtp" value="" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Puerto SMTP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtsmtpport" value="25" type="number" required="" min="0" max="65000" style="width: 100%;">
  </div>
  <div class="col-sm-2">
	Tipo conexión
  </div>
  <div class="col" align="left">
    <select name="lsttipoconex" style="width: 100%;">
    <option value="">Ninguna</option>
    <option value="TLS">START TLS</option>
    <option value="SSL">SSL</option>
    </select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" value="" type="email" required="" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Nota pie email
  </div>
  <div class="col" align="left">
	<textarea name="txtpie" maxlength="250" style="width: 100%;"/></textarea>
  </div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?&module=core&section=correo&id='.$iduser.'">Cancelar</a>'; ?>

</div>

</form>