<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#cbpais").change(function () {
           $("#cbpais option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/terceros/ajax/ajx_pais-prov.php", { elegido: elegido }, function(data){
            $("#cbprovincias").html(data);
            });            
        });
   })
});
</script>
<script type="text/javascript">
function calculacp() {

var wpobla = document.getElementById("txtpobla").value;
	if (wpobla == '') 
	{

	   var wcp = document.getElementById("txtcp").value;
	   var wpais = document.getElementById("cbpais").value;

	   $.ajax({

			 type   : 'POST',
			 url     : "modules/terceros/ajax/ajx_cp.php",
			 data    : {cp : wcp, idpais : wpais},
							 
			 success : function (resultado) {

			 // response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var xpobla = response["poblacion"];
			var xidprov = response["idprov"];
						
			 document.getElementById("txtpobla").value = xpobla;
			 document.getElementById("cbprovincias").value = xidprov;
					

			 }

		});
	} 
}
</script>
<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbusername = $row['username'];
$dbdisplay = $row['display'];
$dbncuenta = $row["ncuenta"];
$dbtel = $row["tel"];
$dbemail = $row["email"];
$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];
$dbidprov = $row["idprov"];
$dbidpais = $row["idpais"];
$dbactivo = $row["activo"];
$dbididioma = $row["ididioma"];
$dbnif = $row["nif"];
$dbuidmulti = $row["uidmulti"];
$dbtlgmidgrupo = $row["tlgm_groupid"];
$dbidempresa = $row["idempresa"];

$dbuserset_showcods = $row["userset_showcods"];
$dbuserset_viewlists = $row["userset_viewlists"];
include("modules/core/users/users/botonera.php");

if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%;">
Cambios aplicados con éxito
</div>';
}
?>


<form name="editausuario" action="index.php?module=core&section=users&action=save&tab=0" method="post" autocomplete="off">

<div class="row">
  <div class="col maintitle" >
    Ficha del usuario
  </div>
</div>

<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; ?>

<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <?php
	if($dbactivo == '1')
	{$usractivado = ' checked=""';}
	else
	{$usractivado = ' ';}

	echo '<input type="checkbox" value="1" name="chkactivo" '.$usractivado.' /> Activado'; 
	?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Idioma
  </div>
  <div class="col" align="left">
    <select name="lstidioma" style="width: 100%;">
	<?php
	$sqlusers = $mysqli->query("select * from ".$prefixsql."dic_idiomas order by idioma");
	while($collang = mysqli_fetch_array($sqlusers))
	{
		if($collang["id"] == $dbididioma){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$collang["id"].'" '.$seleccionado.'>'.$collang["idioma"].'</option>';
	}
	?>
	
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Nombre completo
  </div>
  <div class="col" align="left">
    <?php echo '<input name="txtdisplay" value="'.$dbdisplay.'" required="" type="text" maxlength="50" style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	NIF
  </div>
  <div class="col" align="left">
    <?php echo '<input name="txtnif" value="'.$dbnif.'" type="text" maxlength="15" style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Usuario
  </div>
  <div class="col" align="left">
    <input name="txtuser" value="<?php echo $dbusername; ?>" required="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Password
  </div>
  <div class="col" align="left">
    <input name="txtpassword" value="" type="password" autocomplete="new-password" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Repite password
  </div>
  <div class="col" align="left">
    <input name="txtpassword2" value="" type="password" autocomplete="new-password" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" value="<?php echo $dbtel; ?>" required="" type="text" maxlength="20" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" value="<?php echo $dbemail; ?>" required="" type="text" maxlength="200" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidpais)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["pais"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["pais"].'</option>';
		}
		
	}

	
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <select name="cbprovincias" id="cbprovincias" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidprov)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["provincia"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["provincia"].'</option>';
		}
		
	}

	
	?>
	</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Direccion
  </div>
  <div class="col" align="left">
    <input name="txtdir" maxlength="50" value="<?php echo $dbdir; ?>" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtcp" value="<?php echo $dbcp; ?>" id="txtcp" maxlength="10" type="text" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input name="txtpobla" id="txtpobla" value="<?php echo $dbpobla; ?>" maxlength="50" type="text" style="width: 100%;">
  </div>
  
</div>
<div class="row">
  <div class="col-sm-2">
	Cuenta bancaria
  </div>
  <div class="col" align="left">
    <input name="txtncuenta" value="<?php echo $dbncuenta; ?>" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
	<div class="col maintitle" align="left">
		Recursos Humanos
	</div>
</div>
<div class="row">
  <div class="col-sm-2">
	Empresa
  </div>
  <div class="col" align="left">
    <select name="lstempresa" style="width: 100%;">
<?php
if($dbidempresa == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>- Seleccione empresa -</option>';

	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	while($colempresa = mysqli_fetch_array($ConsultaMySql))
	{
		if($dbidempresa == $colempresa["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colempresa["id"].'" '.$seleccionado.'>'.$colempresa["razonsocial"].'</option>';
	}
?>	
	</select>
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
$cnsnotifica= $mysqli->query("SELECT * from ".$prefixsql."users_notifica where iduser = '".$_GET["id"]."'");
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
  if($colnotifica["opcion"] == 'LLAMADA')
  {
    
    if ($colnotifica["email"] == '1'){$sel_mail_calls = 'checked=""';}else{$sel_mail_call = '';}
    if ($colnotifica["telegram"] == '1'){$sel_tlgm_calls = 'checked=""';}else{$sel_tlgm_calls = '';}
  }
  
}

?>

<tr>
<td align="center"><input type="checkbox" name="chkemailactivos" value="1" <?php echo $sel_mail_activo; ?>/></td><td align="center"><input type="checkbox" name="chktlgmactivos" value="1" <?php echo $sel_tlgm_activo; ?>/></td><td>Activos proximos a caducar</td>
</tr>
<tr>
<td align="center"><input type="checkbox" name="chkemailtickets" value="1" <?php echo $sel_mail_tickets; ?>/></td><td align="center"><input type="checkbox" name="chktlgmtickets" value="1" <?php echo $sel_tlgm_tickets; ?>/></td><td>Tickets abiertos</td>
</tr>
<tr>
<td align="center"><input type="checkbox" name="chkemailcalls" value="1" <?php echo $sel_mail_calls; ?> /></td><td align="center"><input type="checkbox" name="chktlgmcalls" value="1" <?php echo $sel_tlgm_calls; ?> /></td><td>Registros de llamadas</td>
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

<div class="row">
	<div class="col maintitle" align="left">
		Sesiones
	</div>
</div>

<div class="row">
  <div class="col-sm-2">
	Max sesiones
  </div>
  <div class="col" align="left">
  
  <input type="number" name="txtmultiuidmulti" value="<?php echo $dbuidmulti; ?>" min="0" max="10" />

  </div>
</div>


<div class="row">
  <div class="col-sm-2">
	UID en uso
  </div>
  <div class="col" align="left">
  <p>Marca las sesiones a eliminar</p>
<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."users_uid where iduser = '".$_GET["id"]."' ");	
while($col = mysqli_fetch_array($sqlaux))
{
	echo '<label><input name="chkuidsession[]" value="'.$col["uidsession"].'" type="checkbox" /> '.$col["uidsession"].' - '.$col["fecha"].'</label></br>';
}

?>
  </div>
</div>






<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=users">Cancelar</a>

</div>

</form>