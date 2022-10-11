<?php
$iddocprint = $_POST["lstdocprint_template"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$iddocprint."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idfileprocesador = $rowaux["idfileprocesador"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfileprocesador."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$docprint_fichero = $rowaux["fichero"];
$docprint_extension = $rowaux["extension"];

$docprintruta = $lnxrutaficheros.$docprint_extension."/".$docprint_fichero;

include($docprintruta);


$url_atras = "index.php?module=balance&section=trimestre";
//header( "refresh:2;url=index.php?module=bancos&section=bancos" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>
		<p>Impresión realizada con éxito</p>
	
		<p align="center"><a href="#" class="btnedit">Descargar PDF</a> <a href="#" class="btnedit">Descargar EXCEL</a> </p>
	
	</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';

?>