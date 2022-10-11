<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_tipos where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbservicio = $row["tipo"];
?>

					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=tipos&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php

echo '<input type="hidden" name="hidservicio" value="'.$_GET["id"].'">';

?>
<table>
<tr class="maintitle"><td colspan="4" align="center">Eliminar tipo de activo</td></tr>

<tr>
<td colspan="4">
<p>¿Desea eliminar el tipo de activo?</p>
<?php
echo '<p><b>'.$dbservicio.'</b></p>';
?>
</td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Borrar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=tipos">Cancelar</a>
</td></tr>
</table>
</div>
</form>