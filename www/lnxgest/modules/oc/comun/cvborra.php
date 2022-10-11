<?php
$iddocumento = $_GET["id"];

echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver Factura</a>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
$dbcodigoint = $row["codigoint"];



//averiguamos si es la ultima de su serie
$cnsprincipal= $mysqli->query("SELECT max(codigoint) as codigomax from ".$prefixsql.$lnxinvoice." where idserie = '".$dbidserie."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigo = $row["codigomax"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$dbcodigo."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigodoc = $row["codigo"];

if($dbcodigo == $dbcodigoint){$pasarborrador = "SI";}else{$pasarborrador = "NO";}



?>
<p>&nbsp;</p>
<div align="center">
<?php
if($pasarborrador == 'SI'){echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=convertborrador&id='.$iddocumento.'&action=save" method="POST">';}


echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
?>



<table class="msgaviso" width="350">

<tr class="maintitle"><td>Convertir a Borrador</td></tr>
<tr><td align="center">¿Desea convertir a borrador la factura siguiente?</td></tr>
<tr><td align="center"><b><?php echo $dbcodigodoc; ?></b></td></tr>

<?php
$cnssql = $mysqli->query("select * from ".$prefixsql."wh_mov where modulo = '".$lnxinvoice."' and iddocumento = '".$iddocumento."'");
$existe = $cnssql->num_rows;
$rowaux = mysqli_fetch_assoc($cnssql);
$dbidmovimientowh = $rowaux["id"]; //Este el movimiento de almacen

if ($existe == '1')
{
	echo '<tr><td align="center">Recuerde que también se van a eliminar los movimientos de almacen generados en este albaran</td></tr>';
}

?>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">
<div align="center">
<?php


if($pasarborrador == 'SI'){echo '<input type="submit" class="btnsubmit" value="Borrador"/> ';}


echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Cancelar</a>';
?></div>
</td></tr>
</table>
<?php if($pasarborrador == 'SI'){echo '</form>'; } ?>
</div>


