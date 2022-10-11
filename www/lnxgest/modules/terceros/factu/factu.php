<link rel="stylesheet" href="scripts/jquery/jquery-ui.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script language="javascript">

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

<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            empresa=$(this).val();
            
            $.post("modules/balance/ajax/ajx_empresa-series_fv_h.php", { idempresa: empresa }, function(data){
            $("#lstfv").html(data);
            });            
            
            $.post("modules/balance/ajax/ajx_empresa-series_fvr_h.php", { idempresa: empresa }, function(data){
            $("#lstfvr").html(data);
            });
            
            $.post("modules/balance/ajax/ajx_empresa-series_fc_h.php", { idempresa: empresa }, function(data){
            $("#lstfc").html(data);
            });
        });
   })
});
</script>


<?php
include("modules/terceros/botones.php");
$idtercero = $_GET["idtercero"];

$anoactual = date('Y');
$fechaactual = date('d/m/Y');

$ftxtfecha = $_POST["txtfecha"];
if ($ftxtfecha == ""){$ftxtfecha = '01/01/'.$anoactual;}
$ftxtfechafin = $_POST["txtfechafin"];
if ($ftxtfechafin == ""){$ftxtfechafin = $fechaactual;}


$xfecha = explode("/", $ftxtfecha);
$dbfechadesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];
$xfecha = explode("/", $ftxtfechafin);
$dbfechahasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


$flstempresas = $_POST["lstempresas"];

$fchkfv = $_POST["chkfv"];
$fchkfvr = $_POST["chkfvr"];
$fchkfc = $_POST["chkfc"];

