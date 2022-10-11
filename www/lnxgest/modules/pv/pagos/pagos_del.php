<?php
$idfv = $_GET["id"];
$idpago = $_GET["idpago"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_pagos where id = '".$idpago."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbfecha = $rowpago["fecha"];
$dbimporte = $rowpago["importe"];
$dbidfpago = $rowpago["idfpago"];
$dbidcpago = $rowpago["idcpago"];
?>

<p><?php echo '<a href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'" class="btnedit">Volver a factura</a>'; ?></p>

<div align="center">
<?php
echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=pagos&action=save" method="POST">';

echo '<input type="hidden" value="'.$idfv.'" name="hidfv"/>'; 
echo '<input type="hidden" value="'.$idpago.'" name="hidpago"/>';
echo '<input type="hidden" value="delete" name="haccion"/>';
?>
<table>
<tr class="maintitle"><td colspan="2">Eliminación de pago efectuado</td></tr>
<tr>
<td>Fecha</td>
<?php

$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$cfecha = $fdia.'/'.$fmes.'/'.$fano;



?>
<td><?php echo $cfecha; ?></td>
</tr>
<tr>
<td>Importe</td>
<td><?php echo $dbimporte; ?></td>
</tr>

<tr><td>Documento de pago</td>
<td>
<?php 
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."formaspago where id = '".$dbidfpago."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbformapago = $rowpago["formapago"];

echo $dbformapago; 
?>

</td>
</tr>
<tr><td>Forma de pago</td>
<td>
<?php 
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago where id = '".$dbidcpago."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbcuenta = $rowpago["cpago"];

echo $dbcuenta; 
?>

</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" class="btnsubmit" value="Eliminar"/>

<?php echo '<a href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'" class="btnenlacecancel">Cancelar</a>'; ?>
</td></tr>
</table>
</form>
</div>