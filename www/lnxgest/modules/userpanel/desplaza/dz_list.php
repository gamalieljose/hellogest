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
<form name="frmbuscar" method="POST" action="index.php?module=userpanel&section=dz" autocomplete="off">


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

<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=userpanel&section=dz&action=new">Nuevo desplazamiento</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td> </td>
<td>Fecha</td>
<td>usuario</td>
<td>Vehiculo</td>
<td>Tercero</td>
<td>Desplazamiento</td>
<td>KMS</td>
</tr>



<?php
$xfecha = explode("/", $lblfechadesde);
$sqlfdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$xfecha = explode("/", $lblfechahasta);
$sqlfhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."viajes where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and iduser = '".$_COOKIE["lnxuserid"]."' order by fecha desc";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	

		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td width="60" >
	<a class="btnedit" href="index.php?module=userpanel&section=dz&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td width="100">'.$cat["fecha"].'</td>';
	
	
	$cnsaux= $mysqli->query("SELECT id, display FROM ".$prefixsql."users where id = '".$cat["iduser"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbusuario = $rowaux["display"];
	
	echo '<td>'.$dbusuario.'</td>';
	$cnsaux= $mysqli->query("SELECT * FROM ".$prefixsql."flota where id = '".$cat["idflota"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbvehiculo = $rowaux["vehiculo"];

	echo '<td>'.$dbvehiculo.'</td>';

	$cnsaux = $mysqli->query("SELECT id, razonsocial FROM ".$prefixsql."terceros where id = '".$cat["idtercero"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$nombretercero = $rowaux["razonsocial"];


	echo '<td>'.$nombretercero.'</td>';

	echo '<td>'.$cat["desplazamiento"].'</td>';
	echo '<td>'.$cat["kms"].'</td>';
	echo '<tr>';
	
}
?>

</table>

<p></p>

<?php
$sqlaux = $mysqli->query("SELECT sum(kms) as contador FROM ".$prefixsql."viajes where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and iduser = '".$_COOKIE["lnxuserid"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$kmsrecorridos = $rowaux["contador"];

?>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th>Vehiculo</th>
<th>KMS</th>
</tr>

<?php
$cnssql = $mysqli->query("SELECT DISTINCT(idflota) FROM ".$prefixsql."viajes where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and iduser = '".$_COOKIE["lnxuserid"]."' ");
while($col = mysqli_fetch_array($cnssql))
{

$sqlaux = $mysqli->query("SELECT sum(kms) as contador FROM ".$prefixsql."viajes where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' and iduser = '".$_COOKIE["lnxuserid"]."' and idflota = '".$col["idflota"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$kmsflota = $rowaux["contador"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."flota where id = '".$col["idflota"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$nombrevehiculo = $rowaux["vehiculo"];




  if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
   echo '<td>'.$nombrevehiculo.'</td>';
   echo '<td>'.$kmsflota.'</td>';
   echo '</tr>';


}

   echo '<tr class="maintitle">';
   echo '<td>Total Kms Recorridos</td>';
   echo '<td>'.$kmsrecorridos.'</td>';
   echo '</tr>';

?>

</table>
</div>

