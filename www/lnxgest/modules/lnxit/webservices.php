<?php

$idticket = $_GET["ticket"];
$impresora = $_GET["printer"];




if ($idticket > "0" and $impresora <> '')
{
	header("Content-type: text/xml"); 	
	

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
	 
		
	$ficherito = generarCodigo(15); // genera un cÃƒÂ³digo de 15 caracteres de longitud.
	
	
	$rutaficherotxt = "../files/spool/job_".$ficherito.".txt";
	
	//ahora que sabemos el nombre del fichero habria que insertarlo en la base de datos
	//nombre del archivo y la impresora de salida y el estado si ha sido recogido el archivo y si ha sido imprimido

	
	$impresorasql= $mysqli->query("SELECT * from ".$prefixsql."impresoras where nombre  = '".$impresora."'");
	$row = mysqli_fetch_assoc($impresorasql);
	$idprinter = $row['id'];
	
	
	$prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, display) values ('".$idprinter."', 'job_".$ficherito.".txt', '3', 'Impresión ticket ".$idticket."')");
	
	
	/* Tipos impresoras
	2 - windows printer (pdf)
	3 - windows text printer (txt)
	*/

	
	// GENERAMOS EL ARCHIVO DE TEXTO
	
	
	$file = fopen($rutaficherotxt, "w");
	
	fwrite($file, 'IMPRESION TICKET' . PHP_EOL);
	fwrite($file, $idticket . PHP_EOL);
	fwrite($file, '==========' . PHP_EOL);
	fwrite($file, ' ');
	
	fclose($file);	
	
	//FINALIZAMOS EL ARCHIVO DE TEXTO
	
	
	


	$impresorasql= $mysqli->query("SELECT * from ".$prefixsql."printjobs where idprinter  = '".$idprinter."'");

	header("Content-type: text/xml"); 

	echo'<lnxgest>';


	while($columna = mysqli_fetch_array($impresorasql))
	{
		
		echo '<trabajo id="'.$columna["id"].'">';
		echo '<impresora>'.$columna["printfile"].'</impresora>';
		echo '<tipo>'.$columna["idtipo"].'</tipo>';
		echo '</trabajo>';

	}

		
		
	echo '</lnxgest>';
	
	
	
	
	
}




?>