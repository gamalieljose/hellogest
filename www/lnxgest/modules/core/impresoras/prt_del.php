<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."impresoras where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbnombre = $row["nombre"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=printers&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>

<table width="400" class="msgaviso">
<tr><td class="maintitle">Mensaje:</td></tr>
<tr><td>Va a eliminar esta impresora: <b><?php echo $dbnombre; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=printers">Cancelar</a>
</td></tr>
</table>
</form>

</div>