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
$idpago = $_GET["idpago"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbcodigo = $rowpago["codigo"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_pagos where id = '".$idpago."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbfecha = $rowpago["fecha"];
$dbimporte = $rowpago["importe"];
$dbidfpago = $rowpago["idfpago"];
$dbidcuenta = $rowpago["idcpago"];
?>

<p>
<?php 
echo '<a href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'&action=delete&idpago='.$idpago.'" class="btnenlacecancel">Eliminar</a>'; 
?>
</p>


<?php
echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=pagos&action=save" method="POST">';

echo '<input type="hidden" value="'.$idfv.'" name="hidfv"/>'; 
echo '<input type="hidden" value="'.$idpago.'" name="hidpago"/>';
echo '<input type="hidden" value="update" name="haccion"/>';
?>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<?php echo '<a href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> '; ?>
</div>

<div class="row">
<div class="col maintitle">
Editando cobro <?php echo $dbcodigo."-".$idpago; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Fecha
</div>
<div class="col">
<?php

$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$cfecha = $fdia.'/'.$fmes.'/'.$fano;

?>
<input type="text" value="<?php echo $cfecha; ?>" style="width: 100px;" name="dpkfupago" id="dpkfupago" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Importe
</div>
<div class="col">
	<input type="text" name="txtimporte" value="<?php echo $dbimporte; ?>"/>
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
$cuentalineas = $ConsultaMySql->num_rows;

$lineaactual = 0;
$color = 1;
while($colfpago = mysqli_fetch_array($ConsultaMySql))
{
	if($dbidfpago == $colfpago["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
	if($dbidcuenta == $colfpago["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$colfpago["id"].'" '.$seleccionado.' '.$quitado.'>'.$colfpago["cpago"].'</option>';	
}
?>
</select>
</div>
</div>

</form>
