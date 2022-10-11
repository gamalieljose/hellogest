<script src="core/com/js_terceros_cli.js"></script>
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 
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

<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
<?php echo "$.post(\"modules/".$lnxinvoice."/ajax/".$lnxinvoice."_ajx_empresa-serie.php\", { elegido: elegido }, function(data){"; ?>
            $("#lstseries").html(data);
            });            
        });
   })
});
</script>


	<?php echo '<form name="form1" action="index.php?module='.$lnxinvoice.'" method="post">';
	
	if ($lnxinvoice == "ov"){$tipolnxinvoice = "O"; $cvlnxinvoice = "2"; $lnxnewdoclabel = "Nuevo Presupuesto"; $lnxdoclabel = "Presupuesto";}
	if ($lnxinvoice == "pv"){$tipolnxinvoice = "P"; $cvlnxinvoice = "2"; $lnxnewdoclabel = "Nuevo Pedido"; $lnxdoclabel = "Pedido";}
	if ($lnxinvoice == "av"){$tipolnxinvoice = "A"; $cvlnxinvoice = "2"; $lnxnewdoclabel = "Nuevo Albaran"; $lnxdoclabel = "Albaran";}
	if ($lnxinvoice == "fv"){$tipolnxinvoice = "F"; $cvlnxinvoice = "2"; $lnxnewdoclabel = "Nueva Factura"; $lnxdoclabel = "Factura";}
	if ($lnxinvoice == "fvr"){$tipolnxinvoice = "FR"; $cvlnxinvoice = "2"; $lnxnewdoclabel = "Nueva Factura"; $lnxdoclabel = "Factura";}
	
	if ($lnxinvoice == "oc"){$tipolnxinvoice = "O"; $cvlnxinvoice = "1"; $lnxnewdoclabel = "Nuevo Presupuesto"; $lnxdoclabel = "Presupuesto";}
	if ($lnxinvoice == "pc"){$tipolnxinvoice = "P"; $cvlnxinvoice = "1"; $lnxnewdoclabel = "Nuevo Pedido"; $lnxdoclabel = "Pedido";}
	if ($lnxinvoice == "ac"){$tipolnxinvoice = "A"; $cvlnxinvoice = "1"; $lnxnewdoclabel = "Nuevo Albaran"; $lnxdoclabel = "Albaran";}
	if ($lnxinvoice == "fc"){$tipolnxinvoice = "F"; $cvlnxinvoice = "1"; $lnxnewdoclabel = "Nueva Factura"; $lnxdoclabel = "Factura";}
	if ($lnxinvoice == "fcr"){$tipolnxinvoice = "FR"; $cvlnxinvoice = "1"; $lnxnewdoclabel = "Nueva Factura"; $lnxdoclabel = "Factura";}

//Obtenemos la empresa por defecto del usuario según la tienda asignada por defecto
        

        
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"]; 

if($_POST["lstempresas"] > 0)
{
	$dbidempresa = $_POST["lstempresas"];
}


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
    $fchkrealizados = "1";

}
else 
{
    $finicio = $_POST["dpkfdesde"];
    $ffin = $_POST["dpkfhasta"];

    $xtemp = explode("/", $finicio);
    $db_fdesde = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];

    $xtemp = explode("/", $ffin);
	$db_fhasta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];
	$fchkrealizados = $_POST["chkborrador"];
	
}


    if($fchkrealizados == "1"){$selchk_realizados = ' checked=""'; $sql_borradores = " (idserie = '".$idserie."' and codigoint = '0') or ";}else{$selchk_realizados = ''; $sql_borradores = "";}

	$flsttercero = $_POST["lsttercero"];
	$fchktercero = $_POST["chktercero"];
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
?>


<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
</div>
<input type="hidden" name="hcontrol" value="busca"/>

