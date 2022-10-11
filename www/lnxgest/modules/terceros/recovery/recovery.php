<?php
$respuestarecoverymode = "";


if($rcvymd_arryvariables["section"] == "terceros" && $rcvymd_arryvariables["action"] == "recovery" && $rcvymd_arryvariables["idtercero"] > 0)
{
    $rcvymd_fichero = $lnxrecoverymode_files."terceros_tercero".$rcvymd_arryvariables["idtercero"].".xml";

    //exportamos la ficha del tercero
    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$rcvymd_arryvariables["idtercero"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbrazonsocial = $rowaux["razonsocial"];
    $dbnomcomercial = $rowaux["nomcomercial"];
    $dbnif = $rowaux["nif"];
    $dbtel = $rowaux["tel"];
    $dbactivo = $rowaux["activo"];
    $dbcodcli = $rowaux["codcli"];
    $dbcodpro = $rowaux["codpro"];
    $dbdir = $rowaux["dir"];
    $dbcp = $rowaux["cp"];
    $dbpobla = $rowaux["pobla"];
    $dbidprov = $rowaux["idprov"];
    $dbidpais = $rowaux["idpais"];
    $dbidtarifa = $rowaux["idtarifa"];
    $dbcodclipro = $rowaux["codclipro"];
    $dbfechaalta = $rowaux["fechaalta"];
    $dbncuenta = $rowaux["ncuenta"];
    $dbnotas = $rowaux["notas"];
    $dborigen = $rowaux["origen"];
    $dbemail = $rowaux["email"];
    $dbnotaimp = $rowaux["notaimp"];
    $dbidcomercial = $rowaux["idcomercial"];
    $dbidtipotercero = $rowaux["idtipotercero"];
    $dbidactividad = $rowaux["idactividad"];
    $dbclifp = $rowaux["clifp"];
    $dbclidp = $rowaux["clidp"];
    $dbprofp = $rowaux["profp"];
    $dbprodp = $rowaux["prodp"];
    $dbidzona = $rowaux["idzona"];


    $file = fopen($rcvymd_fichero, "w");

    fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
    fwrite($file, "<lnxgest>". PHP_EOL);
    fwrite($file, "   <module>terceros</module>". PHP_EOL);
    fwrite($file, "   <tipoxml>TERCERO</tipoxml>". PHP_EOL);
    fwrite($file, "   <tercero>". PHP_EOL);
    fwrite($file, "      <id>".$rcvymd_arryvariables["idtercero"]."</id>". PHP_EOL);
    fwrite($file, "      <razonsocial>".$dbrazonsocial."</razonsocial>". PHP_EOL);
    fwrite($file, "      <nomcomercial>".$dbnomcomercial."</nomcomercial>". PHP_EOL);
    fwrite($file, "      <nif>".$dbnif."</nif>". PHP_EOL);
    fwrite($file, "      <tel>".$dbtel."</tel>". PHP_EOL);
    fwrite($file, "      <activo>".$dbactivo."</activo>". PHP_EOL);
    fwrite($file, "      <codcli>".$dbcodcli."</codcli>". PHP_EOL);
    fwrite($file, "      <codpro>".$dbcodpro."</codpro>". PHP_EOL);
    fwrite($file, "      <dir>".$dbdir."</dir>". PHP_EOL);
    fwrite($file, "      <cp>".$dbcp."</cp>". PHP_EOL);
    fwrite($file, "      <pobla>".$dbpobla."</pobla>". PHP_EOL);
    fwrite($file, "      <idprov>".$dvidprov."</idprov>". PHP_EOL);
    fwrite($file, "      <idpais>".$dbidpais."</idpais>". PHP_EOL);
    fwrite($file, "      <idtarifa>".$dbidtarifa."</idtarifa>". PHP_EOL);
    fwrite($file, "      <codclipro>".$dbcodclipro."</codclipro>". PHP_EOL);
    fwrite($file, "      <fechaalta>".$dbfechaalta."</fechaalta>". PHP_EOL);
    fwrite($file, "      <ncuenta>".$dbncuenta."</ncuenta>". PHP_EOL);
    fwrite($file, "      <notas>".$dbnotas."</notas>". PHP_EOL);
    fwrite($file, "      <origen>".$dborigen."</origen>". PHP_EOL);
    fwrite($file, "      <email>".$dbemail."</email>". PHP_EOL);
    fwrite($file, "      <notaimp>".$dbnotaimp."</notaimp>". PHP_EOL);
    fwrite($file, "      <idcomercial>".$dbidcomercial."</idcomercial>". PHP_EOL);
    fwrite($file, "      <idtipotercero>".$dbidtipotercero."</idtipotercero>". PHP_EOL);
    fwrite($file, "      <idactividad>".$dbidactividad."</idactividad>". PHP_EOL);
    fwrite($file, "      <clifp>".$dbclifp."</clifp>". PHP_EOL);
    fwrite($file, "      <clidp>".$dbclidp."</clidp>". PHP_EOL);
    fwrite($file, "      <profp>".$dbprofp."</profp>". PHP_EOL);
    fwrite($file, "      <prodp>".$dbprodp."</prodp>". PHP_EOL);
    fwrite($file, "      <idzona>".$dbidzona."</idzona>". PHP_EOL);
    fwrite($file, "   </tercero>". PHP_EOL);
    fwrite($file, "</lnxgest>". PHP_EOL);

    fclose($file);

    $respuestarecoverymode = "Tercero [".$rcvymd_arryvariables["idtercero"]."][".$dbrazonsocial."] exportado correctamente";
}

?>