$sqlaux = $mysqli->query("select razonsocial from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];

?>

<?php echo '<form name="frmfacturas" method="POST" action="index.php?module=terceros&section=factu&action=edit&idtercero='.$_GET["idtercero"].'">'; ?>

<div class="row">
  <div class="col maintitle" align="left">
    Facturación [<?php echo $dbrazonsocial; ?>]
  </div>
</div>
  
<div class="row">
  <div class="col-sm-2" align="left">
      Fecha inicio
  </div>
  <div class="col-sm-2" align="left">
    <?php 
	
		echo '<input type="text" name="txtfecha" id="dpkfechainicio" size="15" value ="'.$ftxtfecha.'" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy">';
	?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha Fin
  </div>
  <div class="col-sm-2" align="left">
      <?php
	$fechaactual = date('d/m/Y');

	echo '<input type="text" name="txtfechafin" id="dpkfechafin" size="15" value="'.$ftxtfechafin.'" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy">';
	?>
  </div>

  
</div>

<div class="row">
  <div class="col-sm-2">
    Empresa
  </div>
  <div class="col" align="left">
    <select name="lstempresas" id="lstempresas" style="width: 100%;">
<?php
if ($flstempresas == "" || $flstempresas == 0){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Seleccione una empresa</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");

    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
		if ($flstempresas == $columna["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
    }

?>      
    </select>
  </div>
</div>
  

<div class="row">
  <div class="col maintitle">
    Series
  </div>
</div>
    
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Venta
  </div>
  <div class="col" align="left">
    <div id="lstfv">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'F' and cv = '2' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfv);

$rs_idserie = $fchkfv[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfv[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfv[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>
<div class="row">  
  <div class="col-sm-2 maintitle" align="left">
    F. V. Rectificativas
  </div>
  <div class="col" align="left">
    <div id="lstfvr">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'FR' and cv = '2' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfvr);

$rs_idserie = $fchkfvr[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Compra
  </div>
  <div class="col" align="left">
    <div id="lstfc">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'F' and cv = '1' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfc);

$rs_idserie = $fchkfc[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfc[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfc[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>

<p></P>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Buscar" type="submit"> 

</div>

</form>




<?php



$totalimpbruto = "0";
$totaltotal = "0";


$buscaserie = $mysqli->query("SELECT * FROM ".$prefixsql."empresas where id = '".$_POST["lstempresas"]."'");
$row = mysqli_fetch_assoc($buscaserie);
$dbrazonsocial = $row["razonsocial"];

echo '<p>Empresa: <b>'.$dbrazonsocial.'</b></p>';


?>

<table width="100%">
<tr class="maintitle">
	<td colspan="9">Facturas de Venta</td>
</tr>
<tr class="maintitle">
<td> </td>
<td>Serie</td>
<td colspan="2">Documento</td>
<td>Estado</td>
<td>Fecha</td>
<td>Vencimiento</td>
<td>Importe bruto</td>
<td>Total</td>
</tr>
<?php

	$sql_series = "";
	$xid = 0;
	foreach ($fchkfv as $id_serie)
	{
		if($xid == 0)
		{
			$sql_series = "idserie = '".$id_serie."' ";
		}
		else
		{
			$sql_series = $sql_series."or idserie = '".$id_serie."' ";
		}
		$xid = $xid +1;
	}

	$sql_series_fv = 'and ('.$sql_series.')';
		
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."fv where idtercero = '".$idtercero."' and codigoint > '0' ".$sql_series_fv." and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') order by fecha desc, codigoint desc");
	$color = "1";
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
		
		
		
		$xfecha = explode("-", $columna["fecha"]);
		$rs_fecha = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		$xfecha = explode("-", $columna["vencimiento"]);
		$rs_vencimiento = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td width="80">';
		
		
		echo '<a class="btnedit" href="index.php?module=fv&section=main&action=view&id='.$columna["id"].'">Editar</a>';
		
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$columna["idserie"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbserie = $rowaux["serie"];

		
		echo '</td><td>'.$dbserie.'</td>';
		echo '</td><td colspan="2">'.$columna["codigo"].'</td>';
		
		$textopagado = "";
		$colorpagado = '';
		
		if($columna["estado"] == '1')
		{
		$textopagado = "PAGADO";
		$colorpagado = ' bgcolor="#A9F5A9"';
		}
		
		if($columna["estado"] == '2')
		{
		
		$textopagado = "PENDIENTE";
		$colorpagado = ' bgcolor="#F78181"';
		}
		
		echo '<td '.$colorpagado.'>'.$textopagado.'</td>';

		
		
		echo '<td>'.$rs_fecha.'</td>
		<td>'.$rs_vencimiento.'</td>
		<td align="right">';
		
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fv_lineas where idfv= '".$columna["id"]."' and exclufactu = '0'");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$importebruto = $rowaux1["importe"];
		
		
		$display_importebruto = number_format($importebruto ,2,".",",");
		echo $display_importebruto;
		echo '</td>';
		
		echo '<td align="right">';
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fv_lineas_tax where idfv = '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$totalimpuestosfactura = $rowaux1["importe"];
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fv_lineas where idfv= '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$sumatodo = $rowaux1["importe"];
		
		$totalfactura = $totalimpuestosfactura + $sumatodo;
		
		$display_totalfactura = number_format($totalfactura ,2,".",",");
		echo $display_totalfactura;
		echo '</td>';
		
		$totalimpbruto = $totalimpbruto + $importebruto;
		$totaltotal = $totaltotal + $totalfactura;
		
		$display_totalimpbruto = number_format($totalimpbruto ,2,".",",");
		$display_totaltotal = number_format($totaltotal ,2,".",",");
	}

	echo '<tr class="maintitle">';
	echo '<td>&nbsp;</td>';
	echo '<td colspan="6">Total Ventas</td>';
	echo '<td align="right">'.$display_totalimpbruto.'</td>';
	echo '<td align="right">'.$display_totaltotal.'</td>';
	echo '</tr>';

$totalimpbruto = 0;
$totaltotal = 0;
$display_totalimpbruto = 0;
$display_totaltotal = 0;

// ------------------ FIN FACTURAS VENTA ----------------------
?>


</table>

<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td colspan="9">Facturas de Venta Rectificativas</td>
</tr>
<tr class="maintitle">
<td> </td>
<td>Serie</td>
<td colspan="2">Documento</td>
<td>Estado</td>
<td>Fecha</td>
<td>Vencimiento</td>
<td>Importe bruto</td>
<td>Total</td>
</tr>
<?php
// ------------------ INICIO FACTURAS VENTA RECTIFICATIVAS----------------------
		
	$sql_series = "";
	$xid = 0;
	foreach ($fchkfvr as $id_serie)
	{
		if($xid == 0)
		{
			$sql_series = "idserie = '".$id_serie."' ";
		}
		else
		{
			$sql_series = $sql_series."or idserie = '".$id_serie."' ";
		}
		$xid = $xid +1;
	}

	$sql_series_fvr = 'and ('.$sql_series.')';
		
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."fvr where idtercero = '".$idtercero."' and codigoint > '0' ".$sql_series_fvr." and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') order by fecha desc, codigoint desc");
	$color = "1";
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
		
		
		
		$xfecha = explode("-", $columna["fecha"]);
		$rs_fecha = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		$xfecha = explode("-", $columna["vencimiento"]);
		$rs_vencimiento = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td width="80">';
		
		
		echo '<a class="btnedit" href="index.php?module=fvr&section=main&action=view&id='.$columna["id"].'">Editar</a>';
		
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$columna["idserie"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbserie = $rowaux["serie"];

		
		echo '</td><td>'.$dbserie.'</td>';
		echo '</td><td colspan="2">'.$columna["codigo"].'</td>';
		
		$textopagado = "";
		$colorpagado = '';
		
		if($columna["estado"] == '1')
		{
		$textopagado = "PAGADO";
		$colorpagado = ' bgcolor="#A9F5A9"';
		}
		
		if($columna["estado"] == '2')
		{
		
		$textopagado = "PENDIENTE";
		$colorpagado = ' bgcolor="#F78181"';
		}
		
		echo '<td '.$colorpagado.'>'.$textopagado.'</td>';

		
		
		echo '<td>'.$rs_fecha.'</td>
		<td>'.$rs_vencimiento.'</td>
		<td align="right">';
		
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fvr_lineas where idfv= '".$columna["id"]."' and exclufactu = '0'");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$importebruto = $rowaux1["importe"];
		
		
		$display_importebruto = number_format($importebruto ,2,".",",");
		echo $display_importebruto;
		echo '</td>';
		
		echo '<td align="right">';
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fvr_lineas_tax where idfv = '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$totalimpuestosfactura = $rowaux1["importe"];
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fvr_lineas where idfv= '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$sumatodo = $rowaux1["importe"];
		
		$totalfactura = $totalimpuestosfactura + $sumatodo;
		
		$display_totalfactura = number_format($totalfactura ,2,".",",");
		echo $display_totalfactura;
		echo '</td>';
		
		$totalimpbruto = $totalimpbruto + $importebruto;
		$totaltotal = $totaltotal + $totalfactura;
		
		$display_totalimpbruto = number_format($totalimpbruto ,2,".",",");
		$display_totaltotal = number_format($totaltotal ,2,".",",");
	}

	echo '<tr class="maintitle">';
	echo '<td>&nbsp;</td>';
	echo '<td colspan="6">Total Ventas Rectificativas</td>';
	echo '<td align="right">'.$display_totalimpbruto.'</td>';
	echo '<td align="right">'.$display_totaltotal.'</td>';
	echo '</tr>';



$totalimpbruto = 0;
$totaltotal = 0;
$display_totalimpbruto = 0;
$display_totaltotal = 0;

// ------------------ FIN FACTURAS VENTA RECTIFICATIVAS----------------------
?>


</table>
<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td colspan="9">Facturas de Compra</td>
</tr>
<tr class="maintitle">
<td> </td>
<td>Serie</td>
<td>Documento</td>
<td>Factura</td>
<td>Estado</td>
<td>Fecha</td>
<td>Vencimiento</td>
<td>Importe bruto</td>
<td>Total</td>
</tr>
<?php


	$sql_series = "";
	$xid = 0;
	foreach ($fchkfc as $id_serie)
	{
		if($xid == 0)
		{
			$sql_series = "idserie = '".$id_serie."' ";
		}
		else
		{
			$sql_series = $sql_series."or idserie = '".$id_serie."' ";
		}
		$xid = $xid +1;
	}

	$sql_series_fc = 'and ('.$sql_series.')';
		
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."fc where idtercero = '".$idtercero."' and codigoint > '0' ".$sql_series_fc." and (fecha >= '".$dbfechadesde."' and fecha <= '".$dbfechahasta."') order by fecha desc");
	$color = "1";
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
		
		
		
		$xfecha = explode("-", $columna["fecha"]);
		$rs_fecha = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		$xfecha = explode("-", $columna["vencimiento"]);
		$rs_vencimiento = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
		
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td width="80">';
		
		
		echo '<a class="btnedit" href="index.php?module=fc&section=main&action=view&id='.$columna["id"].'">Editar</a>';
		
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$columna["idserie"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbserie = $rowaux["serie"];

		
		echo '</td><td>'.$dbserie.'</td>';
		echo '</td><td>'.$columna["codigo"].'</td>';
		echo '</td><td>'.$columna["factura"].'</td>';
		
		$textopagado = "";
		$colorpagado = '';
		
		if($columna["estado"] == '1')
		{
		$textopagado = "PAGADO";
		$colorpagado = ' bgcolor="#A9F5A9"';
		}
		
		if($columna["estado"] == '2')
		{
		
		$textopagado = "PENDIENTE";
		$colorpagado = ' bgcolor="#F78181"';
		}
		
		echo '<td '.$colorpagado.'>'.$textopagado.'</td>';

		
		
		echo '<td>'.$rs_fecha.'</td>
		<td>'.$rs_vencimiento.'</td>
		<td align="right">';
		
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fc_lineas where idfv= '".$columna["id"]."' and exclufactu = '0'");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$importebruto = $rowaux1["importe"];
		
		
		$display_importebruto = number_format($importebruto ,2,".",",");
		echo $display_importebruto;
		echo '</td>';
		
		echo '<td align="right">';
		
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fc_lineas_tax where idfv = '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$totalimpuestosfactura = $rowaux1["importe"];
		$sqlaux1 = $mysqli->query("SELECT sum(importe) as importe FROM ".$prefixsql."fc_lineas where idfv= '".$columna["id"]."' ");
		$rowaux1 = mysqli_fetch_assoc($sqlaux1);
			
			$sumatodo = $rowaux1["importe"];
		
		$totalfactura = $totalimpuestosfactura + $sumatodo;
		
		$display_totalfactura = number_format($totalfactura ,2,".",",");
		echo $display_totalfactura;
		echo '</td>';
		
		$totalimpbruto = $totalimpbruto + $importebruto;
		$totaltotal = $totaltotal + $totalfactura;
		
		$display_totalimpbruto = number_format($totalimpbruto ,2,".",",");
		$display_totaltotal = number_format($totaltotal ,2,".",",");
	}

	echo '<tr class="maintitle">';
	echo '<td>&nbsp;</td>';
	echo '<td colspan="6">Total Compras</td>';
	echo '<td align="right">'.$display_totalimpbruto.'</td>';
	echo '<td align="right">'.$display_totaltotal.'</td>';
	echo '</tr>';

$totalimpbruto = 0;
$totaltotal = 0;
$display_totalimpbruto = 0;
$display_totaltotal = 0;

// ------------------ FIN FACTURAS COMPRA ----------------------
?>


</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
