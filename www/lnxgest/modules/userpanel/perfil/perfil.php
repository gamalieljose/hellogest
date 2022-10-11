<?php

echo '<a class="btn_tab_sel" href="index.php?module=userpanel&section=perfil">Datos</a> ';

echo '<a class="btn_tab" href="index.php?module=userpanel&section=perfil_addons">Complementos</a> ';

echo '<p><a class="btnedit" href="index.php?module=userpanel&section=perfil&action=edit">Editar datos</a></p>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbusername = $row['username'];
$dbdisplay = $row['display'];
$dbuserset_showcods = $row['userset_showcods'];
$dbuserset_viewlists = $row['userset_viewlists'];
?>


<div class="row">
	<div class="col-sm-2" align="left">
		
	</div>
	<div class="col" align="left">
		<b><?php echo $dbdisplay; ?></b>
	</div>
</div>
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
		Session actual
	</div>
	<div class="col" align="left">
		<?php 
		$uidsession = session_id();
		echo $uidsession; 
		?>
	</div>
</div>

<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users_uid where uidsession = '".$uidsession."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbfecha = $row["fecha"];
$dbnomsesion = $row["nomsesion"];


?>

<div class="row">
	<div class="col-sm-2" align="left">
		inicio sesion
	</div>
	<div class="col" align="left">
		<?php 
		echo $dbfecha; 
		?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Nombre sesion
	</div>
	<div class="col" align="left">
		<?php 
		echo $dbnomsesion; 
		?>
	</div>
</div>

<div class="row">
	<div class="col maintitle" align="left">
		Personalización
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left"></div>
	<div class="col" align="left">
<?php
if($dbuserset_showcods == "1"){$imagenshowcods = 'img/yes.png';}else{$imagenshowcods = 'img/no.png';}

echo '<img src="'.$imagenshowcods.'" /> Mostrar codigos de cliente y proveedor de terceros </br>';
?>
	</div>
</div>

<div class="row">
<div class="col-sm-2">Vista por defecto</div>
<div class="col">
<?php
if($dbuserset_viewlists == "M")
{
	echo 'Mes en curso';
}

if($dbuserset_viewlists == "Y")
{
	echo 'Año en curso';
}

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
     
    if ($colnotifica["email"] == '1'){$sel_mail_activo = '<img src="img/yes.png" />';}else{$sel_mail_activo = '<img src="img/no.png" />';}
    if ($colnotifica["telegram"] == '1'){$sel_tlgm_activo = '<img src="img/yes.png" />';}else{$sel_tlgm_activo = '<img src="img/no.png" />';}
    
  }
  if($colnotifica["opcion"] == 'TICKETS')
  {
    
    if ($colnotifica["email"] == '1'){$sel_mail_tickets = '<img src="img/yes.png" />';}else{$sel_mail_tickets = '<img src="img/no.png" />';}
    if ($colnotifica["telegram"] == '1'){$sel_tlgm_tickets = '<img src="img/yes.png" />';}else{$sel_tlgm_tickets = '<img src="img/no.png" />';}
  }
}

?>

<tr>
<td align="center"><?php echo $sel_mail_activo; ?></td><td align="center"><?php echo $sel_tlgm_activo; ?></td><td>Activos proximos a caducar</td>
</tr>
<tr>
<td align="center"><?php echo $sel_mail_tickets; ?></td><td align="center"><?php echo $sel_tlgm_tickets; ?></td><td>Tickets abiertos</td>
</tr>
</table>
