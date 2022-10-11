<?php
$i = 1;
while ($i <= $numcopias) 
{
    $i = $i +1;

$ficherito = generarCodigo(15);

$rutaficheropdf = $lnxprintspool."job_".$ficherito.".xml";

// --------------- comienza impresión -------------------

$prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, iduser, display) values ('".$idimpresora."', 'job_".$ficherito.".xml', '3', '".$_COOKIE["lnxuserid"]."', 'Impresion vale 1 practica')");

$file = fopen($rutaficheropdf, "w");

fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
fwrite($file, "<lnxgest>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>0</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>0</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>8</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>8</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>0</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>0</xposend>". PHP_EOL);
fwrite($file, "      <yposend>8</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>0</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>8</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>18</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>18</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>18</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>0</xposend>". PHP_EOL);
fwrite($file, "      <yposend>70</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>18</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>70</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>5</linesize>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>32</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>68</xposend>". PHP_EOL);
fwrite($file, "      <yposend>32</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>5</linesize>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>37</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>68</xposend>". PHP_EOL);
fwrite($file, "      <yposend>37</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>5</linesize>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>32</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>2</xposend>". PHP_EOL);
fwrite($file, "      <yposend>37</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>5</linesize>". PHP_EOL);
fwrite($file, "      <xpos>68</xpos>". PHP_EOL);
fwrite($file, "      <ypos>32</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>68</xposend>". PHP_EOL);
fwrite($file, "      <yposend>37</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "	<lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>10</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>70</ypos>". PHP_EOL);
fwrite($file, "	     <xposend>70</xposend>". PHP_EOL);
fwrite($file, "      <yposend>70</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Fecha de la Practica: __ / __ / ______</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>2</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>12</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>VALE POR UNA</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>68</xpos>". PHP_EOL);
fwrite($file, "      <ypos>20</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>12</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>PRACTICA</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>68</xpos>". PHP_EOL);
fwrite($file, "      <ypos>25</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>image</linetype>". PHP_EOL);
fwrite($file, "      <textline>logoticket.png</textline>". PHP_EOL);
fwrite($file, "      <xpos>-2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>20</ypos>". PHP_EOL);
fwrite($file, "      <xposend>35</xposend>". PHP_EOL);
fwrite($file, "      <yposend>7</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$dbconcepto."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>33</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$dbrazonsocial."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>38</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Ticket: ".$fhidcobro."  Fecha ".$dbfecha."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>50</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>7</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Una clase a la que no se asista, sin anularla 48h antes, </textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>58</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>7</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>se considera realizada.</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>62</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>7</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>La no asistencia a dos clases significa perder el horario.</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>66</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "</lnxgest>". PHP_EOL);
fclose($file);

}
?>

