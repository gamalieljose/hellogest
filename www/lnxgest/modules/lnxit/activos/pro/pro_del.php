<?php
$idlinea = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_pro where id = '".$idlinea."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$idactivo = $row["idactivo"];
$dbidtercero = $row["idtercero"];
$dbnotas = $row["notas"];

$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$dbidtercero."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbrazonsocial = $row["razonsocial"];

?>
					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=proveedores&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$idactivo.'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$idlinea.'" name="hidlinea"/>';

?>
<input type="hidden" name="haccion" value="delete">

<div align="center">

<table class="msgaviso" width="300">
<tr class="maintitle">
	<td>Eliminar proveedor</td>
</tr>
<tr>
	<td align="center">¿Desea eliminar el siguiente proveedor? </br></br>
	
	<?php echo '<p><b>'.$dbrazonsocial.'</b></p>'; ?>
	
	</td>
</tr>
<tr><td align="center">
<input class="btnsubmit" name="btnguardar" value="Borrar" type="submit"> 

<?php echo ' <a class="btncancel" href="index.php?module=lnxit&section=activos&ss=proveedores&id='.$idactivo.'&tab=3">Cancelar</a>'; ?>
</td></tr>
</table>


</div>

</form>