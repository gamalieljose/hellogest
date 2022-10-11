<?php

echo '<output>'. PHP_EOL;

if($_POST["lnx_cmd"] == "ftp_file_upload")
{
    
	$ficheroprocesar = $lnxprintspool.'upload/'.$_POST["ftpfiletoupload"];
   

    if (file_exists($ficheroprocesar)) 
    {
        echo '   <errorcode>0</errorcode>'. PHP_EOL;
        echo '   <errorlabel>Archivo procesado OK</errorlabel>'. PHP_EOL;

//Procesamos el fichero y lo añadimos a la bbdd

    // Ruta archivos $lnxrutaficheros /lnxgest/files/
    $flstpropietario = $_POST["file_idpropietario"];
    $ftxtfichero = addslashes($_POST["file_description"]);

    $fichero_nom = pathinfo($ficheroprocesar, PATHINFO_FILENAME);
    $extension = pathinfo($ficheroprocesar, PATHINFO_EXTENSION);
    $ficherotm = mime_content_type($ficheroprocesar);
    
    $fichero_nombre = $fichero_nom.".".$extension;

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
    
	
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$flstpropietario."', '0')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbcontador = $row["contador"];
	
	$fichero_nombrefin = $dbcontador.".".$extension;
	
	$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

    rename($ficheroprocesar, $rutafichero."/".$fichero_nombrefin);
    
    
    echo '   <idfile>'.$dbcontador.'</idfile>'. PHP_EOL;

// ----------------------------------------------------------
	
	if($_POST["floc_module"] <> "")
	{
		$vbfloc_module = $_POST["floc_module"];
		$vbfloc_idlinea0 = $_POST["floc_idlinea0"];
		$vbfloc_idlinea1 = $_POST["floc_idlinea1"];
		$vbfloc_idlinea2 = $_POST["floc_idlinea2"];
		$vbfloc_display = addslashes($_POST["floc_display"]);
		$vbfloc_publico = $_POST["floc_publico"];
		$vbfloc_idcat = $_POST["floc_idcat"];
		
		$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', '".$vbfloc_module."', '".$vbfloc_idlinea0."', '".$vbfloc_idlinea1."', '".$vbfloc_idlinea2."', '".$vbfloc_display."', '".$vbfloc_publico."', '".$vbfloc_idcat."')");
	}
// ----------------------------------------

    }
    else 
    {
        echo '   <errorcode>404</errorcode>'. PHP_EOL;
        echo '   <errorlabel>Archivo procesado NO encontrado</errorlabel>'. PHP_EOL;
        echo '   <idfile>0</idfile>'. PHP_EOL;
    }
    //file_description
    //fichero_idpropietario

    
    
    
}




echo '</output>'. PHP_EOL;
	
	
?>