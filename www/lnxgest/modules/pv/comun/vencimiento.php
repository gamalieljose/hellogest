<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">


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
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
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


});
  </script>

<?php
$iddocumento = $_GET["id"];

echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver Factura</a>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbfecha = $row["fecha"];
$dbvencimiento = $row["vencimiento"];


$dbdescripcion = $row["descripcion"];
$dbcerrado = $row["cerrado"];


$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$cfecha = $fdia."/".$fmes."/".$fano;

$fano = substr($dbvencimiento, 0, 4);  
$fmes = substr($dbvencimiento, 5, 2);  
$fdia = substr($dbvencimiento, 8, 2);  

$cvencimiento = $fdia."/".$fmes."/".$fano;

?>
<p>&nbsp;</p>
<div align="center">
<?php
echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=vencimiento&id='.$iddocumento.'&action=save" method="POST">';

echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
?>


<table>

<tr class="maintitle"><td colspan="2">Vencimiento</td></tr>
<tr><td>Fecha Factura</td><td>
<?php
echo '<input type="text" name="txtfecha" value="'.$cfecha.'" id="dpkfecha" required="">';
?></td></tr>
<tr><td>Fecha Vencimiento</td>
<td>
<?php


echo '<input type="text" name="txtvencimiento" value="'.$cvencimiento.'" id="dpkvencimiento" required="">';
?>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">
<div align="center">
<?php
echo '<input type="submit" class="btnsubmit" value="Guardar"/> ';

echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Cancelar</a>';
?></div>
</td></tr>
</table>
</form>
</div>