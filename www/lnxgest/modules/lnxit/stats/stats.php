<link rel="stylesheet" href="scripts/jquery/jquery-ui.css">
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
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
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

		dateFormat: "dd/mm/yy",
		firstDay: 1,
		onSelect: function(dateText, inst) { 
		$("#dpkfechafin_value").val(dateText);
		}
	}
	);
});
  </script>

<div align="center">
<form name="form1" method="post" action="index.php?module=lnxit&section=stats&action=result">

<table>
<tr class="maintitle"><td colspan="2">Estadisticas</td>


<tr><td>Fecha inicio</td>
<td>
<?php
$fechaactual = date('m/Y');
echo '<input type="text" name="txtfecha" id="dpkfechainicio" value ="01/'.$fechaactual.'" required="">';
?>
</td></tr>
<tr><td>Fecha Fin</td><td>
<?php
$fechaactual = date('d/m/Y');

echo '<input type="text" name="txtfechafin" id="dpkfechafin" value="'.$fechaactual.'"required="">';
?>
</td></tr>

<tr><td>Estadistica</td><td>
<select name="lsttipo"/>
	<option value="1"/>Tickets por dia</option>
	<option value="2"/>Tickets ABIERTOS por usuario</option>
	<option value="3"/>Tickets CERRADOS por usuario</option>
	<option value="4"/>Tickets por categorias</option>
</select>

</td></tr>

<tr><td colspan="2">&nbsp;</td>
<tr><td colspan="2" align="center">
<input class="btnsubmit" name="btnbuscar" value="Ver estadisticas" type="submit"> 

</td></tr>
</table>
</form>

</div>