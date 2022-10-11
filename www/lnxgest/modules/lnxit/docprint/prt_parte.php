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
	
	$ConsultaMySql= $mysqli->query("SELECT id, razonsocial from ".$prefixsql."terceros where id = '".$dbidtercero."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$spartecliente = $row["razonsocial"];

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
$pdf->Cell(190,5,"902 918 984",0,1,'R');

$pdf->setY(30);
$pdf->setX(10);

$pdf->SetFont('Arial','B',10);
$pdf->text(10,30, $stipo.' '.$hidticket);
$pdf->text(50,30, "Albaran: ................................");

$pdf->text(10,40, "Cliente: ".$spartecliente);
$pdf->text(10,50, "Poblacion: ........................................................................");

$pdf->text(11,60, "Descripcion asistencia");
$pdf->Line(10, 55, 200, 55);
	$pdf->Line(10, 55, 10, 150);
	$pdf->Line(200, 55, 200, 150);
	
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

$pdf->Line(10, 160, 200, 160);
	$pdf->Line(10, 160, 10, 200);
	
	$pdf->Line(50, 160, 50, 200);
	$pdf->Line(100, 160, 100, 200);
	$pdf->Line(150, 160, 150, 200);
	
	$pdf->Line(200, 160, 200, 200);
	
//$pdf->Line(10, 200, 200, 200);
$pdf->SetFont('Arial','B',10);
$pdf->text(25,165, "Fecha");
$pdf->text(65,165, "Hora entrada");
$pdf->text(115,165, "Hora salida");
$pdf->text(170,165, "Total");
$pdf->Line(10, 168, 200, 168);

$pdf->setX(10);
$pdf->setY(200);
$pdf->Cell(140,10,"Total horas",1,0,'R');
$pdf->Cell(50,10," ",1,1,'R');

$pdf->Cell(140,10,"Total importe",1,0,'R');
$pdf->Cell(50,10," ",1,1,'R');

$pdf->text(10,240, "Firma tecnico");
$pdf->Line(10, 245, 75, 245);
$pdf->Line(10, 245, 10, 280);
$pdf->Line(75, 245, 75, 280);
$pdf->Line(10, 280, 75, 280);


$pdf->text(100,240, "Firma cliente");
$pdf->Line(100, 245, 175, 245);
$pdf->Line(100, 245, 100, 280);
$pdf->Line(175, 245, 175, 280);
$pdf->Line(100, 280, 175, 280);





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