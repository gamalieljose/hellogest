<?php
$idcamp = $_GET["idcamp"];
$idlinea = $_GET["idlinea"];
$idnota = $_GET["id"];


$sqltercero = $mysqli->query("SELECT * FROM ".$prefixsql."crm_camp_notas where id = '".$idnota."'");
$row = mysqli_fetch_assoc($sqltercero);
$lbl_nota = $row["nota"];
$dbidtercero = $row["idtercero"];



?>
<form name="frmnotas" id="frmnotas" method="POST" action="index.php?module=crm&section=campseg&action=save">
<input type="hidden" name="haccion" value="delete" />

<input type="hidden" name="hidnota" value="<?php echo $idnota; ?>" />
<input type="hidden" name="hidcamp" value="<?php echo $idcamp; ?>" />
<input type="hidden" name="hidlinea" value="<?php echo $idlinea; ?>" />

<input type="hidden" name="hidtercero" value="<?php echo $dbidtercero; ?>" />


<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td><b>¿Desea Eliminar este seguimiento?</b></td></tr>
	<tr><td>
	<?php echo $lbl_nota; ?>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<?php echo '<a class="btncancel" href="index.php?module=crm&section=campseg&action=edit&idcamp='.$idcamp.'&idlinea='.$idlinea.'&id='.$idnota.'">Cancelar</a>'; ?>
	</td></tr>
	</table>
</div>
</form>