<?php
$idprinter = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impresoras where id = '".$idprinter."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbnombre = $row['nombre'];
$dbtipo = $row['tipo'];
$dbnotas = $row['notas'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=printers&action=delete&id='.$idprinter.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=printers&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$idprinter.'">'; ?>

<div class="row">
<div class="col-sm-2">
    Nombre
</div>
<div class="col">
    <input name="txtnombre" required="" value="<?php echo $dbnombre; ?>" type="text" class="campoencoger">
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Tipo
</div>
<div class="col">
    <select name="lsttipo" class="campoencoger">
<?php
if ($dbtipo == '2'){$seleccionado = ' SELECTED';}else{$seleccionado = '';}
echo '<option value="2" '.$seleccionado.'>WIN_PRINTER</option>';
if ($dbtipo == '3'){$seleccionado = ' SELECTED';}else{$seleccionado = '';}
echo '<option value="3" '.$seleccionado.'>TEXT_PRINTER</option>';
?>
    </select>
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Notas
</div>
<div class="col">
    <input name="txtnotas" required="" type="text" value="<?php echo $dbnotas; ?>" class="campoencoger"/>
</div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a href="index.php?module=core&section=printers" class="btncancel">Cancelar</a>

</div>

</form>