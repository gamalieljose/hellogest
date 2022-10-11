<?php
$idticket = $_GET["id"];


echo '<a class="btnedit" href="index.php?module=lnxit&section=docs&action=new&id='.$idticket.'">Agregar documento</a> ';
?>
<p>Listado documentos</p>

<?php

$rutaproyecto = "modules/lnxit/files/".$idticket;

if (file_exists($rutaproyecto))
{
//Si existe el directorio muestra la tabla de documentos

echo '<table width="100%">
<tr class="maintitle"><td>Accion</td><td>Nombre del archivo</td></tr>';

$directorio = opendir($rutaproyecto);
while ($archivo = readdir($directorio))
{
	if ($archivo == '..' || $archivo == '.')
	{}else{
	//if (is_file($archivo)) 
	//{
	//SI es un archivo, entonces muestralo, sino, pasa olimpicamente

		echo '<tr><td><a class="btnenlacecancel" href="index.php?module=lnxit&section=docs&action=del&id='.$idticket.'&file='.$archivo.'">Eliminar</a></td><td><a href="'.$rutaproyecto.'/'.$archivo.'" target="_blank">'.$archivo.'</a></td></tr>';
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