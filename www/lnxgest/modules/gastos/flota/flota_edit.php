<?php
$cnssql = "SELECT * FROM ".$prefixsql."flota where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbvehiculo = $row["vehiculo"];
$dbmatricula = $row["matricula"];
$dbkms = $row["kms"];

echo '<a class="btnenlacecancel" href="index.php?module=gastos&section=flota&action=del&id='.$_GET["id"].'">Eliminar</a>';
?>

					   
<form name="form1" action="index.php?module=gastos&section=flota&action=save" method="post">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=flota" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>


<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidvehiculo" value="<?php echo $_GET["id"]; ?>" />


<div class="row">
<div class="col-sm-2">
    Vehiculo
</div>
<div class="col">
    <input type="text" name="txtvehiculo" value="<?php echo $dbvehiculo; ?>" required="" maxlength="50" class="campoencoger" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Matricula
</div>
<div class="col-sm-2">
    <input type="text" name="txtmatricula" value="<?php echo $dbmatricula; ?>" required="" maxlength="10" style="width: 100%;" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    KMS
</div>
<div class="col-sm-2">
    <input type="number" name="txtkms" value="<?php echo $dbkms; ?>" equired="" style="width: 100%;" />
</div>
</div>


</form>