<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."terceros_tipos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdocserie = $row["tipotercero"];

?>

<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=tt&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>

<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar este tipo de tercero: <b><?php echo $dbdocserie; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=dic&subs=tt">Cancelar</a>
</td></tr>
</table>
</div>

</form>

