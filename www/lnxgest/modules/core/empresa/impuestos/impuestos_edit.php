<?php
echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=impuestos&action=delete&id='.$_GET["id"].'">Eliminar</a></p>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$_GET["id"]."'");

$row = mysqli_fetch_assoc($ConsultaMySql);
$dbimpuesto = $row["impuesto"];
$dbvalor = $row["valor"];
$dbactivo = $row["activo"];


?>

<form id="form1" name="form1" method="post" action="index.php?module=core&section=impuestos&action=save">
<input type="hidden" name="haccion" value="update">

<input type="hidden" name="hidimpuesto" value="<?php echo $_GET["id"]; ?>">


<div class="row">
<div class="col-sm-2">
</div>
<div class="col">
<?php 
if ($dbactivo == '1'){$seleccionado = 'checked=""';}else{$seleccionado = '';}
echo '<label><input type="checkbox" name="chkactivo" value="1" '.$seleccionado.'> Activo</label>';
?>
    
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Nombre
</div>
<div class="col">
    <input name="txtnombre" value="<?php echo $dbimpuesto; ?>" type="text" required="" class="campoencoger">
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Valor %
</div>
<div class="col">
    <input name="txtvalor" value="<?php echo $dbvalor; ?>" type="text" required="" class="campoencoger">
</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=impuestos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

</form>
