<?php
$fhaccion = $_POST["haccion"];
$foptfichero = $_POST["optfichero"];
$url_origen = $_POST["url_origen"];

$flstpublico = $_POST["lstpublico"];

$farchivo_module = $_POST["archivo_module"];
$farchivo_linea0 = $_POST["archivo_linea0"];
$farchivo_linea1 = $_POST["archivo_linea1"];
$farchivo_linea2 = $_POST["archivo_linea2"];
$farchivo_display = $_POST["archivo_display"];
$farchivo_publico = $_POST["archivo_publico"];
$farchivo_cat = $_POST["archivo_cat"];

if($farchivo_cat == ''){$farchivo_cat = '0';}


header( "refresh:2;url=".$url_origen );

if ($fhaccion == "subefichero") //sube nuevo fichero
{
	$ftxtfichero = $_POST["txtfichero"];
	$flstpublico = $_POST["lstpublico"];
	$flstcat = $_POST["lstcat"];
	
	// Ruta archivos $lnxrutaficheros /lnxgest/files/
	$extension = end(explode(".", $_FILES['fileficherito']['name']));
	
	$extension = strtolower($extension);
	
	$dirano = "Y".date('Y');
	$dirmes = "M".date('m');
	
	$fechasubida = date("Y-m-d H:i:s");
		
	$rutafichero = $lnxrutaficheros.$dirano;
	
	if (file_exists($rutafichero))
	{
		//si existe la carpeta de la serie no hace nada
	}else
	{
		//como NO existe la carpeta de las serie se crea la carpeta correspondiente
		
		$oldmask = umask(0);
		//mkdir($rutafichero, 7777, true);
		mkdir($rutafichero, 0777);
		umask($oldmask);
	}
	
	$rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
	
	if (file_exists($rutafichero))
	{
		//si existe la carpeta de la serie no hace nada
	}else
	{
		//como NO existe la carpeta de las serie se crea la carpeta correspondiente
		
		$oldmask = umask(0);
		//mkdir($rutafichero, 7777, true);
		mkdir($rutafichero, 0777);
		umask($oldmask);
	}
	
	$dirsubida = $dirano."/".$dirmes;
	
	$fichero_nombre = $_FILES['fileficherito']['name'];
	$ficherotm = $_FILES['fileficherito']['type'];
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza, dirfichero, fsubido, iduser) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '0', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbcontador = $row["contador"];
	
	$fichero_nombrefin = $dbcontador.".".$extension;
	
	$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

	move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	
	echo '<div align="center">';
		echo '<table class="msgaviso">';
		echo '<tr class="maintitle"><td>Seleccion de fichero adjunto</td></tr>';
		echo '<tr><td>Fichero insertado con éxito</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
		echo '</table></div>';
		
		$sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', '".$farchivo_module."', '".$farchivo_linea0."', '".$farchivo_linea1."', '".$farchivo_linea2."', '".$ftxtfichero."', '".$flstpublico."', '".$flstcat."')");

	
}

if ($fhaccion == "selfichero") //seleciona fichero existente
{
	$ftxtnota = $_POST["txtnota"];
	$flstcat = $_POST["lstpublico"];
	
	if($foptfichero == '')
	{
		echo '<div align="center">';
		echo '<table class="msgaviso">';
		echo '<tr class="maintitle"><td>Seleccion de fichero adjunto</td></tr>';
		echo '<tr><td>NO se ha seleccionado ningún archivo, vuelva a intentarlo</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Volver a origen</a></td></tr>';
		echo '</table></div>';
	
	}
	else
	{
		echo '<div align="center">';
		echo '<table class="msgaviso">';
		echo '<tr class="maintitle"><td>Seleccion de fichero adjunto</td></tr>';
		echo '<tr><td>Fichero vinculado con éxito</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
		echo '</table></div>';
		
		
		$sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$foptfichero."', '".$farchivo_module."', '".$farchivo_linea0."', '".$farchivo_linea1."', '".$farchivo_linea2."', '".$ftxtnota."', '".$flstpublico."', '".$flstcat."')");
		
		
	}
		
	
}


if ($fhaccion == "seledita") //edita fichero existente
{
	$flstpublico = $_POST["lstpublico"];
	$flstcat = $_POST["lstcat"];
	
	echo '<div align="center">';
	echo '<table class="msgaviso">';
	echo '<tr class="maintitle"><td>Editando fichero</td></tr>';
	echo '<tr><td>Fichero editado con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
	echo '</table></div>';
	
	$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros_loc set display = '".$_POST["txtnota"]."', publico = '".$flstpublico."', idcat = '".$flstcat."' where id = '".$_POST["hidfichero"]."'");

	
}


if ($fhaccion == "selborra") //Borra fichero existente
{
	$idlinea_loc = $_POST["hidfichero"];
	
	
		
	echo '<div align="center">';
	echo '<table class="msgaviso">';
	echo '<tr class="maintitle"><td>Borrado de fichero</td></tr>';
	echo '<tr><td>Fichero borrado con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
	echo '</table></div>';
	
	$sqlficheros= $mysqli->query("delete from ".$prefixsql."ficheros_loc where id = '".$idlinea_loc."' ");

	
}


echo '<p></p>';

?>