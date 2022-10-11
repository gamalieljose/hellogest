<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_categorias where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcategoria = $row["categoria"];
?>

					   
<form name="form1" action="index.php?module=lnxit&section=cat&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="update">
<?php

echo '<input type="hidden" name="hidcategoria" value="'.$_GET["id"].'">';

?>
<table>
<tr class="maintitle"><td colspan="4" align="center">Nueva categoria</td></tr>

<tr><td>Categoria</td>
<td>
<?php
echo '<input type="text" name="txtcategoria" value="'.$dbcategoria.'" required="" size="50">';
?>
</td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Guardar" type="submit"> 

<a class="btnenlacecancel" href="index.php?module=lnxit&section=cat">Cancelar</a>
</td></tr>
</table>
</div>
</form>