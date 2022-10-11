<?php
$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO')");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_sumaimporte = $rowaux["importe"];


$lbl_pendiente = $tpv_total - $lbl_sumaimporte;

$lbl_sumaimporte = round($lbl_sumaimporte, 2);
$lbl_pendiente = round($lbl_pendiente, 2);

if($lbl_pendiente > 0)
{    
echo '<p><a href="index.php?module=tpv&section=pagos&action=new&idtpv='.$idtpv.'" class="btnedit_verde">Nuevo pago</a></p>';    
}

?>


<table width="100%">
    <tr class="maintitle">
		<td width="40"></td>
        <td>Fecha</td>
        <td>F. Pago</td>
        <td>Importe</td>
    </tr>
<?php
$cnslineas = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO') order by fecha asc");
while($col = mysqli_fetch_array($cnslineas))
{
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

    $sqlaux = $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$col["idfpago"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_fpago = $rowaux["formapago"];
    
    $dbfecha = $col["fecha"];
		$fano = substr($dbfecha, 0, 4);  
		$fmes = substr($dbfecha, 5, 2);  
		$fdia = substr($dbfecha, 8, 2);  

		$lbl_fecha = $fdia.'/'.$fmes.'/'.$fano;
    
	$lbl_importe = $col["importe"];
	
	$lbl_importe =round($lbl_importe, 2);
	$lbl_importe = number_format($lbl_importe, 2, ".", ",");
	
    echo '<td width="40"><a href="index.php?module=tpv&section=pagos&action=edit&idtpv='.$idtpv.'&idpago='.$col["id"].'" class="btnedit">Editar</a></td>';    
    echo '<td>'.$lbl_fecha.'</td>';
    echo '<td>'.$lbl_fpago.'</td>';
    echo '<td align="right">'.$lbl_importe.'</td>';
    echo '</tr>';
    
}



?>
</table>
<p></p>
<table width="100%">
<tr>
    <td>Pagado</td>
    <td align="right">
	<?php 
	
	$lbl_sumaimporte =round($lbl_sumaimporte, 2);
	$lbl_sumaimporte = number_format($lbl_sumaimporte, 2, ".", ",");
	
	echo $lbl_sumaimporte; 
	?>
	</td>
</tr>
<tr>
    <td>Pendiente</td>
    <td align="right"><b>
	<?php 
	$lbl_pendiente =round($lbl_pendiente, 2);
	$lbl_pendiente = number_format($lbl_pendiente, 2, ".", ",");
	
	echo $lbl_pendiente; 
	?>
	</b></td>
</tr>
</table>


