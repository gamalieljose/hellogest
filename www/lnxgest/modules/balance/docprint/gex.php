<?php
//header('Content-type: application/vnd.ms-excel');
//header('Content-Disposition: attachment; filename="gex.xlsx"');

require("scripts/phpexcel/Classes/PHPExcel.php");



$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("LNXGEST ERP")
							 ->setLastModifiedBy("LNXGEST ERP")
							 ->setTitle("Balance")
							 ->setSubject("Balance")
							 ->setDescription("Balance generado por LNXGEST ERP")
							 ->setKeywords("Balance LNXGEST ERP")
							 ->setCategory("Balance Ventas-Compras");

// ----------------------  VENTAS --------------------------
$hojaactualexcel = "0";
$objPHPExcel->getActiveSheet()->setTitle("Ventas");


$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(15);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(12);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(15); 
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(25);
 
$objPHPExcel->setActiveSheetIndex($hojaactualexcel)
            ->setCellValue('A1', 'Fecha factura')
            ->setCellValue('B1', 'Factura')
            ->setCellValue('C1', 'Nif')
            ->setCellValue("D1", "Razon social")
			->setCellValue("E1", "Base imponible");

			
	
$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);

			
$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventas."' order by orden");
while($columna = mysqli_fetch_array($cnsimpuestos))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lbltax = $row['impuesto'];
	
	
	if ($letra == "")
	{$letra = "F";}
	else
	{
		++$letra; //sumamos la letra
	}
	$celda = $letra."1";
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lbltax);
	$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
}
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "impuestos");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
			
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "Total Factura");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

//insertamos las filas - facturas
$filaexcel = "1";

$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fv where idserie = '".$serieventas."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
while($columna = mysqli_fetch_array($cnsfacturas))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$columna["idtercero"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblnif = $row['nif'];
	$lblrazonsocial = $row['razonsocial'];
	
		
	$filaexcel = $filaexcel +1;
	$celda = "A".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["fecha"]);
	$celda = "B".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["codigo"]);
	$celda = "C".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblnif);
	$celda = "D".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblrazonsocial);		
	
	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql."fv_lineas where idfv = '".$columna["id"]."' and exclufactu = '0'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblbaseimponible = $auxrow["importe"];
	$lblbaseimponible = round($lblbaseimponible,2);
	$celda = "E".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblbaseimponible);
	
	$letra = "E";
	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventas."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fv_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$celda = $letra.$filaexcel;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimptax);
	}
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as imptaxes from ".$prefixsql."fv_lineas_tax where idfv = '".$columna["id"]."' ");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblimpuestos = $row['imptaxes'];
	$lblimpuestos = round($lblimpuestos, 2);
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimpuestos);
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as excluidos from ".$prefixsql."fv_lineas where idfv = '".$columna["id"]."' and exclufactu = '1'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblexcluidos = $row['excluidos'];
	$lblexcluidos = round($lblexcluidos, 2);
	
	$totalfactura = $lblbaseimponible + $lblimpuestos + $lblexcluidos;
	$totalfactura = round($totalfactura, 2);
	
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totalfactura);
	
}

$letra = "D";
$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, "TOTAL");
$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

$letra = "E";
$filaexcel = $filaexcel -2;
$formula = '=SUM('.$letra.'2:'.$letra.$filaexcel.')';

$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);


	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventas."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fv_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
		
	}

++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);



// ---------------------- FIN VENTAS --------------------------

// ---------------------- COMPRAS --------------------------
$hojaactualexcel = "1";
$objPHPExcel->createSheet($hojaactualexcel);//creamos la pestaña
$objPHPExcel->setActiveSheetIndex($hojaactualexcel);
$objPHPExcel->getActiveSheet()->setTitle("Compras");

$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(15);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(12);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(15); 
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(25);
 
$objPHPExcel->setActiveSheetIndex($hojaactualexcel)
            ->setCellValue('A1', 'Fecha factura')
            ->setCellValue('B1', 'Factura')
            ->setCellValue('C1', 'Nif')
            ->setCellValue("D1", "Razon social")
			->setCellValue("E1", "Base imponible");
