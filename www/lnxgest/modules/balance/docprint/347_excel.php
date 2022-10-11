<?php
//header('Content-type: application/vnd.ms-excel');
//header('Content-Disposition: attachment; filename="gex.xlsx"');

require("scripts/phpexcel/Classes/PHPExcel.php");



$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("LNXGEST ERP")
							 ->setLastModifiedBy("LNXGEST ERP")
							 ->setTitle("Modelo 347")
							 ->setSubject("Modelo 347")
							 ->setDescription("Mod 347 generado por LNXGEST ERP")
							 ->setKeywords("Modelo 347 LNXGEST ERP")
							 ->setCategory("Modelo 347");

// ----------------------  VENTAS --------------------------
$hojaactualexcel = "0";
$objPHPExcel->getActiveSheet()->setTitle("Listado");


$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(45);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(20);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(20); 
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(20);
 
$objPHPExcel->setActiveSheetIndex($hojaactualexcel)
            ->setCellValue('A1', 'Tercero')
            ->setCellValue('B1', 'Total Compras')
            ->setCellValue('C1', 'Total Ventas')
            ->setCellValue("D1", "Total");

			
	
$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);


$xnfila = 1;
			
$cnsterceros = $mysqli->query("SELECT id, codcli, codpro, razonsocial from ".$prefixsql."terceros where codcli > '0' or codpro > '0' order by razonsocial");
while($terceros = mysqli_fetch_array($cnsterceros))
{
	$sqlaux1v = $mysqli->query("select * from ".$prefixsql."fv where idserie = '".$serieventas."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') and idtercero = '".$terceros["id"]."'");
	$existefv = $sqlaux1v->num_rows;
	
	$sqlaux1c = $mysqli->query("select * from ".$prefixsql."fc where idserie = '".$seriecompras."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') and idtercero = '".$terceros["id"]."'");
	$existefc = $sqlaux1c->num_rows;
	
	if($existefv > 0 || $existefc > 0)
	{
		$totalfv = 0;
		$sqlauxfv = $mysqli->query("select * from ".$prefixsql."fv where idserie = '".$serieventas."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') and idtercero = '".$terceros["id"]."'");
		while($fvcount = mysqli_fetch_array($sqlauxfv))
		{
			$sqlauxfvlineas = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas where idfv = '".$fvcount["id"]."'");
			$rowfvlineas = mysqli_fetch_assoc($sqlauxfvlineas);
			$importefv = $rowfvlineas["importe"];
			
			$sqlauxfvlineas = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fv_lineas_tax where idfv = '".$fvcount["id"]."'");
			$rowfvlineas = mysqli_fetch_assoc($sqlauxfvlineas);
			$importefvtax = $rowfvlineas["importe"];
			
			$totalfv = $totalfv + $importefv + $importefvtax;
		}
		$totalfv = round($totalfv, 2);
		
		
		
		
		$totalfc = 0;
		$sqlauxfc = $mysqli->query("select * from ".$prefixsql."fc where idserie = '".$seriecompras."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') and idtercero = '".$terceros["id"]."'");
		while($fvcount = mysqli_fetch_array($sqlauxfc))
		{
			$sqlauxfvlineas = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas where idfv = '".$fvcount["id"]."'");
			$rowfvlineas = mysqli_fetch_assoc($sqlauxfvlineas);
			$importefc = $rowfvlineas["importe"];
			
			$sqlauxfvlineas = $mysqli->query("select sum(importe) as importe from ".$prefixsql."fc_lineas_tax where idfv = '".$fvcount["id"]."'");
			$rowfvlineas = mysqli_fetch_assoc($sqlauxfvlineas);
			$importefctax = $rowfvlineas["importe"];
			
			$totalfc = $totalfc + $importefc + $importefctax;
		}
		$totalfc = round($totalfc, 2);
		
		
				
		$totaltercero = $totalfv + $totalfc;
		$totaltercero = round($totaltercero, 2);
		
		
		
		$xnfila = $xnfila +1;
		$celda = "A".$xnfila;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $terceros["razonsocial"]);
		$celda = "B".$xnfila;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totalfc);
		$celda = "C".$xnfila;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totalfv);
		$celda = "D".$xnfila;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $totaltercero);
		$celda = "E".$xnfila;
		$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue($celda, $ftxtmaximporte);
		
		if($totalfc >= $ftxtmaximporte)
		{
			$celdas = "B".$xnfila;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()
						->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setARGB('FFE8E5E5');
			
		}
		if($totalfv >= $ftxtmaximporte)
		{
			$celdas = "C".$xnfila;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()
						->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setARGB('FFFF00');
			
		}
		
		
		
	}
}

//---------------Generamos la hoja resumen--------------------

$hojaactualexcel = "0";
$objPHPExcel->createSheet($hojaactualexcel);//creamos la pestaña
$objPHPExcel->setActiveSheetIndex($hojaactualexcel);
$objPHPExcel->getActiveSheet()->setTitle("Resumen");



$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("A")->setWidth(11);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("B")->setWidth(25);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("C")->setWidth(11);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("D")->setWidth(3);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("F")->setWidth(12);
$objPHPExcel->getActiveSheet($hojaactualexcel)->getColumnDimension("F")->setWidth(11);


$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B3", "Listado Modelo 347");
$objPHPExcel->getActiveSheet()->getStyle("B3")->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B4", "Serie Facturas de Venta");
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("B5", "Serie Facturas de Compra");

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("C4", $lblserieventas);
$objPHPExcel->getActiveSheet()->getStyle("C4")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("C5", $lblseriecompras);
$objPHPExcel->getActiveSheet()->getStyle("C5")->getFont()->setBold(true);

$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("D4", "Fecha inicio");
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("D5", "fecha fin");


$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("F4", $cfechainicio);
$objPHPExcel->getActiveSheet()->getStyle("F4")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex($hojaactualexcel) ->setCellValue("F5", $cfechafin);
$objPHPExcel->getActiveSheet()->getStyle("F5")->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('B3:F3')->getFill()
->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
->getStartColor()->setARGB('FFE8E5E5');

// --------------- FIN hoja resumen ---------------------------




		
$objPHPExcel->setActiveSheetIndex(0); //Establecemos que la primera hoja sea la que quede abierta



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


$objWriter->save($rutaficheroexcel);

//$objWriter->save('php://output');

?>