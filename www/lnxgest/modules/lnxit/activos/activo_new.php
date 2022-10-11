<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<!-- <script src="core/com/js_terceros_all.js"></script> -->
<?php
$fechahoy = date("d/m/Y");

?>

<script language="javascript">
function fechaborrar(campo) {
    document.getElementById(campo).value = '00/00/0000';
}

function fechaactual(campo) {
<?php
echo "document.getElementById(campo).value = '".$fechahoy."' ;";
?>
}



function mostrar() {
	div = document.getElementById("div_buscatercero");
	div.style.display = "";
	document.getElementById("txttercero").focus();
}

function mostrarcontactos() {
	div = document.getElementById("div_buscacontacto");
	div.style.display = "";
	document.getElementById("txtcontacto").focus();
}

$(document).ready(function(){
   $("#txttercero").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txttercero").value;

	$.post("core/com/ajx_terceros_all.php", { elegido: elegido }, function(data){

	$("#lsttercero").html(data);

	 cargacontactos();
	
	});
		
});
   
  
$("#txtcontacto").keyup(function () {
           
	elegido=$(this).val();
	var nombrecontacto = document.getElementById("txtcontacto").value;
	var idtercero = document.getElementById("lsttercero").value;
	
	$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { nombrecontacto: nombrecontacto, idtercero: idtercero }, function(data){

	$("#lstcontacto").html(data);
	});            
      
   })
});


</script>
<script language="javascript">
$(document).ready(function(){
   $("#lsttercero").change(function () {
           $("#lsttercero option:selected").each(function () {
            idtercero=$(this).val();
            
            $.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
                       
        }); 
   })
});


function cargacontactos() {
	var idtercero = document.getElementById("lsttercero").value;
	
$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
	
}

</script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃƒÂ±o',
  dayNames: ['Domingo','Lunes','Martes','MiÃƒÂ©rcoles','Jueves','Viernes','SÃƒÂ¡bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃƒÂ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#dpkvencimiento").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});
	
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});
	
	$("#dpkavisos").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkavisos_value").val(dateText);
		}
	});


});
  </script>


					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=activo&action=save" method="post">

<?php 
$flsttercero = $_COOKIE["lnxit_idtercero"]; 
?>

<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col maintitle" align="left">
    Nuevo Activo
  </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">';
	echo '<option value="0" selected="">-Sin asignar-</option>';
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$flsttercero."' order by nombre");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["nombre"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>




<div class="row">
  <div class="col-sm-2">
    Tipo de activo
  </div>
  <div class="col" align="left">
<select name="lsttipo" style="width: 100%;">
	<option value="0">-Sin asignar-</option>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_tipos order by tipo";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$col["id"].'">'.$col["tipo"].'</option>';
}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Codigo
  </div>
  <div class="col" align="left">
<input type="text" maxlength="20" name="txtcodigo" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Nombre
  </div>
  <div class="col" align="left">
<input type="text" maxlength="50" name="txtnombre" required="" style="width: 100%;"/>
  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    Estado
  </div>
  <div class="col" align="left">
<select name="lstestado" style="width: 100%;">
	<option value="0">-Sin especificar-</option>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_estados order by estado";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$col["id"].'">'.$col["estado"].'</option>';
}
?>

</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    Plantilla
  </div>
  <div class="col" align="left">
<select name="lstplantilla" style="width: 100%;">
	<option value="">-Sin especificar-</option>
<?php
$ruta = "modules/lnxit/activos/plantillas";

$filehandle = opendir($ruta);

 

while ($file = readdir($filehandle)) {

	if ($file != "." && $file != "..") {

 $path = $ruta.'/'.$file; 

	$ficherito = basename($path);

	$ficherito = explode('.',$file);

	$nombrearchivo = $ficherito[0];
	$extension = $ficherito[1]; 

		echo '<option value="'.$file.'">'.$nombrearchivo.'</option>';  

		

	}

}

 

closedir($filehandle);

?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Tratamiento
  </div>
  <div class="col" align="left">
  <select name="lsttratarcomo" style="width: 100%;">
    <option value="0" selected="">- Genérico -</option>
    <option value="1">Tratar como licencia</option>
    <option value="2">Tratar como ordenador</option>
  </select>

  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    Notas
  </div>
  <div class="col" align="left">
	<textarea name="txtnotas" maxlength="250" style="width: 100%;"></textarea>
  </div>
</div>



<div class="row">
  <div class="col maintitle">
    Fechas
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Fecha Alta
  </div>
  <div class="col" align="left">
	<?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="'.$fechahoy.'" name="dpkfecha" id="dpkfecha"  style="width: 100px;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fecha Caducidad
  </div>
  <div class="col" align="left">
      <a href="javascript:fechaactual('dpkvencimiento')"><i class="fa fa-fw fa-calendar-alt" title="Fecha actual"></i> </a>
	<?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="00/00/0000" name="dpkvencimiento" id="dpkvencimiento"  style="width: 100px;">'; ?>
  
      <a href="javascript:fechaborrar('dpkvencimiento')"><i class="fa fa-fw fa-ban" title="Quitar fecha"></i> </a>
  
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
<input type="checkbox" name="chkaviso" value="1" /> Avisar a partir de
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fecha aviso
  </div>
  <div class="col" align="left">
      <a href="javascript:fechaactual('dpkavisos')"><i class="fa fa-fw fa-calendar-alt" title="Fecha actual"></i> </a>
<?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="00/00/0000" name="dpkavisos" id="dpkavisos"  style="width: 100px;">'; ?>
      <a href="javascript:fechaborrar('dpkavisos')"><i class="fa fa-fw fa-ban" title="Quitar fecha"></i> </a>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=activos">Cancelar</a>

</div>





</form>
