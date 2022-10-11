<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."dic_lopd where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdocserie = $row["lopdcat"];
$dbvalor = $row["valor"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=lopdcats&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>

<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar esta categoria LOPD: <b><?php echo $dbdocserie; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btnaceptar" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=dic&subs=lopdcats">Cancelar</a>
</td></tr>
</table>
</div>

</form>

</div>