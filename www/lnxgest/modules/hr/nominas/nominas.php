<?php
if($_POST["txtfechadesde"] == '')
{
   $xtemp = date("Y");
   $lblfechadesde = "01/01/".$xtemp;
   $chk_empleado = "";
   $idempleado = $_COOKIE["lnxuserid"];
}
else
{
    $lblfechadesde = $_POST["txtfechadesde"];

    if($_POST["chkempleado"] == "1")
    {
        $chk_empleado = ' checked=""';
        $idempleado = $_POST["lstempleado"];
    }
    else 
    {
        $chk_empleado = '';
        $idempleado = $_COOKIE["lnxuserid"];
    }
}


if($_POST["txtfechahasta"] == '')
{
   $lblfechahasta = date("d/m/Y");
}
else
{
    $lblfechahasta = $_POST["txtfechahasta"];
}

if($_POST["chkempleado"] == "1" && $idempleado > 0)
{
        $sql_empleado = " and idasignado = '".$idempleado."' ";
}
else 
{
        $sql_empleado = "";
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
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado'],
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
<form name="frmbuscar" method="POST" action="index.php?module=hr&section=nominas" autocomplete="off">

<div class="tblbuscar">

<div class="row">
   <div class="col-sm-2">
   Buscar
   </div>
   <div class="col-sm-2">
   Desde Fecha</br>
   <input type="text" id="txtfechadesde" name="txtfechadesde" value="<?php echo $lblfechadesde; ?>" maxlenght="10" style="width: 100%;"/>
   </div>
   <div class="col-sm-2">
   Hasta Fecha</br>
   <input type="text" id="txtfechahasta" name="txtfechahasta" value="<?php echo $lblfechahasta; ?>" maxlenght="10" style="width: 100%;"/>
   </div>
</div>

<div class="row">
   <div class="col-sm-2">
   <label><input type="checkbox" value="1" name="chkempleado" <?php echo $chk_empleado; ?> /> Empleado</label>
   </div>
   <div class="col">
   <select name="lstempleado" style="width: 100%;">
   <?php

$cnssql= $mysqli->query("select * from ".$prefixsql."users order by display");	
while($col = mysqli_fetch_array($cnssql))
{
    if($idempleado == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}

   ?>
   </select>
   </div>
</div>

</div>

<div align="center" class="rectangulobtnsguardar" >

        <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-search fa-lg"></i> Buscar
        </button>
</div>



</form>

<p>
<a href="index.php?module=hr&section=nominas&action=new" class="btnedit">Nueva nomina</a>
</p>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th width="100">Fecha</th>
<th width="50">Tipo</th>
<th>Empresa / Tercero</th>
<th>Empleado</th>
<th>Descripcion</th>
<th width="80"> </th>
</tr>

<?php

$xfecha = explode("/", $lblfechadesde);
$sqlfdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

$xfecha = explode("/", $lblfechahasta);
$sqlfhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


$cnssql = $mysqli->query("select * from ".$prefixsql."hr_nom where fecha >= '".$sqlfdesde."' and fecha <= '".$sqlfhasta."' ".$sql_empleado." order by fecha desc");
while($col = mysqli_fetch_array($cnssql))
{


if($col["tipo"] == "1")
{
$lbl_tipo = "INT";
$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$col["idasignado"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_usuario = $rowaux["display"];
}

if($col["tipo"] == "2")
{
$lbl_tipo = "EXT";
$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_usuario = $rowaux["nombre"];


}

$xfecha = explode("-", $col["fecha"]);
$lblfecha = $xfecha[2]."/".$xfecha[1]."/". $xfecha[0];

if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}

echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><a href="index.php?module=hr&section=nominas&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
echo '<td>'.$lblfecha.'</td>';
echo '<td>'.$lbl_tipo.'</td>';
echo '<td>'.$lbl_empresa.'</td>';
echo '<td>'.$lbl_usuario.'</td>';
echo '<td>'.$col["descripcion"].'</td>';
echo '<td align="right"><a href="index.php?module=hr&section=nominas&action=del&id='.$col["id"].'" class="btnenlacecancel">Eliminar</a></td>';
echo '</tr>';

}

?>

</table>
</div>
