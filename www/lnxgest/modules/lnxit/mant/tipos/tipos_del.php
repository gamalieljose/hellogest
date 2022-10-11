<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_tipomant where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtipomant = $row["tipomant"];
?>

					   
<form name="form1" action="index.php?module=lnxit&section=tiposmant&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php

echo '<input type="hidden" name="hidservicio" value="'.$_GET["id"].'">';

?>
<table>
<tr class="maintitle"><td colspan="4" align="center">Confirmacion de borrado</td></tr>

<tr><td>Tipo de mantenimiento</td>
<td>
<?php
echo '<b>'.$dbtipomant.'</b>';
?>
</td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=tiposmant">Cancelar</a>
</td></tr>
</table>
</div>
</form>