<?php
//$idproyecto = $_GET["idpy"];
$idticket = $_POST["hidticket"];
$fhaccion = $_POST["haccion"];
$fhfichero = $_POST["hfichero"];




$rutadoc = "modules/lnxit/files/".$idticket;

if ($fhaccion == 'new')
{
	
	if (file_exists($rutadoc))
	{
		//Si existe la carpeta del proyecto
		//entonce NO crea la carpeta
		
	}
	else
	{
		//No existe la carpeta del proyecto
		//si no existe, entonces hay que crear carpeta
		
		
		// Para crear una estructura anidada se debe especificar
		// el parámetro $recursive en mkdir().

		if(!mkdir($rutadoc, 0777, true)) {
			die('<p><b>Fallo al crear las carpetas del proyecto</b></p>');
		}
		//Con esto, como NO existe, hemos creado la carpeta
	}

	//una vez que existe moveremos el fichero aqui
	move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutadoc."/".$_FILES['fileficherito']['name']);
}
if ($fhaccion == 'delete')
{
	unlink($rutadoc."/".$fhfichero);
}

header( "refresh:2;url=index.php?module=lnxit&section=docs&id=".$idticket."" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>';
if ($fhaccion == 'delete')
{$mensaje = "Documento eliminado con éxito";}
if ($fhaccion == 'new')
{$mensaje = "Documento subido con éxito";}
	echo '<tr><td>'.$mensaje.'</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module=lnxit&section=docs&id='.$idticket.'">Aceptar</a></td></tr>
	</table></div>';
?>