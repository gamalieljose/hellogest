<?php
$idlineasn = $_GET["idlineasn"];

$cnssql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_sn where id = '".$idlineasn."'");
$rowlinea = mysqli_fetch_assoc($cnssql);
$dbsn = $rowlinea["sn"];
$dbpn = $rowlinea["pn"];
$dbotro = $rowlinea["otro"];

$idfv = $rowlinea["idfv"];
$idlinea = $rowlinea["idlinea"];
?>

<div align="center">
<p></p>
<p></p>

<?php echo '<form name="form2" action="index.php?module='.$lnxinvoice.'&section=linessn&action=save" method="POST">'; ?>
<input type="hidden" name="haccionlineasn" value="delete">
<?php
echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'">';
echo '<input type="hidden" name="hiddocumento" value="'.$idfv.'">'; 
echo '<input type="hidden" name="hidlineasn" value="'.$idlineasn.'">'; 

echo '<div align="center">
	<table width="300" class="msgfviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea Eliminar este producto?</td></tr>
	<tr><td align="center">SN: '.$dbsn.'</br>
	PN: '.$dbpn.'</br>
	otro: '.$dbotro.'
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=lines&action=edit&idlinea='.$idlinea.'&id='.$idfv.'">Cancelar</a></td></tr>
	</table></div>';

?>
</form>