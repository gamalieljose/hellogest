<?php
$iddocumento = $_GET["iddoc"];
$tipoevento = $_GET["tipoevento"];


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."viajes where id = '".$iddocumento."' ");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
$dbdescripcion = $row["descripcion"];
$dbiduser = $row["iduser"];
$dbfecha = $row["fecha"];
    $xtemp = explode(" ", $dbfecha);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fecha = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0];

    $xtemp2 = explode(":", $xtemp[1]);
    $lbl_fecha_h = $xtemp2[0];
    $lbl_fecha_m = $xtemp2[1];

$dbfechavuelta = $row["fechavuelta"];
    $xtemp = explode(" ", $dbfechavuelta);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fechavuelta = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0];

    $xtemp2 = explode(":", $xtemp[1]);
    $lbl_fechavuelta_h = $xtemp2[0];
    $lbl_fechavuelta_m = $xtemp2[1];


$cnslinea= $mysqli->query("SELECT * from ".$prefixsql."viajes where id = '".$iddocumento."' ");
$row = mysqli_fetch_assoc($cnslinea);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
?>


<script language="javascript">
function fechaborrar() {
    document.getElementById('dpkfechavuelta').value = '00/00/0000';
    document.getElementById('tiempohh_vuelta').value = '00';
    document.getElementById('tiempomin_vuelta').value = '00';
}

function fechadefecto() {
<?php
echo "document.getElementById('dpkfechavuelta').value = '".$lbl_fechavuelta."' ;";
echo "document.getElementById('tiempohh_vuelta').value = '".$lbl_fechavuelta_h."'; ";
echo "document.getElementById('tiempomin_vuelta').value = '".$lbl_fechavuelta_m."'; ";
?>        
}
</script>

<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 
<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script language="javascript">

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
  
	
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfecha_value").val(dateText);
		}
    });
    
    $("#dpkfechavuelta").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechavuelta_value").val(dateText);
		}
    });

});
</script>


<form name="frmregistro" method="POST" action="index.php?module=gastos&section=viajes&action=linesave" enctype="multipart/form-data">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=viajes&action=view&iddoc=<?php echo $iddocumento; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="new"/> 
<input type="hidden" name="hiddoc" value="<?php echo $iddocumento; ?>"/> 
<input type="hidden" name="hidlinea" value="0"/> 


<div class="row">
<div class="col-sm-2">
    Fecha
</div>

<div class="col-sm-3">
Fecha salida </br>
    <input type="text" value="<?php echo $lbl_fecha; ?>" name="dpkfecha" id="dpkfecha" style="width: 100px;" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" /> 
    <select name="tiempohh">
<?php

$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $lbl_fecha_h){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$horaconcero.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 


 <select name="tiempomin">
 <?php

$minutos = 00;
	
while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $lbl_fecha_m){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$horaconcero.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 1;

}
  
?>
 </select>m.
</div>


<div class="col campoencoger">
Fecha llegada </br>

<a href="javascript:fechadefecto();"><i class="fa fa-fw fa-calendar-alt" title="Fecha vuelta"></i> </a>

    <input type="text" value="<?php echo $lbl_fechavuelta; ?>" name="dpkfechavuelta" id="dpkfechavuelta" style="width: 100px;" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />

    <select name="tiempohh_vuelta" id="tiempohh_vuelta">
<?php
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $lbl_fechavuelta_h){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$horaconcero.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 


 <select name="tiempomin_vuelta" id="tiempomin_vuelta">
<?php

$minutos = 00;

	
while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $lbl_fechavuelta_m){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$horaconcero.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 1;

}
  
?>
 </select>m. 

 <a href="javascript:fechaborrar();"><i class="fa fa-fw fa-ban" title="Quitar fecha"></i> </a>

</div>
</div>

<div class="row">
<div class="col-sm-2">
    
</div>
<div class="col-sm-3">
    <input type="text" name="txtorigen" placeholder="Lugar de origen" value="" maxlength="50" style="width: 100%;" />
</div>
<div class="col-sm-3">
    <input type="text" name="txtdestino" placeholder="Lugar de destino" value="" maxlength="50" style="width: 100%;" />
</div>
</div>
<?php
if($tipoevento == "nota"){include("modules/gastos/viajes/line_nota.php");}
if($tipoevento == "viaje"){include("modules/gastos/viajes/line_viaje.php");}
if($tipoevento == "hotel"){include("modules/gastos/viajes/line_hotel.php");}

?>

</form>