<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tickets where id = '".$hidticket."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbid = $row['id'];
$dbidtipo = $row['idtipo'];
$dbresumen = $row['resumen'];
$dbidasignado = $row['idasignado'];
$dbidestado = $row['idestado'];
$dbproblema = $row['problema'];
$dbsolucion = $row['solucion'];
$dbidafectado = $row['idafectado'];

if ($dbidestado == '0'){$sestado = "Cerrado";}
if ($dbidestado == '1'){$sestado = "Abierta";}

$ConsultaMySql= $mysqli->query("SELECT id, tipo from ".$prefixsql."it_tipos where id = '".$dbidtipo."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$stipo = $row['tipo'];

$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users where id = '".$dbidasignado."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
if ($dbidasignado == '0')
{
	$sasignado = "<sin asignar>";
}
else
{
	$sasignado = $row['display'];
}

if ($dbidafectado == '0')
{$spartecliente = ".....................................";}
else
{
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$dbidafectado."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbidtercero = $row["idtercero"];
	$dbtelfcontacto = $row["tel"];
	$dbnomcontacto = $row["nombre"];
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$spartecliente = $row["razonsocial"];
	$sparteclientetel = $row["tel"];

}


$pdf = new FPDF();
//$pdf = new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->text(10,10, "LNXGEST");

$pdf->SetFont('Arial','',10);
$str = utf8_decode("Servicios integrales de informática y telecomunicaciones");
$pdf->text(40,10, $str);
$pdf->Line(10, 11, 200, 11);
$pdf->SetFont('Arial','I',10);
$str = utf8_decode("Asistencia técnica");

$pdf->setY(13);
$pdf->setX(10);
$pdf->Cell(190,5,$str,0,1,'R');
$pdf->setY(17);
$pdf->Cell(190,5,"93 789 38 34",0,1,'R');

$pdf->setY(30);
$pdf->setX(10);

$pdf->SetFont('Arial','B',10);
$pdf->text(10,30, $stipo.' '.$hidticket);
$pdf->text(50,30, "Cliente: ".$spartecliente);
$pdf->SetFont('Arial','',10);
$str = utf8_decode($dbnomcontacto);
$pdf->text(50,35, $str);

$pdf->text(170,30, "Telefono(s): ");
$pdf->SetFont('Arial','',10);
$pdf->text(170,35, $sparteclientetel);
$pdf->text(170,40, $dbtelfcontacto);




$pdf->text(11,60, "Descripcion asistencia");
$pdf->Line(10, 55, 200, 55);
	$pdf->Line(10, 55, 10, 190);
	$pdf->Line(200, 55, 200, 190);
	
	$pdf->setY(65);
	$pdf->setX(12);
	$pdf->SetFont('Arial','',10);
	$str = utf8_decode($dbproblema);
	$pdf->MultiCell(180, 5,$str ,0, 'L');

	if ($dbsolucion <> '')
	{
	$pdf->SetFont('Arial','B',10);
	$pdf->text(12, 100, "Soluci�n");

	$pdf->setY(105);
	$pdf->setX(12);
	$pdf->SetFont('Arial','',10);
	$str = utf8_decode($dbsolucion );
	$pdf->MultiCell(180, 5,$str ,0, 'L');}

$pdf->Line(10, 150, 200, 150);


	

$pdf->SetFont('Arial','',10);
$pdf->text(12, 155, "Material");
$pdf->Line(10, 190, 200, 190); //ñinea horizontal matriales




//campos fechas y costes
$pdf->Line(10, 200, 200, 200); //linea horizontal superior

$pdf->Line(10, 200, 10, 245); //linea margen izquierda
$pdf->Line(200, 200, 200, 245); //linea margen derecha

$pdf->Line(130, 200, 130, 245); //linea vertical 3

$pdf->Line(60, 200, 60, 228); //linea vertical 2 (separa entrada y salida)

$pdf->setX(10);
$pdf->setY(200);
$pdf->Cell(60,10,"Hora entrada",0,0,'C');
$pdf->Cell(60,10,"Hora salida",0,0,'C');
$pdf->Cell(60,10,"Total",0,1,'C');

$pdf->Line(10, 210, 200, 210); //linea horizontal

$pdf->Line(10, 228, 200, 228);
$pdf->setX(10);
$pdf->setY(225);
$pdf->Cell(120,10,"Total horas",0,0,'R');
$pdf->Line(10, 233, 200, 233);
$pdf->setX(10);
$pdf->setY(231);
$pdf->Cell(120,10,"(Impuestos NO incluidos) Total importe",0,0,'R');
$pdf->Line(10, 239, 200, 239);
$pdf->setX(10);
$pdf->setY(237);
$pdf->Cell(120,10,"Pagado",0,0,'R');
$pdf->SetFont('Arial','',8);
$pdf->text(135, 244, "[__] NO [__] SI ________________");

$pdf->Line(10, 245, 200, 245); //linea horizontal inferior

//Firmas cliente y tecnico


$pdf->Line(10, 250, 200, 250);



$pdf->Line(10, 250, 10, 285);

$pdf->setX(10);
$pdf->setY(248);
$pdf->Cell(60,10,"Firma cliente confiorme condiciones",0,0,'C');
$pdf->Cell(60,10,"Firma cliente confiorme condiciones",0,0,'C');
$pdf->Cell(60,10,"Firma cliente confiorme condiciones",0,1,'C');

$pdf->Line(70, 250, 70, 285);

$pdf->setX(15);
$pdf->setY(251);
$pdf->Cell(60,10,"en la parte posterior de este",0,0,'C');
$pdf->Cell(60,10,"en la parte posterior de este",0,0,'C');
$pdf->Cell(60,10,"en la parte posterior de este",0,1,'C');

$pdf->Line(130, 250, 130, 285);

$pdf->setX(20);
$pdf->setY(254);
$pdf->Cell(60,10,"formulario y entrada equipo a taller",0,0,'C');
$pdf->Cell(60,10,"formulario y finalizacion asistencia",0,0,'C');

$pdf->Line(200, 250, 200, 285);

$pdf->Line(10, 285, 200, 285);


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$usuariofolder = $row['username'];

if ($flstprinter == '0')
{
	//si la impresora es la PDF, entonces genera un archivo accesible para el usuario
	$rutaficheropdf = "files/usr/".$usuariofolder."/listado.pdf";
}

if ($flstprinter > '0')
{
	//si la impresora selecionada es diferente de la PDf
	//entonces genera el pdf en otra ruta que sera descargada por lnxgest print server
	//tambien ha de generar el archivo de texto una vez generado el PDF
	function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}
	 
		
	$ficherito = generarCodigo(15); // genera un cÃ³digo de 15 caracteres de longitud.
	
	
	$rutaficheropdf = "files/spool/job_".$ficherito.".pdf";
	
	//ahora que sabemos el nombre del fichero habria que insertarlo en la base de datos
	//nombre del archivo y la impresora de salida y el estado si ha sido recogido el archivo y si ha sido imprimido
	
	
	$prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo) values ('".$flstprinter."', 'job_".$ficherito.".pdf', '2')");
	
}


$pdf->Output('F', $rutaficheropdf); //genera el archivo donde toque

?>