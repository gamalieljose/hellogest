<link rel="stylesheet" href="scripts/jquery/jquery-ui.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃƒÂ³ximo',
  
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
  
<?php

?>


<div align="center">
<form name="form1" method="post" action="index.php?module=almacen&section=movwh&action=save">

<table border="0" class="msgaviso">
<tr>
    <td colspan="2" class="maintitle">Filtro consulta movimientos de almacen</td>
</tr>

<tr>
	<td>Desde fecha</td>
	<td>
	<?php 
	$anoactual = date('Y');
	echo '<input type="text" name="txtfecha" id="dpkfechainicio" maxlength="10" value ="01/01/'.$anoactual.'" required="" style="width: 100%;">';
	?>
	</td>
</tr>
<tr>
	<td>Hasta fecha</td>
	<td>
	<?php
	$fechaactual = date('d/m/Y');

	echo '<input type="text" name="txtfechafin" id="dpkfechafin" maxlength="10" value="'.$fechaactual.'"required="" style="width: 100%;">';
	?>
	</td>
</tr>
  <tr>
    <td>Resumen</td>
	<td><input type="text" name="txtresumen" maxlength="50" style="width: 100%;"/>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="Submit" class="btnsubmit" value="Buscar"></td>
  </tr>  
  
</table>


</form>
</div>

