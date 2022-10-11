<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];


$flstseries = $_POST["lstseries"];
$fdpkfecha = $_POST["dpkfecha"];

$xtemp = explode("/", $fdpkfecha);
$dbfecha = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];
$flstuser = $_POST["lstuser"];
$flsttipogasto = $_POST["lsttipogasto"];
$ftxtdescripcion = addslashes($_POST["txtdescripcion"]);
$ftxtimporte = $_POST["txtimporte"];

$fchkaprobado = $_POST["chkaprobado"];
if($fchkaprobado == ''){$fchkaprobado = "0";}

if($fhaccion == "new")
{
    $sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."gastos where idserie = '".$flstseries."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $ultimo = $rowaux["contador"] +1;

    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstseries."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $codigodoc = $rowaux["serie"]."/".$ultimo;

    $sqlregistro = $mysqli->query("insert into ".$prefixsql."gastos (idserie, codigoint, codigo, fecha, idtipogasto, descripcion, importe, iduser, aprobado) VALUES ('".$flstseries."', '".$ultimo."', '".$codigodoc."', '".$dbfecha."', '".$flsttipogasto."', '".$ftxtdescripcion."', '".$ftxtimporte."', '".$flstuser."', '0' )");

    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."gastos"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $fhidregistro = $rowaux["contador"];
}


if($fhaccion == "update")
{   
    $sqlregistro = $mysqli->query("update ".$prefixsql."gastos set fecha = '".$dbfecha."', idtipogasto = '".$flsttipogasto."', descripcion = '".$ftxtdescripcion."', importe = '".$ftxtimporte."', iduser = '".$flstuser."', aprobado = '".$fchkaprobado."' where id = '".$fhidregistro."'");
}

if($fhaccion == "delete")
{
    $sqlregistro = $mysqli->query("delete from ".$prefixsql."gastos where id = '".$fhidregistro."'");

    $fdelfichero = $_POST["delfichero"];
    if($fdelfichero == "delloc")
    {
    //Eliminar solo la vinculación con el fichero
    $sqlfichero = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$fhidregistro."'"); 
    
    }

    if($fdelfichero == "delfichero")
    {
        //Eliminar vinculaciones y fichero
        $sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$fhidregistro."'"); 
        $row = mysqli_fetch_assoc($sqlfichero);
        $dbidfichero = $row["idfichero"];

        $sqlfichero = $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$dbidfichero."'"); 

        $sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfichero."'"); 
        $row = mysqli_fetch_assoc($sqlfichero);
        $dbf_fichero = $row["fichero"];
        $dbf_dirfichero = $row["dirfichero"];

        $sqlfichero = $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$dbidfichero."'"); 

        $rutaficheroborrar = $lnxrutaficheros.$dbf_dirfichero."/".$dbf_fichero;
	    unlink($rutaficheroborrar);

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
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$fhidregistro."'");	
	}
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$dbcontador."', 'gastos', '".$fhidregistro."', '0', '0', '".$fch_txtfichero."', '".$fch_lstpublico."', '".$fch_lstcat."')");
}


}



$foptidficheroone = $_POST["optidficheroone"];

if($fhficheroone == 'searchfile' && $foptidficheroone > 0)
{
	//Borramos si hay alguno vinculado
	$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$fhidregistro."'");	

	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$foptidficheroone."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fchr_descripcion = addslashes($rowaux["descripcion"]);
		

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$foptidficheroone."', 'gastos', '".$fhidregistro."', '0', '0', '".$fchr_descripcion."', '0', '0')");
}
//Fin subida de ficheros
}

$urlatras = "index.php?module=gastos&section=gastos";
header( "Location: ".$urlatras );
?>