$letra = "";
$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$seriecompras."' order by orden");
while($columna = mysqli_fetch_array($cnsimpuestos))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lbltax = $row['impuesto'];
	
	
	if ($letra == "")
	{$letra = "F";}
	else
	{
		++$letra; //sumamos la letra
	}
	
	$celda = $letra."1";
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lbltax);
	$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
	
}
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "impuestos");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
			
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "Total Factura");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

//insertamos las filas - facturas
$filaexcel = "1";

$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fc where idserie = '".$seriecompras."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
while($columna = mysqli_fetch_array($cnsfacturas))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$columna["idtercero"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblnif = $row['nif'];
	$lblrazonsocial = $row['razonsocial'];
	
		
	$filaexcel = $filaexcel +1;
	$celda = "A".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["fecha"]);
	$celda = "B".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["codigo"]);
	$celda = "C".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblnif);
	$celda = "D".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblrazonsocial);		
	
	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql."fc_lineas where idfv = '".$columna["id"]."' and exclufactu = '0'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblbaseimponible = $auxrow["importe"];
	$lblbaseimponible = round($lblbaseimponible,2);
	$celda = "E".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblbaseimponible);

	$letra = "E";
	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$seriecompras."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fc_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$celda = $letra.$filaexcel;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimptax);
		
	}
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as imptaxes from ".$prefixsql."fc_lineas_tax where idfv = '".$columna["id"]."' ");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblimpuestos = $row['imptaxes'];
	$lblimpuestos = round($lblimpuestos, 2);
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimpuestos);
	
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as excluidos from ".$prefixsql."fc_lineas where idfv = '".$columna["id"]."' and exclufactu = '1'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblexcluidos = $row['excluidos'];
	$lblexcluidos = round($lblexcluidos, 2);
	
	$totalfactura = $lblbaseimponible + $lblimpuestos + $lblexcluidos;
	$totalfactura = round($totalfactura, 2);
	
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totalfactura);
	
	
}

$letra = "D";
$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, "TOTAL");
$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

$letra = "E";
$filaexcel = $filaexcel -2;
$formula = '=SUM('.$letra.'2:'.$letra.$filaexcel.')';

$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);


	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$seriecompras."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fc_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
		
	}

++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);



// ---------------------- FIN COMPRAS --------------------------


// ---------------------- VENTAS RECTIFICATIVAS --------------------------
$hojaactualexcel = "1";
$objPHPExcel->createSheet($hojaactualexcel);//creamos la pestaña
$objPHPExcel->setActiveSheetIndex($hojaactualexcel);
$objPHPExcel->getActiveSheet()->setTitle("Rectificativas Venta");

$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(15);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(12);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(15); 
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(25);
 
$objPHPExcel->setActiveSheetIndex($hojaactualexcel)
            ->setCellValue('A1', 'Fecha factura')
            ->setCellValue('B1', 'Factura')
            ->setCellValue('C1', 'Nif')
            ->setCellValue("D1", "Razon social")
			->setCellValue("E1", "Base imponible");
$letra = "";
$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventasr."' order by orden");
while($columna = mysqli_fetch_array($cnsimpuestos))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lbltax = $row['impuesto'];
	
	
	if ($letra == "")
	{$letra = "F";}
	else
	{
		++$letra; //sumamos la letra
	}
	
	$celda = $letra."1";
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lbltax);
	$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
	
}
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "impuestos");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);
			
		++$letra;	
		$celda = $letra."1";
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel)	->setCellValue($celda, "Total Factura");
		$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

//insertamos las filas - facturas
$filaexcel = "1";

