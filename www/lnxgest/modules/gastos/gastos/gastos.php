<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="core/com/js_terceros_cli.js"></script>
<script language="javascript">

$().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	
	$("#dpkfdesde").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfdesde_value").val(dateText);
		}
    });
    
	$("#dpkfhasta").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfhasta_value").val(dateText);
		}
	});



});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/xetames/av/ajax/ajx_empresa-serie.php", { elegido: elegido }, function(data){
            $("#lstseries").html(data);
            });            
        });
   })
});
</script>

<?php
//Verificamos si esta configurada la opcion de aprobar los gastos
$sqlfichero = $mysqli->query("select * from ".$prefixsql."gastos_cfg where opcion = 'APROBAR'"); 
$row = mysqli_fetch_assoc($sqlfichero);
$cfg_aprobar = $row["valor"];


//Obtenemos la empresa por defecto del usuario según la tienda asignada por defecto
        
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"]; 


if($_POST["hcontrol"] == "busca")
{
    $dbidempresa = $_POST["lstempresas"];
    $flstseries = $_POST["lstseries"];
    $idserie = $flstseries;
}

$fchkuser = $_POST["chkuser"];




$fechahoy = date("d/m/Y");


    
if($_POST["dpkfdesde"] == '')
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
    
        $db_fdesde = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];
        $db_fhasta = $xtemp[2]."-".$xtemp[1]."-".$numeromaxmes;
    }

    if($_COOKIE["lnxuserset_viewlists"] == "Y")
    {
        $xtemp = explode("/", $fechahoy);
        
        $db_fdesde = $xtemp[2]."-01-01";
        $db_fhasta = $xtemp[2]."-12-31";
        $finicio = "01/01/".$xtemp[2];
        $ffin = "31/12/".$xtemp[2];
    }
    

    $selchk_realizados = ' checked=""';
    $flstuser = $_COOKIE["lnxuserid"];

}
else 
{
    $finicio = $_POST["dpkfdesde"];
    $ffin = $_POST["dpkfhasta"];

    $xtemp = explode("/", $finicio);
    $db_fdesde = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];

    $xtemp = explode("/", $ffin);
    $db_fhasta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];

    $flstuser = $_POST["lstuser"];
}

?>
<form name="frmlistado" method="POST" action="index.php?module=gastos&section=gastos">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
</div>
<input type="hidden" name="hcontrol" value="busca"/>

<div class="tblbuscar">
<div class="row">
<div class="col-sm-2">
    
</div>
<div class="col-sm-2">
    Desde</br>
    <input type="text" value="<?php echo $finicio; ?>" style="width: 100px;" name="dpkfdesde" id="dpkfdesde" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
<div class="col-sm-2">
    Hasta</br>
    <input type="text" value="<?php echo $ffin; ?>" style="width: 100px;" name="dpkfhasta" id="dpkfhasta" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
</div>



