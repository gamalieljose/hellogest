<div align="center">
<p>Listado</p>
<p><a class="btnsubmit" href="index.php?module=biblio&section=libros">Atras</a> 
<a class="btnsubmit" href="modules/biblio/libros/file/listado.pdf" target="_blank">Imprimir listado</a>

</p>
</div>


<?php 
$sqloculto = $_POST["hsql"];

//echo '<p>SQL: '.$_POST["hsql"].'</p>'; ?>


<?php
require('scripts/fpdf/fpdf.php');
require('scripts/fpdf/writehtml.php');


//$pdf = new FPDF();
$pdf = new FPDF('P','mm',array(210,297));
//$pdf = new PDF_HTML();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->text(10,10, "LNX BIBLIO");

$pdf->SetFont('Arial','',10);
$str = utf8_decode("Listado de libros - Pagina 1");
$pdf->text(50,10, $str);
$pdf->Line(10, 11, 200, 11);


//lineas resultado
$pdf->setY(20);
// $pdf->Cell(30,5,"ID",1,0,'L');
$pdf->Cell(20,5,"Codigo",1,0,'L');
$pdf->Cell(85,5,"Libro",1,0,'L');
$pdf->Cell(50,5,"Autor",1,0,'L');
$pdf->Cell(20,5,"Idioma",1,1,'L');
//$pdf->Cell(20,5,"Categoria",1,1,'L');

$ConsultaMySql= $mysqli->query($sqloculto);

$pagina = 1;

while($ovlineas = mysqli_fetch_array($ConsultaMySql))
{
	$contar = $contar +1;
	
	if ($contar == 50)
	{
		$contar = 0;
		$pagina = $pagina +1;
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->text(10,10, "LNX BIBLIO");

		$pdf->SetFont('Arial','',10);
		$str = utf8_decode("Listado de libros - Pagina ".$pagina);
		$pdf->text(50,10, $str);
		$pdf->Line(10, 11, 200, 11);


		//lineas resultado
		$pdf->setY(20);
		// $pdf->Cell(30,5,"ID",1,0,'L');
		$pdf->Cell(20,5,"Codigo",1,0,'L');
		$pdf->Cell(85,5,"Libro",1,0,'L');
		$pdf->Cell(50,5,"Autor",1,0,'L');
		$pdf->Cell(20,5,"Idioma",1,1,'L');
		
	}


//	$pdf->Cell(30,5,$ovlineas["id"],0,0,'L');
	$pdf->Cell(20,5,$ovlineas["codigo"],0,0,'L');
	$pdf->Cell(85,5,utf8_decode($ovlineas["libro"]),0,0,'L');
	
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."biblio_autores where id = '".$ovlineas["idautor"]."' ");
	$rsaux = mysqli_fetch_assoc($cnsaux);
	$dbautor = $rsaux["autor"];
	
	$pdf->Cell(50,5,utf8_decode($dbautor),0,0,'L');
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."biblio_idiomas where id = '".$ovlineas["ididioma"]."' ");
	$rsaux = mysqli_fetch_assoc($cnsaux);
	$dbidioma = $rsaux["idioma"];
	
	$pdf->Cell(20,5,utf8_decode($dbidioma),0,1,'L');
	// $pdf->Cell(20,5,$ovlineas["idcategoria"],0,1,'L');
}



$rutaficheropdf = "modules/biblio/libros/file/listado.pdf";

$pdf->Output($rutaficheropdf); //genera el archivo donde toque

?>