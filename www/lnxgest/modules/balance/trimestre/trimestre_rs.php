<?php
$flstdocprint = $_POST["lstdocprint"];
$foptagrupar = $_POST["optagrupar"];
// grpserie - agrupa por serie
// grpfecha - agrupa por fecha

$idempresa = $_POST["lstempresas"];

$fechainicio = $_POST["txtfecha"];
$fechafin = $_POST["txtfechafin"];
$serieventas = $_POST["lstfv"];
$serieventasr = $_POST["lstfvr"];
$seriecompras = $_POST["lstfc"];

$fano = substr($fechainicio, 6, 4);  
$fmes = substr($fechainicio, 3, 2);  
$fdia = substr($fechainicio, 0, 2);  

$cfechainicio = $fano.'-'.$fmes.'-'.$fdia;

$fano = substr($fechafin, 6, 4);  
$fmes = substr($fechafin, 3, 2);  
$fdia = substr($fechafin, 0, 2);  

$cfechafin = $fano.'-'.$fmes.'-'.$fdia;

$flstgenpdffv = $_POST["lstgenpdffv"];
$flstgenpdffvr = $_POST["lstgenpdffvr"];
$flstgenpdffc = $_POST["lstgenpdffc"];

$totalventas_baseimp = 0;

$ids_seriesfv = $_POST["chkfv"];
$ids_seriesfvr = $_POST["chkfvr"];
$ids_seriesfc = $_POST["chkfc"];

$suma_bi = 0; //suma base imponible
$suma_totalfactura = 0; //suma total facturas


$unepdf_fv = $_POST["lstgenpdffv"];
$unepdf_fvr = $_POST["lstgenpdffvr"];
$unepdf_fc = $_POST["lstgenpdffc"];

//obtenemos el directorio temporal de usuario

$dirtempuser = $lnxrutaficherostemp."usr/".$_COOKIE["lnxuserid"]."/";
$ficherodescargardb = "usr/".$_COOKIE["lnxuserid"]."/fv.pdf";
$nomfichero = "Facturas_venta.pdf";
$xurlpass = base64_encode($ficherodescargardb);
	$btn_fichero_fv = 'modules/ficheros/downloadtemp.php?fichero='.$xurlpass.'&nomfichero='.$nomfichero;

$ficherodescargardb = "usr/".$_COOKIE["lnxuserid"]."/fc.pdf";
$nomfichero = "Facturas_compra.pdf";
$xurlpass = base64_encode($ficherodescargardb);
	$btn_fichero_fc = 'modules/ficheros/downloadtemp.php?fichero='.$xurlpass.'&nomfichero='.$nomfichero;

$ficherodescargardb = "usr/".$_COOKIE["lnxuserid"]."/fvr.pdf";
$nomfichero = "Facturas_ventar_r.pdf";
$xurlpass = base64_encode($ficherodescargardb);
	$btn_fichero_fvr = 'modules/ficheros/downloadtemp.php?fichero='.$xurlpass.'&nomfichero='.$nomfichero;


?>



<input type="hidden" name="hfinicio" value="<?php echo $cfechainicio; ?>" />
<input type="hidden" name="hffin" value="<?php echo $cfechafin; ?>" />

<?php
foreach($ids_seriesfv as $valorserie)
{
	$xtemp = $xtemp.", ".$valorserie;
}
$xtemp_fv = substr($xtemp, 2);
echo '<input type="hidden" name="hseriesfv" value="'.$xtemp_fv.'" />';

$xtemp = "";
foreach($ids_seriesfvr as $valorserie)
{
	$xtemp = $xtemp.", ".$valorserie;
}
$xtemp_fvr = substr($xtemp, 2);
echo '<input type="hidden" name="hseriesfvr" value="'.$xtemp_fvr.'" />';

$xtemp = "";
foreach($ids_seriesfc as $valorserie)
{
	$xtemp = $xtemp.", ".$valorserie;
}
$xtemp_fc = substr($xtemp, 2);
echo '<input type="hidden" name="hseriesfc" value="'.$xtemp_fc.'" />';

?>


<div class="row">
   <div class="col-sm-2" align="left">
   Agrupado por
   </div>
   <div class="col" align="left">
	<?php
	if($foptagrupar == "grpserie")
	{
		$display_ordenar = "Serie";
		$ssql_ordenar = "order by idserie asc, codigoint asc, fecha asc";
	}
	if($foptagrupar == "grpfecha")
	{
		$display_ordenar = "Fecha";
		$ssql_ordenar = "order by fecha asc";
	}

	echo $display_ordenar;
	?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
   Fechas
   </div>
   <div class="col" align="left">
	<?php
	echo $fechainicio.' - '.$fechafin;
	?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
   Series Venta</br>
