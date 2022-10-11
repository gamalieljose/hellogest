<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."dic_zonas where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbzona = $row["zona"];

?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=zonacom&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>


<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar esta zona: <b><?php echo $dbzona; ?> </b></br></br>&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button> 
<a href="index.php?module=core&section=dic&subs=zonacom" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</td></tr>
</table>
</div>


</form>

</div>