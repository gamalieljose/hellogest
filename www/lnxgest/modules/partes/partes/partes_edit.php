<?php
$idparte = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."partes where id = '".$idparte."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidticket = $rowaux["idticket"];
$dbidserie = $rowaux["idserie"];
$dbcodigo = $rowaux["codigo"];
$dbiduser = $rowaux["iduser"];
$dbidtercero = $rowaux["idtercero"];
$dbdescripcion = $rowaux["descripcion"];
$dbfechain = $rowaux["fechain"];
	$xfin = explode(" ", $dbfechain);
	$xfechain = explode("-", $xfin[0]);
		$finano = $xfechain[0];
		$finmes = $xfechain[1];
		$findia = $xfechain[2];
		
		$dbfin = $findia."/".$finmes."/".$finano;
	
	$xhorain = explode(":", $xfin[1]);
		$db_hin = $xhorain[0];
		$db_min = $xhorain[1];
	
	
$dbfechaout = $rowaux["fechaout"];
	$xfout = explode(" ", $dbfechaout);	
	$xhoraout = explode(":", $xfout[1]);
		$db_hout = $xhoraout[0];
		$db_mout = $xhoraout[1];
	
?>

<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">

<script languague="javascript">
        function mostrar() {
            div = document.getElementById('flotante');
            div.style.display = '';
        }

        function cerrar() {
            div = document.getElementById('flotante');
            div.style.display = 'none';
        }
		
		
		

</script>
<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃ³ximo',
  
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

/**

 * Función para redondear una hora
 * Tiene que recibir:
 *	$time -> la hora a redondear en formato hh:mm o hh:mm:ss
 *	$round_to_minutes -> determina el minuto a redondear, por defecto redondea a
 *		5 minutos arriba o abajo
 *	$type -> determina el tipo de redondeo
 *		auto (defecto) - aumenta o disminuye los minutos para ajusta al mas cercado
 *		up - siempre aumenta los minutos
 *		down - siempre disminuye los minutos
 */

function round_time( $time, $round_to_minutes = 5, $type = 'auto' ) {

	$round = array( 'auto' => 'round', 'up' => 'ceil', 'down' => 'floor' );
	$round = @$round[ $type ] ? $round[ $type ] : 'round';
	$seconds = $round_to_minutes * 60;
	if(substr_count($time,":")==2)
		return date( 'H:i:s', $round( strtotime( $time ) / $seconds ) * $seconds );
	else
		return date( 'H:i', $round( strtotime( $time ) / $seconds ) * $seconds );
}

?>

<script src="core/com/js_terceros_all.js"></script>

<form id="formCanvas" method="post" action="index.php?module=partes&section=partes&action=save" ENCTYPE="multipart/form-data" autocomplete="off">

<input type="hidden" value="update" name="haccion" />
<input type="hidden" value="<?php echo $idparte; ?>" name="hidparte" />

<div class="row">
<div class="col maintitle">
    <?php echo $dbcodigo; ?>
  </div>

</div>
<div class="row">
<div class="col-sm-2">
    <?PHP echo LABEL_TICKET; ?>
  </div>
  <div class="col" align="left">
	<input type="number" value="<?php echo $dbidticket; ?>" min="0" name="txtticket" class="campoencoger" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <?PHP echo LABEL_SERIE; ?>
  </div>
  <div class="col" align="left">
    <select name="lstserie" class="campoencoger">
	 <?php
	 
	 $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'PT' and cv = '2' and activo = '1' order by serie");

		while($colaux = mysqli_fetch_array($ConsultaMySql))
		{
			if ($colaux["id"] == $dbidserie ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["serie"].'</option>';
			
		}

	 ?>
	</select>
	
  </div>
  
  
</div>

<div class="row">
  <div class="col-sm-2">
    <?php echo LABEL_TECHNICIAN; ?>
  </div>
  <div class="col" align="left">
    <select name="lsttecnico" class="campoencoger">
	<?php
	$cnsusers = $mysqli->query("SELECT * from ".$prefixsql."users order by display");
	$color = '1';
	while($usuarios = mysqli_fetch_array($cnsusers))
	{
		if($usuarios["id"] == $dbiduser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$usuarios["id"].'" '.$seleccionado.'>'.$usuarios["display"].'</option>';
	}
	?>
		
		
	</select>
  </div>
</div>



<div class="row">
    <div class="col-sm-2" align="left">
        <?php echo LABEL_TERCERO; ?>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
    <select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_razonsocial = $rowaux["razonsocial"];
echo '<option value="'.$rowaux["id"].'">'.$rowaux["razonsocial"].'</option>';
?>
    </select>
    </div>
</div>









<div class="row">
  <div class="col-sm-2">
    <?php echo LABEL_FECHAPARTE; ?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha </br>
  <?php 
  
  echo '<input type="text" maxlength="10" value="'.$dbfin.'" name="txtfecha" id="dpkfecha" required="" style="width: 100%;">'; ?>
  </div>
  <div class="col-sm-2">
    <?php echo LABEL_HORAIN; ?> </br>
      
    <select name="inhh">
 <?php
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $db_hin){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$hora.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 
 
 
 <select name="inmin">
 <?php
$minutos = 00;
while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $db_min){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 </select>m.

  </div>
<div class="col-sm-2">
    <?php echo LABEL_HORAOUT; ?> </br>
      
    <select name="outhh">
 <?php
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $db_hout){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$hora.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 
 
 
 <select name="outmin">
 <?php
$minutos = 00;
while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $db_mout){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 </select>m.

  </div>
</div>
<div class="row">
    <div class="col maintitle">
        <?php echo LABEL_INTERVENCION; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <?php echo LABEL_INTERVENCION; ?>
    </div>
    <div class="col">
        <textarea name="txtintervencion" id="txtintervencion" style="width: 100%;" required=""><?php echo $dbdescripcion; ?></textarea>
    </div>
</div>




<div align="center" class="rectangulobtnsguardar">


<input type="submit" class="btnsubmit" value="Guardar" />


<a class="btncancel" href="index.php?module=partes">Cancelar</a> 
</div>

</form>
