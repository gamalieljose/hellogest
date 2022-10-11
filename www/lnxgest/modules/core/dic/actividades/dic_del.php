<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."dic_actividades where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdocserie = $row["actividad"];
$dbvalor = $row["valor"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=actividades&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>


<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar este tipo de actividad: <b><?php echo $dbdocserie; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=dic&subs=actividades">Cancelar</a>
</td></tr>
</table>
</div>


</form>

</div>