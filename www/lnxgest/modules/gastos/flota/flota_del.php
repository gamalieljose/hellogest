<?php
$cnssql = "SELECT * FROM ".$prefixsql."flota where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbvehiculo = $row["vehiculo"];
$dbmatricula = $row["matricula"];
$dbkms = $row["kms"];


?>

					   
<form name="form1" action="index.php?module=gastos&section=flota&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php

echo '<input type="hidden" name="hidvehiculo" value="'.$_GET["id"].'">';

?>

<table style="max-width: 400px; width: 100%;" class="msgaviso">

<tr class="maintitle"><th colspan="4" align="center">Eliminar vehiculo</th></tr>
<tr><td colspan="2"><b> ¿Desea eliminar este vehiculo ? </b></td></tr>
<tr><td>Vehiculo</td><td><?php echo $dbvehiculo; ?></td></tr>
<tr><td>Matricula</td><td><?php echo $dbmatricula; ?></td></tr>
<tr><td>KMS</td><td><?php echo $dbkms; ?></td></tr>

<tr><td colspan="4" align="center">&nbsp; </td></tr>
<tr><td colspan="4" align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> 

<a class="btncancel" href="index.php?module=gastos&section=flota"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</td></tr>
</table>
</div>
</form>