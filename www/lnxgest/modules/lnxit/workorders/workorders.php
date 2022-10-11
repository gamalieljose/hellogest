<p>Listado partes pendientes de procesar</p>

<?php

$rutaficheritosftp = "modules/lnxit/workorders/files";

if (file_exists($rutaficheritosftp))
{
//Si existe el directorio muestra la tabla de documentos

echo '<table width="100%">
<tr class="maintitle"><td width="40"> </td><td>Nombre del archivo</td></tr>';

$directorio = opendir($rutaficheritosftp);
while ($archivo = readdir($directorio))
{
	if ($archivo == '..' || $archivo == '.')
	{}else{
	//if (is_file($archivo)) 
	//{
	//SI es un archivo, entonces muestralo, sino, pasa olimpicamente

		echo '<tr><td><a class="btnedit" href="index.php?module=lnxit&section=workorders&action=ver&fichero='.$archivo.'">Procesar</a></td>';
		echo '<td><a href="'.$rutaficheritosftp.'/'.$archivo.'" target="_blank">'.$archivo.'</a></td></tr>';
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
<p>Un script que recoge via ftp los ficheros PDF ubicados en lnxgest.es y los MUEVE a 
la carpeta /lnxgest/sync/in/partes/ </p>
<p>Aqui es donde se procesan los ficheros para importarlos a la aplicacion de partes de trabajo</p>