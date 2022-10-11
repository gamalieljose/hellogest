<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."dic_historico_cfg where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbtabla = $row["tabla"];
$dbdescripcion = $row["descripcion"];
?>
<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=terhisto&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>


<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar esta tabla <b><?php echo $dbtabla; ?> </b></br>
Descripcion: <?php echo $dbdescripcion; ?></br>
</br>
&iquest;Est&aacute; usted seguro?</td></tr>
<tr><td align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button>
 <a class="btncancel" href="index.php?module=core&section=dic&subs=terhisto"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</td></tr>
</table>
</div>




</form>

</div>
