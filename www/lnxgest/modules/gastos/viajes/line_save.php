<?php
$fhaccion = $_POST["haccion"];
$idviaje = $_POST["hiddoc"];
$fhidlinea = $_POST["hidlinea"];
$fhtipoevento = $_POST["htipoevento"];


$fdpkfecha = $_POST["dpkfecha"];

$ftiempohhmm = $_POST["tiempohh"].":".$_POST["tiempomin"].":00";
$ftiempohhmm_vuelta = $_POST["tiempohh_vuelta"].":".$_POST["tiempomin_vuelta"].":00";


$fdpkfechavuelta = $_POST["dpkfechavuelta"];
    $xtemp = explode("/", $fdpkfecha);
    $fdb_fecha = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." ".$ftiempohhmm;
    
    $xtemp = explode("/", $fdpkfechavuelta);
    $fdb_fechavuelta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." ".$ftiempohhmm_vuelta;

$ftxtorigen = addslashes($_POST["txtorigen"]);
$ftxtdestino = addslashes($_POST["txtdestino"]);
    

if($fhtipoevento == "NOTA")
{
    $fdb_descripcion = addslashes($_POST["txtdescripcion"]);
    $fdb_txtreserva = "";
    $fdb_txtasiento = "";
}

if($fhtipoevento == "VIAJE")
{
    $fdb_descripcion = addslashes($_POST["txtdescripcion"]);
    $fdb_txtreserva = addslashes($_POST["txtreserva"]);
    $fdb_txtasiento = addslashes($_POST["txtasiento"]);
}

if($fhtipoevento == "HOTEL")
{
    $fdb_descripcion = addslashes($_POST["txtdescripcion"]);
    $fdb_txtreserva = addslashes($_POST["txtreserva"]);
    $fdb_txtasiento = "";
}

if($fhaccion == "new")
{
    
    $sqlregistro = $mysqli->query("insert into ".$prefixsql."viajes_lineas (idviaje, tipo, fechasalida, origen, fechallegada, destino, descripcion, reserva, asiento) VALUES ('".$idviaje."', '".$fhtipoevento."', '".$fdb_fecha."', '".$ftxtorigen."', '".$fdb_fechavuelta."', '".$ftxtdestino."', '".$fdb_descripcion."', '".$fdb_txtreserva."', '".$fdb_txtasiento."')");

    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."viajes_lineas ");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fhidlinea = $rowaux["contador"];

    echo '<p>ID: '.$fhidlinea.'</p>';
    
}

if($fhaccion == "update")
{ 
    
    $sqlregistro = $mysqli->query("update ".$prefixsql."viajes_lineas set fechasalida = '".$fdb_fecha."', origen = '".$ftxtorigen."', fechallegada = '".$fdb_fechavuelta."', destino = '".$ftxtdestino."', descripcion = '".$fdb_descripcion."', reserva = '".$fdb_txtreserva."', asiento = '".$fdb_txtasiento."' where id = '".$fhidlinea."' ");

}

if($fhaccion == "delete")
{ 
    
    $sqlregistro = $mysqli->query("delete from ".$prefixsql."viajes_lineas where id = '".$fhidlinea."' ");
    $sqlregistro = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'viajes' and idlinea0 = '".$idviaje."' and idlinea1 = '".$fhidlinea."' ");

}




if($fhaccion == "new" || $fhaccion == "update")
{
//Subida de ficheros
$fhficheroone = $_POST["hficheroone"];
if($_FILES["fch_fileficherito"]["size"] > 0)
{
	$user_propietario = 0;
		
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
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'viajes' and idlinea0 = '".$idviaje."' and idlinea1 = '".$fhidlinea."'");	
	}
	
	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$dbcontador."', 'viajes', '".$idviaje."', '".$fhidlinea."', '0', '".$fch_txtfichero."', '".$fch_lstpublico."', '".$fch_lstcat."')");

    
}


}



$foptidficheroone = $_POST["optidficheroone"];

if($fhficheroone == 'searchfile' && $foptidficheroone > 0)
{
	//Borramos si hay alguno vinculado
	$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'viajes' and idlinea0 = '".$idviaje."' and idlinea1 = '".$fhidregistro."'");	

	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$foptidficheroone."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$fchr_descripcion = addslashes($rowaux["descripcion"]);
		

	$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$foptidficheroone."', 'viajes', '".$idviaje."', '".$fhidlinea."', '0', '".$fchr_descripcion."', '0', '0')");
}
//Fin subida de ficheros
}

$urlatras = "index.php?module=gastos&section=viajes&action=view&iddoc=".$idviaje;

header( "Location: ".$urlatras );

?>