<?php
   if($unepdf_fv > 0)
   {
	   echo '<a href="'.$btn_fichero_fv.'" class="btnedit">Descargar Ventas</a>';
   }
?>
   </div>
   <div class="col" align="left">
<?php
foreach($ids_seriesfv as $valorserie)
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$valorserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$xserie = $rowaux["serie"];

	$lblseries = $lblseries.", ".$xserie;
}
$lblseries = substr($lblseries, 2);
$lblseries_fv = $lblseries;
echo $lblseries;
?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
   Series Venta R.</br>
<?php
   if($unepdf_fvr > 0)
   {
	   echo '<a href="'.$btn_fichero_fvr.'" class="btnedit">Descargar Ventas R.</a>';
   }
?>
   </div>
   <div class="col" align="left">
<?php
$lblseries = "";
foreach($ids_seriesfvr as $valorserie)
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$valorserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$xserie = $rowaux["serie"];

	$lblseries = $lblseries.", ".$xserie;
}
$lblseries = substr($lblseries, 2);
$lblseries_fvr = $lblseries;
echo $lblseries;
?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
   Series Compra</br>
<?php
   if($unepdf_fc > 0)
   {
	   echo '<a href="'.$btn_fichero_fc.'" class="btnedit">Descargar Compras</a>';
   }
?>
   </div>
   <div class="col" align="left">
<?php
$lblseries = "";
foreach($ids_seriesfc as $valorserie)
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$valorserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$xserie = $rowaux["serie"];

	$lblseries = $lblseries.", ".$xserie;
}
$lblseries = substr($lblseries, 2);
$lblseries_fc = $lblseries;
echo $lblseries;
?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
   Empresa
   </div>
   <div class="col" align="left">
	<?php 
	
		
	$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$xempresa = $rowaux["razonsocial"];
	echo $xempresa;
	?>
   </div>
</div>
<?php
if($flstdocprint > 0)
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$flstdocprint."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$docprint_idfileprocesador = $rowaux["idfileprocesador"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$docprint_idfileprocesador."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fch_fichero = $rowaux["fichero"];
	$fch_dirfichero = $rowaux["dirfichero"];

	$rutaficheroproceso = $lnxrutaficheros.$fch_dirfichero."/".$fch_fichero;

	include($rutaficheroproceso);
}
?>



<div align="center" class="rectangulobtnsguardar">
<a class="btncancel" href="index.php?module=balance&section=trimestre">Volver</a>
</div>

<p></p>

<div class="row">
   <div class="col maintitle" align="left">
   Facturas de Venta
   </div>
</div>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
	<th>Serie</th>
	<th>Fecha</th>
	<th>Documento</th>
	<th>Tercero</th>
	<th>Base imponible</th>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
while($col = mysqli_fetch_array($cnssql))
{
	echo '<th>'.$col["impuesto"].'</th>';
}
?>
	
	<th>total Factura</th>
</tr>
<?php


foreach($ids_seriesfv as $valorserie)
{
	$ssql_ids = $ssql_ids." or idserie = '".$valorserie."' ";
}

$ssql_ids_fv = substr($ssql_ids, 4);

$ssqlfv = "select * from ".$prefixsql."fv where codigoint > '0' and (".$ssql_ids_fv.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfv);	
while($col = mysqli_fetch_array($cnssql))
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sserie = $rowaux["serie"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$srazonsocial = $rowaux["razonsocial"];
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas where idfv = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sbaseimponible = round($rowaux["importe"], 2);
	//$sbaseimponible = number_format($sbaseimponible, 2, '.', ',');
	
	$suma_bi = $suma_bi + $sbaseimponible;
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas_tax where idfv = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$simpuestos = round($rowaux["importe"], 2);
	$stotalfactura = $sbaseimponible + $simpuestos;
	$stotalfactura = number_format($stotalfactura, 2, '.', ',');
    
		$suma_totalfactura = $suma_totalfactura + $stotalfactura;
	
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

	echo '<td>'.$sserie.'</td>';
	echo '<td>'.$col["fecha"].'</td>';
	echo '<td>'.$col["codigo"].'</td>';
	echo '<td>'.$srazonsocial.'</td>';
	echo '<td align="right">'.$sbaseimponible.'</td>';
	$cnssqltaxes = $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtax = $coltax["id"];
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas_tax where idfv = '".$col["id"]."' and idtax = '".$idtax."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		
		$ximportetax = round($rowaux["importe"], 2);
		$ximportetax = number_format($ximportetax, 2, '.', ',');
		echo '<td align="right">'.$ximportetax.'</td>';
	}	
	echo '<td align="right">'.$stotalfactura.'</td>';
	echo '</tr>';
    
}



