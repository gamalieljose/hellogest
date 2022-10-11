<?php
$idseguimiento = $_GET["idseguimiento"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_seguimiento where id = '".$idseguimiento."' ");
$row = mysqli_fetch_assoc($ConsultaMySql);

$dbseguimiento = $row['seguimiento'];
?>
<p></p>
<div align="center">
<form name="form1" action="index.php?module=lnxit&section=seguimiento&action=save" method="post">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:
	<input type="hidden" name="haccion" value="delete">
	<?php
	echo '<input type="hidden" name="hidseguimiento" value="'.$_GET["idseguimiento"].'">';
	echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">';
	?>
	</td></tr>
	<tr><td>
	<?php
	echo '<p>¿Desea borrar el seguimiento: ?</p>';
	
	echo $dbseguimiento;
	?>
	</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 
	<?php
	echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=seguimiento&action=edit&id='.$_GET["id"].'&idseguimiento='.$_GET["idseguimiento"].'">Cancelar</a>';
	?>
	
	
	
	</td></tr>
	</table>
</form>
</div>
	
