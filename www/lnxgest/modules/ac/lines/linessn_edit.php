<?php
$idlineasn = $_GET["idlineasn"];

$campomasterid = "id".$lnxinvoice;

$cnssql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_sn where id = '".$idlineasn."'");
$rowlinea = mysqli_fetch_assoc($cnssql);
$dbsn = $rowlinea["sn"];
$dbpn = $rowlinea["pn"];
$dbotro = $rowlinea["otro"];

$idmasterdoc = $rowlinea[$campomasterid];
$idlinea = $rowlinea["idlinea"];
?>

<div align="center">
<p></p>
<p></p>

<?php echo '<form name="form2" action="index.php?module='.$lnxinvoice.'&section=linessn&action=save" method="POST">'; ?>
<input type="hidden" name="haccionlineasn" value="update">
<?php
echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'">';
echo '<input type="hidden" name="hiddocumento" value="'.$idmasterdoc.'">'; 
echo '<input type="hidden" name="hidlineasn" value="'.$idlineasn.'">'; 

?>

<table border="0" >
<tr class="maintitle">
<td></td>
<td>Num serie</td>
<td>Part number</td>
<td>Otro</td>
<td>&nbsp;</td>
</tr>

<tr bgcolor="CCCCCC">
<td></td>
<td><?php echo '<input type="text" name="txtsn" value="'.$dbsn.'" />'; ?></td>
<td><?php echo '<input type="text" name="txtpn" value="'.$dbpn.'"/>'; ?></td>
<td><?php echo '<input type="text" name="txtotro" value="'.$dbotro.'"/>'; ?></td>
<td><input type="submit" class="btnsubmit" value="Guardar" /></td>
</tr>
</table>
</form>
<?php
echo '<p><a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=lines&action=edit&idlinea='.$idlinea.'&id='.$idmasterdoc.'">Volver / Cancelar</a></p>';
?>
</div>