$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fvr where idserie = '".$serieventasr."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
while($columna = mysqli_fetch_array($cnsfacturas))
{
	$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$columna["idtercero"]."'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblnif = $row['nif'];
	$lblrazonsocial = $row['razonsocial'];
	
		
	$filaexcel = $filaexcel +1;
	$celda = "A".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["fecha"]);
	$celda = "B".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $columna["codigo"]);
	$celda = "C".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblnif);
	$celda = "D".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblrazonsocial);		
	
	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql."fvr_lineas where idfv = '".$columna["id"]."' and exclufactu = '0'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lblbaseimponible = $auxrow["importe"];
	$lblbaseimponible = round($lblbaseimponible,2);
	$celda = "E".$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblbaseimponible);

	$letra = "E";
	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventasr."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fvr_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$celda = $letra.$filaexcel;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimptax);
		
	}
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as imptaxes from ".$prefixsql."fvr_lineas_tax where idfv = '".$columna["id"]."' ");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblimpuestos = $row['imptaxes'];
	$lblimpuestos = round($lblimpuestos, 2);
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $lblimpuestos);
	
	
	$sqlcnsaux= $mysqli->query("select SUM(importe) as excluidos from ".$prefixsql."fvr_lineas where idfv = '".$columna["id"]."' and exclufactu = '1'");
	$row = mysqli_fetch_assoc($sqlcnsaux);
	$lblexcluidos = $row['excluidos'];
	$lblexcluidos = round($lblexcluidos, 2);
	
	$totalfactura = $lblbaseimponible + $lblimpuestos + $lblexcluidos;
	$totalfactura = round($totalfactura, 2);
	
	++$letra;
	$celda = $letra.$filaexcel;
	$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totalfactura);
	
	
}

$letra = "D";
$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, "TOTAL");
$objPHPExcel->getActiveSheet()->getStyle($celda)->getFont()->setBold(true);

$letra = "E";
$filaexcel = $filaexcel -2;
$formula = '=SUM('.$letra.'2:'.$letra.$filaexcel.')';

$filaexcel = $filaexcel +2;
$celda = $letra.$filaexcel;

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);


	//calculamos los diferentes impuestos
	$cnsimpuestos = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$serieventasr."' order by orden");
	while($coltax = mysqli_fetch_array($cnsimpuestos))
	{
			
		$sqlcnsaux= $mysqli->query("select SUM(importe) as imptax from ".$prefixsql."fvr_lineas_tax where idfv = '".$columna["id"]."' and idtax = '".$coltax["idimpuesto"]."'");
		$row = mysqli_fetch_assoc($sqlcnsaux);
		$lblimptax = $row['imptax'];
		$lblimptax = round($lblimptax, 2);
		++$letra;
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
		
	}

++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);
++$letra;
		
		$filaexcelcalc = $filaexcel -2;
		$formula = '=SUM('.$letra.'2:'.$letra.$filaexcelcalc.')';
		$celda = $letra.$filaexcel;

		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $formula);



// ---------------------- FIN VENTAS RECTIFICATIVAS --------------------------








$hojaactualexcel = "0";
$objPHPExcel->createSheet($hojaactualexcel);//creamos la pestaña
$objPHPExcel->setActiveSheetIndex($hojaactualexcel);
$objPHPExcel->getActiveSheet()->setTitle("Resumen");


$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(11);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(35);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(11);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(3);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("F")->setWidth(12);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("F")->setWidth(11);


$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B3", "Resultados balance");
$objPHPExcel->getActiveSheet()->getStyle("B3")->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B4", "Serie Facturas de Venta");
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B5", "Serie Fact. Rectificativas de Venta");
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B6", "Serie Facturas de Compra");

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("C4", $lblserieventas);
$objPHPExcel->getActiveSheet()->getStyle("C4")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("C5", $lblserieventasr);
$objPHPExcel->getActiveSheet()->getStyle("C5")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("C6", $lblseriecompras);
$objPHPExcel->getActiveSheet()->getStyle("C6")->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("D4", "Fecha inicio");
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("D5", "fecha fin");


$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("F4", $cfechainicio);
$objPHPExcel->getActiveSheet()->getStyle("F4")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("F5", $cfechafin);
$objPHPExcel->getActiveSheet()->getStyle("F5")->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('B3:F3')->getFill()
->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
->getStartColor()->setARGB('FFE8E5E5');




$objPHPExcel->setActiveSheetIndex(0); //Establecemos que la primera hoja sea la que quede abierta



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save("files/usr/pedro/excel.xlsx");

$objWriter->save($rutaficheroexcel);

//$objWriter->save('php://output');

?>