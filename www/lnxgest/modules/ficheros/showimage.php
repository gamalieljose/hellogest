<?php
require("../../core/cfpc.php");

if ($_COOKIE["lnxuserid"] > '0')
{
$idfile = $_GET["idfile"];

$cnsfichero = $mysqli->query("SELECT * FROM ".$prefixsql."ficheros where id = '".$idfile."'");
$row = mysqli_fetch_assoc($cnsfichero);
$fhr_nombre = $row["fichero"];
$fhr_folder = $row["extension"];

$archivo = $lnxrutaficheros.$fhr_folder."/".$fhr_nombre;

// Cargamos la imagen a mostrar
header("Content-type: image/jpg");
header("Content-length: ".filesize($archivo));
header("Content-Disposition: inline; filename=$archivo");
readfile($archivo);
// Fin crear imagen
}
?>

