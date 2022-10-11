<link rel="StyleSheet" href="../modules/partes/ws/movil.css" media="all" type="text/css">
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

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo parte de trabajo</title>
<style type="text/css">
.centrador{
  box-sizing: border-box;
  display: block;
  width: 100%;
  margin: 0 0 auto;
  margin-top: 15px;
  text-align: center;
}

</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body bgcolor="#E6E6FA">
 
 <div align="center" >
 <a href="index.php?module=partes" class="btnprincipal">Atras</a>
 
 <form id='formCanvas' method='post' action='index.php?module=partes&section=save' ENCTYPE='multipart/form-data'>
 <input type="hidden" name="haccion" value="new"/>
 <table width="100%">
 <tr class="maintitle"><td colspan="2">Nuevo parte de trabajo</td></tr>
 <tr>
 <td>Plantilla</td>
 <td>
	<select name="lstdocprint">
		<option value="lnxgest.php" selected="">Lnxgest</option>
		<option value="zetra.php" >Zetra</option>
	</select>
 </td>
 </tr>
 <tr>
	<td>Serie</td>
	<td>
	<select name="lstserie">
	 <?php
	 
	 $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'PT' and cv = '2' and activo = '1' order by serie");

		while($colaux = mysqli_fetch_array($ConsultaMySql))
		{
			if ($colaux["dft"] == '1' ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["serie"].'</option>';
			
		}

	 ?>
	</select>
	</td>
 </tr> 
 <tr><td>Cliente</td><td>
 
 <select name="lstcliente" onChange="MM_jumpMenu('parent',this,0)">
 <?php
	 if ($_GET["idtercero"] == '' || $_GET["idtercero"] == '0')
		{$seleccionado = 'selected=""';}else{$seleccionado = '';}
		echo '<option value="#" '.$seleccionado.'>-Sin especificar-</option>';
		
 $ConsultaMySql= $mysqli->query("SELECT id, razonsocial, codcli from ".$prefixsql."terceros where codcli > '0' order by razonsocial");

	while($colaux = mysqli_fetch_array($ConsultaMySql))
	{
		if ($_GET["idtercero"] == $colaux["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
		echo '<option value="index.php?module=partes&section=new&idtercero='.$colaux["id"].'" '.$seleccionado.'>'.$colaux["razonsocial"].'</option>';
		
	}

 ?>
 </select>
 
 <?php echo '<input type="hidden" name="hidtercero" value="'.$_GET["idtercero"].'"/>'; ?>
 </td></tr>
  <?php   if ($_GET["obliga"] == "on") {$avisoobligado = ' bgcolor="#fffc33"';}else{$avisoobligado = '';}  ?>
  <tr <?php echo $avisoobligado; ?> >
	<td>e-mail del cliente </td>
	<td>
	<?php
		$sqltercero = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$_GET["idtercero"]."'");
		$row = mysqli_fetch_assoc($sqltercero);
		$emailtercero = $row['email'];
	
	echo '<input type="email" name="txtemail" value="'.$emailtercero.'" required="" autocomplete="off"></td>';
	?>
	
</tr>

<tr>
	<td>Tecnico</td>
	<td>
	<select name="lsttecnico">
	 <?php
	 
	 $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' order by display");

		while($colaux = mysqli_fetch_array($ConsultaMySql))
		{
			if ($_COOKIE["lnxuserid"] == $colaux["id"] ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["display"].'</option>';
			
		}

	 ?>
	</select>
	</td>
 </tr>
<?php   if ($_GET["obliga"] == "on") {$avisoobligado = ' bgcolor="#fffc33"';}else{$avisoobligado = '';}  ?>
<tr <?php echo $avisoobligado; ?> >
	<td>Fecha </td>
	<td>
	<?php
	$fechahoy = date('d/m/Y');
	$fechahora = date('H');
	$fechahoramin = date('H:i');
	
	$fecharedondeado = round_time($fechahoramin,5);
	$minutorendondo = explode(":", $fecharedondeado);
	$minutorendondo = $minutorendondo[1];
	
	echo '<input type="text" name="txtfecha" value="'.$fechahoy.'" required="">';
	
	?>
	
	
	
	</td>
</tr>
<tr>
	<td>Hora entrada</td>
 <td>
 <select name="inhh">
 <?php
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $fechahora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
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
	
	if($horaconcero == $minutorendondo){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 

 </select>m. 
 </td>
 
</tr>

<tr>
	<td>Hora salida</td>
 <td>
 <select name="outhh">
 <?php
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $fechahora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
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
	
	if($horaconcero == $minutorendondo){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 </select>m. 
 </td>
 
</tr>
<?php   if ($_GET["obliga"] == "on") {$avisoobligado = ' bgcolor="#fffc33"';}else{$avisoobligado = ' class="maintitle"';}  ?>
<tr <?php echo $avisoobligado; ?> >
<td colspan="2">Trabajo realizado</td></tr>
<tr><td colspan="2">
<textarea style="width: 100%;" name="txttrabajo" required=""></textarea>
 </td></tr>
 
<tr class="maintitle"><td colspan="2">Material</td></tr>
<tr><td colspan="2">
<textarea style="width: 100%;" name="txtmaterial" ></textarea>
 </td></tr>
 
<tr class="maintitle"><td colspan="2">&nbsp;</td></tr>
<tr>
	<td>Importe</td>
	<td><input type="text" value="0" name="txtimporte" />
</tr>
<tr><td>Pagado: </td>
<td>
<select name="lstpagado">
	<option value="0">NO</option>
	<option value="1">SI</option>
</select>
</td></tr>
<tr><td>Trabajo finalizado: </td>
<td>
<select name="lstfinalizado">
	<option value="0">NO</option>
	<option value="1">SI</option>
</select>
</td></tr>
 
 <tr class="maintitle"><td colspan="2">&nbsp;</td></tr>
 <?php   if ($_GET["obliga"] == "on") {$avisoobligado = ' bgcolor="#fffc33"';}else{$avisoobligado = ' ';}  ?>
<tr <?php echo $avisoobligado; ?> >
	<td>Nombre del que firma </td>
	<td><input type="text" name="txtfirma" autocomplete="off" required=""></td>
</tr>
 <tr>
	<td>NIF</td>
	<td><input type="text" name="txtfirmanif" autocomplete="off"></td>
</tr>
 </table>
 </div>
  
 
<div class='centrador'>
<p>
  <canvas id='canvas' width="300" height="150" style='border: 1px solid #CCC;'>
    
  </canvas>
</div>
<div class='centrador'>
<?php
	if ($_GET["idtercero"] > '0')
	{
	echo "<button type='button' class=\"btncancelar\" onclick='LimpiarTrazado()'>Borrar firma</button>
    <button type='button' class=\"btnenviar\" onclick='GuardarTrazado()'>Procesar parte</button>";
	}
	else
	{
		echo '<p><b>SELECCIONE UN CLIENTE</b></p>';
	}
?>
    <input type='hidden' name='imagen' id='imagen' />
  </form>
</div>
 

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
  imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
  document.forms[idForm].submit();
}
</script>
 
 

 
</body>
</html>