<?php
include("modules/terceros/botones.php");
echo '<p></p>';

if(lnx_check_perm(29))   // Acceso Direcciones
{
$idtercero = $_GET["idtercero"];
$dbiddir = $_GET["iddir"];



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tercerosdir where id = '".$dbiddir."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbnombre = $row['referencia'];


echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=dir&action=save&idtercero='.$idtercero.'">';
?>
<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidregistro" value="'.$dbiddir.'">'; ?>


<table class="msgfviso">
<tr><td class="maintitle">Eliminar direccion</td></tr>
<tr><td>¿Esta seguro de querer eliminar la siguiente direccion?</td></tr>
<tr><td><b><?php echo $dbnombre; ?></b></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td align="center"><input class="btnsubmit" type="submit" name="btnguardar" value="Eliminar" /> <?php echo '<a href="index.php?module=terceros&section=dir&idtercero='.$idtercero.'" class="btncancel" >Cancelar</a>'; ?></td></tr>
<?php echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">'; ?>
</table>

</div>
</form>

<?php
}
else
{
	lnx_permdenegado();
}
?>
