<?php
$fhaccion = $_POST["haccion"];
$fhiddocprint = $_POST["hiddocprint"];
$fchkactivo = $_POST["chkactivo"];
	if ($fchkactivo == ""){$fchkactivo = "0"; }
$flstmodulo = $_POST["lstmodulo"];
$flstempresa = $_POST["lstempresa"];
$ftxtcodinforme = $_POST["txtcodinforme"];
$ftxtdescripcion = $_POST["txtdescripcion"];

if($fhaccion == "new")
{
	
	$sqldocprint = $mysqli->query("insert into ".$prefixsql."docprint (idmod, codinforme, descripcion, idfileplantilla, idfileprocesador, idfilefodt, idempresa, habilitado) VALUES ('".$flstmodulo."', '".$ftxtcodinforme."', '".$ftxtdescripcion."', '0', '0', '0', '".$flstempresa."', '".$fchkactivo."') ");

	//Obtenemos el ID del docprint
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."docprint "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fhiddocprint = $rowaux["contador"];

	$dbidfileplantilla = "0";
	$dbidfileprocesador = "0";
	$dbidfilefodt = "0";
	
}

if($fhaccion == "update")
{
	
	$sqldocprint = $mysqli->query("update ".$prefixsql."docprint set idmod = '".$flstmodulo."', codinforme = '".$ftxtcodinforme."', descripcion = '".$ftxtdescripcion."', idempresa = '".$flstempresa."', habilitado = '".$fchkactivo."' where id = '".$fhiddocprint."' ");

	$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$fhiddocprint."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbidfileplantilla = $rowaux["idfileplantilla"];
	$dbidfileprocesador = $rowaux["idfileprocesador"];
	$dbidfilefodt = $rowaux["idfilefodt"];
}

if($fhaccion == "delete")
{
	$sqldocprint = $mysqli->query("delete from  ".$prefixsql."docprint  where id = '".$fhiddocprint."' ");
}



if ($_FILES["fileplantilla"]["size"] > 0)
{
	//Borramos el archivo existente
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfileplantilla."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbfile_fichero = $rowaux["fichero"];
	$dbfile_dirfichero = $rowaux["dirfichero"];

	$ficheroeliminar = $lnxrutaficheros.$dbfile_dirfichero."/".$dbfile_fichero;
	unlink($ficheroeliminar);
	
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$dbidfileplantilla."' "); 
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$dbidfileplantilla."' "); 

	//Ahora subimos el archivo

	$extension = end(explode(".", $_FILES['fileplantilla']['name']));
	$extension = strtolower($extension);
	
	$dirano = "Y".date('Y');
	$dirmes = "M".date('m');
	
	$fechasubida = date("Y-m-d H:i:s");
	
	$rutafichero = $lnxrutaficheros.$extension;
	$rutafichero = $lnxrutaficheros."docprint";

	if (file_exists($rutafichero))
	{
		//si existe la carpeta de la serie no hace nada
	}
	else
	{
		//como NO existe la carpeta de las serie se crea la carpeta correspondiente
		
		$oldmask = umask(0);
		//mkdir($rutafichero, 7777, true);
		mkdir($rutafichero, 0777);
		umask($oldmask);
	}
	
		
	$dirsubida = "docprint";
	$fichero_nombre = $_FILES['fileplantilla']['name'];
	$ficherotm = $_FILES['fileplantilla']['type'];

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."', '0')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$idficherosubido = $row["contador"];
	
	$fichero_nombrefin = $idficherosubido.".".$extension;
	
	$sqlficheros = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$idficherosubido."'");

	move_uploaded_file($_FILES['fileplantilla']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	$lblfichero = 'DP-HTML-'.$fhiddocprint;

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$idficherosubido."', 'docprint', '".$fhiddocprint."', '0', '0', '".$lblfichero."', '0', '0')");

	$sqlficheros = $mysqli->query("update ".$prefixsql."docprint set idfileplantilla = '".$idficherosubido."' where id = '".$fhiddocprint."'");

}