?>

</table>
<?php

$suma_totalfactura = number_format($suma_totalfactura, 2, '.', ',');
$ventas_bi = $suma_bi;

?>
</div>


<p>&nbsp;</p>

<?php
//reset
$suma_bi = 0;

?>

<div class="row">
   <div class="col maintitle" align="left">
   Facturas de Venta Rectificativas
   </div>
</div>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
	<th>Serie</th>
	<th>Fecha</th>
	<th>Documento</th>
	<th>Tercero</th>
	<th>Base imponible</th>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
while($col = mysqli_fetch_array($cnssql))
{
	echo '<th>'.$col["impuesto"].'</th>';
}
?>
	
	<th>total Factura</th>
</tr>
<?php
$suma_bi = 0;

foreach($ids_seriesfvr as $valorserie)
{
	$ssql_ids = $ssql_ids." or idserie = '".$valorserie."' ";
}

$ssql_ids_fvr = substr($ssql_ids, 4);

$ssqlfvr = "select * from ".$prefixsql."fvr where codigoint > '0' and (".$ssql_ids_fvr.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfvr);	
while($col = mysqli_fetch_array($cnssql))
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sserie = $rowaux["serie"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$srazonsocial = $rowaux["razonsocial"];
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas where idfvr = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sbaseimponible = round($rowaux["importe"], 2);
	
	
	$suma_bi = $suma_bi + $sbaseimponible;
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas_tax where idfvr = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$simpuestos = round($rowaux["importe"], 2);
	$stotalfactura = $sbaseimponible + $simpuestos;
	$stotalfactura = number_format($stotalfactura, 2, '.', ',');
    
		$suma_totalfactura = $suma_totalfactura + $stotalfactura;
	
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

	echo '<td>'.$sserie.'</td>';
	echo '<td>'.$col["fecha"].'</td>';
	echo '<td>'.$col["codigo"].'</td>';
	echo '<td>'.$srazonsocial.'</td>';
	echo '<td align="right">'.$sbaseimponible.'</td>';
	$cnssqltaxes = $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtax = $coltax["id"];
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas_tax where idfvr = '".$col["id"]."' and idtax = '".$idtax."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		
		$ximportetax = round($rowaux["importe"], 2);
		$ximportetax = number_format($ximportetax, 2, '.', ',');
		echo '<td align="right">'.$ximportetax.'</td>';
	}	
	echo '<td align="right">'.$stotalfactura.'</td>';
	echo '</tr>';
    
}



?>

</table>
<?php

$suma_totalfactura = number_format($suma_totalfactura, 2, '.', ',');
$ventasr_bi = $suma_bi;

?>
</div>








<p>&nbsp;</p>

<?php
//reset
$suma_bi = 0;

?>

<div class="row">
   <div class="col maintitle" align="left">
   Facturas de Compra
   </div>
</div>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
	<th>Serie</th>
	<th>Fecha</th>
	<th>Documento</th>
	<th>Tercero</th>
	<th>Base imponible</th>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
while($col = mysqli_fetch_array($cnssql))
{
	echo '<th>'.$col["impuesto"].'</th>';
}
?>
	
	<th>total Factura</th>
</tr>
<?php
$suma_bi = 0;

foreach($ids_seriesfc as $valorserie)
{
	$ssql_ids = $ssql_ids." or idserie = '".$valorserie."' ";
}

$ssql_ids_fc = substr($ssql_ids, 4);

