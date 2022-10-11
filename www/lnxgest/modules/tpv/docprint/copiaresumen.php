<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$codigotpv = $rowaux["codigo"];
$ticket_fecha = $rowaux["fecha"];
$ticket_idtercero = $rowaux["idtercero"];
        
$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$ticket_idtercero."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$ticket_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$ticket_importe = $rowaux["importe"];
$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$ticket_importe_tax = $rowaux["importe"];

$ticket_totalimporte = $ticket_importe + $ticket_importe_tax;
$ticket_totalimporte = round($ticket_totalimporte, 2);



$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO')");
$rowaux = mysqli_fetch_assoc($sqlaux);
$ticket_importepagado = $rowaux["importe"];

$ficherito = generarCodigo(15);

$rutaficheropdf = $lnxprintspool."job_".$ficherito.".xml";

$prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, iduser, display) values ('".$idimpresora."', 'job_".$ficherito.".xml', '3', '".$_COOKIE["lnxuserid"]."', 'Impresion copia resumen ".$codigotpv."')");

$file = fopen($rutaficheropdf, "w");

fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
fwrite($file, "<lnxgest>". PHP_EOL);

$poslineay = 2;

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Factura simplificada: ".$codigotpv."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$poslineay = $poslineay +5;

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Fecha emision: ".$ticket_fecha."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$poslineay = $poslineay +5;
fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Alumno: ".$ticket_tercero."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$poslineay = $poslineay +5;
fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Total ticket: ".$ticket_totalimporte."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$poslineay = $poslineay +5;
fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Pagado: ".$ticket_importepagado."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


$fechahoy = date("d/m/Y h:i:s");

$poslineay = $poslineay +5;
fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Fecha impresion: ".$fechahoy."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$poslineay."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "</lnxgest>". PHP_EOL);
fclose($file);
?>

