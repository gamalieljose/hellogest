<?php

require("../scripts/fpdf/fpdf.php");
		require("../scripts/fpdf/writehtml.php");
		
		$cnssql = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$fhidtercero."'");
		$rowaux = mysqli_fetch_assoc($cnssql);
		$dbrazonsocial = $rowaux['razonsocial'];
		$dbtel = $rowaux['tel'];
		
		$partetrabajo = $textoserie."-".$numeroparte;
		$fechaparte = $ctxtfecha;
		$razonsocial = $dbrazonsocial;
		$emailcliente = $ftxtemail;
		$telefonoparte = $dbtel;
		$nombrefirma = $ftxtfirma." ".$ftxtfirmanif;
		$asuntoemail = "Parte de trabajo ".$textoserie."-".$numeroparte;
		$descripciontrabajos = $ftxttrabajo;
		
		$descripcionmaterial = $ftxtmaterial;
		
		
		$textocodicionespeque = "Las reparaciones se cobran al contado en el momento de la retirada del equipo o dispositivo. En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre de Protección de Datos de Carácter Personal (LOPD), informa de las siguientes consideraciones: Los datos de carácter personal que se faciliten por email o mediante el siguiente formulario serán incluidos en un fichero titularidad de LNXGEST, cuya finalidad es contestar a las consultas y obtener datos estadísticos de las mismas. Los datos recabados son imprescindibles para el establecimiento y desarrollo de la relación. Con la firma del formulario, autoriza la cesión de sus datos para los fines indicados y acepta las condiciones generales descritas en el reverso de este documento. El impago de un servicio finalizado será motivo por el cual su equipo podrá ser bloqueado a distancia mediante software de terceros instalado en su equipo hasta que no efectúe el pago del mismo.";
		
		
		$pdf = new FPDF();
		$pdf->AddPage('P', 'A4');
		$pdf->SetFont('Arial','B',16);
		$pdf->text(10,10, "ZETRA IT SERVICES");

		$pdf->SetFont('Arial','',10);

			
		$pdf->Image("../files/usr/pedro/firma.jpg",105,230);
		
		$str = utf8_decode("Servicios integrales de informática y telecomunicaciones");
		$pdf->text(40,10, $str);
		$pdf->Line(10, 11, 200, 11);

		$pdf->SetFont('Arial','',10);

		$str = utf8_decode("info@Lnxgest.es");
		$pdf->text(10,20, $str);
		$pdf->text(10,25, "93 789 38 34");
		
		$pdf->text(45,20, "Parte de trabajo:");
		
		$pdf->SetFont('Arial','',14);
		
		$pdf->setY(22);
		$pdf->setX(45);
		$pdf->Cell(40,7,$partetrabajo,1,1,'C');
		
		$pdf->SetFont('Arial','',10);
		
		$pdf->text(90,20, "Fecha del parte: ".$fechaparte);
		$pdf->text(90,25, "Cliente: ".$razonsocial);
		$pdf->text(90,30, "e-mail enviado: ".$emailcliente);
		$pdf->text(90,35, "Telf: ".$telefonoparte);
		
		$pdf->SetFont('Arial','',14);
		
		$pdf->setY(40);
		$pdf->setX(10);
		$pdf->Cell(190,7,"Trabajos realizados",1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		
		$pdf->setX(10);
		$pdf->setY(50);
		//$pdf->Cell(190, 8,$descripciontrabajos,1,1,'L');
		
		$pdf->MultiCell(190, 8,$descripciontrabajos,0,"L",0);
		
		$pdf->SetFont('Arial','',14);
		
		$pdf->setY(150);
		$pdf->setX(10);
		$pdf->Cell(190,7,"Material",1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->setX(10);
		$pdf->setY(160);
		$pdf->MultiCell(190, 8,$descripcionmaterial,0,"L",0);
		
		$pdf->SetFont('Arial','',8);
		$str = utf8_decode($textocodicionespeque);
		$pdf->setX(10);
		$pdf->setY(180);
		$pdf->MultiCell(190, 5,$str,0,"L",0);
		$pdf->SetFont('Arial','',10);
		
		
		$pdf->setX(10);
		$pdf->setY(220);
		$pdf->Cell(30,5,"Llegada",1,0,'C');
		$pdf->Cell(30,5,"Salida",1,0,'C');
		$pdf->Cell(30,5,"Importe",1,0,'C');
		$str = utf8_decode("Firma y aceptación condiciones ");
		$pdf->Cell(90,5,$str,1,1,'C');
		
		$pdf->Cell(30,5,$chorain,1,0,'C');
		$pdf->Cell(30,5,$choraout,1,0,'C');
		$pdf->Cell(30,5,$ftxtimporte,1,0,'C');
		$pdf->Cell(90,50," ",1,1,'C');
		$str = utf8_decode($nombrefirma);
		$pdf->text(120,270, "Fdo. ".$str);
		
		
		$pdf->text(20,235, "El importe NO incluye impuestos");
		
		if($flstpagado == '1')
		{$str = utf8_decode("Está pagado");}
		else
		{$str = utf8_decode("No está pagado");}
		
		
		$pdf->text(20,240, $str);
		
		
		if($flstfinalizado == '1')
		{$str = utf8_decode("Trabajo finalizado");}
		else
		{$str = utf8_decode("El trabajo NO está finalizado");}
	
		
		$pdf->text(20,250, $str);
		
		$pdf->text(20,285, "Pagina 1 de 1");
		
		
		
	$rutaficheropdf = $rutatemp."parte.pdf";
		$pdf->Output('F', $rutaficheropdf); //genera el archivo donde toque
		
		//eliminamos el archivo de la firma
		unlink($ficherofirma);
		
?>
