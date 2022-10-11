

<?php				   
include("modules/lnxit/tickets/tabs.php");



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_seguimiento where id = '".$_GET["idseguimiento"]."' ");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbiduser = $row['iduser'];
$dbfecha = $row['fecha'];
$dbseguimiento = $row['seguimiento'];
$dbcomputa = $row['computa'];

$dbtiempodedicado = $row["tiempo"];
$thora = substr($dbtiempodedicado , 0, 2);
$tminutos = substr($dbtiempodedicado , 3, 2);


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tickets where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$idtipo = $row['idtipo'];
$dbidmant = $row["idmant"];
if ($dbidmant > '0'){$coloractivo = "#5882FA";}else{$coloractivo = "#FFFFFF";}

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tipos where id = '".$idtipo."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$tipoticket = $row['tipo'];

?>

<form name="form1" action="index.php?module=lnxit&section=seguimiento&action=save" method="post">


<input type="hidden" name="haccion" value="update">
<?php
echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">';
echo '<input type="hidden" name="hidseguimiento" value="'.$_GET["idseguimiento"].'">';
?>

<div class="row">
  <div class="col maintitle" align="left">
    Editando seguimiento
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Ticket
  </div>
  <div class="col" align="left">
    <h3><?php echo $tipoticket.' '.$_GET["id"]; ?></h3>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Fecha
  </div>
  <div class="col" align="left">
    <?php echo $dbfecha; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Usuario
  </div>
  <div class="col" align="left">
    <select name="lstusuario">
		
	<?php
	$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users order by display");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($dbiduser == $columna["id"])
		{echo '<option value="'.$columna["id"].'" selected="">'.$columna["display"].'</option>';}
		else
		{echo '<option value="'.$columna["id"].'">'.$columna["display"].'</option>';}
		
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Tiempo dedicado
  </div>
  <div class="col" align="left">
    <select name="slthoras"/>
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
<select name="sltminutos"/>
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

<?php
if ($dbcomputa == '1'){$marcado = ' checked=""';}else{$marcado = '';}
echo ' <input type="checkbox" value="1" name="chkmantenimiento" '.$marcado.'/>';
?>
 Computa en mantenimiento
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Trabajo realizado
  </div>
  <div class="col" align="left">
    <textarea rows="4" cols="50" name="txtseguimiento" style="width: 100%;"><?php echo $dbseguimiento; ?></textarea>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=tickets&subsection=list">Cancelar</a>

</div>

</form>

<?php
include("modules/lnxit/seguimiento/seguimiento.php");
?>