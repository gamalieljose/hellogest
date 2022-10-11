<?php
if ($_GET['idactivo'] > '0' && $_COOKIE["lnxuserid"] > '0') 
{
$idactivo = $_GET['idactivo'];
	
require("../../../core/cfpc.php");


$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$usuariofolder = $rowaux["username"];

$rutafichero = $lnxrutaficherostemp."usr/".$usuariofolder."/conexion.lnxit";

unlink($rutafichero); //Borra fichero anterior


$file = fopen($rutafichero, "w");

$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$idactivo."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodigo = $rowaux["codigo"];
$dbnombre = $rowaux["nombre"];
$dbfalta = $rowaux["falta"];


fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
fwrite($file, "<lnxgest>". PHP_EOL);
fwrite($file, "   <lnxit>". PHP_EOL);
fwrite($file, "      <id>".$idactivo."</id>". PHP_EOL);
fwrite($file, "      <codigo>".$dbcodigo."</codigo>". PHP_EOL);
fwrite($file, "      <nombre>".$dbnombre."</nombre>". PHP_EOL);
fwrite($file, "      <fechaalta>".$dbfalta."</fechaalta>". PHP_EOL);
fwrite($file, "   </lnxit>". PHP_EOL);
fwrite($file, "   <features>". PHP_EOL);

$cnssql= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."'");	
while($col = mysqli_fetch_array($cnssql))
{
	
	fwrite($file, "      <feature>". PHP_EOL);
	fwrite($file, "         <opcion>".$col["opcion"]."</opcion>". PHP_EOL);
	fwrite($file, "         <valor>".$col["valor"]."</valor>". PHP_EOL);
	fwrite($file, "         <valor2>".$col["valor2"]."</valor2>". PHP_EOL);
	fwrite($file, "         <valor3>".$col["valor3"]."</valor3>". PHP_EOL);
	fwrite($file, "         <valor4>".$col["valor4"]."</valor4>". PHP_EOL);
	fwrite($file, "         <color>".$col["color"]."</color>". PHP_EOL);
	fwrite($file, "      </feature>". PHP_EOL);
    
}

fwrite($file, "   </features>". PHP_EOL);
fwrite($file, "</lnxgest>". PHP_EOL);
fclose($file);

	
	header('Content-Description: File Transfer');
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename='.basename($rutafichero));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($rutafichero));
	ob_clean();
	flush();
	readfile($rutafichero);
	exit;
    

}
?>