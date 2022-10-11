<?php 
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users_correo where id = '".$_GET["idmail"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdisplay = $row["display"];
$dbusuario = $row["usuario"];
$dbpassword = $row["password"];
$dbsmtpserver = $row["smtpserver"];
$dbemail = $row["email"];
$dbdft = $row["dft"];
$dbnotapie = $row["notapie"];
$iduser = $row["iduser"];
$dbport = $row["port"];
$dbtipoconex = $row["tipoconex"];
$dbnomcuenta = $row["nomcuenta"];

include("modules/core/users/users/botonera.php"); 

if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%;">
Cambios aplicados con éxito
</div>';
}

?>


<?php
echo '<p><a href="index.php?module=core&section=correo&action=del&idmail='.$_GET["idmail"].'" class="btnenlacecancel">Eliminar correo</a></p>';
?>

<form name="editausuario" action="index.php?module=core&section=correo&action=save" method="post">


<div class="row">
  <div class="col maintitle" align="left">
    Correo del usuario
  </div>
</div>


<input type="hidden" name="haccion" value="update">
<?php 
echo '<input type="hidden" name="hiduser" value="'.$iduser.'">'; 
echo '<input type="hidden" name="hidmail" value="'.$_GET["idmail"].'">'; 
?>


<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">
<?php 
if($dbdft == '1'){$pordefecto = ' checked=""';}else{$pordefecto = ' ';}

echo '<input type="checkbox" value="1" name="chkdft" '.$pordefecto.'/> '; 
?>
E-mail por defecto
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Nombre de la cuenta
  </div>
  <div class="col" align="left">
    <input name="txtcuenta" value="<?php echo $dbnomcuenta; ?>" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Remitente
  </div>
  <div class="col" align="left">
    <input name="txtdisplay" value="<?php echo $dbdisplay; ?>" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	usuario
  </div>
  <div class="col" align="left">
    <input name="txtuser" value="<?php echo $dbusuario; ?>" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Password
  </div>
  <div class="col" align="left">
    <input name="txtpassword" value="<?php echo $dbpassword; ?>" type="password" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Servidor SMTP
  </div>
  <div class="col" align="left">
    <input name="txtsmtp" value="<?php echo $dbsmtpserver; ?>" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Puerto SMTP
  </div>
  <div class="col-sm-2" align="left">
      <input name="txtsmtpport" value="<?php echo $dbport; ?>" type="number" required="" min="0" max="65000" style="width: 100%;">
  </div>
  <div class="col-sm-2">
	Tipo conexión
  </div>
  <div class="col" align="left">
    <select name="lsttipoconex" style="width: 100%;">
<?php
if($dbtipoconex == ''){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="" '.$seleccionado.'>Ninguna</option>';
if($dbtipoconex == 'TLS'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="TLS" '.$seleccionado.'>START TLS</option>';
if($dbtipoconex == 'SSL'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="SSL" '.$seleccionado.'>SSL</option>';
?>
    </select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" value="<?php echo $dbemail; ?>" type="email" required="" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Nota pie email
  </div>
  <div class="col" align="left">
	<textarea name="txtpie" maxlength="250" style="width: 100%;"/><?php echo $dbnotapie; ?></textarea>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?&module=core&section=correo&id='.$iduser.'">Cancelar</a>'; ?>

</div>






</form>