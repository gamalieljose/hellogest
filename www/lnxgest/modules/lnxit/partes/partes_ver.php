<?php
echo '<a class="btnedit" href="index.php?module=lnxit&section=partes">Volver al listado</a> ';

echo ' <a class="btnedit" href="#">Procesar este parte</a> ';

$ficheritoxml = $_GET["fichero"];

echo '<p>partes: '.$ficheritoxml.'</p>';


$ficheroxml = simplexml_load_file("modules/lnxit/partes/xmlfiles/".$ficheritoxml);

$objEstudiantes=$ficheroxml->parte;
foreach($objEstudiantes as $campoparte)
{
	echo '<p>resumen: '.$campoparte->resumen.'</p>';
	echo '<p>albaran: '.$campoparte->albaran.'</p>';
	echo '<p>descripcion: '.$campoparte->descripcion.'</p>';
	echo '<p>importe: '.$campoparte->importe.'</p>';
	
}



?>