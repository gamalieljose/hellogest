<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_tipomant where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtipomant = $row["tipomant"];
?>

<p><?php echo '<a href="index.php?module=lnxit&section=tiposmant&action=del&id='.$_GET["id"].'" class="btncancel">Eliminar</a>'; ?></p>
					   
<form name="form1" action="index.php?module=lnxit&section=tiposmant&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="update">
<?php

echo '<input type="hidden" name="hidservicio" value="'.$_GET["id"].'">';

?>
<table>
<tr class="maintitle"><td colspan="4" align="center">Editando tipo de mantenimiento</td></tr>

<tr><td>Tipo de mantenimiento</td>
<td>
<?php
echo '<input type="text" name="txttipomant" value="'.$dbtipomant.'" required="" size="50">';
?>
</td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Guardar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=tiposmant">Cancelar</a>
</td></tr>
</table>
</div>
</form>