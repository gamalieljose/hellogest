 <link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>


<?php echo '<script src="modules/'.$lnxinvoice.'/ajax/ajxcompletar.js"></script>'; ?>
<?php echo '<script src="modules/'.$lnxinvoice.'/ajax/ajx_concepto.js"></script>'; ?>


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
  
	
	$("#dpkfupago").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfupago_value").val(dateText);
		}
	});


});
  </script>

<?php
$idfv = $_GET["id"];
$fechahoy = date('d/m/Y');

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowfv = mysqli_fetch_assoc($cnsaux);
$dbfvidtercero = $rowfv["idtercero"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbfvidtercero."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbclifp = $rowaux["clifp"]; //forma pago
$dbclidp = $rowaux["clidp"]; //documento pago

?>


<?php echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=pagos&action=save" method="POST">';

echo '<input type="hidden" value="'.$idfv.'" name="hidfv"/>'; 
echo '<input type="hidden" value="new" name="haccion"/>';
?>


<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<?php echo '<a href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> '; ?>
</div>


<div class="row">
<div class="col maintitle">
Nuevo pago efectuado
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Fecha
</div>
<div class="col">
<input type="text" value="<?php echo $fechahoy; ?>" style="width: 100px;" name="dpkfupago" id="dpkfupago" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Importe
</div>
<div class="col">
	<input type="text" name="txtimporte" value="0"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Forma pago
</div>
<div class="col">
<select name="lstfpago" style="width: 100%;">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
while($colfpago = mysqli_fetch_array($ConsultaMySql))
{
	if($colfpago["id"] == $dbclidp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$colfpago["id"].'" '.$seleccionado.'>'.$colfpago["formapago"].'</option>';	
}

?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Condiciones de pago
</div>
<div class="col">
<select name="lstcpago" style="width: 100%;">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago ");
while($colfpago = mysqli_fetch_array($ConsultaMySql))
{
	if($dbclifp == $colfpago["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$colfpago["id"].'" '.$seleccionado.' '.$quitado.'>'.$colfpago["cpago"].'</option>';	
}
?>
</select>
</div>
</div>

</form>
</div>