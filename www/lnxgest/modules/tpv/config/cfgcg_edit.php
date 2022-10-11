<?php
$idcampo = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where id = '".$idcampo."' ");
$row = mysqli_fetch_assoc($sqlaux);
$dbcampo = $row["campo"];
$dbdisplay = $row["display"];
$dbtipo = $row["tipo"];
$dbmostrarlist = $row["mostrarlist"];


echo '<p><a href="index.php?module=tpv&section=cfgcg&action=del&id='.$idcampo.'" class="btnenlacecancel">Eliminar</a></p>';
?>
<form name="frmcamposcustomlopd" action="index.php?module=tpv&section=cfgcg&action=save" method="POST">
    <input type="hidden" name="haccion" value="update" />
    <input type="hidden" name="hidcampo" value="<?php echo $idcampo; ?>" />
    
<div class="row">
    <div class="col maintitle">
        Editando campo personalizado
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <?php
        if($dbmostrarlist == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        
        echo '<label><input type="checkbox" value="1" name="chkmostrarlist" '.$seleccionado.'/> Mostrar en listado</label>';
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Nombre Campo
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbcampo; ?>" name="txtnomcampo" maxlength="10" class="campoencoger" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbdisplay; ?>" name="txtdisplay" maxlength="50" style="width: 100%;" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tipo campo
    </div>
    <div class="col" align="left">
        <!-- maximo campo 5 carcateres en la bbdd -->
        <select name="lsttipocampo" style="width: 100%;" >
<?php
if($dbtipo == "text"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="text" '.$seleccionado.'>Campo de texto</option>';
if($dbtipo == "float"){$seleccionado = ' selected=""';}else{$seleccionado = '';}    
    echo '<option value="float" '.$seleccionado.'>Campo numero decimal</option>';
if($dbtipo == "sino"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="sino" '.$seleccionado.'>Campo de SI/NO</option>';
?>
            
            
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<!-- <input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> -->

<a class="btncancel" href="index.php?module=tpv&section=cfgcg">Cancelar</a>


</div>
    
</form>