<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_caracteristicas where id = '".$_GET["idcaracter"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbopcion = $row["opcion"];
$dbvalor = $row["valor"];
$dbvalor2 = $row["valor2"];
$dbcolor = $row["color"];
?>
		   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=caracteristicas&action=save" method="post">
<div class="row">
    <div class="col maintitle">Editando caracteristica</div>
</div>	
<?php
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$_GET["idcaracter"].'" name="hidcaracter"/>';


?>
<input type="hidden" value="update" name="haccion"/>


<div class="row">
    <div class="col-sm-2" align="left">
        Caracteristica
    </div>
    <div class="col" align="left">
        <input type="text" name="txtopcion" required="" value="<?php echo $dbopcion; ?>" class="campoencoger" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor" required="" value="<?php echo $dbvalor; ?>" class="campoencoger"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 2
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor2" value="<?php echo $dbvalor2; ?>" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 3
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor3" value="<?php echo $dbvalor3; ?>" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 4
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor4" value="<?php echo $dbvalor4; ?>" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Color
    </div>
    <div class="col" align="left">
        <select name="sltcolor" style="width: 100%;">
<?php


$colorselector = "#ededed";
$colortexto = "- ninguno -";
if($dbcolor == ''){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';



$colorselector = "#FFFFFF";
$colortexto = "Blanco";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#FF0000";
$colortexto = "Rojo";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#0000FF";
$colortexto = "Azul";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#04B431";
$colortexto = "Verde";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#D7DF01";
$colortexto = "Amarillo";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#A4A4A4";
$colortexto = "Gris";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#000000";
$colortexto = "Negro";
if($dbcolor == $colorselector){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';


?>
  
  
</select>
        </br>
<?php echo '<span style="background-color: '.$dbcolor.'">'; ?>
Color actual
</span>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'">Cancelar</a>'; ?>

</div>



</form>