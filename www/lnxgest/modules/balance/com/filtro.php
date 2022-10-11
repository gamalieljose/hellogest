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
echo '<p>&nbsp;</p>';
?>
<div align="center">
<form name="form1" method="post" action="index.php?module=balance&section=com&action=resultado">
<table width="500" border="0" class="msgaviso">
  <tr>
    <td colspan="4" class="maintitle">Consulta facturado por agente </td>
  </tr>
  
  <tr>
    <td colspan="4"><input type="radio" value="1" name="optresultado" checked=""/>Facturado por agente</td>
  </tr>
  <tr>
    <td colspan="4"><input type="radio" value="2" name="optresultado" />Facturado por cliente agrupado por agente</td>
  </tr>
  
  <tr>
    <td>Serie Facturas de venta </td>
    <td>
      <select name="lstfv" id="lstfv">
	  <?php
	  $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where cv = '2' and tipo = 'F' and activo = '1'");

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			if ($columna["dft"] == '1'){$defecto = " selected";}else{$defecto = "";}
			echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["serie"].'</option>';
        
		}
	  
	  ?>
	  </select>
	  
	  </td>
    <td>Fecha inicio </td>
    <td>
	<?php 
	$mesactual = date('m');
	$anoactual = date('Y');
		echo '<input type="text" name="txtfecha" id="dpkfechainicio" size="15" value ="01/'.$mesactual.'/'.$anoactual.'" required="">';
	?>
	</td>
  </tr>
  <tr>
    <td colspan="2">
	<input type="checkbox" name="chkfv" value="all"> Incluir todas las series de ventas
	</td>
   
    <td>Fecha fin </td>
    <td>
	<?php
	$fechaactual = date('d/m/Y');

	echo '<input type="text" name="txtfechafin" id="dpkfechafin" size="15" value="'.$fechaactual.'"required="">';
	?>
</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>  
  <tr>
    <td colspan="4" align="center"><input type="submit" name="Submit" class="btnsubmit" value="Buscar"></td>
  </tr>  
  
  
</table>
</form>
</div>


