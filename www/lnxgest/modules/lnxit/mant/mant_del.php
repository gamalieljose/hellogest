<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_mant where id = '".$_GET["id"]."' ");
$row = mysqli_fetch_assoc($ConsultaMySql);

$dbref = $row['ref'];
?>

<p></p>
<div align="center">
<form name="form1" action="index.php?module=lnxit&section=mant&action=save" method="post">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:
<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidactivo" value="'.$_GET["id"].'">'; ?>

	</td></tr>
	<tr><td>
	<?php
	echo '<p>¿Desea borrar el mantenimiento: ?</p>';
	
	echo $dbref;
	?>
	</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 
	<?php
	echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=mant">Cancelar</a>';
	?>
	
	
	
	</td></tr>
	</table>
</form>
</div>
	
