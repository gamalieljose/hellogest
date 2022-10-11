<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbtienda = $row["tienda"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=etiendas&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidtienda" value="'.$_GET["id"].'">'; ?>

<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Mensaje:</td></tr>
<tr><td>Va a eliminar esta tienda/sucursal: <b><?php echo $dbtienda; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btnenlacecancel" href="index.php?module=core&section=etiendas">Cancelar</a>
</td></tr>
</table>
</form>

</div>