$ssqlfv = "select * from ".$prefixsql."fc where codigoint > '0' and (".$ssql_ids_fc.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfv);	
while($col = mysqli_fetch_array($cnssql))
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sserie = $rowaux["serie"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$srazonsocial = $rowaux["razonsocial"];
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas where idfc = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sbaseimponible = round($rowaux["importe"], 2);
	//$sbaseimponible = number_format($sbaseimponible, 2, '.', ',');
	
	$suma_bi = $suma_bi + $sbaseimponible;
	
	$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas_tax where idfc = '".$col["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$simpuestos = round($rowaux["importe"], 2);
	$stotalfactura = $sbaseimponible + $simpuestos;
	$stotalfactura = number_format($stotalfactura, 2, '.', ',');
    
		$suma_totalfactura = $suma_totalfactura + $stotalfactura;
	
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

	echo '<td>'.$sserie.'</td>';
	echo '<td>'.$col["fecha"].'</td>';
	echo '<td>'.$col["codigo"].'</td>';
	echo '<td>'.$srazonsocial.'</td>';
	echo '<td align="right">'.$sbaseimponible.'</td>';
	$cnssqltaxes = $mysqli->query("select * from ".$prefixsql."impuestos order by id");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtax = $coltax["id"];
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas_tax where idfc = '".$col["id"]."' and idtax = '".$idtax."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		
		$ximportetax = round($rowaux["importe"], 2);
		$ximportetax = number_format($ximportetax, 2, '.', ',');
		echo '<td align="right">'.$ximportetax.'</td>';
	}	
	echo '<td align="right">'.$stotalfactura.'</td>';
	echo '</tr>';
    
}



?>

</table>
<?php

$suma_totalfactura = number_format($suma_totalfactura, 2, '.', ',');
$compras_bi = $suma_bi;

?>
</div>

<p>&nbsp;</p>

<?php
$todosidseries = $xtemp_fv.", ".$xtemp_fvr.", ".$xtemp_fc;

$xtemp = explode(",", $todosidseries);

foreach($xtemp as $myidserie)
{
	$myidserie = trim($myidserie);
	if($myidserie > 0){	$idseries = $idseries."or idserie = '".$myidserie."' ";}
}

$idseries = substr($idseries, 2);

?>


<div style="display: block; overflow-x: auto;">

<table width="100%" border="0" class="msgaviso">
  <tr>
    <td colspan="5" class="maintitle">Balance Global</td>
  </tr>
  <tr class="maintitle">
    <td>Concepto</td>
    <td>Ventas</td>
	<td>Rectificativas V.</td>
	<td>Compras</td>
	<td>Diferencia</td>
  </tr>
 <?php
 //Formateamos numeros
 $lbl_ventas_bi = number_format($ventas_bi, 2, '.', ',');
 $lbl_ventasr_bi = number_format($ventasr_bi, 2, '.', ',');
 $lbl_compras_bi = number_format($compras_bi, 2, '.', ',');
 
 $dif_facturaqcion = $ventas_bi + $ventasr_bi - $compras_bi;
 $lbl_dif_facturaqcion = number_format($dif_facturaqcion, 2, '.', ',');
 ?>
    <tr>
    <td>Base Imponible</td>
    <td align="right"><?php echo $lbl_ventas_bi; ?></td>
	<td align="right"><?php echo $lbl_ventasr_bi; ?></td>
	<td align="right"><?php echo $lbl_compras_bi; ?></td>
	<td align="right"><?php echo $lbl_dif_facturaqcion; ?></td>
  </tr>
<?php

