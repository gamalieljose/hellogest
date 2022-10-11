<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users_correo where id = '".$_GET["idmail"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdisplay = $row["display"];
$dbemail = $row["email"];
$iduser = $row["iduser"];

?>
<form name="editausuario" action="index.php?module=core&section=correo&action=save" method="post">
<div align="center">

<input type="hidden" name="haccion" value="delete">
<?php 
echo '<input type="hidden" name="hiduser" value="'.$iduser.'">'; 
echo '<input type="hidden" name="hidmail" value="'.$_GET["idmail"].'">'; 
?>

<table width="300" class="msgaviso">
<tr class="maintitle"><td>Confirmar eliminación</td></tr>
<tr>
<td align="center">
	¿Desea eliminar esta cuenta de correo? </br></br>
	<?php echo $dbdisplay; ?></br>
	<?php echo $dbemail; ?>
	
	
</br></br></br>
<input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=core&section=correo&action=edit&id='.$iduser.'&idmail='.$_GET["idmail"].'">Cancelar</a>'; ?>
</td>
</tr>
</table>

</div>
</form>