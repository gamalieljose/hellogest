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

<?php
$idtercero = $_GET["idtercero"];
$fechahoy = date("d/m/Y");

if($_POST["txtfechadesde"] == '' )
{


   if($_COOKIE["lnxuserset_viewlists"] == "M")
    {
        $xtemp = explode("/", $fechahoy);
        $xtemp[0] = "01";
        $finicio = $xtemp[0]."/".$xtemp[1]."/".$xtemp[2];
            $finicio_mes = $xtemp[1];
            $finicio_ano = $xtemp[2];
        $numeromaxmes = cal_days_in_month(CAL_GREGORIAN, $finicio_mes, $finicio_ano);
        $ffin = $numeromaxmes."/".$xtemp[1]."/".$xtemp[2];

        $sqlfdesde = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];
        $sqlfhasta = $xtemp[2]."-".$xtemp[1]."-".$numeromaxmes;
    }

    if($_COOKIE["lnxuserset_viewlists"] == "Y")
    {
        $xtemp = explode("/", $fechahoy);
        
        $sqlfdesde = $xtemp[2]."-01-01";
        $sqlfhasta = $xtemp[2]."-12-31";
        $finicio = "01/01/".$xtemp[2];
        $ffin = "31/12/".$xtemp[2];
    }



}
else
{
    $finicio = $_POST["txtfechadesde"];
    $ffin = $_POST["txtfechahasta"];

    $xfecha = explode("/", $finicio);
        $sqlfdesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];

        $xfecha = explode("/", $ffin);
        $sqlfhasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];
}




include("modules/terceros/botones.php");

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
echo '<p>Tercero: <b>'.$dbrazonsocial.'</b></p>';

echo '<form name="frmbuscahistorico" method="POST" action="index.php?module=terceros&section=historico&idtercero='.$idtercero.'" />';

?>

<div class="row">
<div class="col-sm-2">
	Fechas desde:
</div>
<div class="col-sm-2">
	<input type="text" id="txtfechadesde" name="txtfechadesde" value="<?php echo $finicio; ?>" required="" maxlength="10" style="width: 100%;"/>
</div>
<div class="col-sm-2">
	Fechas Hasta:
</div>
<div class="col-sm-2">
	<input type="text" id="txtfechahasta" name="txtfechahasta" value="<?php echo $ffin; ?>" required="" maxlength="10" style="width: 100%;"/>
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
<th width="80"> </th>
<th width="200">Fecha</th>
<th>Actividad</th>
</tr>
<?php

$cnsdicterhisto= $mysqli->query("SELECT * from ".$prefixsql."dic_historico_cfg");
while($dic = mysqli_fetch_array($cnsdicterhisto))
{
    $tabla = $dic["tabla"];
    $campo_id = $dic["campoid"];
    $campo_fecha = $dic["fecha"];
    $campo_codigo = $dic["codigo"];
    $campo_descripcion = $dic["descripcion"];
    $campo_tipo = $dic["tipo"];
    $campo_url = $dic["url"];


    $tabla = str_replace("[[PREFIXSQL]]", $prefixsql, $tabla);

    $arr_tablas[$tabla]["id"] = $campo_id;
    $arr_tablas[$tabla]["fecha"] =  $campo_fecha;
    $arr_tablas[$tabla]["codigo"] = $campo_codigo;
    $arr_tablas[$tabla]["descripcion"] = $campo_descripcion;
    $arr_tablas[$tabla]["tipo"] = $campo_tipo;
    $arr_tablas[$tabla]["url"] = $campo_url;
}
/*


$arr_tablas["fv"]["id"] = "id";
$arr_tablas["fv"]["fecha"] = "fecha";
$arr_tablas["fv"]["codigo"] = "codigo";
$arr_tablas["fv"]["descripcion"] = "Factura Venta";
$arr_tablas["fv"]["tipo"] = "FV";

$arr_tablas["fvr"]["id"] = "id";
$arr_tablas["fvr"]["fecha"] = "fecha";
$arr_tablas["fvr"]["codigo"] = "codigo";
$arr_tablas["fvr"]["descripcion"] = "Factura Venta Rectificativa";
$arr_tablas["fvr"]["tipo"] = "FVR";

$arr_tablas["ov"]["id"] = "id";
$arr_tablas["ov"]["fecha"] = "fecha";
$arr_tablas["ov"]["codigo"] = "codigo";
$arr_tablas["ov"]["descripcion"] = "Presupuesto Venta";
$arr_tablas["ov"]["tipo"] = "OV";

$arr_tablas["oc"]["id"] = "id";
$arr_tablas["oc"]["fecha"] = "fecha";
$arr_tablas["oc"]["codigo"] = "codigo";
$arr_tablas["oc"]["descripcion"] = "Presupuesto Compra";
$arr_tablas["oc"]["tipo"] = "OC";

$arr_tablas["pv"]["id"] = "id";
$arr_tablas["pv"]["fecha"] = "fecha";
$arr_tablas["pv"]["codigo"] = "codigo";
$arr_tablas["pv"]["descripcion"] = "Pedido Venta";
$arr_tablas["pv"]["tipo"] = "PV";

$arr_tablas["pc"]["id"] = "id";
$arr_tablas["pc"]["fecha"] = "fecha";
$arr_tablas["pc"]["codigo"] = "codigo";
$arr_tablas["pc"]["descripcion"] = "Pedido Compra";
$arr_tablas["pc"]["tipo"] = "PC";

$arr_tablas["av"]["id"] = "id";
$arr_tablas["av"]["fecha"] = "fecha";
$arr_tablas["av"]["codigo"] = "codigo";
$arr_tablas["av"]["descripcion"] = "Albaran Venta";
$arr_tablas["av"]["tipo"] = "AV";

$arr_tablas["ac"]["id"] = "id";
$arr_tablas["ac"]["fecha"] = "fecha";
$arr_tablas["ac"]["codigo"] = "codigo";
$arr_tablas["ac"]["descripcion"] = "Albaran Compra";
$arr_tablas["ac"]["tipo"] = "AC";

$arr_tablas["ita_activos"]["id"] = "id";
$arr_tablas["ita_activos"]["fecha"] = "falta";
$arr_tablas["ita_activos"]["codigo"] = "nombre";
$arr_tablas["ita_activos"]["descripcion"] = "Activo";
$arr_tablas["ita_activos"]["tipo"] = "ITA";

$arr_tablas["crm_seg"]["id"] = "id";
$arr_tablas["crm_seg"]["fecha"] = "fecha";
$arr_tablas["crm_seg"]["codigo"] = "LEFT(seguimiento, 30)";
$arr_tablas["crm_seg"]["descripcion"] = "CRM: ";
$arr_tablas["crm_seg"]["tipo"] = "CRM";

$arr_tablas["it_tickets"]["id"] = "id";
$arr_tablas["it_tickets"]["fecha"] = "fcreacion";
$arr_tablas["it_tickets"]["codigo"] = "id";
$arr_tablas["it_tickets"]["descripcion"] = "Ticket: ";
$arr_tablas["it_tickets"]["tipo"] = "ITT";

$arr_tablas["it_docum"]["id"] = "id";
$arr_tablas["it_docum"]["fecha"] = "fcreado";
$arr_tablas["it_docum"]["codigo"] = "titulo";
$arr_tablas["it_docum"]["descripcion"] = "Doc: ";
$arr_tablas["it_docum"]["tipo"] = "ITDOCUM";
*/

