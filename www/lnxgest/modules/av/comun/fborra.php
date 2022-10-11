<?php
$iddocumento = $_GET["id"];

echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver Factura</a>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigo = $row["codigo"];
$dbcodigoint = $row["codigoint"];


?>
<p>&nbsp;</p>
<div align="center">
<?php
if($dbcodigoint == '0'){echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=borrafactura&id='.$iddocumento.'&action=save" method="POST">';}


echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
?>



<table class="msgaviso">

<tr class="maintitle"><td>Eliminar factura</td></tr>
<tr><td>¿Desea eliminar la factura siguiente?</td></tr>
<tr><td align="center"><b><?php echo $dbcodigo; ?></b></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">
<div align="center">
<?php


if($dbcodigoint == '0'){echo '<input type="submit" class="btnsubmit" value="Eliminar"/> ';}


echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Cancelar</a>';
?></div>
</td></tr>
</table>
<?php if($dbcodigoint == '0'){echo '</form>'; } ?>
</div>