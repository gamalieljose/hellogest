<?php
// ID Activo:
$fhidactivo = $_POST["hidactivo"];
//imprimir ticket TPV???
$fchkticket = $_POST["chkticket"];

//Posicion a imprimir la etiqueta
$fselfila = $_POST["selfila"];
$fselcolum = $_POST["selcolum"];

//obtenemos los valores del activo
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ita_activos where id = '".$fhidactivo."' ");
$rowetiqueta = mysqli_fetch_assoc($ConsultaMySql);

$dbid = $rowetiqueta["id"];
$dbnombre = $rowetiqueta["nombre"];

$dbnombre = utf8_decode($dbnombre);

//---------------------INICIO DOCUMENTO ----------------------------

$margenx = "5";
$margeny = "15";


$posx = ($fselcolum * 40) + $margenx; 
$posy = ($fselfila * 21.2) + $margeny; 

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','',10);

$posy = $posy;
$pdf->text($posx,$posy, "LNXGEST 937893834");
$posy = $posy +5;
$pdf->text($posx,$posy, "Equipo: ".$fhidactivo);

//---------------------FIN DOCUMENTO ----------------------------



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