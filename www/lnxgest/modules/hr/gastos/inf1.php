<?php
if($_POST["txtfechadesde"] == '')
{
   $xtemp = date("Y");
   $lblfechadesde = "01/01/".$xtemp;
}
else
{
    $lblfechadesde = $_POST["txtfechadesde"];
}


if($_POST["txtfechahasta"] == '')
{
   $lblfechahasta = date("d/m/Y");
}
else
{
    $lblfechahasta = $_POST["txtfechahasta"];
}


?>
<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script type="text/javascript">
  $().ready(function() {

$.datepicker.regional['es'] =
  {
        closeText: 'Cerrar',
        prevText: 'Previo',
        nextText: 'Próximo',

  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0,
  initStatus: 'Selecciona la fecha', isRTL: false
  };

  $.datepicker.setDefaults($.datepicker.regional['es']);

        $("#txtfechadesde").datepicker({
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                onSelect: function(dateText, inst) {
                $("#txtfechadesde_value").val(dateText);
                }
        });

         $("#txtfechahasta").datepicker({
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                onSelect: function(dateText, inst) {
                $("#txtfechahasta_value").val(dateText);
                }
        });
});
</script>
<form name="frmbuscar" method="POST" action="index.php?module=hr&section=gastos&inf=1" autocomplete="off">


<div class="row">
   <div class="col-sm-2">
   Buscar
   </div>
   <div class="col-sm-2">
   Desde Fecha</br>
   <input type="text" id="txtfechadesde" name="txtfechadesde" value="<?php echo $lblfechadesde; ?>" maxlenght="10"/>
   </div>
   <div class="col">
   Hasta Fecha</br>
   <input type="text" id="txtfechahasta" name="txtfechahasta" value="<?php echo $lblfechahasta; ?>" maxlenght="10"/>
   </div>
</div>

<div align="center" class="rectangulobtnsguardar" >

        <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-search fa-lg"></i> Buscar
        </button>
</div>



</form>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th>Vehiculo</th>
<th>Kilometros</th>
<th colspan="2">Gastos</th>
</tr>

<?php
$xfecha = explode("/", $lblfechadesde);
$sqlfdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$xfecha = explode("/", $lblfechahasta);
$sqlfhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$cnssql= $mysqli->query("select * from ".$prefixsql."flota order by vehiculo");
while($col = mysqli_fetch_array($cnssql))
{
	$sumakmsviajes = '0';

	$sqlaux = $mysqli->query("select sum(kms) as contador from ".$prefixsql."viajes where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and idflota = '".$col["id"]."' ");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sumakmsviajes = $rowaux["contador"];



	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td>'.$col["vehiculo"].'</td>';
	echo '<td>'.$sumakmsviajes.'</td>';
	echo '<td class="maintitle">Gasto</td>';
	echo '<td class="maintitle">Importe</td>';
	echo '</tr>';

	$sumatotalvehiculo = '0';
	$cnssql_gastos= $mysqli->query("select * from ".$prefixsql."gastos_tipo order by tipogasto");
	while($col_gastos = mysqli_fetch_array($cnssql_gastos))
	{
		$sumaimporte = '0';

		//sumamos los gastos asociados al vehiculo
		$sqlaux = $mysqli->query("select sum(importe) as contador from ".$prefixsql."viajes_gastos where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and idflota = '".$col["id"]."' and idtipogasto = '".$col_gastos["id"]."'");
        	$rowaux = mysqli_fetch_assoc($sqlaux);
	        $sumaimporte = $rowaux["contador"];

		$sumatotalvehiculo = $sumatotalvehiculo + $sumaimporte;

		$sumaimportef = number_format($sumaimporte,2,".",",");

if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td colspan="2"></td>';
	echo '<td>'.$col_gastos["tipogasto"].'</td>';
	echo '<td align="right">'.$sumaimportef.'</td>';
	echo '</tr>';

	}


	//$costeporkm = $sumakmsviajes / $sumatotalvehiculo;
	$costeporkm = $sumatotalvehiculo / $sumakmsviajes;
	$costeporkm = number_format($costeporkm,2,".",",");


if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


$sumatotalvehiculo = number_format($sumatotalvehiculo,2,".",",");


        echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
        echo '<td class="maintitle">Gasto medio '.$costeporkm.' Eur/KM</td>';
	echo '<td class="maintitle" colspan="2" align="right">Totales</td>';
        echo '<td class="maintitle" align="right">'.$sumatotalvehiculo.'</td>';
        echo '</tr>';




}

?>
</table>
</div>