<div class="row">
<div class="col-sm-2">
    <label><input type="checkbox" name="chkborrador" value="1" <?php echo $selchk_realizados; ?> /> Motrar borradores</label> 
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
	echo '<select id="lstempresas" name="lstempresas" style="width: 100%;">';
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

        $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tipolnxinvoice."' and cv = '".$cvlnxinvoice."' and idempresa = '".$dbidempresa."' ");
            while($columna = mysqli_fetch_array($ConsultaMySql))
            {
				if($_POST["lstseries"] > 0)
				{
					if($columna["id"] == $_POST["lstseries"])
					{
						$pordefecto = ' SELECTED';
						$workserie = $columna["id"];
						$displayserie = $columna["serie"];
						$idempresaserie = $columna['idempresa'];
	
						$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$idempresaserie."'");
						$rowaux = mysqli_fetch_assoc($cnsaux);
						$dbrazonsocial = $rowaux['razonsocial'];
					}
					else 
					{
						$pordefecto = '';
					}
				}
				else 
				{
					
				
                    if($columna["dft"] == '1')
                    {
                            $pordefecto = ' SELECTED';
                            $workserie = $columna["id"];
                            $displayserie = $columna["serie"];
                            $idempresaserie = $columna['idempresa'];
        
                            $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$idempresaserie."'");
                            $rowaux = mysqli_fetch_assoc($cnsaux);
                            $dbrazonsocial = $rowaux['razonsocial'];
                            
                    }
                    else
					{
						$pordefecto = '';
					}
				}
                    echo '<option value="'.$columna["id"].'" '.$pordefecto.'>'.$columna["serie"].'</option>'; 
            }
	echo '</select>';

	if($fchkrealizados == "1"){$selchk_realizados = ' checked=""'; $sql_borradores = " (idserie = '".$workserie."' and codigoint = '0') or ";}else{$selchk_realizados = ''; $sql_borradores = "";}
	?>  
    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        <label><?php echo '<input type="checkbox" value="1" name="chktercero" '.$selchk_tercero.'/> '; ?>Cliente</label>
    </div>
    <div class="col" align="left">
        
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" class="tblbuscar" placeholder="Escriba el nombre a buscar" autocomplete="off" style="width:100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a> 
<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php
	//seleciona cliente
		
	$cnsterceros = $mysqli->query("SELECT id, razonsocial from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
		}
		
?>
        </select>
    </div>
</div>



</form>

<?php
if($_POST["lstseries"] > '0')
{
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$_POST["lstseries"]."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$workserie = $row['id'];
	$displayserie = $row['serie'];
        $idempresaserie = $row['idempresa'];
        
        $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$idempresaserie."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbrazonsocial = $row['razonsocial'];
}

echo '<table width="100%">
<tr class="tblbuscar"><td align="center">Trabajando con <b>'.$displayserie.'</b> - '.$dbrazonsocial.'</td></tr>
</table>';

echo '<p>';
echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=new">'.$lnxnewdoclabel.'</a> ';

if ($lnxinvoice == "fc")
{
    echo ' <a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=express&action=new">Nueva Factura Express</a> ';
}

echo '</p>';

//codigo de colores
$cnsmescolor = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$workserie."'");
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



?>

<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<td width="40"> </td>
<td td width="60">Serie</td>
<td td width="80"><?php echo $lnxdoclabel; ?></td>
<?php
if ($lnxinvoice == "fc")
{
	echo '<td td width="80">Documento</td>';
}
?>
<td>Cliente</td>
<td>Vendedor</td>
<td>Fecha</td>
<td width="80">Pagado</td>
<td>Vencimiento</td>
<td>Bruto</td>

<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$workserie."' order by orden");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimpuesto = $rowaux["impuesto"];
	echo '<td>'.$dbimpuesto.'</td>';
}


?>

<td>TOTAL</td>
</tr>
<?php
if($lnxinvoice == "fc")
{
	$ordenarporcampo = "fecha desc";
}
else
{
	$ordenarporcampo = "codigoint desc";
}


