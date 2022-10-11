<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."permisos where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidmod = $row["idmod"];
$dbidpermiso = $row["idpermiso"];
$dbdisplay = $row["display"];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=permisos&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=permisos&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
    <div class="col-sm-2" align="left">
        Modulo
    </div>
    <div class="col" align="left">
        <select name="lstmodulo" class="campoencoger">
        <?php
        $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."modulos order by display");
        while($columna = mysqli_fetch_array($ConsultaMySql))
        {
                if ($columna["idmod"] == $dbidmod){$seleccionado = ' selected=""';}else{$seleccionado = '';}
                echo '<option value="'.$columna["idmod"].'" '.$seleccionado.'>'.$columna["idmod"].' - '.$columna["display"].'</option>';
        }
        ?>

        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        ID Permiso
    </div>
    <div class="col" align="left">
        <input type="number" name="txtidpermiso" required="" value="<?php echo $dbidpermiso; ?>" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" name="txtdisplay" maxlength="50" required="" value="<?php echo $dbdisplay; ?>" class="campoencoger"/>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=permisos">Cancelar</a>

</div>

</form>