$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") ");	
while($coltax = mysqli_fetch_array($cnssqltaxes))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_impuesto = $rowaux["impuesto"];
	
	//Calulamos el total del impuesto en el rango de fecha seleccionado FV
	$lblimporte_fv_tax = 0;
	
	$ssqlfv = $mysqli->query("SELECT * from ".$prefixsql."fv where (".$ssql_ids_fv.") and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
	while($colfv = mysqli_fetch_array($ssqlfv ))
	{
		$sqlaux1 = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas_tax where idfv = '".$colfv["id"]."' and idtax = '".$coltax["idimpuesto"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux1);
		$importetax = $rowaux["importe"];
		
		$lblimporte_fv_tax = $lblimporte_fv_tax + $importetax ;
	
	}
	
	
	$lbl_importe_fv_tax = number_format($lblimporte_fv_tax, 2, '.', ',');
	$total_fv_tax = $total_fv_tax + $lblimporte_fv_tax;
	
	
	//Calulamos el total del impuesto en el rango de fecha seleccionado FVR
	$lblimporte_fvr_tax = 0;
	
	$ssqlfvr = $mysqli->query("SELECT * from ".$prefixsql."fvr where (".$ssql_ids_fvr.") and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
	while($colfvr = mysqli_fetch_array($ssqlfvr ))
	{
		$sqlaux1 = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas_tax where idfv = '".$colfvr["id"]."' and idtax = '".$coltax["idimpuesto"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux1);
		$importetax = $rowaux["importe"];
		
		$lblimporte_fvr_tax = $lblimporte_fvr_tax + $importetax ;
	
	}
	
	
	$lbl_importe_fvr_tax = number_format($lblimporte_fvr_tax, 2, '.', ',');
	$total_fvr_tax = $total_fvr_tax + $lblimporte_fvr_tax;
	
	
	
	
	
	
	
	//Calulamos el total del impuesto en el rango de fecha seleccionado FC
	$lblimporte_fc_tax = 0;
	
	$ssqlfc = $mysqli->query("SELECT * from ".$prefixsql."fc where (".$ssql_ids_fc.") and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
	while($colfc = mysqli_fetch_array($ssqlfc ))
	{
		$sqlaux1 = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas_tax where idfc = '".$colfc["id"]."' and idtax = '".$coltax["idimpuesto"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux1);
		$importetax = $rowaux["importe"];
		
		$lblimporte_fc_tax = $lblimporte_fc_tax + $importetax ;
	
	}
	
	
	$lbl_importe_fc_tax = number_format($lblimporte_fc_tax, 2, '.', ',');
	$total_fc_tax = $total_fc_tax + $lblimporte_fc_tax;
	
	
	$lblimporte_dif_tax = $lblimporte_fv_tax + $lblimporte_fvr_tax - $lblimporte_fc_tax;
	
	$total_dif_tax = $total_dif_tax + $lblimporte_dif_tax;
	
	$lbl_importe_dif_tax = number_format($lblimporte_dif_tax, 2, '.', ',');
	
echo '<tr>
    <td>'.$lbl_impuesto.'</td>
    <td align="right">'.$lbl_importe_fv_tax.'</td>
	<td align="right">'.$lbl_importe_fvr_tax.'</td>
	<td align="right">'.$lbl_importe_fc_tax.'</td>
	<td align="right">'.$lbl_importe_dif_tax.'</td>
  </tr>';
}


$lbl_total_fv_tax = number_format($total_fv_tax, 2, '.', ',');
$lbl_total_fvr_tax = number_format($total_fvr_tax, 2, '.', ',');
$lbl_total_fc_tax = number_format($total_fc_tax, 2, '.', ',');
$lbl_total_dif_tax = number_format($total_dif_tax, 2, '.', ',');
?>

<tr>
    <td>Suma Impuestos</td>
    <td align="right"><?php echo $lbl_total_fv_tax; ?></td>
	<td align="right"><?php echo $lbl_total_fvr_tax; ?></td>
	<td align="right"><?php echo $lbl_total_fc_tax; ?></td>
	<td align="right"><?php echo $lbl_total_dif_tax; ?></td>
</tr>

<?php
$total_fv = $ventas_bi + $total_fv_tax;
$lbl_total_fv = number_format($total_fv, 2, '.', ',');
$total_fvr = $ventasr_bi + $total_fvr_tax;
$lbl_total_fvr = number_format($total_fvr, 2, '.', ',');
$total_fc = $compras_bi + $total_fc_tax;
$lbl_total_fc = number_format($total_fc, 2, '.', ',');

$total_dif = $total_fv + $total_fvr - $total_fc;
$lbl_total_dif = number_format($total_dif, 2, '.', ',');
?>

<tr class="maintitle">
    <td>Total Facturado</td>
    <td align="right"><?php echo $lbl_total_fv; ?></td>
	<td align="right"><?php echo $lbl_total_fvr; ?></td>
	<td align="right"><?php echo $lbl_total_fc; ?></td>
	<td align="right"><?php echo $lbl_total_dif; ?></td>
</tr>

</table>

</div>

<p>&nbsp;</p>
<?php
$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
$cuantostaxes = $cnssqltaxes->num_rows;

$coladicional = 4 + $cuantostaxes;
?>
<div style="display: block; overflow-x: auto;">
<table width="100%" border="0" class="msgaviso">
  <tr>
    <td colspan="<?php echo $coladicional; ?>" class="maintitle">Balance Detallado</td>
  </tr>
  <tr>
    <td colspan="<?php echo $coladicional; ?>" class="maintitle">- VENTAS</td>
  </tr>
  <tr class="maintitle">
    <td>Serie</td>
    <td>Base imponible</td>
<?php
while($coltax = mysqli_fetch_array($cnssqltaxes))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_impuesto = $rowaux["impuesto"];
	
	echo '<td>'.$lbl_impuesto.'</td>';
}
?>


	<td>Impuestos</td>
	<td>TOTAL</td>
  </tr>
  
<?php
//Series de Ventas
$ssqlfv = "select distinct(idserie) from ".$prefixsql."fv where codigoint > '0' and (".$ssql_ids_fv.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfv);	
while($col = mysqli_fetch_array($cnssql))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_serie = $rowaux["serie"];
	
	$sumaimportefv = '0';
	
	$cnsbi_fv = $mysqli->query("select * from ".$prefixsql."fv where codigoint > '0' and idserie = '".$col["idserie"]."' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') ");
	while($colbi_fv = mysqli_fetch_array($cnsbi_fv))
	{
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas where idfv = '".$colbi_fv["id"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$sumaimportefv = $sumaimportefv + $rowaux["importe"];
		
		$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
		while($coltax = mysqli_fetch_array($cnssqltaxes))
		{
			$idtaxfv = $coltax["idimpuesto"];
			$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas_tax where idfv = '".$colbi_fv["id"]."' and idtax = '".$idtaxfv."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$importefv[$idtaxfv] = $importefv[$idtaxfv] + $rowaux["importe"];

		}
		
		
	}
	
	$lbl_sumaimportefv = number_format($sumaimportefv, 2, '.', ',');
	
	echo '<tr>';
	echo '<td>'.$lbl_serie.'</td>';
    echo '<td>'.$lbl_sumaimportefv.'</td>';
	
	$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtaxfv = $coltax["idimpuesto"];
		$sumatax = $sumatax + $importefv[$idtaxfv];
		
		$lbl_importe_tax = $importefv[$idtaxfv];
		$lbl_importe_tax = number_format($lbl_importe_tax, 2, '.', ',');
		echo '<td>'.$lbl_importe_tax.'</td>';
		
		$importefv[$idtaxfv] = 0;
	}

	$sumatotal = $sumaimportefv + $sumatax;

	$lbl_sumatax = number_format($sumatax, 2, '.', ',');
	$lbl_sumatotal = number_format($sumatotal, 2, '.', ',');
	
	echo '<td>'.$lbl_sumatax.'</td>';
	echo '<td>'.$lbl_sumatotal.'</td>';
	echo '</tr>';
	
	$sumatax = 0;
	$sumatotal = 0;
}



