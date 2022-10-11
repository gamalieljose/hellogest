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

<form name="editausuario" action="index.php?module=core&section=users&action=save&tab=0" method="post">

<div class="row">
  <div class="col maintitle" >
    Ficha del usuario 
  </div>
</div>

<input type="hidden" name="haccion" value="new">


<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" value="1" name="chkactivo" checked="" /> Activado 
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
	{echo '<option value="'.$collang["id"].'">'.$collang["idioma"].'</option>';}
	?>
	
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Nombre completo
  </div>
  <div class="col" align="left">
    <input name="txtdisplay" value="" required="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	NIF
  </div>
  <div class="col" align="left">
    <input name="txtnif" value="" type="text" maxlength="15" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Usuario
  </div>
  <div class="col" align="left">
    <input name="txtuser" value="" required="" type="text" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Password
  </div>
  <div class="col" align="left">
    <input name="txtpassword" value="" required="" type="password" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Repite password
  </div>
  <div class="col" align="left">
    <input name="txtpassword2" value="" required="" type="password" maxlength="50" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" value="" required="" type="text" maxlength="20" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" value="" required="" type="text" maxlength="200" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
    <option value="0" selected="">-Selecciona un pais-</option>
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		echo '<option value="'.$col["id"].'" >'.$col["pais"].'</option>';
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
    <option value="0" selected="">-Selecciona un pais-</option>
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
		echo '<option value="'.$col["id"].'">'.$col["provincia"].'</option>';
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
    <input name="txtdir" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtcp" id="txtcp" maxlength="10" type="text" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input name="txtpobla" id="txtpobla" maxlength="50" type="text" style="width: 100%;">
  </div>
  
</div>
<div class="row">
  <div class="col-sm-2">
	Cuenta bancaria
  </div>
  <div class="col" align="left">
    <input name="txtncuenta" value="" type="text" maxlength="50" style="width: 100%;">
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
<label><input type="checkbox" name="chk_userset_showcods" value="1" /> Mostrar codigos de cliente y proveedor de terceros</label>
</div>
</div>

<div class="row">
<div class="col-sm-2">Vista por defecto</div>
<div class="col">


<label><input type="radio" value="M" name="opt_userset_viewlists" checked=""/> Mes en curso </label>


<label><input type="radio" value="Y" name="opt_userset_viewlists" /> Año en curso </label>

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
  
  <input type="number" name="txtmultiuidmulti" value="1" min="0" max="10" />

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

<tr>
<td align="center"><input type="checkbox" name="chkemailactivos" value="1" /></td><td align="center"><input type="checkbox" name="chktlgmactivos" value="1" /></td><td>Activos proximos a caducar</td>
</tr>
<tr>
<td align="center"><input type="checkbox" name="chkemailtickets" value="1" /></td><td align="center"><input type="checkbox" name="chktlgmtickets" value="1" /></td><td>Tickets abiertos</td>
</tr>
<tr>
<td align="center"><input type="checkbox" name="chkemailcalls" value="1" /></td><td align="center"><input type="checkbox" name="chktlgmcalls" value="1" /></td><td>Registros de llamadas</td>
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

<a class="btncancel" href="index.php?module=core&section=users">Cancelar</a>

</div>


</form>