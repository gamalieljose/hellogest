<?php
$iduser = $_GET["id"];

$sqltienda = $mysqli->query("select * from ".$prefixsql."userstiendas where id = '".$_GET["idtienda"]."'");
$row = mysqli_fetch_assoc($sqltienda);
$dbdft = $row["dft"];
$iduser = $row["iduser"];
$dbidtienda = $row["idtienda"];

$sqltienda = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$dbidtienda."'");
$row = mysqli_fetch_assoc($sqltienda);
$nomtienda = $row["tienda"];

?>
<form name="editausuario" action="index.php?module=core&&section=utiendas&action=save" method="post">
<div align="center">

<input type="hidden" name="haccion" value="delete">
<?php 
echo '<input type="hidden" name="hiduser" value="'.$iduser.'">'; 
echo '<input type="hidden" name="hidtienda" value="'.$_GET["idtienda"].'">'; 
?>

<table width="300" class="msgaviso">
<tr class="maintitle"><td>Confirmar eliminación</td></tr>
<tr>
<td align="center">
	¿Desea eliminar esta tienda asociada al usuario? </br></br>
	<?php echo $nomtienda; ?>
	
	
	
</br></br></br>
<input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=core&&section=utiendas&action=edit&id='.$iduser.'&idtienda='.$_GET["idtienda"].'">Cancelar</a>'; ?>
</td>
</tr>
</table>

</div>
</form>