$ConsultaMySql = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where ".$sql_borradores." (idserie = '".$workserie."' and (fecha >= '".$db_fdesde."' and fecha <= '".$db_fhasta."') and codigoint > '0') ".$sqltercero." order by fecha desc");
while($columna = mysqli_fetch_array($ConsultaMySql))
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

	if ($columna["editfv"] > 0)
	{
		echo '<tr bgcolor="#FFFF00">';
	}
	else
	{
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	}
	
	//obtenemos la serie
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$columna["idserie"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbserie = $rowaux["serie"];
	//obtenemos el tercero
	$cnsaux = $mysqli->query("SELECT id, razonsocial from ".$prefixsql."terceros where id = '".$columna["idtercero"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbrazonsocial = $rowaux["razonsocial"];

	if ($columna["codigoint"] == 0)
	{$codigofv = $columna["codigo"];}
	else
	{$codigofv = $columna["codigoint"];}
	$importetotal = number_format($columna["total"],2,".",",");
	
	$colorfecha = explode("-", $columna["fecha"]);
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
	
	
	
	
echo '<td bgcolor="'.$colortrimestre.'"><a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$columna["id"].'" />Editar</a></td>';
if ($columna["estado"] == "0"){$colorpagado = '';}
if ($columna["estado"] == "1"){$colorpagado = 'bgcolor="#A9F5A9"';} //Pagado
if ($columna["estado"] == "2"){$colorpagado = 'bgcolor="#F78181"';} //No pagado

echo '<td>'.$dbserie.'</td><td '.$colorpagado.'>'.$codigofv.'</td>';

	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$columna["id"]."' and exclufactu = '0'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblbaseimponible = $auxrow["importe"];
	$lblbaseimponible = round($lblbaseimponible,2);

	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$columna["id"]."' ");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblsumaimpuestos = $auxrow["importe"];
	$lblsumaimpuestos = round($lblsumaimpuestos,2);

	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$columna["id"]."' and exclufactu = '1'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblexcluidos = $auxrow["importe"];
	$lblexcluidos = round($lblexcluidos,2);

	$importetotal = $lblbaseimponible + $lblsumaimpuestos + $lblexcluidos;				




	if ($columna["estado"] == "2" && $columna["codigoint"] > '0'){$importenopagado = $importenopagado + $importebruto;}
	

if ($lnxinvoice == "fc")
{
	echo '<td td width="80">'.$columna["factura"].'</td>';
}


echo '<td>'.$dbrazonsocial.'</td>';

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$columna["idusuario"]."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbdisplayuser = $rowaux["display"];

echo '<td>'.$dbdisplayuser.'</td>';

$xtemp = explode("-", $columna["fecha"]);
$lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

echo '<td>'.$lbl_fecha.'</td>';


if ($columna["estado"] == "1" )
{
	$importepagado = "";
	
	//$importepagado = number_format($importepagado,2,".",",");
}
else
{
	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_pagos where ".$campomasterid." = '".$columna["id"]."' ");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$importepagado = $auxrow["importe"];
	$importepagado = round($importepagado,2);
	

}

echo '<td align="right">'.$importepagado.'</td>';

$fechaactual = date("Y-m-d");

if ($fechaactual > $columna["vencimiento"])
{
	$colorvencimiento = ' bgcolor="#F78181"';
}

if ($fechaactual <= $columna["vencimiento"] && $columna["estado"] == "2")
{
	$colorvencimiento = ' bgcolor="#F3F781"';
}

if ($columna["estado"] == "1")
{
	$colorvencimiento = '';
}

$xtemp = explode("-", $columna["vencimiento"]);
$lbl_vencimiento = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

echo '<td '.$colorvencimiento.'>'.$lbl_vencimiento.'</td>';	
$prtlblbaseimponible = number_format($lblbaseimponible, 2, ".", ",");
echo '<td align="right">'.$prtlblbaseimponible.'</td>';

$sumataxes = '0';
$cnsauximpuestos= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$workserie."' order by orden");
while($colimpuestos = mysqli_fetch_array($cnsauximpuestos))
{
	$cnsaux= $mysqli->query("SELECT SUM(importe) as sumaimpuesto from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$columna["id"]."' and idtax = '".$colimpuestos["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimporteimpuesto = $rowaux["sumaimpuesto"];
	$dbimporteimpuesto = round($dbimporteimpuesto,2);
	$prtdbimporteimpuesto = number_format($dbimporteimpuesto, 2, ".", ",");
	echo '<td align="right">'.$prtdbimporteimpuesto.'</td>';
	
	$sumataxes = $sumataxes + $dbimporteimpuesto;
}
$prtimportetotal = number_format($importetotal, 2, ".", ",");
echo '<td align="right">'.$prtimportetotal.'</td></tr>';

}
?>

</table>

</div>

<div align="center">
<p>&nbsp;</p>
<p>Pendiente de cobrar: <?php echo $importenopagado; ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</div>
