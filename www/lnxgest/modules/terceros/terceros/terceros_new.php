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
			 if(xidprov > 0)
			 {
			 document.getElementById("cbprovincias").value = xidprov;
			 }
					

			 }

		});
	} 
}
</script>
<?php


//obtener pais y provincia por defecto del usuario
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."userstiendas WHERE iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1'");
$row = mysqli_fetch_assoc($buscapais);
$dbidtiendauser = $row["idtienda"];

$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."tiendas WHERE id = '".$dbidtiendauser."' ");
$row = mysqli_fetch_assoc($buscapais);
$dbidpais = $row["idpais"];
$dbidprov = $row["idprov"];

if($dbidpais == '' || $dbidpais == '0')
{
  //sino se encuentra, obtendremos el pais del usuario
  $buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."users WHERE id = '".$_COOKIE["lnxuserid"]."' ");
  $row = mysqli_fetch_assoc($buscapais);
  $dbidpais = $row["idpais"];
  $dbidprov = $row["idprov"];
}

?>


<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});


});
  </script>


		
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=terceros&action=save">

<input type="hidden" name="haccion" value="new">


<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" checked="checked" name="chkactivo" value="1" /> Tercero Activo
  </div>
</div>
<?php
$fechahoy = date('d/m/Y');

?>
<div class="row">
  <div class="col-sm-2" align="left">
    Fecha de alta
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="10" value="'.$fechahoy.'" name="txtfecha" id="dpkfecha" required="" class="campoencoger" >'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Origen
  </div>
  <div class="col" align="left">
    <style>
  .select-editable { position:relative; background-color:white; border:solid grey 1px;  width:120px; height:18px; }
  .select-editable select { position:absolute; top:0px; left:0px; font-size:14px; border:none; width:120px; margin:0; }
  .select-editable input { position:absolute; top:0px; left:0px; width:100px; padding:1px; font-size:12px; border:none; }
  .select-editable select:focus, .select-editable input:focus { outline:none; }
</style>

<div class="select-editable" style="width: Calc(100% - 200px);">
  <select name="lstorigen" onchange="this.nextElementSibling.value=this.value" style="width: Calc(100% - 10px);">
    <option value=""></option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT DISTINCT(origen) as miorigen from ".$prefixsql."terceros order by origen");

		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		echo '<option value="'.$columna["miorigen"].'" '.$pordefecto.'>'.$columna["miorigen"].'</option>';
		
	}

	
?>

  </select>
  <input name="txtorigen" maxlength="20" type="text" value="" style="width: Calc(100% - 30px);"/>
</div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <label><input type="checkbox" value="1" name="chkcopycontact"/> Crear contacto copiando razon social, telefono y email</label>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Razon social
  </div>
  <div class="col" align="left">
    <input name="txtrazonsocial" maxlength="50" required="" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nombre comercial
  </div>
  <div class="col" align="left">
    <input name="txtnomcomercial" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    NIF
  </div>
  <div class="col" align="left">
    <input name="txtnif" maxlength="15" required="" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" maxlength="20" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" maxlength="100" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["pais"].'</option>';
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
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
    if($col["id"] == $dbidprov){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["provincia"].'</option>';
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
  <div class="col maintitle" align="left">
    Financiera
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Cuenta bancaria
  </div>
  <div class="col" align="left">
    <input name="txtncuenta" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>


<div class="row">
  <div class="col maintitle" align="left">
    Datos Cliente
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Tarifa aplicable
  </div>
  <div class="col" align="left">
    <select name="cbtarifa" style="width: 100%">
	
	<option value="0" selected="">- No aplicable -</option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tarifas order by tarifa");
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$columna["id"].'">'.$columna["tarifa"].'</option>';
	}

	echo '</select>';
?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Formas de cobro
  </div>
  <div class="col" align="left">
    <select name="lstclifp"  style="width: 100%;">
    <option value="0" selected="">-Sin especificar-</option>
<?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
        echo '<option value="'.$colcpago["id"].'" >'.$colcpago["cpago"].'</option>';
    }
?>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Documento de cobro
  </div>
  <div class="col" align="left">
    <select name="lstclidp" style="width: 100%;">
    <option value="0" selected="">-Sin especificar-</option>
<?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
        echo '<option value="'.$colcpago["id"].'" >'.$colcpago["formapago"].'</option>';
    }
?>
    </select>
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Datos proveedor
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Codigo cliente en proveedor
  </div>
  <div class="col" align="left">
    <input name="txtcodclipro" maxlength="20" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Formas de pago
  </div>
  <div class="col" align="left">
    <select name="lstprofp" style="width: 100%;">
    <option value="0" selected="">-Sin especificar-</option>
<?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
        echo '<option value="'.$colcpago["id"].'" >'.$colcpago["cpago"].'</option>';
    }
?>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Documento de pago
  </div>
  <div class="col" align="left">
    <select name="lstprodp" style="width: 100%;">
    <option value="0" selected="">-Sin especificar-</option>
<?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
        echo '<option value="'.$colcpago["id"].'" >'.$colcpago["formapago"].'</option>';
    }
?>
    </select>
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Comercial
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Agente
  </div>
  <div class="col" align="left">
    <select name="lstcomercial" style="width: 100%;">
<option value="0" >-sin asignar-</option>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users order by display");

	
	
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["display"].'</option>';
		
	}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Zona
  </div>
  <div class="col" align="left">
    <select name="lstzona" style="width: 100%;">
      <option value="0" selected="">-sin asignar-</option>
      <?php
  $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_zonas order by zona");
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$columna["id"].'" >'.$columna["zona"].'</option>';
		
	}
?>
    </select>
  </div>
</div>



<div class="row">
  <div class="col-sm-2" align="left">
    Tipo tercero
  </div>
  <div class="col" align="left">
	<select name="lsttipotercero" style="width: 100%;">
	<option value="0" selected="">-sin especificar-</option>


	<?php
	$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceros_tipos order by tipotercero");
		
		while($colaux = mysqli_fetch_array($cnsaux))
		{
			echo '<option value="'.$colaux["id"].'" >'.$colaux["tipotercero"].'</option>';
			
		}
	?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Sector Actividad
  </div>
  <div class="col" align="left">
    
	<select name="lstactividad" style="width: 100%;">
	<option value="0" selected="">-sin especificar-</option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_actividades order by actividad");

		
		
		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			
			echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["actividad"].'</option>';
			
		}
	?>
	</select>
  </div>
</div>




<div class="row">
  <div class="col maintitle" align="left">
    Anotaciones
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <textarea name="txtnotas" maxlength="250" style="width: 100%; height: 100px"></textarea>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Notas importantes
  </div>
  <div class="col" align="left">
    <textarea name="txtnotaimp" maxlength="250" placeholder="Esta nota se mostrara en documentos importantes" style="width: 100%; height: 100px"></textarea>
  </div>
</div>
<table>
<tr><td>
<table>




<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=terceros&section=terceros">Cancelar</a>

</div>







</form>

