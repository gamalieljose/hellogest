<?php
$iddocumento = $_GET["id"];
echo '<p>CONTA_VIEW</P>';
?>

<table class="msgaviso">
<tr class="maintitle">
	<td colspan="2">Asiento contable para esta factura</td>
	
</tr>
<tr>
	<td>Numero de asiento</td>
	<td>1</td>
</tr>
<tr>
	<td>Fecha de asiento</td>
	<td>01/02/2003</td>
</tr>
</table>
<p>&nbsp;</p>

<table>
<tr class="maintitle">
	<td>Cuenta</td>
	<td>Concepto</td>
	<td>Debe</td>
	<td>Haber</td>
</tr>
<?php
$cnsfv = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$rowfv = mysqli_fetch_assoc($cnsfv);
$dbidtercero = $rowfv["idcliente"];


$cnsaux1 = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
$rowaux1 = mysqli_fetch_assoc($cnsaux1);
$dbcontacli = $rowaux1["conta_cli"];
$dbrazonsocial = $rowaux1["razonsocial"];


$cnsfv = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where idfv = '".$iddocumento."'");
$rowfv = mysqli_fetch_assoc($cnsfv);
$dbimportesintax = $rowfv["importe"];
$cnsfv = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where idfv = '".$iddocumento."'");
$rowfv = mysqli_fetch_assoc($cnsfv);
$dbimportetax = $rowfv["importe"];
$totalfactura = $dbimportesintax + $dbimportetax;


$cnsfv = $mysqli->query("SELECT sum(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where idfv = '".$iddocumento."' and exclufactu = '0'");
$rowfv = mysqli_fetch_assoc($cnsfv);
$dbimportebaseimponible = $rowfv["importe"];
?>
<tr>
	<td><?php echo $dbcontacli; ?></td>
	<td><?php echo $dbrazonsocial; ?></td>
	<td align="right"><?php echo $totalfactura; ?></td>
	<td></td>
</tr>

<tr>
	<td>70000000</td>
	<td>Venta mercancias</td>
	<td></td>
	<td align="right"><?php echo $dbimportebaseimponible; ?></td>
</tr>

<tr>
	<td>47700000</td>
	<td>IVA repercutido</td>
	<td></td>
	<td align="right"><?php echo $dbimportetax; ?></td>
</tr>

<tr>
	<td>57000000</td>
	<td>Caja, euros</td>
	<td align="right"><?php echo $totalfactura; ?></td>
	<td></td>
	
</tr>
<tr>
	<td><?php echo $dbcontacli; ?></td>
	<td><?php echo $dbrazonsocial; ?></td>
	<td></td>
	<td align="right"><?php echo $totalfactura; ?></td>
</tr>

</table>