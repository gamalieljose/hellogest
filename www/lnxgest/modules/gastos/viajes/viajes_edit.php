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
<script src="modules/gastos/ajax/ajx_series-viajes.js"></script> 

<?php
$iddocumento = $_GET["iddoc"];

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


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$dbidserie."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"]; 
?>



<form name="frmgasto" method="POST" action="index.php?module=gastos&section=viajes&action=save" >
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=viajes&action=view&iddoc=<?php echo $iddocumento; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update"/>
<input type="hidden" name="hidregistro" value="<?php echo $iddocumento; ?>"/>

<div class="row">
    <div class="col-sm-2" align="left">
         Empresa
    </div>
    <div class="col" align="left">
         <?php
        $cnsempresas= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	echo '<select id="lstempresas" name="lstempresas" class="campoencoger">';
	while($colempresa = mysqli_fetch_array($cnsempresas))
	{
            if($colempresa["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$colempresa["id"].'" '.$seleccionado.'>'.$colempresa["razonsocial"].'</option>';
        }
        echo '</select>';
                
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
         Serie
    </div>
    <div class="col" align="left">
<?php
echo '<select id="lstseries" name="lstseries" class="campoencoger">';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'V' and idempresa = '".$dbidempresa."' ");
    while($col = mysqli_fetch_array($ConsultaMySql))
    {
        if($col["id"] == $dbidserie){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["serie"].'</option>'; 
    }
echo '</select>';
	?>  
    </div>
</div>



<div class="row maintitle">
<div class="col-sm-2">
    Viaje
</div>
<div class="col">
    <?php echo $dbcodigo; ?>
</div>

</div>

<div class="row">
<div class="col-sm-2">
    Fecha
</div>
<div class="col">
Fecha ida </br>
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
<div class="col">
Fecha vuelta </br>
    <input type="text" value="<?php echo $lbl_fechavuelta; ?>" name="dpkfechavuelta" id="dpkfechavuelta" style="width: 100px;" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />

    <select name="tiempohh_vuelta">
<?php
$fechahora = date("H");
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


 <select name="tiempomin_vuelta">
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
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Usuario
</div>
<div class="col">
    <select name="lstuser" style="width: 100%;">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' or id = '".$dbiduser."' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $dbiduser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}
?>
    </select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Breve descripcion
</div>
<div class="col">
    <input type="text" value="<?php echo $dbdescripcion; ?>" name="txtdescripcion" style="width: 100%;"  maxlength="50" required=""/>
</div>
</div>


</form>