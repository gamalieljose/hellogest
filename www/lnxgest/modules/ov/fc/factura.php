

<?php
$iddocumento = $_GET["id"];

echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver Factura</a>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);

$dbfactura = $row["factura"];




?>
<p>&nbsp;</p>
<div align="center">
<?php
echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=factura&id='.$iddocumento.'&action=save" method="POST">';

echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
?>


<table style="max-width: 400px; width: 100%;" class="msgaviso">

<tr class="maintitle"><td colspan="2">Factura de compra</td></tr>
<tr><td>Factura recibida</td><td>
<?php
echo '<input type="text" name="txtfactura" value="'.$dbfactura.'" required="">';
?></td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">
<div align="center">
<?php
echo '<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> ';

echo '<a class="btncancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>';
?></div>
</td></tr>
</table>
</form>
</div>