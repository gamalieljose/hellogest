			   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=caracteristicas&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidactivo"/>';
?>



<div class="row">
    <div class="col maintitle">Nueva caracteristica</div>
</div>
<input type="hidden" value="new" name="haccion"/>
<input type="hidden" name="haccion" value="new">
    
<div class="row">
    <div class="col-sm-2" align="left">
        Caracterisitica
    </div>
    <div class="col" align="left">
        <?php
if($_GET["scaracteristica"] <> '')
{echo $_GET["scaracteristica"].' <input type="hidden" name="txtopcion" value="'.$_GET["scaracteristica"].'" >';}
else
{echo '<input type="text" name="txtopcion" required="" class="campoencoger" />';}

?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor" required="" class="campoencoger" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 2
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor2" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 3
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor3" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Valor 4
    </div>
    <div class="col" align="left">
        <input type="text" name="txtvalor4" style="width: 100%;" />
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
echo '<option value="" style="background-color: #ededed;" '.$seleccionado.'>'.$colortexto.'</option>';



$colorselector = "#FFFFFF";
$colortexto = "Blanco";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#FF0000";
$colortexto = "Rojo";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#0000FF";
$colortexto = "Azul";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#04B431";
$colortexto = "Verde";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#D7DF01";
$colortexto = "Amarillo";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#A4A4A4";
$colortexto = "Gris";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';

$colorselector = "#000000";
$colortexto = "Negro";
echo '<option value="'.$colorselector.'" style="background-color: '.$colorselector.'" '.$seleccionado.'>'.$colortexto.'</option>';


?>
  
  
</select>

    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'">Cancelar</a>'; ?>

</div>

</form>