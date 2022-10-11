<?php

if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

$data = array();

$ajx_accion = $_POST["accion"];
$ajx_id = $_POST["id"];
$ajx_valor = $_POST["valor"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_lineas where id = '".$ajx_id."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidterminal = $rowaux["idtpv"];
$dbprecio = $rowaux["precio"];
$dbunidades = $rowaux["unidades"];

if($ajx_accion == 'precio')
{   
    $ximporte = $ajx_valor * $dbunidades;
    $sqltpv = $mysqli->query("update ".$prefixsql."tpv_lineas set precio = '".$ajx_valor."', importe = '".$ximporte."' where id = '".$ajx_id."' ");
}
if($ajx_accion == 'unidades')
{
    $ximporte = $ajx_valor * $dbprecio;
    $sqltpv = $mysqli->query("update ".$prefixsql."tpv_lineas set unidades = '".$ajx_valor."', importe = '".$ximporte."' where id = '".$ajx_id."' ");
}



$cnslineastax = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."' and idlinea = '".$ajx_id."' ");    
while($collineatax = mysqli_fetch_array($cnslineastax))
{
    $linea_valor = $collineatax["valor"];
    $linea_idtax = $collineatax["idtax"];

    $ximportetax = ($ximporte / 100) * $linea_valor;
    $ximportetax = $ximportetax;
    $sqlupdlineatax = $mysqli->query("update ".$prefixsql."tpv_lineas_tax set importe = '".$ximportetax."' where idtpv = '".$dbidterminal."' and idlinea = '".$ajx_id."' and idtax = '".$linea_idtax."' and valor = '".$linea_valor."'");
}





$prtlinea = '<table width="100%">';
// array_push($data, $prtlinea);
$color = '1';
$cnsseries = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_lineas where idtpv = '".$dbidterminal."' order by orden ");    
while($col = mysqli_fetch_array($cnsseries))
{

$indicecantidades = $indicecantidades + 1;
if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}

	$prtlinea = $prtlinea."<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
   


$prtlinea = $prtlinea.'<td>'.$col["concepto"].'</td>';
$prtlinea = $prtlinea.'<td width="120">
    
   
<a href="javascript:restaunidad('.$indicecantidades.', '.$col["id"].');"><img src="img/flecha-izqd.png" /></a>
	<input type="number" value="'.$col["unidades"].'" name="txtunidades[]" readonly="" style="width: 50px; text-align: center;"/>
<a href="javascript:sumaunidad('.$indicecantidades.', '.$col["id"].');"><img src="img/flecha-drch.png" /></a>

</td>';

$prtlinea = $prtlinea.'<td align="right">'.$col["precio"].'<input type="hidden" name="htxtprecio[]" value="'.$col["precio"].'" /></td>';

//$indicecantidades = $indicecantidades -1;

$prtlinea = $prtlinea.'<td align="right" width="32"><a href="javascript:muestrakbnum('.$indicecantidades.', '.$col["id"].');" ><img src="modules/tpv/img/keyboard.jpg" /></a> </td>';

//$indicecantidades = $indicecantidades +1;

$prtlinea = $prtlinea.'<td align="right">'.$col["importe"].'</td>';
$prtlinea = $prtlinea.'<td align="right"><a href="index.php?module=tpv&section=tpv&action=dellinea&id='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';

 $prtlinea = $prtlinea.'</tr>';

    
   
	
	// array_push($data, $prtlinea);	
}

$prtlinea = $prtlinea.'</table>';

//Calulamos importes globales


$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$dbidterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbbaseimponible = $rowaux["importe"];

$cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbsumataxlineas = $rowaux["importe"];




$dbbaseimponible = round($dbbaseimponible, 2);
$dbsumataxlineas = round($dbsumataxlineas, 2);

$sumatotal = $dbbaseimponible + $dbsumataxlineas;

$sumatotal = round($sumatotal, 2);





//ahora calculamos las lineas con impuestos cero
$cnslineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas where idtpv = '".$dbidterminal."'");	
while($col = mysqli_fetch_array($cnslineas))
{
    
    $cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."' and idlinea = '".$col["id"]."' ");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $importesintaxas = $rowaux["importe"];
    
    if($importesintaxas == 0)
    {
        $sumasintaxas = $sumasintaxas + $col["importe"];
        
    }

}  

$prtlinea = $prtlinea.'<p></p>';

$prtlinea = $prtlinea.'<table width="100%">
    <tr class="maintitle">
        <td colspan="3">Base imponible</td>
        <td align="right">'.$dbbaseimponible.'</td>
    </tr>';

// ----------- Muestra si hay sin impuestos asociados -----------------

if($sumasintaxas <> 0)
{
$prtlinea = $prtlinea.'<tr>
    <td width="30"> </td>
        <td colspan="2">Base (excento)</td>
        <td align="right">'.$sumasintaxas.'</td>
    </tr>';    

}
// -------------- FIN muestra sin impuestos -------------------------



$cnslineastax = $mysqli->query("select DISTINCT(idtax) from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."'");	
while($coltax = mysqli_fetch_array($cnslineastax))
{
    $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idtax"]."'");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $lbl_nombreimpuesto = $rowaux["impuesto"];
    
        
    $cnslineastaxespecifico = $mysqli->query("select DISTINCT(valor) from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."' and idtax = '".$coltax["idtax"]."' order by valor");	
    while($coltaxespecifico = mysqli_fetch_array($cnslineastaxespecifico))
    {
        $cnsaux = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."' and idtax = '".$coltax["idtax"]."' and valor = '".$coltaxespecifico["valor"]."' ");
        $rowaux = mysqli_fetch_assoc($cnsaux);
        $lbl_importextax = round($rowaux["importe"], 2);
        $lbl_importextax = number_format($lbl_importextax, 2, ".", ",");
        $lbl_bi = 0;
        $cnsbilineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas_tax where idtpv = '".$dbidterminal."' and idtax = '".$coltax["idtax"]."' and valor = '".$coltaxespecifico["valor"]."'");	
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
            
            
            
            $prtlinea = $prtlinea.'<tr>
    <td width="30"> </td>
        <td >'.$lbl_nombreimpuesto." ".$coltaxespecifico["valor"].'% </td>
        <td align="right">'.$lbl_bi.'</td>    
        <td align="right">'.$lbl_importextax.'</td>
    </tr>'; 

    
            
        }
    } 
}

$prtlinea = $prtlinea.'</table>';




$data = array("imprimelineas" => $prtlinea, 
    "baseimponible" => $dbbaseimponible,
    "sumaimpuestos" => $dbsumataxlineas,
    "importetotal" => $sumatotal
    
    );
 

array_push($data, $prtlinea);


    echo json_encode($data);
}
?>