<?php
function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
}

$ficherito = generarCodigo(15);

$rutaficheropdf = $lnxprintspool."job_".$ficherito.".xml";

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$tpv_codigo = $rowaux["codigo"];
$tpv_idserie = $rowaux["idserie"];
$tpv_idtercero = $rowaux["idtercero"];
$tpv_codigo = $rowaux["codigo"];
$dbfecha = $rowaux["fecha"];

    $xfecha = explode(" ", $dbfecha);
        $fechita = $xfecha[0];
    $xfecha = explode("-", $fechita); 
    $fano = $xfecha[0];
    $fmes = $xfecha[1];
    $fdia = $xfecha[2];
    
    $dbfecha = $fdia."/".$fmes."/".$fano;

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$tpv_idserie."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$serie_idempresa = $rowaux["idempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$serie_idempresa."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$empresarazonsocial = $rowaux["razonsocial"];
$dbempresanif = $rowaux["nif"];
$dbempresadir = $rowaux["dir"];
$dbempresacp = $rowaux["cp"];
$dbempresapobla = $rowaux["pobla"];
$dbempresatel = $rowaux["tel"]; 


$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$tpv_idtercero."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$tercero_razonsocial = $rowaux["razonsocial"];


//Sumamos el total ticket y sumamos según el impuesto

$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$baseimponible = $rowaux["importe"];
$sumaimpuestos = 0;

$cnsimpresoras = $mysqli->query("SELECT DISTINCT(idtax) from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");
while($coltax = mysqli_fetch_array($cnsimpresoras))
{
    $idtax = $coltax["idtax"];
    
    $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtax = '".$idtax."' and idtpv = '".$idtpv."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $sumaimportetax[$idtax] = $rowaux["importe"];
    
    $sumaimpuestos = $sumaimpuestos + $rowaux["importe"];
}

$lbl_totalticket = $baseimponible + $sumaimpuestos;
$lbl_totalticket = round($lbl_totalticket, 2);


//Buscamos lo que ya se ha pagado del ticket
$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO')");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_pagado = $rowaux["importe"];
$lbl_pagado = round($lbl_pagado, 2);




// --------------- comienza impresión -------------------

$prtjobsql= $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, iduser, display) values ('".$idimpresora."', 'job_".$ficherito.".xml', '3', '".$_COOKIE["lnxuserid"]."', 'Ticket ".$tpv_codigo."')");

$file = fopen($rutaficheropdf, "w");

fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
fwrite($file, "<lnxgest>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>8</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>27</ypos>". PHP_EOL);
fwrite($file, "      <xposend>80</xposend>". PHP_EOL);
fwrite($file, "      <yposend>27</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>image</linetype>". PHP_EOL);
fwrite($file, "      <textline>logoticket.png</textline>". PHP_EOL);
fwrite($file, "      <xpos>20</xpos>". PHP_EOL);
fwrite($file, "      <ypos>1</ypos>". PHP_EOL);
fwrite($file, "      <xposend>40</xposend>". PHP_EOL);
fwrite($file, "      <yposend>9</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

  fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>6</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$dbempresadir.", ".$dbempresacp." ".$dbempresapobla."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
fwrite($file, "      <ypos>8</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Telefono atención cliente: ".$dbempresatel."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
fwrite($file, "      <ypos>10</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>NIF: ".$dbempresanif."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
fwrite($file, "      <ypos>13</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Pago nº: ".$tpv_codigo."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>35</xpos>". PHP_EOL);
fwrite($file, "      <ypos>17</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);




fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$dbrazonsocial."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
fwrite($file, "      <ypos>17</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Fecha: ".$dbfecha."</textline>". PHP_EOL);
fwrite($file, "      <textalign>center</textalign>". PHP_EOL);
fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
fwrite($file, "      <ypos>20</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Bold</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$tercero_razonsocial."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>25</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Unid.</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>30</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Articulo</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>10</xpos>". PHP_EOL);
fwrite($file, "      <ypos>30</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Importe</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>30</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

//Ahora imprimimos las lineas del ticket

$posicionlinea_y = 30;

$cnsimpresoras = $mysqli->query("select * from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");
while($collinea = mysqli_fetch_array($cnsimpresoras))
{
    $posicionlinea_y = $posicionlinea_y + 5;
    
    $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idlinea = '".$collinea["id"]."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbsumtaxlinea = $rowaux["importe"];
    
    $lbl_importe = $collinea["importe"] + $dbsumtaxlinea;
    $lbl_importe = round($lbl_importe, 2);
    $lbl_importe = number_format($lbl_importe, 2, ".", ",");
    
    
    
    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$collinea["unidades"]."</textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);

    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$collinea["concepto"]."</textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>10</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);
    
    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$lbl_importe."</textline>". PHP_EOL);
    fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);
    
}

$posicionlinea_y = $posicionlinea_y + 5;

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>line</linetype>". PHP_EOL);
fwrite($file, "      <linesize>8</linesize>". PHP_EOL);
fwrite($file, "      <xpos>0</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "      <xposend>80</xposend>". PHP_EOL);
fwrite($file, "      <yposend>".$posicionlinea_y."</yposend>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$posicionlinea_y = $posicionlinea_y + 3;

$cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$baseimponible = round($rowaux["importe"], 2);
$baseimponible = number_format($baseimponible, 2, ".", ",");

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Base imponible</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>2</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);



fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$baseimponible."</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


//ahora calculamos las lineas con impuestos cero
$cnslineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");	
while($col = mysqli_fetch_array($cnslineas))
{
    
    $cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' and idlinea = '".$col["id"]."' ");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $importesintaxas = $rowaux["importe"];
    
    if($importesintaxas == 0)
    {
        $sumasintaxas = $sumasintaxas + $col["importe"];
        
    }

}

if($sumasintaxas <> 0)
{
    
    $sumasintaxas = number_format($sumasintaxas, 2, ".", ",");
    $posicionlinea_y = $posicionlinea_y + 5;

    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>Base (excento)</textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>5</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);

    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$sumasintaxas."</textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>40</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);

}


$cnslineastax = $mysqli->query("select DISTINCT(idtax) from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");	
while($coltax = mysqli_fetch_array($cnslineastax))
{
    $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idtax"]."'");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $lbl_nombreimpuesto = $rowaux["impuesto"];
    
        
    $cnslineastaxespecifico = $mysqli->query("select DISTINCT(valor) from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' and idtax = '".$coltax["idtax"]."' order by valor");	
    while($coltaxespecifico = mysqli_fetch_array($cnslineastaxespecifico))
    {
        $cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' and idtax = '".$coltax["idtax"]."' and valor = '".$coltaxespecifico["valor"]."' ");
        $rowaux = mysqli_fetch_assoc($cnsaux);
        $lbl_importextax = round($rowaux["importe"], 2);
        $lbl_importextax = number_format($lbl_importextax, 2, ".", ",");
        $lbl_bi = 0;
        $cnsbilineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' and idtax = '".$coltax["idtax"]."' and valor = '".$coltaxespecifico["valor"]."'");	
        while($colbi = mysqli_fetch_array($cnsbilineas))
        {
               
               $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."tpv_lineas where id = '".$colbi["idlinea"]."' ");
               $rowaux = mysqli_fetch_assoc($cnsaux);
               $lbl_bi = $lbl_bi + $rowaux["importe"];
               $lbl_bi = round($lbl_bi, 2);
               $lbl_bi = number_format($lbl_bi, 2, ".", ",");
               
        }
        if ($coltaxespecifico["valor"] <> 0 )
        {
            // echo '<p>--Base: '.$lbl_bi.' ----- '.$coltaxespecifico["valor"].' --- '.$lbl_importextax.'</p>';
            
            
            $posicionlinea_y = $posicionlinea_y + 5;

    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$lbl_nombreimpuesto." ".$coltaxespecifico["valor"]."% </textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>5</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);
    
    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>Base: ".$lbl_bi." </textline>". PHP_EOL);
    fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>30</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);
    
    fwrite($file, "   <lineprint>". PHP_EOL);
    fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
    fwrite($file, "      <font>Arial</font>". PHP_EOL);
    fwrite($file, "      <fontsize>8</fontsize>". PHP_EOL);
    fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
    fwrite($file, "      <textline>".$lbl_importextax."</textline>". PHP_EOL);
    fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
    fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
    fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
    fwrite($file, "   </lineprint>". PHP_EOL);
            
        }
    }
    
    
}



$posicionlinea_y = $posicionlinea_y + 5;

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Bold</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Total Ticket</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>10</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Bold</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$lbl_totalticket."</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

$posicionlinea_y = $posicionlinea_y + 5;

$fechahoy = date("d/m/Y");
fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>9</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Regular</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>Pagado hasta ".$fechahoy."</textline>". PHP_EOL);
fwrite($file, "      <textalign>left</textalign>". PHP_EOL);
fwrite($file, "      <xpos>10</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);

fwrite($file, "   <lineprint>". PHP_EOL);
fwrite($file, "      <linetype>string</linetype>". PHP_EOL);
fwrite($file, "      <font>Arial</font>". PHP_EOL);
fwrite($file, "      <fontsize>10</fontsize>". PHP_EOL);
fwrite($file, "      <fontstyle>Bold</fontstyle>". PHP_EOL);
fwrite($file, "      <textline>".$lbl_pagado."</textline>". PHP_EOL);
fwrite($file, "      <textalign>right</textalign>". PHP_EOL);
fwrite($file, "      <xpos>70</xpos>". PHP_EOL);
fwrite($file, "      <ypos>".$posicionlinea_y."</ypos>". PHP_EOL);
fwrite($file, "   </lineprint>". PHP_EOL);


fwrite($file, "</lnxgest>". PHP_EOL);
fclose($file);


$ficheritonew = generarCodigo(15);

$rutaficheropdfcopia = $lnxprintspool."job_".$ficheritonew.".xml";

copy($rutaficheropdf, $rutaficheropdfcopia);

$prtjobsql = $mysqli->query("insert into ".$prefixsql."printjobs (idprinter, printfile, idtipo, iduser, display) values ('".$idimpresora."', 'job_".$ficheritonew.".xml', '3', '".$_COOKIE["lnxuserid"]."', 'Ticket ".$tpv_codigo." (copia)' )");
?>