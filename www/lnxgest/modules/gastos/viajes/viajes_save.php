<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];

$flstseries = $_POST["lstseries"];
$fdpkfecha = $_POST["dpkfecha"];

$ftiempohhmm = $_POST["tiempohh"].":".$_POST["tiempomin"].":00";
$ftiempohhmm_vuelta = $_POST["tiempohh_vuelta"].":".$_POST["tiempomin_vuelta"].":00";


$fdpkfechavuelta = $_POST["dpkfechavuelta"];
    $xtemp = explode("/", $fdpkfecha);
    $fdb_fecha = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." ".$ftiempohhmm;
    
    $xtemp = explode("/", $fdpkfechavuelta);
    $fdb_fechavuelta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0]." ".$ftiempohhmm_vuelta;

$flstuser = $_POST["lstuser"];
$ftxtdescripcion = addslashes($_POST["txtdescripcion"]);

$urlatras = "index.php?module=gastos&section=viajes";

if($fhaccion == "new")
{   
    $sqlregistro = $mysqli->query("insert into ".$prefixsql."viajes (idserie, codigoint, codigo, iduser, descripcion, fecha, fechavuelta, editv) VALUES ('".$flstseries."', '0', 'X', '".$flstuser."', '".$ftxtdescripcion."', '".$fdb_fecha."', '".$fdb_fechavuelta."', '0')");

    $sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."viajes"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $fhidregistro = $rowaux["contador"];

    $sqlregistro = $mysqli->query("update ".$prefixsql."viajes set codigo = '(PROV ".$fhidregistro.")' where id = '".$fhidregistro."'");


    $urlatras = "index.php?module=gastos&section=viajes&action=view&iddoc=".$fhidregistro;
}

if($fhaccion == "update")
{ 
    
    $sqlregistro = $mysqli->query("update ".$prefixsql."viajes set idserie = '".$flstseries."', iduser = '".$flstuser."', descripcion = '".$ftxtdescripcion."', fecha = '".$fdb_fecha."', fechavuelta = '".$fdb_fechavuelta."' where id = '".$fhidregistro."' ");

    $urlatras = "index.php?module=gastos&section=viajes&action=view&iddoc=".$fhidregistro;
}

header( "Location: ".$urlatras );

?>