<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">

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

<script src="modules/gastos/ajax/ajx_series-viajes.js"></script> 

<?php


//Obtenemos la empresa por defecto del usuario según la tienda asignada por defecto
        
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"]; 

$flstuser = $_COOKIE["lnxuserid"];

if($_POST["hcontrol"] == "busca")
{
    $dbidempresa = $_POST["lstempresas"];
    $flstseries = $_POST["lstseries"];
    $idserie = $flstseries;

    $flstuser = $_POST["lstuser"];
}

$fchkuser = $_POST["chkuser"];


if($fchktercero == "1")
{
    $selchk_tercero = ' checked=""';
    $sqltercero =  "and idtercero = '".$flsttercero."' ";
}
else
{
    $selchk_tercero = '';
    $sqltercero = "";
}



$fechahoy = date("d/m/Y");

$fchkrealizados = $_POST["chkborrador"];
    if($fchkrealizados == "1"){$selchk_realizados = ' checked=""'; $sql_borradores = " (idserie = '".$idserie."' and codigoint = '0') or ";}else{$selchk_realizados = ''; $sql_borradores = "";}

    
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
        
        $db_fdesde = $xtemp[2]."-01-01 00:00:00";
        $db_fhasta = $xtemp[2]."-12-31 23:59:59";
        $finicio = "01/01/".$xtemp[2];
        $ffin = "31/12/".$xtemp[2];
    }
    

    $selchk_realizados = ' checked=""';
    

}
else 
{
    $finicio = $_POST["dpkfdesde"];
    $ffin = $_POST["dpkfhasta"];

    $xtemp = explode("/", $finicio);
    $db_fdesde = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." 00:00:00";

    $xtemp = explode("/", $ffin);
    $db_fhasta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." 23:59:59";
}

?>
<form name="frmlistado" method="POST" action="index.php?module=gastos&section=viajes">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
</div>
<input type="hidden" name="hcontrol" value="busca"/>

<div class="tblbuscar">
<div class="row">
<div class="col-sm-2">
    <label><input type="checkbox" name="chkborrador" value="1" <?php echo $selchk_realizados; ?> /> Motrar borradores </label> 
</div>
<div class="col-sm-2" style="max-width: 130px;">
    Desde</br>
    <input type="text" value="<?php echo $finicio; ?>" style="width: 100px;" name="dpkfdesde" id="dpkfdesde" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
<div class="col-sm-2" style="max-width: 130px;">
    Hasta</br>
    <input type="text" value="<?php echo $ffin; ?>" style="width: 100px;" name="dpkfhasta" id="dpkfhasta" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
<div class="col">
    <div class="campoencoger" align="center" >
    <i>Se busca en el rango de fechas del <b>inicio del viaje</b></i>
    </div>
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
<?php
if($_POST["dpkfdesde"] == ''){$sql_borradores = " (idserie = '".$idserie."' and codigoint = '0') or ";}
?>
</div>
</form>


<p>
<?php

echo '<a href="index.php?module=gastos&section=viajes&action=new" class="btnedit">Nuevo viaje</a>';

?>
</p>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
    <th width="80"></th>
    <th width="100">Serie</th>
    <th>Codigo</th>
    <th>Fecha ida</th>
    <th>Usuario</th>
    <th>Fecha vuelta</th>
    <th>Descripción</th>
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


$sqlviajes = "select * from ".$prefixsql."viajes where ".$sql_borradores." (idserie = '".$idserie."' and (fecha >= '".$db_fdesde."' and fecha <= '".$db_fhasta."') and codigoint > '0') ".$sql_usuario." order by fecha desc";
$cnssql= $mysqli->query($sqlviajes);	
while($col = mysqli_fetch_array($cnssql))
{
    $colorfecha = explode("-", $col["fecha"]);
	if($colorfecha[1] == 1 ){$colortrimestre = $dbcolormes1;}
	if($colorfecha[1] == 2 ){$colortrimestre = $dbcolormes2;}
	if($colorfecha[1] == 3 ){$colortrimestre = $dbcolormes3;}
	if($colorfecha[1] == 4 ){$colortrimestre = $dbcolormes4;}
	if($colorfecha[1] == 5 ){$colortrimestre = $dbcolormes5;}
	if($colorfecha[1] == 6 ){$colortrimestre = $dbcolormes6;}
	if($colorfecha[1] == 7 ){$colortrimestre = $dbcolormes7;}
	if($colorfecha[1] == 8 ){$colortrimestre = $dbcolormes8;}
	if($colorfecha[1] == 9 ){$colortrimestre = $dbcolormes9;}
	if($colorfecha[1] == 10 ){$colortrimestre = $dbcolormes10;}
	if($colorfecha[1] == 11 ){$colortrimestre = $dbcolormes11;}
    if($colorfecha[1] == 12 ){$colortrimestre = $dbcolormes12;}
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];

    $xtemp = explode(" ", $col["fecha"]);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fecha = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp[1];

    $xtemp = explode(" ", $col["fechavuelta"]);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fechavuelta = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp[1];

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    if($col["editav"] == 1)
    {$av_aviso = ' bgcolor="#FFFF00" ';}else{$av_aviso = '';}
      

    $sqlaux = $mysqli->query("select id, display from ".$prefixsql."users where id = '".$col["iduser"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_usuario = $rowaux["display"];

    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td bgcolor="'.$colortrimestre.'"><a href="index.php?module=gastos&section=viajes&action=view&iddoc='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td '.$av_aviso.'>'.$lbl_serie.'</td>';
    echo '<td '.$av_aviso.'>'.$col["codigo"].'</td>';
    echo '<td '.$av_aviso.'>'.$lbl_fecha.'</td>';
    echo '<td '.$av_aviso.'>'.$lbl_usuario.'</td>';
    echo '<td '.$av_aviso.'>'.$lbl_fechavuelta.'</td>';
    echo '<td '.$av_aviso.'>'.$col["descripcion"].'</td>';
    echo '</tr>';
    
}

?>
</table></div>
