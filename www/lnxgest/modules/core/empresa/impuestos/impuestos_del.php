<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbimpuesto = $row["impuesto"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=impuestos&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hidimpuesto" value="'.$_GET["id"].'">'; ?>

<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Mensaje:</td></tr>
<tr><td>Va a eliminar este impuesto: <b><?php echo $dbimpuesto; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=impuestos">Cancelar</a>
</td></tr>
</table>
</form>

</div>

