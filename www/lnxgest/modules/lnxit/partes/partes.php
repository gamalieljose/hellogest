<?php
echo '<a class="btnedit" href="#">Procesar partes</a> ';
?>
<p>Listado partes pendientes de procesar</p>

<?php

$rutaficheritosxml = "modules/lnxit/partes/xmlfiles/";

if (file_exists($rutaficheritosxml))
{
//Si existe el directorio muestra la tabla de documentos

echo '<table width="100%">
<tr class="maintitle"><td width="40"> </td><td width="20"> </td><td>Nombre del archivo</td></tr>';

$directorio = opendir($rutaficheritosxml);
while ($archivo = readdir($directorio))
{
	if ($archivo == '..' || $archivo == '.')
	{}else{
	//if (is_file($archivo)) 
	//{
	//SI es un archivo, entonces muestralo, sino, pasa olimpicamente

		echo '<tr><td><a class="btnedit" href="index.php?module=lnxit&section=partes&action=ver&fichero='.$archivo.'">Ver</a></td>';
		echo '<td align="center"><input type="checkbox" name="chkfichero[]" value="'.$archivo.'"/></td><td><a href="'.$rutaficheritosxml.'/'.$archivo.'" target="_blank">'.$archivo.'</a></td></tr>';
	//}
	//Buscamos por dentro del directorio y mostramos los archivos
	
	
	}		
}

echo '</table>';

}
else
{
echo '<p>NO existen documentos para este ticket</p>';
}


?>

<p> </p>
<p>Un script que recoge via ftp los ficheros XML ubicados en lnxgest.es y los MUEVE a 
la carpeta modules/lnxit/partes/xmlfiles </p>
<p>Aqui es donde se procesan los ficheros para importarlos a la aplicacion de albaranes</p>