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
	$xfout = explode(" ", $dbfechain);	
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

<input type="hidden" value="firmalocal" name="haccion" />
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
	<?php echo $dbidticket; ?>
  </div>
</div>


<div class="row">
<div class="col-sm-2">
    Serie
  </div>
  <div class="col" align="left">
<?php 
$sqlauxseries = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."'");
$rowauxseries = mysqli_fetch_assoc($sqlauxseries);
$lblserie = $rowauxseries["serie"];
echo $lblserie; 
	
?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <?php echo LABEL_TECHNICIAN; ?>
  </div>
  <div class="col" align="left">
    <?php
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$dbiduser."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_displayuser = $rowaux["display"];

echo $lbl_displayuser;
	
	?>
  </div>
</div>



<div class="row">
    <div class="col-sm-2" align="left">
        <?php echo LABEL_TERCERO; ?>
    </div>
    <div class="col" align="left">

<?php

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_razonsocial = $rowaux["razonsocial"];
$lbl_emailtercero = $rowaux["email"];
echo $lbl_razonsocial;
?>

    </div>
</div>









<div class="row">
  <div class="col-sm-2">
    <?php echo LABEL_FECHAPARTE; ?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha </br>
  <?php 
  
  echo $dbfin; ?>
  </div>
  <div class="col-sm-2">
    <?php echo LABEL_HORAIN; ?> </br>
      
    
 <?php
echo $db_hin.":".$db_min; 
 
 ?>


  </div>
<div class="col-sm-2">
    <?php echo LABEL_HORAOUT; ?> </br>
      
 
 <?php
echo $db_hout.":".$db_mout;
 
 ?>


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
        <?php echo $dbdescripcion; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Plantilla
    </div>
    <div class="col">
        <select name="lstdocprint" style="width: 100%;" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."docprint where idmod = '2050' ");
while($col = mysqli_fetch_array($cnssql))
{
	echo '<option value="'.$col["id"].'">'.$col["id"].' - '.$col["descripcion"].'</option>';
}

?>

		</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Enviar desde
    </div>
    <div class="col">
        <select name="lstemail" style="width: 100%;" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users_correo where iduser = '".$_COOKIE["lnxuserid"]."'");
while($col = mysqli_fetch_array($cnssql))
{
	echo '<option value="'.$col["id"].'">'.$col["display"].'</option>';
}
?>
		</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        e-mail
    </div>
    <div class="col">
        <input type="email" value="<?php echo $lbl_emailtercero; ?>" name="txtemailenviar" id="txtemailenviar" style="width: 100%;" required="" />
    </div>
</div>



<div class="row">
    <div class="col maintitle">
        Firma
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Firmante
    </div>
    <div class="col">
        <input type="text" value="" name="txtfirmanombre" id="txtfirmanombre" style="width: 100%;" required="" />
    </div>
</div>


<div align="center">
<div class='centrador'>
  <canvas id='canvas' width="300" height="150" style='border: 1px solid #CCC;'>
    
  </canvas>
  <input type='hidden' name='imagen' id='imagen' /></br>
  <?php echo "<button type='button' class=\"btnenlacecancel\" onclick='LimpiarTrazado()'>".LABEL_SIGNDEL."</button>"; ?>
</div>
</div>



<div align="center" class="rectangulobtnsguardar">


<button type='button' class="btnsubmit" onclick="GuardarTrazado()" >Guardar</button>


<a class="btncancel" href="index.php?module=partes">Cancelar</a> 
</div>

</form>

<script type="text/javascript">
/* Variables de Configuracion */
var idCanvas='canvas';
var idForm='formCanvas';
var inputImagen='imagen';
var estiloDelCursor='crosshair';
var colorDelTrazo='#555';
var colorDeFondo='#fff';
var grosorDelTrazo=2;
 
