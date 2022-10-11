<?php
include("modules/terceros/botones.php");
echo '<p></p>';

$idtercero = $_GET["idtercero"];
$dbeditcontacto = $_GET["id"];
$dbeditextra = $_GET["editextra"];


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$dbeditcontacto."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbnombre = $row['nombre'];


echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=contactos&action=save&idtercero='.$idtercero.'">';
?>
<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidcontacto" value="'.$dbeditcontacto.'">'; ?>


<table class="msgaviso">
<tr><td class="maintitle">Eliminar contacto</td></tr>
<tr><td>¿Esta seguro de querer eliminar el siguiente contacto?</td></tr>
<tr><td><b><?php echo $dbnombre; ?></b></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td align="center">


<?php echo '<input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> '; ?>
<?php echo '<a href="index.php?module=terceros&section=contactos&idtercero='.$idtercero.'" class="btncancel" >Cancelar</a>'; ?></td></tr>

</table>

</div>
</form>


