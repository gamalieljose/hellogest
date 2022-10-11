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
		$pdf->text(10,10, "LNXGEST");

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
		
		$pdf->text(20,285, "Pagina 1 de 2");
		
		$pdf->AddPage('P', 'A4');
		$pdf->SetMargins(5, 5 , 5);
		$pdf->SetAutoPageBreak(false,15);
		
		$textocodiciones = "De acuerdo con las disposiciones legales especificadas en el Real Decreto por el cual se regula la prestación de servicios de reparaciones de dispositivos electrónicos y eléctricos para uso doméstico se informa que:

	1.	Las reparaciones se cobran al contado en el momento de la retirada del equipo o dispositivo.
	2.	El precio de las reparaciones de cualquier equipo estará de acuerdo a las tarifas vigentes de nuestra empresa. Actualmente las tarifas son de 39.95 €/hora y para equipos con Windows Server, SQL Server, Exchange o tareas relacionas con estos productos o similares en cualquiera de sus versiones, Linux y Apple son de 55 €/hora de mano de obra más impuestos. En horario de 20.00 a 08.00 y/o en festivos, se cobrará a razón de 1.5 veces la tarifa general..(59.25 y 82.50 respectivamente) Puede consultar nuestras tarifas mediante teléfono al 937893834 o bien por correo electrónico a info@lnxgest.es en cualquier momento.
	3.	Todo usuario tiene derecho a un diagnóstico previo escrito, de las reparaciones o servicios que solicite. Normalmente contra entrega de equipo o impresora y según el detalle de avería que nos facilite el cliente, se entregará el diagnóstico previo.  Este diagnóstico previo solicitado por nuestro cliente, será cotizado aproximadamente en el momento o estará en disposición del cliente en un periodo no superior a seis días hábiles. En el caso de equipos electrónicos como portátiles o similares, tendrá un presupuesto previo de 20 euros + impuestos.
	4.	El cliente está obligado a facilitar todos los datos pertinentes y precisos para la recogida y entrega del equipo, como datos de facturación, números de serie, marca, contraseñas u otros, para poder acceder al sistema operativo, breve descripción de los síntomas por los cuales nos entrega el equipo  al servicio técnico, así como indicar detalladamente el material que se entrega.
	5.	La empresa no se hace responsable del estado del equipo ni de su información y/o contenido antes de realizar un diagnóstico.
	6.	Una vez que nuestro servicio técnico manipule, abra, reinstale, o pruebe el equipo en cuestión, el usuario o cliente quedará obligado al pago de un mínimo para la elaboración del diagnóstico que será una cantidad entre 20 euros  más impuestos y 39.95 euros más impuestos, todo dependiendo del tiempo empleado por el técnico. Este importe solo se cobrará en el caso de haber dejado su equipo en nuestras instalaciones por solicitar un presupuesto detallado y diagnosticado la avería, no fuera aceptado el presupuesto inicial por el coste o bien por el incremento de averías ocultas o bien por cualquier otro motivo. En estos casos el importe de la elaboración del presupuesto detallado y pruebas en su equipo será de una cantidad  entre 20 euros más impuestos y 39.95 euros más impuestos, todo dependiendo del tiempo empleado por el técnico en elaboración del diagnóstico previo.
	7.	Para los equipos que están en garantía por la nuestra empresa, será obligatorio la presentación de la factura emitida por la empresa en su momento y detalle completo de la avería que el cliente observó, para ser reproducida en nuestro servicio técnico con la mayor facilidad posible. En el caso de las impresoras exigimos una prueba de impresión.
	8.	Todo usuario quedará obligado al pago correspondiente de los costes de almacenaje de su equipo a partir de un mes desde la fecha de notificación telefónica o cualquier otro medio, que este no ha sido retirado de nuestras instalaciones. La tarifa de almacenaje es de un euro al día y equipo más impuestos, incluyendo fines de semana y festivos. Si pasados 30 días naturales desde la solicitud del presupuesto o desde que dejó el equipo en nuestras instalaciones o desde la última notificación por nuestra parte, del estado actual del diagnóstico, presupuesto o reparación, estos equipos pasaran a disposición de nuestra empresa para ser utilizados o despiezados y amortizar así el precio del diagnóstico presupuesto o reparación sin derecho a reclamar.
	9.	Las averías o defectos ocultos que eventualmente, puedan aparecer durante la confección del diagnóstico, presupuesto o reparación del equipo, serán puestos en conocimiento del usuario o cliente lo antes posible, siendo incluidos al presupuesto inicial. En caso de subir demasiado la reparación y no ser aceptada por el cliente, se cobraría el mínimo por la confección del presupuesto o diagnóstico que sería una cantidad entre 20 euros más impuestos y 39.95 euros más impuestos, todo dependiendo del tiempo invertido por el técnico o en caso de no reparación y de 39.95 euros más impuestos en concepto de mano de obra si ya se resolvieron alguna de las averías previas presupuestadas anteriormente.
	10.	Ni la empresa, ni el servicio técnico se responsabiliza de las posibles pérdidas de información o configuraciones ocurridas como consecuencia de la manipulación de los equipos entregados para su reparación. Aunque se podrán todos los medios para que esto no ocurra, es responsabilidad del cliente tener realizadas de manera correcta las copias de seguridad de todos sus datos. La empresa tampoco se responsabiliza de posibles problemas de software o hardware que tengan los equipos de los clientes como virus, malware, spyware, similares u otros...
	11.	La empresa o establecimiento dispone de hojas de reclamación a disposición de los usuarios que así lo soliciten, pero atenderemos ágilmente cualquier queja que el cliente pueda tener en cuanto a la reparación de cualquier dispositivo.
	12.	Todas las reparaciones están garantizadas 3 meses a partir de fecha de reparación, según las condiciones especificadas en el artículo 6º del Real Decreto, número 58/1988 del 29 de enero, por el cual se regula la prestación de servicios de reparación de aparatos de uso doméstico. Esta garantía de reparación es sobre la misma avería y no sobre otras que pudieran producirse en este corto periodo de tiempo.
	13.	La empresa atenderá a equipos, impresoras etc. Fuera de garantía de los diferentes fabricantes o marcas, pero en algunos casos no podemos responsabilizarnos del término de entrega del equipo reparado, así pues, depende de los términos que estos fabricantes para entregarnos los recambios originales y algunos fabricantes suelen tardar mucho en el tiempo. En caso de alargarse mucho en los términos y si se llegar a llegar a desmontar el equipo y el cliente quiere retirarlo antes de la reparación, se facturará un mínimo entre 20 euros más impuestos y 39.95 euros más impuestos, todo dependiendo del tiempo empleado por el técnico, al igual que en toda reparación no aceptada.
	14.	La empresa no se responsabiliza de los desperfectos externos así como golpes, ralladas, etc. Que no se reflejen en el formulario de reparación.
	15.	Cuando el cliente reciba el equipo reparado, tendrá que comprobar antes de nada, que el mismo se encuentra sin ningún deterioro físico diferente de cuando fue entregado al servicio técnico, tanto el equipo como todos sus accesorios.
	16.	Cuando la empresa entrega el equipo reparado, será trabajo del cliente y no de la empresa ni del servicio técnico, la instalación y/o configuración del software o hardware que habitualmente el usuario utilice (excepto aquel que entre dentro del presupuesto inicial o diagnóstico previo para la correcta reparación del equipo averiado) como reinstalación y/o configuración de impresoras, correo electrónico, redes sociales u otros dispositivos o aplicaciones.
	17.	En caso de que el cliente quiera que la empresa o el servicio técnico le reinstale y/o configure algún dispositivo detallado en el apartado anterior, se cobrará a parte la tarifa vigente dependiendo del tipo de servicio y tiempo del técnico.
	18.	La garantía no cubre el incorrecto funcionamiento producido por una incorrecta instalación de software, aparición de virus o bien por el uso incorrecto. Rotura por golpes sobretensiones o manipulación interna ajena a este servicio técnico.
	19.	La firma del cliente, en el documento de entrega del equipo al servicio técnico, significa la aceptación de todas las condiciones de uso y reparación de la empresa.
	20.	Cualquier manipulación por parte del cliente o persona ajena a LNXGEST, una vez reparado y entregado el equipo por parte del servicio técnico, anula la garantía de reparación.
	21.	Se abonará el 100% del importe a la hora de contratar cualquier servicio relacionado con registro de dominios, alojamientos web y/o similares.
	22.	Para proyectos de servicios y/o programación web, se abonará el 50% por adelantado y el 50% a la entrega de los trabajos realizados. Cualquier modificación a posterior se abonará por separado según condiciones del proyecto.
	23.	Los pedidos inferiores a 50 euros más impuestos, se abonarán el 100% antes de efectuar el pedido.
	24.	El impago de un servicio finalizado será motivo por el cual su equipo podrá ser bloqueado a distancia mediante software de terceros instalado en su equipo hasta que no efectúe el pago del mismo.
	25.	LNXGEST no se hará responsable de la pérdida de información a causa de un mal funcionamiento de los medios (discos duros, pen drive, CD, DVD…) del cliente, ya que es responsabilidad del cliente realizar las copias de seguridad. 
	26.	En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre de Protección de Datos de Carácter Personal (LOPD), informa de las siguientes consideraciones: Los datos de carácter personal que se faciliten por correo electrónico o mediante el siguiente formulario serán incluidos en un fichero titularidad de LNXGEST, cuya finalidad es contestar a las consultas y obtener datos estadísticos de las mismas. Los datos recabados son imprescindibles para el establecimiento y desarrollo de la relación. Con la firma del formulario, autoriza la cesión de sus datos para los fines indicados.
	";
		
		$pdf->SetFont('Arial','B',10);
		$str = utf8_decode("Condiciones generales para los servicios, dispositivos u objetos.");
		$pdf->setX(1);
		$pdf->setY(10);
		$pdf->MultiCell(195, 4,$str,0,"C",0);
		
		
		$pdf->SetFont('Arial','',8);
		$str = utf8_decode($textocodiciones);
		$pdf->setX(0);
		$pdf->setY(15);
		$pdf->MultiCell(198, 3.5,$str,0,"J",0);
		$pdf->SetFont('Arial','',10);
		
		$pdf->text(20,285, "Pagina 2 de 2");
		
	$rutaficheropdf = $rutatemp."parte.pdf";
		$pdf->Output('F', $rutaficheropdf); //genera el archivo donde toque
		
		//eliminamos el archivo de la firma
		unlink($ficherofirma);
		
?>