/* Variables necesarias */
var contexto=null;
var valX=0;
var valY=0;
var flag=false;
var imagen=document.getElementById(inputImagen); 
var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
var altoCanvas=document.getElementById(idCanvas).offsetHeight;
var pizarraCanvas=document.getElementById(idCanvas);
 
/* Esperamos el evento load */
window.addEventListener('load',IniciarDibujo,false);
 
function IniciarDibujo(){
  /* Creamos la pizarra */
  pizarraCanvas.style.cursor=estiloDelCursor;
  contexto=pizarraCanvas.getContext('2d');
  contexto.fillStyle=colorDeFondo;
  contexto.fillRect(0,0,anchoCanvas,altoCanvas);
  contexto.strokeStyle=colorDelTrazo;
  contexto.lineWidth=grosorDelTrazo;
  contexto.lineJoin='round';
  contexto.lineCap='round';
  /* Capturamos los diferentes eventos */
  pizarraCanvas.addEventListener('mousedown',MouseDown,false);
  pizarraCanvas.addEventListener('mouseup',MouseUp,false);
  pizarraCanvas.addEventListener('mousemove',MouseMove,false);
  pizarraCanvas.addEventListener('touchstart',TouchStart,false);
  pizarraCanvas.addEventListener('touchmove',TouchMove,false);
  pizarraCanvas.addEventListener('touchend',TouchEnd,false);
  pizarraCanvas.addEventListener('touchleave',TouchEnd,false);
}
 
function MouseDown(e){
  flag=true;
  contexto.beginPath();
  valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
  contexto.moveTo(valX,valY);
}
 
function MouseUp(e){
  contexto.closePath();
  flag=false;
}
 
function MouseMove(e){
  if(flag){
    contexto.beginPath();
    contexto.moveTo(valX,valY);
    valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
    contexto.lineTo(valX,valY);
    contexto.closePath();
    contexto.stroke();
  }
}
 
function TouchMove(e){
  e.preventDefault();
  if (e.targetTouches.length == 1) { 
    var touch = e.targetTouches[0]; 
    MouseMove(touch);
  }
}
 
function TouchStart(e){
  if (e.targetTouches.length == 1) { 
    var touch = e.targetTouches[0]; 
    MouseDown(touch);
  }
}
 
function TouchEnd(e){
  if (e.targetTouches.length == 1) { 
    var touch = e.targetTouches[0]; 
    MouseUp(touch);
  }
}
 
function posicionY(obj) {
  var valor = obj.offsetTop;
  if (obj.offsetParent) valor += posicionY(obj.offsetParent);
  return valor;
}
 
function posicionX(obj) {
  var valor = obj.offsetLeft;
  if (obj.offsetParent) valor += posicionX(obj.offsetParent);
  return valor;
}
 
/* Limpiar pizarra */
function LimpiarTrazado(){
  contexto=document.getElementById(idCanvas).getContext('2d');
  contexto.fillStyle=colorDeFondo;
  contexto.fillRect(0,0,anchoCanvas,altoCanvas);
}
 
/* Enviar el trazado */
function GuardarTrazado(){
	
	
	var wtxtemail = document.getElementById("txtemailenviar").value;
	var wtxtfirma = document.getElementById("txtfirmanombre").value;
	
	
	
	
	if(wtxtemail == '' || wtxtfirma == '' )
	{
		alert("Por favor rellene los campos obligatorios");
		
		obj = document.getElementById('txtfirmanombre');
		obj.style.backgroundColor = (obj.style.backgroundColor == 'rgb(204, 204, 204)') ? 'transparent' : '#FFFF00';
		
		obj = document.getElementById('txtemailenviar');
		obj.style.backgroundColor = (obj.style.backgroundColor == 'rgb(204, 204, 204)') ? 'transparent' : '#FFFF00';
		
	}
	else
	{
		
		imagen.value=document.getElementById(idCanvas).toDataURL('image/png');

		document.forms[idForm].submit();

	}
	
}
</script>
