<form name="form1" action="index.php?module=gastos&section=cfg_tg&action=save" method="post">
<?php
$cnssql = "SELECT * FROM ".$prefixsql."gastos_tipo where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtipogasto = $row["tipogasto"];


echo '<p><a class="btnenlacecancel" href="index.php?module=gastos&section=cfg_tg&action=del&id='.$_GET["id"].'">Eliminar</a></p>';
?>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=cfg_tg" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update">
<?php

echo '<input type="hidden" name="hidgasto" value="'.$_GET["id"].'">';

?>
<div class="row">
<div class="col-sm-2">
Tipo de gasto
</div>
<div class="col">
<input type="text" name="txttipogasto" required="" maxlength="50" value="<?php echo $dbtipogasto; ?>" class="campoencoger" >
</div>
</div>


</form>