<?php
$cnssql = "SELECT * FROM ".$prefixsql."gastos_tipo where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtipogasto = $row["tipogasto"];



?>

					   
<form name="form1" action="index.php?module=gastos&section=cfg_tg&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php

echo '<input type="hidden" name="hidgasto" value="'.$_GET["id"].'">';

?>

<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><td colspan="4" align="center">Eliminar tipo de gasto</td></tr>
<tr><td colspan="2" align="center">¿Desea eliminar este tipo de gasto ?</br><b><?php echo $dbtipogasto; ?> </b></td></tr>


<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button> 
 
<a href="index.php?module=gastos&section=cfg_tg" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</td></tr>
</table>
</div>
</form>