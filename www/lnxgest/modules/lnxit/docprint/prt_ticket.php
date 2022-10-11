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



$pdf = new FPDF();
//$pdf = new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,1, $stipo.' '.$hidticket);


$pdf->setY(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,1, 'Asignado a: '.$sasignado );
$pdf->setX(150);

	
if ($dbidestado == '0') $sestado = "Cerrado";
if ($dbidestado == '1') $sestado = "Abierto";
if ($dbidestado == '2') $sestado = "En proceso";
if ($dbidestado == '3') $sestado = "Pendiente de terceros";

$pdf->Cell(20,1, 'Estado: '.$sestado );

$pdf->setY(25);
$pdf->setX(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(20,1, $dbresumen );
$pdf->SetFont('');

$pdf->setY(30);
$pdf->setX(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,1, "Problema" );
$pdf->SetFont('');

$pdf->setY(35);
$pdf->setX(10);
$pdf->MultiCell(190, 5,$dbproblema,0, 'L');

$pdf->Line(10, 35, 200, 35);
$pdf->Line(10, 35, 10, 125);
$pdf->Line(10, 125, 200, 125);
$pdf->Line(200, 35, 200, 125);



$pdf->setY(130);
$pdf->setX(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,1, "Solucion" );
$pdf->SetFont('');

$pdf->setY(135);
$pdf->setX(10);
$pdf->Cell(20,1, $dbsolucion );

$pdf->MultiCell(190, 5,$dbsolucion ,0, 'L');

$pdf->Line(10, 135, 200, 135);
$pdf->Line(10, 135, 10, 235);
$pdf->Line(10, 235, 200, 235);
$pdf->Line(200, 135, 200, 235);

//$pdf->WriteHTML($dbsolucion );


if ($printseguimientos == "1")
{
	$csqllogs= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_seguimiento where idticket = '".$hidticket."'");
	$rowlogs = mysqli_fetch_assoc($csqllogs);
	$contador = $rowlogs["contador"];

	if ($contador > '0')
	{

	//indicamos que se añaden el seguimiento en la siguiente pagina.	
	$pdf->setY(275);
	$pdf->setX(10);
	$pdf->Cell(20,1, "Se imprime el siguimiento en la(s) siguiente(s) página(s)..." );

	
$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,1, $stipo.' '.$hidticket);


$pdf->setY(20);

$pdf->Cell(20,1, 'Asignado a: '.$sasignado );
$pdf->setX(150);
$pdf->Cell(20,1, 'Estado: '.$sestado );

$pdf->setY(40);

$pdf->Cell(35,7,'Fecha',1,0,'C');
$pdf->Cell(30,7,'Usuario',1,0,'C');
$pdf->Cell(125,7,'Seguimiento',1,1,'C');
$pdf->SetFont('');

		$cnssql= $mysqli->query("SELECT * from ".$prefixsql."it_seguimiento where idticket = '".$hidticket."' order by id desc");

		while($colseg = mysqli_fetch_array($cnssql))
		{
			$pdf->Cell(35,5,$colseg["fecha"],0,0,'L');
			$pdf->Cell(30,5,$colseg["iduser"],0,0,'L');
			//$pdf->Cell(125, 5,$colseg["seguimiento"],0,1,'L');

			$pdf->MultiCell(125, 5,$colseg["seguimiento"],0,'L');

		}

	}

}




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