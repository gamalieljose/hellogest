<?php

$ficheromarca = $rutaficherotemporalpdf."marca.pdf";

require('scripts/fpdf/fpdf.php');
require('scripts/fpdf/writehtml.php');





$numfichero = -1;

$fichero_fc = $rutaficherotemporalpdf."fc.pdf";
$fichero_temp = $rutaficherotemporalpdf."temp.pdf";
$fichero_sinstamp = $rutaficherotemporalpdf."sinstamp.pdf";
$fichero_stamp = $rutaficherotemporalpdf."stampado.pdf";

unlink($fichero_fc);
unlink($fichero_temp);
unlink($fichero_sinstamp);


$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fc where idserie = '".$seriecompras."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
while($columna = mysqli_fetch_array($cnsfacturas))
{
    // echo '<p>ID FC:'.$columna["id"].'</p>';
    $cnsficheros = $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'fc' and idlinea0 = '".$columna["id"]."' and idcat = '".$flstgenpdffc."'");
    while($colfichero = mysqli_fetch_array($cnsficheros))
    {
        $numfichero = $numfichero +1;
        $iddocumento = $columna["id"];
        $idfichero = $colfichero["idfichero"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ficheronombre = $rowaux["fichero"];
        $ficherofolder = $rowaux["extension"];
        $rutapdf = $lnxrutaficheros.$ficherofolder."/".$ficheronombre;
        
        $pdf = new FPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('Arial','B',12);

$facturanombre = "Cod. interno: ".$columna["codigo"];
$pdf->SetFillColor(230, 242, 255);
$pdf->Rect(0, 0, 70, 10 ,F);

$pdf->text(5,5, $facturanombre);
$pdf->Output('F', $ficheromarca);
        
        copy($rutapdf, $fichero_sinstamp);
        $ejecutar = "pdftk ".$rutapdf." multistamp ".$ficheromarca." output ".$fichero_stamp;
        shell_exec($ejecutar);
        
        
        if ($numfichero == '0')
        { 
            // copy($rutapdf, $fichero_temp);     
            copy($fichero_stamp, $fichero_fc);
        }
        else
        {

            copy($fichero_fc, $fichero_temp);
            
            $ejecutar = "pdftk ".$fichero_temp." ".$fichero_stamp." cat output ".$fichero_fc;
            shell_exec($ejecutar);
        }
    }
   
    
    

}







$numfichero = -1;

$fichero_fv = $rutaficherotemporalpdf."fv.pdf";
$fichero_temp = $rutaficherotemporalpdf."temp.pdf";

unlink($fichero_fv);
unlink($fichero_temp);


$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fv where idserie = '".$serieventas."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."') order by codigoint");
while($columna = mysqli_fetch_array($cnsfacturas))
{
    
    $cnsficheros = $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'fv' and idlinea0 = '".$columna["id"]."' and idcat = '".$flstgenpdffv."'");
    while($colfichero = mysqli_fetch_array($cnsficheros))
    {
        $numfichero = $numfichero +1;
        $iddocumento = $columna["id"];
        $idfichero = $colfichero["idfichero"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ficheronombre = $rowaux["fichero"];
        $ficherofolder = $rowaux["extension"];
        $rutapdf = $lnxrutaficheros.$ficherofolder."/".$ficheronombre;
             
       
        
        if ($numfichero == '0')
        {
            copy($rutapdf, $fichero_temp);
            copy($rutapdf, $fichero_fv);
        }
        else
        {
            copy($fichero_fv, $fichero_temp);
            $ejecutar = "pdftk ".$fichero_temp." ".$rutapdf." cat output ".$fichero_fv;
            shell_exec($ejecutar);
        }
    }
   
    
    

}










$numfichero = -1;

$fichero_fvr = $rutaficherotemporalpdf."fvr.pdf";
$fichero_temp = $rutaficherotemporalpdf."temp.pdf";

unlink($fichero_fvr);
unlink($fichero_temp);

$cnsfacturas = $mysqli->query("SELECT * from ".$prefixsql."fvr where idserie = '".$serieventasr."' and codigoint <> '0' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
while($columna = mysqli_fetch_array($cnsfacturas))
{
    // echo '<p>ID FC:'.$columna["id"].'</p>';
    $cnsficheros = $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'fvr' and idlinea0 = '".$columna["id"]."' and idcat = '".$flstgenpdffvr."'");
    while($colfichero = mysqli_fetch_array($cnsficheros))
    {
        $numfichero = $numfichero +1;
        $iddocumento = $columna["id"];
        $idfichero = $colfichero["idfichero"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$idfichero."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ficheronombre = $rowaux["fichero"];
        $ficherofolder = $rowaux["extension"];
        $rutapdf = $lnxrutaficheros.$ficherofolder."/".$ficheronombre;
             
        
        if ($numfichero == '0')
        {
            copy($rutapdf, $fichero_temp);
            copy($rutapdf, $fichero_fvr);
        }
        else
        {
            copy($fichero_fvr, $fichero_temp);
            $ejecutar = "pdftk ".$fichero_temp." ".$rutapdf." cat output ".$fichero_fvr;
            shell_exec($ejecutar);
        }
    }
   
    
    

}
 



?>