//Series VENTAS RECTIFICATIVAS

?>

<tr>
    <td colspan="<?php echo $coladicional; ?>" class="maintitle">- VENTAS RECTIFICATIVAS</td>
</tr>

  <tr class="maintitle">
    <td>Serie</td>
    <td>Base imponible</td>
<?php
$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
while($coltax = mysqli_fetch_array($cnssqltaxes))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_impuesto = $rowaux["impuesto"];
	
	echo '<td>'.$lbl_impuesto.'</td>';
}
?>


	<td>Impuestos</td>
	<td>TOTAL</td>
  </tr>

<?php
//Series Ventas Rectificativas
$ssqlfvr = "select distinct(idserie) from ".$prefixsql."fvr where codigoint > '0' and (".$ssql_ids_fvr.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfvr);	
while($col = mysqli_fetch_array($cnssql))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_serie = $rowaux["serie"];
	
	$sumaimportefvr = '0';
	
	$cnsbi_fvr = $mysqli->query("select * from ".$prefixsql."fvr where codigoint > '0' and idserie = '".$col["idserie"]."' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') ");
	while($colbi_fvr = mysqli_fetch_array($cnsbi_fvr))
	{
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas where idfvr = '".$colbi_fvr["id"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$sumaimportefvr = $sumaimportefvr + $rowaux["importe"];
		
		$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
		while($coltax = mysqli_fetch_array($cnssqltaxes))
		{

			$idtaxfvr = $coltax["idimpuesto"];
			$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fvr_lineas_tax where idfvr = '".$colbi_fvr["id"]."' and idtax = '".$idtaxfvr."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$importefvr[$idtaxfvr] = $importefc[$idtaxfvr] + $rowaux["importe"];

		}
		
		
	}
	
	$lbl_sumaimportefvr = number_format($sumaimportefvr, 2, '.', ',');
	
	echo '<tr>';
	echo '<td>'.$lbl_serie.'</td>';
    echo '<td>'.$lbl_sumaimportefvr.'</td>';
	
	$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtaxfvr = $coltax["idimpuesto"];
		$sumatax = $sumatax + $importefvr[$idtaxfvr];
			
		
		$lbl_importe_tax = $importefvr[$idtaxfvr];
		$lbl_importe_tax = number_format($lbl_importe_tax, 2, '.', ',');
		echo '<td>'.$lbl_importe_tax.'</td>';
		
		$importefvr[$idtaxfvr] = 0;
	}

	$sumatotal = $sumaimportefvr + $sumatax;

	$lbl_sumatax = number_format($sumatax, 2, '.', ',');
	$lbl_sumatotal = number_format($sumatotal, 2, '.', ',');
	
	echo '<td>'.$lbl_sumatax.'</td>';
	echo '<td>'.$lbl_sumatotal.'</td>';
	echo '</tr>';
	
	$sumatax = 0;
	$sumatotal = 0;
}
















