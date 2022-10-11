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
$fechaactual = date('d/m/Y');
?>

					   
<form name="form1" action="index.php?module=lnxit&section=mant&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="new">
<table>
<tr class="maintitle"><td colspan="2" align="center">Nuevo contrato de mantenimiento</td></tr>

<tr><td><input type="checkbox" checked="" name="chkactivo" value="1"/> Activo</td></tr>

<tr><td>ref</td><td><input type="textbox" value="" name="txtref" required=""/></td></tr>
<tr><td>Tercero asociado</td>
<td>
<select name="lsttercero">
	<option value="0">-Sin asignar-</option>
<?php
$cnssql = "SELECT id, razonsocial FROM ".$prefixsql."terceros where codcli > '0' order by razonsocial";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
}
?>
	
</select>
</td></tr>

<tr><td>Tipo Mantenimiento</td>
<td>
<select name="lsttipomant">
	<option value="0">-Sin asignar-</option>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_tipomant";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$col["id"].'">'.$col["tipomant"].'</option>';
}
?>
	
</select>
</td></tr>


<tr><td>Inicio</td><td><?php echo '<input type="textbox" id="dpkfechainicio" value="'.$fechaactual.'" name="txtfinicio" required=""/>'; ?></td></tr>
<tr><td>Fin</td><td><?php echo '<input type="textbox" id="dpkfechafin" value="'.$fechaactual.'" name="txtffin"/>'; ?></td></tr>

<tr><tr><td>Horas contratadas</td><td>

<select name="slthchh"/>
	<option value="00" selected="">00</option>
	<option value="01" >01</option>
	<option value="02" >02</option>
	<option value="03" >03</option>
	<option value="04" >04</option>
	<option value="05" >05</option>
	<option value="06" >06</option>
	<option value="07" >07</option>
	<option value="08" >08</option>
	<option value="09" >09</option>
	<option value="10" >10</option>
	<option value="11" >11</option>
	<option value="12" >12</option>
	<option value="13" >13</option>
	<option value="14" >14</option>
	<option value="15" >15</option>
	<option value="16" >16</option>
	<option value="17" >17</option>
	<option value="18" >18</option>
	<option value="19" >19</option>
	<option value="20" >20</option>
	<option value="21" >21</option>
	<option value="22" >22</option>
	<option value="23" >23</option>
</select>
h 
<select name="slthcmm"/>
	<option value="00" selected="">00</option>
	<option value="05" >05</option>
	<option value="10" >10</option>
	<option value="15" >15</option>
	<option value="20" >20</option>
	<option value="25" >25</option>
	<option value="30" >30</option>
	<option value="35" >35</option>
	<option value="40" >40</option>
	<option value="45" >45</option>
	<option value="50" >50</option>
	<option value="55" >55</option>
</select>
m
</td></tr>


<tr><td colspan="2">descripcion</td></tr>
<tr><td colspan="2"><textarea name="txtdescripcion"></textarea></td></tr>



<tr><td colspan="2" align="center">&nbsp; </td></tr>
<tr><td colspan="2" align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=mant">Cancelar</a>
</td></tr>
</table>
</div>
</form>