if ($_FILES["fileprocesador"]["size"] > 0)
{
	//Borramos el archivo existente
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfileprocesador."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbfile_fichero = $rowaux["fichero"];
	$dbfile_dirfichero = $rowaux["dirfichero"];

	$ficheroeliminar = $lnxrutaficheros.$dbfile_dirfichero."/".$dbfile_fichero;
	unlink($ficheroeliminar);
	
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$dbidfileprocesador."' "); 
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$dbidfileprocesador."' "); 

	//Ahora subimos el archivo

	$extension = end(explode(".", $_FILES['fileprocesador']['name']));
	$extension = strtolower($extension);
	
	$dirano = "Y".date('Y');
	$dirmes = "M".date('m');
	
	$fechasubida = date("Y-m-d H:i:s");
	
	$rutafichero = $lnxrutaficheros.$extension;
	$rutafichero = $lnxrutaficheros."docprint";

	if (file_exists($rutafichero))
	{
		//si existe la carpeta de la serie no hace nada
	}
	else
	{
		//como NO existe la carpeta de las serie se crea la carpeta correspondiente
		
		$oldmask = umask(0);
		//mkdir($rutafichero, 7777, true);
		mkdir($rutafichero, 0777);
		umask($oldmask);
	}
	
		
	$dirsubida = "docprint";
	$fichero_nombre = $_FILES['fileprocesador']['name'];
	$ficherotm = $_FILES['fileprocesador']['type'];

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."', '0')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$idficherosubido = $row["contador"];
	
	$fichero_nombrefin = $idficherosubido.".".$extension;
	
	$sqlficheros = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$idficherosubido."'");

	move_uploaded_file($_FILES['fileprocesador']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	$lblfichero = 'DP-PHP-'.$fhiddocprint;

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$idficherosubido."', 'docprint', '".$fhiddocprint."', '0', '0', '".$lblfichero."', '0', '0')");

	$sqlficheros = $mysqli->query("update ".$prefixsql."docprint set idfileprocesador = '".$idficherosubido."' where id = '".$fhiddocprint."'");

}








if ($_FILES["fileprocesadorfodt"]["size"] > 0)
{
	//Borramos el archivo existente
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfilefodt."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbfile_fichero = $rowaux["fichero"];
	$dbfile_dirfichero = $rowaux["dirfichero"];

	$ficheroeliminar = $lnxrutaficheros.$dbfile_dirfichero."/".$dbfile_fichero;
	unlink($ficheroeliminar);
	
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$dbidfilefodt."' "); 
	$sqlaux = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$dbidfilefodt."' "); 

	//Ahora subimos el archivo

	$extension = end(explode(".", $_FILES['fileprocesadorfodt']['name']));
	$extension = strtolower($extension);
	
	$dirano = "Y".date('Y');
	$dirmes = "M".date('m');
	
	$fechasubida = date("Y-m-d H:i:s");
	
	$rutafichero = $lnxrutaficheros.$extension;
	$rutafichero = $lnxrutaficheros."docprint";

	if (file_exists($rutafichero))
	{
		//si existe la carpeta de la serie no hace nada
	}
	else
	{
		//como NO existe la carpeta de las serie se crea la carpeta correspondiente
		
		$oldmask = umask(0);
		//mkdir($rutafichero, 7777, true);
		mkdir($rutafichero, 0777);
		umask($oldmask);
	}
	
		
	$dirsubida = "docprint";
	$fichero_nombre = $_FILES['fileprocesadorfodt']['name'];
	$ficherotm = $_FILES['fileprocesadorfodt']['type'];

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."', '0')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$idficherosubido = $row["contador"];
	
	$fichero_nombrefin = $idficherosubido.".".$extension;
	
	$sqlficheros = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$idficherosubido."'");

	move_uploaded_file($_FILES['fileprocesadorfodt']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	$lblfichero = 'DP-FODT-'.$fhiddocprint;

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$idficherosubido."', 'docprint', '".$fhiddocprint."', '0', '0', '".$lblfichero."', '0', '0')");

	$sqlficheros = $mysqli->query("update ".$prefixsql."docprint set idfilefodt = '".$idficherosubido."' where id = '".$fhiddocprint."'");

}


$url_atras = "index.php?module=core&section=docprint";
header( "Location: ".$url_atras );


    
?>