//Series COMPRAS

?>

<tr>
    <td colspan="<?php echo $coladicional; ?>" class="maintitle">- COMPRAS</td>
</tr>

  <tr class="maintitle">
    <td>Serie</td>
    <td>Base imponible</td>
<?php
$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
while($coltax = mysqli_fetch_array($cnssqltaxes))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_impuesto = $rowaux["impuesto"];
	
	echo '<td>'.$lbl_impuesto.'</td>';
}
?>


	<td>Impuestos</td>
	<td>TOTAL</td>
  </tr>

<?php
//Series Compras
$ssqlfc = "select distinct(idserie) from ".$prefixsql."fc where codigoint > '0' and (".$ssql_ids_fc.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
$cnssql= $mysqli->query($ssqlfc);	
while($col = mysqli_fetch_array($cnssql))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$col["idserie"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_serie = $rowaux["serie"];
	
	$sumaimportefc = '0';
	
	$cnsbi_fc = $mysqli->query("select * from ".$prefixsql."fc where codigoint > '0' and idserie = '".$col["idserie"]."' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') ");
	while($colbi_fc = mysqli_fetch_array($cnsbi_fc))
	{
		$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas where idfc = '".$colbi_fc["id"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$sumaimportefc = $sumaimportefc + $rowaux["importe"];
		
		$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
		while($coltax = mysqli_fetch_array($cnssqltaxes))
		{

			$idtaxfc = $coltax["idimpuesto"];
			$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas_tax where idfc = '".$colbi_fc["id"]."' and idtax = '".$idtaxfc."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$importefc[$idtaxfc] = $importefc[$idtaxfc] + $rowaux["importe"];

		}
		
		
	}
	
	$lbl_sumaimportefc = number_format($sumaimportefc, 2, '.', ',');
	
	echo '<tr>';
	echo '<td>'.$lbl_serie.'</td>';
    echo '<td>'.$lbl_sumaimportefc.'</td>';
	
	$cnssqltaxes = $mysqli->query("select distinct (idimpuesto) from ".$prefixsql."impuestosrules where (".$idseries.") order by idimpuesto");	
	while($coltax = mysqli_fetch_array($cnssqltaxes))
	{
		$idtaxfc = $coltax["idimpuesto"];
		$sumatax = $sumatax + $importefc[$idtaxfc];
			
		
		$lbl_importe_tax = $importefc[$idtaxfc];
		$lbl_importe_tax = number_format($lbl_importe_tax, 2, '.', ',');
		echo '<td>'.$lbl_importe_tax.'</td>';
		
		$importefc[$idtaxfc] = 0;
	}

	$sumatotal = $sumaimportefc + $sumatax;

	$lbl_sumatax = number_format($sumatax, 2, '.', ',');
	$lbl_sumatotal = number_format($sumatotal, 2, '.', ',');
	
	echo '<td>'.$lbl_sumatax.'</td>';
	echo '<td>'.$lbl_sumatotal.'</td>';
	echo '</tr>';
	
	$sumatax = 0;
	$sumatotal = 0;
}

?>

