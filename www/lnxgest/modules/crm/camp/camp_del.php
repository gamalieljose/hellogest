<?php
$idcamp = $_GET["idcamp"];

$sqltercero = $mysqli->query("SELECT * FROM ".$prefixsql."crm_camp where id = '".$idcamp."'");
$row = mysqli_fetch_assoc($sqltercero);
$dbcamp = $row["camp"];

?>

<form name="frmcamp" method="POST" action="index.php?module=crm&section=camp&action=save">
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hidcamp" value="<?php echo $idcamp; ?>" />
	
<div align="center">

	<table class="msgaviso" width="400">
	<tr class="maintitle">
	<td>Confirmación eliminación</td>
	</tr>
	<tr>
	<td align="center">
	<p>¿Desea eliminar por completo la siguiente campaña?</p>
	<p><b><?php echo $dbcamp; ?></b></p>
	
<input type="submit" class="btnsubmit" value="Eliminar"/> 
<?php 
	echo '<a href="index.php?module=crm&section=camp" class="btncancel" >Cancelar</a>';
?>

	
	</td>
	</tr>
	</table>

</div>
</form>