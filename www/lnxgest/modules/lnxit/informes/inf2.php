<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">

<script src="core/com/js_terceros_all.js"></script>
<script languague="javascript">
$().ready(function() {

$.datepicker.regional['es'] =
{
closeText: 'Cerrar',
prevText: 'Previo',
nextText: 'Próximo',

monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃ±o',
dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','SÃ¡bado'],
dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃ¡b'],
dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
dateFormat: 'dd/mm/yy', firstDay: 0,
initStatus: 'Selecciona la fecha', isRTL: false
};

$.datepicker.setDefaults($.datepicker.regional['es']);

	$("#dpkfechainicio").datepicker({
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	onSelect: function(dateText, inst) {
	$("#dpkfechainicio_value").val(dateText);
	}
	});

	$("#dpkfechafin").datepicker({
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	onSelect: function(dateText, inst) {
	$("#dpkfechafin_value").val(dateText);
	}
	});


});

</script>
<h2>Informe de tickets</h2>
<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=informes&action=inf2_rs">
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<label><input type="checkbox" name="chkterceros" value="todos" /> Todos los terceros</label>


<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$_COOKIE["lnxit_idtercero"]."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{                  
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
	</div>
</div>
<div class="row">
<div class="col-sm-2">
<label><input type="radio" value="open" name="optfechabuscar" checked=""/> Apertura ticket</label></br>
<label><input type="radio" value="close" name="optfechabuscar" /> Cierre ticket</label>
</div>
<div class="col-2">
Fecha desde: </br>
<?php
$fechahoy = date("d/m/Y");

echo '<input type="text" maxlength="10" value="'.$fechahoy.'" name="txtfechainicio" id="dpkfechainicio" required="" style="width: 100%;">';


?>
</div>
<div class="col-sm-2">
Fecha hasta: </br>
<?php
echo '<input type="text" maxlength="10" value="'.$fechahoy.'" name="txtfechafin" id="dpkfechafin" required="" style="width: 100%;">'; 

?>

</div>

</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Mostrar
  </div>
  <div class="col" align="left">
	<label><input type="checkbox" value="1" checked="" name="chktickettipo"/> Tipo ticket</label> </br>
	<label><input type="checkbox" value="1" checked="" name="chkticketremoto"/> Ticket remoto</label> </br>
	<label><input type="checkbox" value="1" checked="" name="chkticketestado"/> Estado del ticket</label> </br>
	<label><input type="checkbox" value="1" checked="" name="chktickettercero"/> Tercero</label> </br>
	<label><input type="checkbox" value="1" checked="" name="chkticketafectado"/> - Afectado</label> </br>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Procesar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=informes">Cancelar</a>

</div>

</form>
