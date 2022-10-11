<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbserie = $row["serie"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=series&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidserie" value="'.$_GET["id"].'">'; ?>

<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Mensaje:</td></tr>
<tr><td>Va a eliminar esta serie: <b><?php echo $dbserie; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=series">Cancelar</a>
</td></tr>
</table>
</form>

</div>

