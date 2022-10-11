<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros_tipos where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbdocserie = $row['tipotercero'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=tt&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=tt&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
<div class="col-sm-2">
Tipo tercero
</div>
<div class="col">
<?php echo '<input name="txtdocserie" required="" type="text" value="'.$dbdocserie.'" class="campoencoger">'; ?>
</div>
</div>



<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=dic&subs=tt" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>
</form>