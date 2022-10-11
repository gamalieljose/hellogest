<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=permisos&action=save" method="post">
<input type="hidden" name="haccion" value="new">

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
                echo '<option value="'.$columna["idmod"].'">'.$columna["idmod"].' - '.$columna["display"].'</option>';
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
        <input type="number" name="txtidpermiso" required="" value="" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" name="txtdisplay" required="" value="" maxlength="50" class="campoencoger"/>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=permisos">Cancelar</a>

</div>


</form>