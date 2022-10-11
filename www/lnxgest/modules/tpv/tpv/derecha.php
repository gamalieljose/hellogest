<script type="text/javascript">
function muestrataxas() 
{
	document.getElementById('tab-taxas').style.display = 'inline';
	document.getElementById('btnshowtaxas').style.display = 'none';
        document.getElementById('btnhidetaxas').style.display = 'inline';
}
function ocultataxas() 
{
	document.getElementById('tab-taxas').style.display = 'none';
	document.getElementById('btnshowtaxas').style.display = 'inline';
        document.getElementById('btnhidetaxas').style.display = 'none';
}
</script>

<?php

?>
<form name="frmbarcode" method="POST" action="index.php?module=tpv&section=tpv&action=barcode"/>
<input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />
Barcode: <input type="text" value="" name="txtbarcode" autofocus />
<input type="submit" value="Buscar" class="btnedit_verde"/>
</form>
<form name="frmaddcustomizado" method="POST" action="index.php?module=tpv&section=tpv&action=addcustom"/>
<input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />

<table width="100%" border="0">
<tr class="maintitle">
    
	<td>Concepto</td>
	<td width="120" align="center">Unidades</td>
	<td>Precio</td>
        <td width="32">&nbsp;</td>
	<td>Importe</td>
	<td width="50">&nbsp;</td>
</tr>


<tr>

<td>
    <a id="btnshowtaxas" href="javascript:muestrataxas();"><img src="img/flecha-abajo.png" title="Mostrar opciones avanzadas" alt="Mostrar opciones avanzadas"/></a>
    <a id="btnhidetaxas" style="display: none;" href="javascript:ocultataxas();"><img src="img/flecha-arriba.png" title="Oculta opciones avanzadas" alt="Oculta opciones avanzadas"/></a>    
        
        
	<input type="text" value="" id="txtconcepto" name="txtconcepto" style="width: Calc(100% - 64px);"/>
    <a href="javascript:muestrakbqwerty('txtconcepto');" ><img src="modules/tpv/img/keyboard.jpg" /></a>
</td>
<td width="120">
    
    
    
<a href="javascript:restaunidad(0, 0);"><img src="img/flecha-izqd.png" /></a>
	<input type="number" value="1" onchange="javascript:calculaimporteins();" name="txtunidades[]" style="width: 50px; text-align: center;"/>
<a href="javascript:sumaunidad(0, 0);"><img src="img/flecha-drch.png" /></a>

</td>
<td width="80">
	<input type="text" value="0.00" name="htxtprecio[]" onblur="javascript:calculaimporteins();" style="width: 80px; text-align: right;" />
</td>
<td width="35">
    
<a href="javascript:muestrakbnum('0', '0');" ><img src="modules/tpv/img/keyboard.jpg" /></a>
    
</td>
<td width="100">
<input type="text" value="0.00" name="txtimporte" id="txtimporte" style="width: 90px; text-align: right;" readonly/>
</td>
<td align="right" width="80">
	<input type="submit" value="Insertar" class="btnedit_verde" />
</td>
</tr>
</table>
<div id="tab-taxas" style="display: none;">
<?php

$cnstaxas = $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$dbidserie."' order by orden");	
while($col = mysqli_fetch_array($cnstaxas))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$col["idimpuesto"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_impuesto = $rowaux["impuesto"];
    
    if($col["valor"] == "1"){$editable = '';}
    if($col["valor"] == "0"){$editable = ' readonly=""';}
    echo $lbl_impuesto.' <input type="number" value="'.$col["valor"].'" '.$editable.' name="txtvalortax[]" style="width: 80px;"/></br>';
    echo '<input type="hidden" name="hidtax[]" value="'.$col["idimpuesto"].'" />';
}


?>
    
</div>

</form>

<div id="lineasrs">
<table width="100%" border="0">
<?php
$color = '1';

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
	
   


echo '<td>'.$col["concepto"].'</td>';
echo '<td width="120">
    
   
<a href="javascript:restaunidad('.$indicecantidades.', '.$col["id"].');"><img src="img/flecha-izqd.png" /></a>
	<input type="number" value="'.$col["unidades"].'" name="txtunidades[]" readonly="" style="width: 50px; text-align: center;"/>
<a href="javascript:sumaunidad('.$indicecantidades.', '.$col["id"].');"><img src="img/flecha-drch.png" /></a>

</td>';

echo '<td align="right">'.$col["precio"].'<input type="hidden" name="htxtprecio[]" value="'.$col["precio"].'" /></td>';

//$indicecantidades = $indicecantidades -1;

echo '<td align="right" width="35"><a href="javascript:muestrakbnum('.$indicecantidades.', '.$col["id"].');" ><img src="modules/tpv/img/keyboard.jpg" /></a> </td>';

//$indicecantidades = $indicecantidades +1;

echo '<td align="right"  width="100">'.$col["importe"].'</td>';
echo '<td align="right" width="80"><a href="index.php?module=tpv&section=tpv&action=dellinea&id='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';

 echo '</tr>';

    
}



?>
    
</table>

    
<?php
$tpv_bi = round($tpv_bi, 2);
$tpv_taxes = round($tpv_taxes, 2);
 
    

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
</div>


<p></p>





