<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_caracteristicas where id = '".$_GET["idcaracter"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbopcion = $row["opcion"];
$dbvalor = $row["valor"];



?>



					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=caracteristicas&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$_GET["idcaracter"].'" name="hidcaracter"/>';


?>
<input type="hidden" value="delete" name="haccion"/>';
<div align="center">




<table>
<tr class="maintitle"><td colspan="4" align="center">Confirmacion eliminar licencia</td></tr>

<tr><td>Caracteristica</td>
<td><?php echo $dbopcion; ?></td></tr>
<tr><td>Valor</td>
<td><?php echo $dbvalor; ?></td></tr>


<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 

<?php echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'">Cancelar</a>'; ?>
</td></tr>
</table>
</div>
</form>