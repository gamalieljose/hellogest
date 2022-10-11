<?php
$respuestarecoverymode = "";

if($rcvymd_arryvariables["action"] == "edit" && $rcvymd_arryvariables["idbanco"] > 0)
{
    $rcvymd_fichero = $lnxrecoverymode_files."bancos_banco".$rcvymd_arryvariables["idbanco"].".xml";

    $sqlaux = $mysqli->query("select * from ".$prefixsql."bancos where id = '".$rcvymd_arryvariables["idbanco"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbbanco = $rowaux["banco"];

    $file = fopen($rcvymd_fichero, "w");

        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
        fwrite($file, "<lnxgest>". PHP_EOL);
        fwrite($file, "   <module>bancos</module>". PHP_EOL);
        fwrite($file, "   <tipoxml>BANCOS</tipoxml>". PHP_EOL);
        fwrite($file, "   <bancos>". PHP_EOL);
        fwrite($file, "      <banco>". PHP_EOL);
        fwrite($file, "         <id>".$rcvymd_arryvariables["idbanco"]."</id>". PHP_EOL);
        fwrite($file, "         <banco>".$dbbanco."</banco>". PHP_EOL);
        fwrite($file, "      </banco>". PHP_EOL);
        fwrite($file, "   </bancos>". PHP_EOL);
        fwrite($file, "</lnxgest>". PHP_EOL);

        fclose($file);

    $respuestarecoverymode = "Banco [".$dbbanco."] exportado correctamente";
}

?>