<div class="row">
    <div class="col-sm-2" align="left">
         Empresa
    </div>
    <div class="col" align="left">
         <?php
        $cnsempresas= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	echo '<select id="lstempresas" name="lstempresas" class="campoencoger">';
	while($colempresa = mysqli_fetch_array($cnsempresas))
	{
            if($colempresa["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$colempresa["id"].'" '.$seleccionado.'>'.$colempresa["razonsocial"].'</option>';
        }
        echo '</select>';
                
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
         Serie
    </div>
    <div class="col" align="left">
<?php
echo '<select id="lstseries" name="lstseries" style="width: 100%;">';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'V' and idempresa = '".$dbidempresa."' ");
    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
        if($flstseries > 0)
        {
            if($columna["id"] == $flstseries){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        }
        else 
        {
            if($columna["dft"] == "1"){$idserie = $columna["id"]; $seleccionado = ' selected=""';}else{$seleccionado = '';}
            
        }
        

        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["serie"].'</option>'; 
    }
	echo '</select>';
	?>  
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
<?php
if($fchkuser == "YES")
{
    $seleccionado = ' checked=""';
    $sql_usuario = " and iduser = '".$_POST["lstuser"]."' ";
}
else
{
    $seleccionado = '';
    $sql_usuario = "";
}
echo '<label><input type="checkbox" value="YES" '.$seleccionado.' name="chkuser" /> Usuario</label>';
?>
    </div>
    <div class="col" align="left">
    <select name="lstuser" style="width: 100%;">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $flstuser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}
?>
    </select>
    </div>
</div>



</div>
</form>


<p><a href="index.php?module=gastos&section=gastos&action=new" class="btnedit">Nuevo gasto</a></p>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
    <th width="80"></th>
    <th width="100">Serie</th>
<?php
if($cfg_aprobar == "YES")
{
    echo '<th width="30"></th>';
}
?>
    <th>Codigo</th>
    <th>Fecha</th>
    <th>Usuario</th>
    <th>Tipo</th>
    <th width="150">Descripcion</th>
    <th>Importe</th>
    <th width="80"></th>
</tr>
<?php
//codigo de colores
$cnsmescolor = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$idserie."'");
$rowcolor = mysqli_fetch_assoc($cnsmescolor);
$dbcolormes1 = $rowcolor["colormes1"];
$dbcolormes2 = $rowcolor["colormes2"];
$dbcolormes3 = $rowcolor["colormes3"];
$dbcolormes4 = $rowcolor["colormes4"];
$dbcolormes5 = $rowcolor["colormes5"];
$dbcolormes6 = $rowcolor["colormes6"];
$dbcolormes7 = $rowcolor["colormes7"];
$dbcolormes8 = $rowcolor["colormes8"];
$dbcolormes9 = $rowcolor["colormes9"];
$dbcolormes10 = $rowcolor["colormes10"];
$dbcolormes11 = $rowcolor["colormes11"];
$dbcolormes12 = $rowcolor["colormes12"];


$sqlcalendario = "select * from ".$prefixsql."gastos where idserie = '".$idserie."' and (fecha >= '".$db_fdesde."' and fecha <= '".$db_fhasta."') ".$sql_usuario." order by fecha desc";
$cnssql= $mysqli->query($sqlcalendario);	
while($col = mysqli_fetch_array($cnssql))
{
    $colorfecha = explode("-", $col["fecha"]);
	if($colorfecha[1] == 1 ){$colormes = $dbcolormes1;}
	if($colorfecha[1] == 2 ){$colormes = $dbcolormes2;}
	if($colorfecha[1] == 3 ){$colormes = $dbcolormes3;}
	if($colorfecha[1] == 4 ){$colormes = $dbcolormes4;}
	if($colorfecha[1] == 5 ){$colormes = $dbcolormes5;}
	if($colorfecha[1] == 6 ){$colormes = $dbcolormes6;}
	if($colorfecha[1] == 7 ){$colormes = $dbcolormes7;}
	if($colorfecha[1] == 8 ){$colormes = $dbcolormes8;}
	if($colorfecha[1] == 9 ){$colormes = $dbcolormes9;}
	if($colorfecha[1] == 10 ){$colormes = $dbcolormes10;}
	if($colorfecha[1] == 11 ){$colormes = $dbcolormes11;}
    if($colorfecha[1] == 12 ){$colormes = $dbcolormes12;}
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$col["iduser"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_usuario = $rowaux["display"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."gastos_tipo where id = '".$col["idtipogasto"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_tipogasto = $rowaux["tipogasto"];

    $xtemp = explode("-", $col["fecha"]);
    $lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

    if($col["aprobado"] == "-1"){$lbl_aprobado = '<i style="color: red;" class="hidephonview fa fa-times-circle fa-lg" title="Rechazado" alt="Rechazado"></i>';}
	if($col["aprobado"] == "0"){$lbl_aprobado = '';}
	if($col["aprobado"] == "1"){$lbl_aprobado = '<i style="color: green;" class="hidephonview fa fa-check-circle fa-lg" title="Aprobado" alt="Aprobado"></i>';}

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}  

    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=gastos&section=gastos&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$lbl_serie.'</td>';
    if($cfg_aprobar == "YES")
    {
        echo '<td>'.$lbl_aprobado.'</td>';
    }
    echo '<td>'.$col["codigo"].'</td>';
    echo '<td>'.$lbl_fecha.'</td>';
    echo '<td>'.$lbl_usuario.'</td>';
    echo '<td>'.$lbl_tipogasto.'</td>';
    echo '<td>'.$col["descripcion"].'</td>';
    echo '<td>'.$col["importe"].'</td>';
    echo '<td align="right"><a href="index.php?module=gastos&section=gastos&action=del&id='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';
    echo '</tr>';
    
}

?>
</table></div>

