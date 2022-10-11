<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_mainview where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbdisplay = $rowaux["display"];
$dbenlace = $rowaux["enlace"];
$dbventana = $rowaux["ventana"];
$dborden = $rowaux["orden"];
$dbicono = $rowaux["icono"];

?>
<form name="frmbloques" method="POST" action="index.php?module=userpanel&section=bloques&action=save" >
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>" />

<div class="row maintitle">
<div class="col">
Nuevo bloque
</div>
</div>

<div class="row">
<div class="col-sm-2">
Orden
</div>
<div class="col-sm-1">
<input type="number" name="txtorden" value="<?php echo $dborden; ?>" required="" style="width: 100%;"/>
</div>
<div class="col-sm-2">
Icono
</div>
<div class="col">
<input type="text" name="txticono" value="<?php echo $dbicono; ?>" maxlength="20"/>
</div>
</div>
<div class="row">
<div class="col-sm-2">
Display
</div>
<div class="col">
<input type="text" name="txtdisplay" value="<?php echo $dbdisplay; ?>" required="" maxlength="50" class="campoencoger"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Enlace
</div>
<div class="col">
<input type="text" name="txtenlace" value="<?php echo $dbenlace; ?>" required="" maxlength="255" style="width: 100%;"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Ventana
</div>
<div class="col">
<select name="lstventana" style="width: 100%;">
<?php
if($dbventana == ''){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="" '.$seleccionado.'>Misma ventana</option>';
if($dbventana == '_blank'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="_blank" '.$seleccionado.'>Ventana nueva</option>';
?>
</select>
</div>
</div>


<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
        <i class="hidephonview fa fa-save fa-lg"></i> Guardar
    </button>
		
    <a href="index.php?module=userpanel&section=bloques" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>


</form>