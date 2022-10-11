<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];
$fhidtercero = $_POST["hidtercero"];
$flstempresas = $_POST["lstempresas"];
$flstlopdcat = $_POST["lstlopdcat"];
$ftxtnombredoc = $_POST["txtnombredoc"];
$ffileficherito = $_POST["fileficherito"];

if($fhaccion == "new")
{     

    // Ruta archivos $lnxrutaficheros /lnxgest/files/
	$extension = end(explode(".", $_FILES['fileficherito']['name']));
	
	$extension = strtolower($extension);
	
	$rutafichero = $lnxrutaficheros.$extension;
	
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
	
	$fichero_nombre = $_FILES['fileficherito']['name'];
	$ficherotm = $_FILES['fileficherito']['type'];
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (nombre, extension, descripcion, tipomime) VALUES ('".$fichero_nombre."', '".$extension."', '".$ftxtnombredoc."', '".$ficherotm."')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbcontador = $row["contador"];
	
	
	$fichero_nombrefin = $dbcontador.".".$extension;
	
	$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

	move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	
	$sqltercerolopd = $mysqli->query("insert into ".$prefixsql."terceros_lopd_files (idtercero, idempresa, idcatlopd, descripcion) values ('".$fhidtercero."', '".$flstempresas."', '".$flstlopdcat."', '".$ftxtnombredoc."')");
        
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."terceros_lopd_files ");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbultimoid = $row["contador"];
	
	$sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, display, publico) values('".$dbcontador."', 'terceros_lopdfiles', '".$dbultimoid."', '".$ftxtnombredoc."', '0')");

}

if($fhaccion == "update")
{
	$sqlficheros = $mysqli->query("update ".$prefixsql."terceros_lopd_files set idempresa = '".$flstempresas."', idcatlopd = '".$flstlopdcat."', descripcion = '".$ftxtnombredoc."' where id = '".$fhidregistro."'");
	
	if (is_uploaded_file($_FILES['fileficherito']['tmp_name']))
	{
		//Fichero subido
		
		//Eliminamos el archivo subido y lo reemplazamos por el nuevo
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'terceros_lopdfiles' and idlinea0 = '".$fhidregistro."' ");
		$row = mysqli_fetch_assoc($sqlaux);
		$fichero_id = $row["idfichero"];
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$fichero_id."' ");
		$row = mysqli_fetch_assoc($sqlaux);
		$fichero_extension = $row["extension"];
		$fichero_nombre = $row["fichero"];
		
		$ficheroruta = $lnxrutaficheros.$fichero_extension.'/'.$fichero_nombre;
		unlink($ficheroruta);
		
                $sqlficheros = $mysqli->query("delete from  ".$prefixsql."ficheros_loc where idfichero = '".$fichero_id."'");
                $sqlficheros = $mysqli->query("delete from  ".$prefixsql."ficheros where id = '".$fichero_id."'");
		//hasta aqui hemos eliminado el fichero anterior
		
                 // Ruta archivos $lnxrutaficheros /lnxgest/files/
                $extension = end(explode(".", $_FILES['fileficherito']['name']));

                $extension = strtolower($extension);

                $rutafichero = $lnxrutaficheros.$extension;
                
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
                
                $fichero_nombre = $_FILES['fileficherito']['name'];
                $ficherotm = $_FILES['fileficherito']['type'];
                
                $sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (nombre, extension, descripcion, tipomime) VALUES ('".$fichero_nombre."', '".$extension."', '".$ftxtnombredoc."', '".$ficherotm."')");
                
                $sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
                $row = mysqli_fetch_assoc($sqlficheros);
                $dbcontador = $row["contador"];
		
                $fichero_nombrefin = $dbcontador.".".$extension;
	
                $sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

                move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

                $sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, display, publico) values('".$dbcontador."', 'terceros_lopdfiles', '".$fhidregistro."', '".$ftxtnombredoc."', '0')");
	}

	
}

if($fhaccion == "delete")
{ 
    $sqlficheros = $mysqli->query("delete from  ".$prefixsql."terceros_lopd_files where id = '".$fhidregistro."'");
    
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'terceros_lopdfiles' and idlinea0 = '".$fhidregistro."' ");
    $row = mysqli_fetch_assoc($sqlaux);
    $fichero_id = $row["idfichero"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$fichero_id."' ");
    $row = mysqli_fetch_assoc($sqlaux);
    $fichero_extension = $row["extension"];
    $fichero_nombre = $row["fichero"];

    $ficheroruta = $lnxrutaficheros.$fichero_extension.'/'.$fichero_nombre;
    unlink($ficheroruta);

    $sqlficheros = $mysqli->query("delete from  ".$prefixsql."ficheros_loc where idfichero = '".$fichero_id."'");
    $sqlficheros = $mysqli->query("delete from  ".$prefixsql."ficheros where id = '".$fichero_id."'");
}

$url_atras = "index.php?module=terceros&section=terceroslopd&idtercero=".$fhidtercero;
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">mensaje:</td></tr>
<tr><td>Cambios aplicados con exito';
echo'</td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';
?>

