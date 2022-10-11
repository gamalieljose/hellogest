<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];

$fchktipo = $_POST["chktipo"];
$ftxtfecha = $_POST["txtfecha"];
$flstempresa = $_POST["lstempresa"];
$flstusuario = $_POST["lstusuario"];
$ftxtdescripcion =  addslashes($_POST["txtdescripcion"]);
$flstasignado = $_POST["lstasignado"];

$flsttercero = $_POST["lsttercero"];
$flstcontacto = $_POST["lstcontacto"];



$xfecha = explode("/", $ftxtfecha);

$ftxtfecha = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


if($fchktipo == "2")
{
        //Marcado como externo
	$fdb_empresa = '0';
	$fdb_iduser = $flstcontacto;
	$fdb_idtercero = $flsttercero;
	$fdb_flstasignado = $flstasignado;

	setcookie("lnxit_idtercero", $flsttercero);

}

if($fchktipo == "1")
{
	//Marcado como interno
	$fdb_empresa = $flstempresa;
	$fdb_iduser = '0';
	$fdb_idtercero = '0';

	$fdb_flstasignado = $flstusuario;
	
}



if($fhaccion == "new")
{
	
	$sqlnom = $mysqli->query("insert into ".$prefixsql."hr_nom (tipo, fecha, idempresa, idtercero, idcontacto, descripcion, idasignado) values ('".$fchktipo."', '".$ftxtfecha."', '".$fdb_empresa."', '".$fdb_idtercero."', '".$fdb_iduser."', '".$ftxtdescripcion."', '".$fdb_flstasignado."') ");

	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."hr_nom "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fhidregistro = $rowaux["contador"];

}

if($fhaccion == "update")
{

	$sqlnom = $mysqli->query("update ".$prefixsql."hr_nom set tipo = '".$fchktipo."', fecha = '".$ftxtfecha."', idempresa = '".$fdb_empresa."', idtercero = '".$fdb_idtercero."', idcontacto = '".$fdb_iduser."', descripcion = '".$ftxtdescripcion."', idasignado = '".$fdb_flstasignado."' where id = '".$fhidregistro."' ");

}


if($fhaccion == "delete")
{
// Borramos ficheros y registro permanentemente
        $sqlnom = $mysqli->query("delete from ".$prefixsql."hr_nom  where id = '".$fhidregistro."' ");

	$sqlficheros = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$fhidregistro."' ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbtempidfichero = $row["idfichero"];


	$sqlficheros = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbtempidfichero."' ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbtemp_fichero = $row["fichero"];
	$dbtemp_carpeta = $row["dirfichero"];

	$ficheroborrar =  $lnxrutaficheros.$dbtemp_carpeta."/".$dbtemp_fichero;
	


	

	$fdelfichero = $_POST["delfichero"];

	if($fdelfichero == "delloc")
	{
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$fhidregistro."' ");
	}
	if($fdelfichero == "delfichero")
	{
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$fhidregistro."' ");
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$dbtempidfichero."' ");
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_perm where idfichero = '".$dbtempidfichero."' ");
		unlink($ficheroborrar);
	}
	
	

}

if($fhaccion == "new" || $fhaccion == "update")
{
//Subida de ficheros
$fhficheroone = $_POST["hficheroone"];
if($_FILES["fch_fileficherito"]["size"] > 0)
{
	$user_propietario = 0;
	if($fchktipo == "1")
	{
		//interno
		$user_propietario = $flstusuario;
	}
	if($fchktipo == "2")
	{
		//Externo
		$user_propietario = $flstasignado;
	}
		
$fch_lstpublico = $_POST["fch_lstpublico"];
$fch_txtfichero = addslashes($_POST["fch_txtfichero"]);
$fch_lstcat = $_POST["fch_lstcat"];

if($fhficheroone == 'uploadfile')
{
	//subimos el fichero
	// Ruta archivos $lnxrutaficheros /lnxgest/files/
	$extension = end(explode(".", $_FILES['fch_fileficherito']['name']));
		
	$extension = strtolower($extension);
	
	$dirano = "Y".date('Y');
	$dirmes = "M".date('m');
	
	$fechasubida = date("Y-m-d H:i:s");
	
	$rutafichero = $lnxrutaficheros.$extension;
	
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
	
	$fichero_nombre = $_FILES['fch_fileficherito']['name'];
	$ficherotm = $_FILES['fch_fileficherito']['type'];
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$user_propietario."', '0')");

	$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
	$row = mysqli_fetch_assoc($sqlficheros);
	$dbcontador = $row["contador"];
	
	$fichero_nombrefin = $dbcontador.".".$extension;
	
	$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

	move_uploaded_file($_FILES['fch_fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

	if($fhaccion == "update")
	{
		//si se modifica, se ha eliminar el antiguo vinculo
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$fhidregistro."'");	
	}
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$dbcontador."', 'hr_nom', '".$fhidregistro."', '0', '0', '".$fch_txtfichero."', '".$fch_lstpublico."', '".$fch_lstcat."')");
}


}



$foptidficheroone = $_POST["optidficheroone"];

if($fhficheroone == 'searchfile' && $foptidficheroone > 0)
{
	//Borramos si hay alguno vinculado
	$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$fhidregistro."'");	

	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$foptidficheroone."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fchr_descripcion = addslashes($rowaux["descripcion"]);
		

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$foptidficheroone."', 'hr_nom', '".$fhidregistro."', '0', '0', '".$fchr_descripcion."', '0', '0')");
}
//Fin subida de ficheros
}


header("Location: index.php?module=hr&section=nominas");



?>
