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
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."it_mant where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);

$dbid = $row["id"];
$dbref = $row["ref"];
$dbidtercero = $row["idtercero"];
$dbidtipo = $row["idtipo"];
$dbfinicio = $row["finicio"];
	$fano = substr($dbfinicio, 0, 4);  
	$fmes = substr($dbfinicio, 5, 2);  
	$fdia = substr($dbfinicio, 8, 2);  

	$cdbfinicio = $fdia.'/'.$fmes.'/'.$fano;

$dbffin = $row["ffin"];
	$fano = substr($dbffin, 0, 4);  
	$fmes = substr($dbffin, 5, 2);  
	$fdia = substr($dbffin, 8, 2);  

	$cdbffin = $fdia.'/'.$fmes.'/'.$fano;
	
$dbhcontratado = $row["hcontratado"];
	$thora = substr($dbhcontratado , 0, 2);
	$tminutos = substr($dbhcontratado , 3, 2);

$dbhrestantes = $row["hrestantes"];
$dbdescripcion = $row["descripcion"];
$dbactivo = $row["activo"];


echo '<p><a class="btncancel" href="index.php?module=lnxit&section=mant&action=del&id='.$_GET["id"].'" >Eliminar</a></p>';

?>


					   
<form name="form1" action="index.php?module=lnxit&section=mant&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hidactivo" value="'.$_GET["id"].'">'; ?>



<table>
<tr class="maintitle"><td colspan="2" align="center">Editando contrato de mantenimiento</td></tr>

<tr><td>
<?php
if ($dbactivo == '1'){echo '<input type="checkbox" checked="" name="chkactivo" value="1"/> ';}else{echo '<input type="checkbox" name="chkactivo" value="1"/> ';}


?> Activo</td></tr>

<tr><td>ref</td><td><?php echo '<input type="textbox" value="'.$dbref.'" name="txtref" required=""/>'; ?></td></tr>
<tr><td>Tercero asociado</td>
<td>
<select name="lsttercero">
<?php
if ($dbidtercero == '0'){echo '<option value="0" selected="">-Sin asignar-</option>';}else{echo '<option value="0" >-Sin asignar-</option>';}

	

$cnssql = "SELECT id, razonsocial FROM ".$prefixsql."terceros where codcli > '0' order by razonsocial";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if ($dbidtercero == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
}
?>
	
</select>
</td></tr>

<tr><td>Tipo Mantenimiento</td>
<td>
<select name="lsttipomant">

<?php
if ($dbidtipo == '0'){echo '<option value="0" selected="">-Sin asignar-</option>';}else{echo '<option value="0" >-Sin asignar-</option>';}

$cnssql = "SELECT * FROM ".$prefixsql."it_tipomant";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if ($dbidtipo == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["tipomant"].'</option>';
}
?>
	
</select>
</td></tr>


<tr><td>Inicio</td><td><?php echo '<input type="textbox" id="dpkfechainicio" value="'.$cdbfinicio.'" name="txtfinicio" required=""/>'; ?></td></tr>
<tr><td>Fin</td><td><?php echo '<input type="textbox" id="dpkfechafin" value="'.$cdbffin.'" name="txtffin"/>'; ?></td></tr>
<tr><tr><td>Horas contratadas</td><td>

<select name="slthchh"/>
<?php

if ($thora == "00" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="00" '.$seltiempo.'>00</option>';
if ($thora == "01" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="01" '.$seltiempo.'>01</option>';
if ($thora == "02" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="02" '.$seltiempo.'>02</option>';
if ($thora == "03" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="03" '.$seltiempo.'>03</option>';
if ($thora == "04" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="04" '.$seltiempo.'>04</option>';
if ($thora == "05" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="05" '.$seltiempo.'>05</option>';
if ($thora == "06" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="06" '.$seltiempo.'>06</option>';
if ($thora == "07" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="07" '.$seltiempo.'>07</option>';
if ($thora == "08" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="08" '.$seltiempo.'>08</option>';
if ($thora == "09" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="09" '.$seltiempo.'>09</option>';
if ($thora == "10" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="10" '.$seltiempo.'>10</option>';
if ($thora == "11" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="11" '.$seltiempo.'>11</option>';
if ($thora == "12" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="12" '.$seltiempo.'>12</option>';
if ($thora == "13" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="13" '.$seltiempo.'>13</option>';
if ($thora == "14" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="14" '.$seltiempo.'>14</option>';
if ($thora == "15" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="15" '.$seltiempo.'>15</option>';
if ($thora == "16" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="16" '.$seltiempo.'>16</option>';
if ($thora == "17" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="17" '.$seltiempo.'>17</option>';
if ($thora == "18" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="18" '.$seltiempo.'>18</option>';
if ($thora == "19" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="19" '.$seltiempo.'>19</option>';
if ($thora == "20" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="20" '.$seltiempo.'>20</option>';
if ($thora == "21" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="21" '.$seltiempo.'>21</option>';
if ($thora == "22" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="22" '.$seltiempo.'>22</option>';
if ($thora == "23" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="23" '.$seltiempo.'>23</option>';
?>
</select>
h 
<select name="slthcmm"/>
<?php
if ($tminutos == "00" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="00" '.$seltiempo.'>00</option>';
if ($tminutos == "05" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="05" '.$seltiempo.'>05</option>';
if ($tminutos == "10" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="10" '.$seltiempo.'>10</option>';
if ($tminutos == "15" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="15" '.$seltiempo.'>15</option>';
if ($tminutos == "20" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="20" '.$seltiempo.'>20</option>';
if ($tminutos == "25" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="25" '.$seltiempo.'>25</option>';
if ($tminutos == "30" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="30" '.$seltiempo.'>30</option>';
if ($tminutos == "35" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="35" '.$seltiempo.'>35</option>';
if ($tminutos == "40" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="40" '.$seltiempo.'>40</option>';
if ($tminutos == "45" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="45" '.$seltiempo.'>45</option>';
if ($tminutos == "50" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="50" '.$seltiempo.'>50</option>';
if ($tminutos == "55" ){$seltiempo = 'selected=""';}else{{$seltiempo = '';}}
	echo '<option value="55" '.$seltiempo.'>55</option>';
?>
</select>
m
</td></tr>
<tr><td>Horas restantes</td><td><?php echo $dbhrestantes; ?></td></tr>
<tr><td colspan="2">descripcion</td></tr>
<tr><td colspan="2"><textarea name="txtdescripcion"><?php echo $dbdescripcion; ?></textarea></td></tr>



<tr><td colspan="2" align="center">&nbsp; </td></tr>
<tr><td colspan="2" align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=mant">Cancelar</a>
</td></tr>
</table>
</div>
</form>