</table>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
if($unepdf_fv > 0)
{
	//Unimos los archivos PDF de Ventas
	
	$numfichero = -1;

	$fichero_fv = $dirtempuser."fv.pdf";
	$fichero_temp = $dirtempuser."temp.pdf";

	unlink($fichero_fv);
	unlink($fichero_temp);
	
	

	$ssqlfv = "select * from ".$prefixsql."fv where codigoint > '0' and (".$ssql_ids_fv.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
	$cnssql= $mysqli->query($ssqlfv);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'fv' and idlinea0 = '".$col["id"]."' and idcat = '".$unepdf_fv."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$idfichero = $rowaux["idfichero"];
		if($idfichero > 0)
		{
			$numfichero = $numfichero +1;
			
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$rutafichero = $lnxrutaficheros.$rowaux["dirfichero"]."/".$rowaux["fichero"];
			
			
			if ($numfichero == '0')
			{
				copy($rutafichero, $fichero_temp);
				copy($rutafichero, $fichero_fv);
			}
			else
			{
				
				
				copy($fichero_fv, $fichero_temp);
				$ejecutar = "pdftk ".$fichero_temp." ".$rutafichero." cat output ".$fichero_fv;
				shell_exec($ejecutar);

			}
			
		}
		else
		{
			$rutafichero = '';
		}

	}

}

if($unepdf_fvr > 0)
{
	//Unimos los archivos PDF de Ventas
	
	$numfichero = -1;

	$fichero_fvr = $dirtempuser."fvr.pdf";
	$fichero_temp = $dirtempuser."temp.pdf";

	unlink($fichero_fvr);
	unlink($fichero_temp);
	
	

	$ssqlfv = "select * from ".$prefixsql."fvr where codigoint > '0' and (".$ssql_ids_fvr.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
	$cnssql= $mysqli->query($ssqlfv);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'fvr' and idlinea0 = '".$col["id"]."' and idcat = '".$unepdf_fvr."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$idfichero = $rowaux["idfichero"];
		if($idfichero > 0)
		{
			$numfichero = $numfichero +1;
			
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$rutafichero = $lnxrutaficheros.$rowaux["dirfichero"]."/".$rowaux["fichero"];
			
			
			if ($numfichero == '0')
			{
				copy($rutafichero, $fichero_temp);
				copy($rutafichero, $fichero_fvr);
			}
			else
			{
				
				
				copy($fichero_fvr, $fichero_temp);
				$ejecutar = "pdftk ".$fichero_temp." ".$rutafichero." cat output ".$fichero_fvr;
				shell_exec($ejecutar);
			}
			
		}
		else
		{
			$rutafichero = '';
		}

	}

}

if($unepdf_fc > 0)
{
	//Unimos los archivos PDF de Compras
	require('scripts/fpdf/fpdf.php');
	require('scripts/fpdf/writehtml.php');
	
	$fichero_fc = $dirtempuser."fc.pdf";
	$fichero_temp = $dirtempuser."temp.pdf";
	$fichero_sinstamp = $dirtempuser."sinstamp.pdf";
	$fichero_stamp = $dirtempuser."stampado.pdf";
	$ficheromarca = $dirtempuser."marca.pdf";
	

	unlink($fichero_fc);
	unlink($fichero_temp);
	unlink($fichero_sinstamp);
	unlink($fichero_stamp);
	unlink($ficheromarca);

	
	$numfichero = -1;

		

	$ssqlfv = "select * from ".$prefixsql."fc where codigoint > '0' and (".$ssql_ids_fc.") and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')".$ssql_ordenar;
	$cnssql= $mysqli->query($ssqlfv);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'fc' and idlinea0 = '".$col["id"]."' and idcat = '".$unepdf_fc."'"); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$idfichero = $rowaux["idfichero"];
		if($idfichero > 0)
		{
			$numfichero = $numfichero +1;
			
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$rutafichero = $lnxrutaficheros.$rowaux["dirfichero"]."/".$rowaux["fichero"];
			
			
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4');
			$pdf->SetFont('Arial','B',12);

			$facturanombre = "Cod. interno: ".$col["codigo"];
			$pdf->SetFillColor(230, 242, 255);
			$pdf->Rect(0, 0, 70, 10 ,F);

			$pdf->text(5,5, $facturanombre);
			$pdf->Output('F', $ficheromarca);
			
			copy($rutafichero, $fichero_sinstamp);
			$ejecutar = "pdftk ".$rutafichero." multistamp ".$ficheromarca." output ".$fichero_stamp;
			shell_exec($ejecutar);
			
			if ($numfichero == '0')
			{
				
				copy($fichero_stamp, $fichero_fc);
			}
			else
			{
				copy($fichero_fc, $fichero_temp);
				$ejecutar = "pdftk ".$fichero_temp." ".$fichero_stamp." cat output ".$fichero_fc;
				shell_exec($ejecutar);
			}
			
		}
		else
		{
			$rutafichero = '';
		}

	}

}

?>
