﻿<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_tipos where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbservicio = $row["tipo"];
?>

					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=tipos&action=save" method="post">


<div class="row">
<div class="col-sm-2">
    Tipo de Activo
</div>
<div class="col">
<input type="text" name="txtservicio" required="" value="<?php echo $dbservicio; ?>" class="campoencoger" >
</div>
</div>

<input type="hidden" name="haccion" value="update">
<?php

echo '<input type="hidden" name="hidservicio" value="'.$_GET["id"].'">';

?>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=lnxit&section=activos&ss=tipos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>


</form>