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
   $xtemp = date("Y");
   $lblfechahasta = "31/12/".$xtemp;
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
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
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

<form name="frmbuscar" method="POST" action="index.php?module=userpanel&section=rrhh" autocomplete="off">


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
<p></p>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th>Fecha</th>
<th>Empresa</th>
<th>Descripcion</th>
<th>Download</th>

</tr>

<?php
$xfecha = explode("/", $lblfechadesde);
$sqlfdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$xfecha = explode("/", $lblfechahasta);
$sqlfhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


$cnssql= $mysqli->query("select * from ".$prefixsql."hr_nom where idasignado = '".$_COOKIE["lnxuserid"]."' and (fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."') order by fecha desc");
while($col = mysqli_fetch_array($cnssql))
{

if($col["tipo"] == '1')
{
   $sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' "); 
   $rowaux = mysqli_fetch_assoc($sqlaux);
   $lbl_empresa = $rowaux["razonsocial"];
}

if($col["tipo"] == '2')
{
   $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idempresa"]."' ");
   $rowaux = mysqli_fetch_assoc($sqlaux);
   $lbl_empresa = $rowaux["razonsocial"];
}

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$col["id"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_idfichero = $rowaux["idfichero"];


$xfecha = explode("-", $col["fecha"]);

$lblfecha = $xfecha[2]."/".$xfecha[1]."/". $xfecha[0];




if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td>'.$lblfecha.'</td>';
echo '<td>'.$lbl_empresa.'</td>';
echo '<td>'.$col["descripcion"].'</td>';
echo '<td>';

if($lbl_idfichero > 0)
{
 echo '<a href="modules/ficheros/download.php?id='.$lbl_idfichero.'" class="btnedit" >Download</a>';
}

echo '</td>';
echo '<tr>';


}

?>

</table>
</div>

