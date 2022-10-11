<?php
$hidfv = $_POST["hidfv"];

$iddocumento = $hidfv;

$idpreproceso = $_POST["hidpreproceso"];
$docprint_descripcion = $_POST["docprint_descripcion"];
$docprint_idfileplantilla = $_POST["docprint_idfileplantilla"];
$docprint_idfileprocesador = $_POST["docprint_idfileprocesador"];
$docprint_idfilefodt = $_POST["docprint_idfilefodt"];
$docprint_idempresa = $_POST["docprint_idempresa"];

$docprint_impresora = $_POST["lstprinter"];

//Mostramos el fichero

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$docprint_idfileprocesador."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$fch_fichero = $rowaux["fichero"];
$fch_dirfichero = $rowaux["dirfichero"];

$rutaficheroproceso = $lnxrutaficheros.$fch_dirfichero."/".$fch_fichero;

include($rutaficheroproceso);
?>