$lineas = 0;

foreach ($arr_tablas as $tabla=>$key) 
{

$campo_id = $arr_tablas[$tabla]["id"];
$campo_fecha = $arr_tablas[$tabla]["fecha"];
$campo_codigo = $arr_tablas[$tabla]["codigo"];
$campo_descripcion = $arr_tablas[$tabla]["descripcion"];
$campo_tipo = $arr_tablas[$tabla]["tipo"];

$lineas = $lineas +1;

if($lineas > 1)
{
    $sql_linea = $sql_linea." union all ";
}

$sql_linea = $sql_linea." select ".$campo_id." as id, ".$campo_fecha." as fecha, ".$campo_codigo." as codigo, '".$campo_descripcion." ' as lbltipo, '".$campo_tipo."' as tipo from ".$tabla." where (".$campo_fecha." >= '".$sqlfdesde."' and ".$campo_fecha." <= '".$sqlfhasta."') and idtercero = '".$idtercero."' ";


}

$sqlquery = $sql_linea." order by fecha desc";



$cnssql= $mysqli->query($sqlquery);	
while($col = mysqli_fetch_array($cnssql))
{
        
	/*	
	if($col["tipo"] == 'FV'){$enlaceactividad = "index.php?module=fv&section=main&action=view&id=".$col["id"];}
	if($col["tipo"] == 'FVR'){$enlaceactividad = "index.php?module=fvr&section=main&action=view&id=".$col["id"];}
	if($col["tipo"] == 'FC'){$enlaceactividad = "index.php?module=fc&section=main&action=view&id=".$col["id"];}
	if($col["tipo"] == 'ITA'){$enlaceactividad = "index.php?module=lnxit&section=activos&ss=activo&action=edit&id=".$col["id"];}
        if($col["tipo"] == 'ITT'){$enlaceactividad = "index.php?module=lnxit&section=tickets&action=edit&id=".$col["id"];}
        if($col["tipo"] == 'ITDOCUM'){$enlaceactividad = "index.php?module=lnxit&section=docum&action=view&id=".$col["id"];}
        if($col["tipo"] == 'CRM'){$enlaceactividad = "index.php?module=crm&section=seguimientos&action=edit&id=".$col["id"];}
    */
    $enlaceactividad = str_replace("[[id]]", $col["id"], $campo_url);
	
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

$xtemp = explode(" ", $col["fecha"]);

$xtemp2 = explode("-", $xtemp[0]);

if($xtemp[1] <> "" && $xtemp[1] <> "00:00:00")
{
    $lbl_tiempo = " ".$xtemp[1];
}
else
{
    $lbl_tiempo = "";
}


$lbl_fecha = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0];


	echo '<td><a href="'.$enlaceactividad.'" class="btnedit" />Ver</a></td>';
	echo '<td>'.$lbl_fecha.$lbl_tiempo.'</td>';
	echo '<td>'.$col["lbltipo"].' '.$col["codigo"].'</td>';
	echo '</tr>';
}
?>

</table>
</div>
