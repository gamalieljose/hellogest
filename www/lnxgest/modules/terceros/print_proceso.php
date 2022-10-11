<?php
$lnx_idtercero = $_POST["hidtercero"];
$docprintfile = $_POST["hiddocprint"];
$lnx_idprinter = $_POST["hlstprinter"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$docprintfile."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$fl_idfileprocesador = $rowaux["idfileprocesador"];
$lbl_docprinttitle = $rowaux["descripcion"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$fl_idfileprocesador."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$fchr_fichero = $rowaux["fichero"];
$fchr_dirfichero = $rowaux["dirfichero"];

$lnxdocprint_fichero = $lnxrutaficheros.$fchr_dirfichero."/".$fchr_fichero;

echo '<h3>'.$lbl_docprinttitle.'</h3>';


include($lnxdocprint_fichero);

?>