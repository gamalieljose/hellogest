<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbusername = $row['username'];
$dbdisplay = $row['display'];
$dbtlgmidgrupo = $row["tlgm_groupid"];
$dbuserset_showcods = $row["userset_showcods"];
$dbuserset_viewlists = $row["userset_viewlists"];


$uidsession = session_id();
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users_uid where uidsession = '".$uidsession."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbfecha = $row["fecha"];
$dbnomsesion = $row["nomsesion"];
?>

<form name="form1" action="index.php?module=userpanel&section=perfil&action=save" method="POST">
<input type="hidden" name="hiduser" value="<?php echo $_COOKIE["lnxuserid"]; ?>" />
<input type="hidden" name="hidsession" value="<?php echo $uidsession; ?>" />


<div class="row">
	<div class="col-sm-2" align="left">
		Login
	</div>
	<div class="col" align="left">
		<?php echo $dbusername; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" align="left">
		Password actual
	</div>
	<div class="col" align="left">
		<input type="password" name="txtactualpassword" class="campoencoger" maxlength="20" required="" />
	</div>
</div>
<div class="row">
	<div class="col maintitle" align="left">
		Cambio de Password
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Nuevo Password
	</div>
	<div class="col" align="left">
		<input type="password" name="txtnewpassword" maxlength="20" style="width: 100%;">
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Repetir Nuevo Password
	</div>
	<div class="col" align="left">
		<input type="password" name="txtnewpassword2" maxlength="20" style="width: 100%;">
	</div>
</div>
<div class="row">
	<div class="col maintitle" align="left">
		Datos personales
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Display
	</div>
	<div class="col" align="left">
		<input type="text" name="txtdisplay" value="<?php echo $dbdisplay; ?>" maxlength="20" style="width: 100%;">
	</div>
</div>
<div class="row">
	<div class="col maintitle" align="left">
		Datos sessión actual
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Nombre sesion
	</div>
	<div class="col" align="left">
		<input type="text" name="txtdevice" value="<?php echo $dbnomsesion; ?>" maxlength="50" style="width: 100%;">
	</div>
</div>


<div class="row">
	<div class="col maintitle" align="left">
		Personalización
	</div>
</div>

<div class="row">
<div class="col-sm-2"></div>
<div class="col">
<?php
if($dbuserset_showcods == 1){$seleccionado = 'checked=""';}else{$seleccionado = '';}
?>
<label><input type="checkbox" name="chk_userset_showcods" value="1" <?php echo $seleccionado; ?> /> Mostrar codigos de cliente y proveedor de terceros</label>

</div>
</div>

<div class="row">
<div class="col-sm-2">Vista por defecto</div>
<div class="col">
<?php
if($dbuserset_viewlists == "M"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="radio" value="M" name="opt_userset_viewlists" '.$seleccionado.'/> Mes en curso </label> ';

if($dbuserset_viewlists == "Y"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="radio" value="Y" name="opt_userset_viewlists" '.$seleccionado.'/> Año en curso </label>';
?>
</div>
</div>


<div class="row">
	<div class="col maintitle" align="left">
		Avisos diarios
	</div>
</div>


<table width="100%">
<tr class="maintitle">
<th width="50">e-mail</th>
<th width="50">Telegram</th>
<th></th>
</tr>

<?php
$cnsnotifica= $mysqli->query("SELECT * from ".$prefixsql."users_notifica where iduser = '".$_COOKIE["lnxuserid"]."'");
while($colnotifica = mysqli_fetch_array($cnsnotifica))
{
  if($colnotifica["opcion"] == 'ACTIVOS')
  {
     
    if ($colnotifica["email"] == '1'){$sel_mail_activo = 'checked=""';}else{$sel_mail_activo = '';}
    if ($colnotifica["telegram"] == '1'){$sel_tlgm_activo = 'checked=""';}else{$sel_tlgm_activo = '';}
    
  }
  if($colnotifica["opcion"] == 'TICKETS')
  {
    
    if ($colnotifica["email"] == '1'){$sel_mail_tickets = 'checked=""';}else{$sel_mail_tickets = '';}
    if ($colnotifica["telegram"] == '1'){$sel_tlgm_tickets = 'checked=""';}else{$sel_tlgm_tickets = '';}
  }
}

?>

<tr>
<td align="center"><input type="checkbox" name="chkemailactivos" value="1" <?php echo $sel_mail_activo; ?>/></td><td align="center"><input type="checkbox" name="chktlgmactivos" value="1" <?php echo $sel_tlgm_activo; ?>/></td><td>Activos proximos a caducar</td>
</tr>
<tr>
<td align="center"><input type="checkbox" name="chkemailtickets" value="1" <?php echo $sel_mail_tickets; ?>/></td><td align="center"><input type="checkbox" name="chktlgmtickets" value="1" <?php echo $sel_tlgm_tickets; ?>/></td><td>Tickets abiertos</td>
</tr>
</table>

<div class="row">
	<div class="col maintitle" align="left">
		Telegram
	</div>
</div>
<div class="row">
  <div class="col-sm-2">
	ID Grupo
  </div>
  <div class="col" align="left">
  
  <input type="text" name="txttlgmidgrupo" value="<?php echo $dbtlgmidgrupo; ?>" style="width: 100%;" />

  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=userpanel&section=perfil">Cancelar</a>

</div>
</form>
