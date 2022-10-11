<?php

?>

<table width="100%" border="0">
<tr class="maintitle">
    
	<td>Concepto</td>
	<td width="120" align="center">Unidades</td>
	<td>Precio</td>
        <td width="32">&nbsp;</td>
	<td>Importe</td>
	<td width="50">&nbsp;</td>
        <td>Impuestos</td>
</tr>
<?php
$cnslineas = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' order by orden asc");
while($col = mysqli_fetch_array($cnslineas))
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

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
	$lbl_precio = $col["precio"];
	$lbl_precio =round($lbl_precio, 2);
	$lbl_precio = number_format($lbl_precio, 2, ".", ",");
		
	$lbl_importe = $col["importe"];
	$lbl_importe =round($lbl_importe, 2);
	$lbl_importe = number_format($lbl_importe, 2, ".", ",");
			
	
    echo '<td>'.$col["concepto"].'</td>';
	echo '<td width="120" align="center">'.$col["unidades"].'</td>';
	echo '<td align="right">'.$lbl_precio.'</td>';
    echo '<td>&nbsp;</td>';
	echo '<td align="right">'.$lbl_importe.'</td>';
	echo '<td>&nbsp;</td>';
        echo '<td>';
        
        $cnslineastaxas = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' and idlinea = '".$col["id"]."' order by idtax asc");
        while($coltaxas = mysqli_fetch_array($cnslineastaxas))
        {
            if ($coltaxas["valor"] <> 0)
            {
                $sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltaxas["idtax"]."'");
                $rowaux = mysqli_fetch_assoc($sqlaux);
                $lblserie = $rowaux["impuesto"];
                $lblimporte = $coltaxas["importe"];
                $lblimporte = round($lblimporte, 2);

                echo $lblserie.": ".$coltaxas["valor"]."%  (".$lblimporte." Eur) </br>";
            }
        }
        
        
        
        echo '</td>';
}

?>
</table>





<p></p>

<?php
$tpv_bi = round($tpv_bi, 2);
$tpv_bi = number_format($tpv_bi, 2, ".", ",");

$tpv_taxes = round($tpv_taxes, 2);
$tpv_taxes = number_format($tpv_taxes, 2, ".", ",");



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
?>

<table width="100%">
    <tr class="maintitle">
        <td colspan="3">Base imponible</td>
        <td align="right"><?php echo $tpv_bi; ?></td>
    </tr>
<?php
// ----------- Muestra si hay sin impuestos asociados -----------------

if($sumasintaxas <> 0)
{
echo '<tr>
    <td width="30"> </td>
        <td colspan="2">Base (excento)</td>
        <td align="right">'.$sumasintaxas.'</td>
    </tr>';    

}
// -------------- FIN muestra sin impuestos -------------------------



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
            
            
            
            echo '<tr>
    <td width="30"> </td>
        <td >'.$lbl_nombreimpuesto." ".$coltaxespecifico["valor"].'% </td>
        <td align="right">'.$lbl_bi.'</td>    
        <td align="right">'.$lbl_importextax.'</td>
    </tr>'; 

    
            
        }
    } 
}
?>
</table>











<div class="row">
    <div class="col maintitle" align="left">
        Campos personalizados
    </div>
</div>

<?php
// ------------------- CAMPOS PERSONALIZADOS -------------------

$cnscc = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_cfg_cg ");
while($col = mysqli_fetch_array($cnscc))
{
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_campos where idtpv = '".$idtpv."' and campo = '".$col["campo"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_campocustomvalor = $rowaux["valor"];
    
    
    echo '<div class="row">
    <div class="col-sm" align="left">
        '.$col["display"].'
    </div>
    <div class="col-sm" align="left">
        '.$lbl_campocustomvalor.'
    </div>
</div>';
    
    
}
?>

