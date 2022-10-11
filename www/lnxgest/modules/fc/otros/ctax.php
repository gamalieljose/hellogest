<?php
$idfv = $_GET["id"];
include("modules/".$lnxinvoice."/fv/botones.php");

$sqlaux = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidserie = $rowaux["idserie"];

?>
<div align="center">
<?php
echo '<form name="frmmodtaxlineas" method="POST" action="index.php?module='.$lnxinvoice.'&section=otros&action=ctaxsave&id='.$idfv.'" >';
echo '<input type="hidden" value="'.$idfv.'" name="hidfv" />'; 

?>
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><td colspan="2"l>Selecciona nuevo valor impuestos</td></tr>

<?php
$ssql = "SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$idfv."' ";
$ConsultaMySql= $mysqli->query($ssql);

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbimpuesto = $rowaux["impuesto"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestosrules where idimpuesto = '".$columna["idimpuesto"]."' and idserie = '".$dbidserie."' ");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbeditable = $rowaux["editable"];
	
	
	
	echo '<tr>';
	echo '<td>'.$dbimpuesto.'</td>';
	if($dbeditable == '0'){$campoeditable = 'readonly=""';}else{$campoeditable = '';}
	echo '<td>
	<input type="number" name="txttax[]" value="'.$columna["valor"].'" '.$campoeditable.' style="width: 80px;" />
	<input type="hidden" name="txtidtax[]" value="'.$columna["idimpuesto"].'" />
	</td>';
	echo '</tr>';
}


?>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Aplicar cambios</button>
<?php echo ' <a href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; ?>
</table>
</form>

<p></p>
<p>Los impuestos indicados se aplicarán a todas las lineas del documento</p>


</div>


