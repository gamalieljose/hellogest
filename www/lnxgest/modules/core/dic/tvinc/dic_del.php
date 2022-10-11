<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros_vinc_label where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dblabela = $row["labela"];
$dblabelb = $row["labelb"];

?>

<form id="form1" name="form1" method="post" action="index.php?module=core&section=dic&subs=tvinc&action=save">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiddic" value="'.$_GET["id"].'">'; ?>

<div align="center">
<table style="max-width: 400px; width: 100%;"  class="msgaviso">
<tr><td class="maintitle">Eliminar registro</td></tr>
<tr><td>Va a eliminar esta vinculación entre terceros ¿Esta seguro?

<p align="center">
Tercero A --> <b><?php echo $dblabela; ?></b> --> Tercero B </br>
Tercero B --> <b><?php echo $dblabelb; ?></b> --> Tercero A
</p>
</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> 
 <a class="btncancel" href="index.php?module=core&section=dic&subs=tvinc">Cancelar</a>
</td></tr>
</table>
</div>

</form>

