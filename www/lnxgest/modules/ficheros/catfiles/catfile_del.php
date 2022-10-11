<?php
$idcat = $_GET["id"];

$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat where id = '".$idcat."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbcategoria = $row["categoria"];

?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=ficheros&section=catsave">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidcat" value="'.$idcat.'">'; ?>


<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar esta categoria de archivo: <b><?php echo $dbcategoria; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=ficheros&section=cat">Cancelar</a>
</td></tr>
</table>
</div>


</form>

</div>