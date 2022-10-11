<?php

$fchkprocesa = $_POST["chkprocesa"];
$fhidproducto = $_POST["hidproducto"];
$fhidalmacen = $_POST["hidalmacen"];
$fhalmacennom = $_POST["halmacennom"];
$fhidtercero = $_POST["hidtercero"];
$fhtercerorz = $_POST["htercerorz"];
$plantilla_nombre = $_POST["hplantillanombre"];

?>
    
<div class="row">
    <div class="col maintitle" align="left">
        Fichero procesado
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Proveedor
    </div>
    <div class="col" align="left">
<?php echo $fhtercerorz; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Almacen
    </div>
    <div class="col" align="left">
<?php echo $fhalmacennom; ?>     
        
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla
    </div>
    <div class="col" align="left">
        <?php echo $plantilla_nombre; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Opciones
    </div>
    <div class="col" align="left">
<?php
if($_POST["optstock"] == "1")
{    
    $textoopcion = "Reemplaza el stock por las unidades en el fichero";
}
if($_POST["optstock"] == "2")
{    
    $textoopcion = "Suma al stock actual del almacen";
}

if($_POST["chkcero"] == "1")
{    
    $textochkcero = "[X] Si un producto de proveedor no se encuentra en esta lista, pon a cero las unidades de stock en el almacen especificado </br>";
}
else
{    
    $textochkcero = "";
}
if($_POST["chkcrear"] == "1")
{    
    $textochkcrear = "[X] Si no existe el producto, crealo en el almacen especificado";
}
else
{    
    $textochkcrear = "";
}

echo '<p>'.$textoopcion.'</p>';
echo $textochkcero;
echo $textochkcrear;
?>
        
 
    </div>
</div>
    
<table width="100%">
    <tr class="maintitle">
        <td>Registro Log</td>
    </tr>


<?php
if($_POST["chkcero"] == "1")
{    
echo '<tr><td>Creando movimiento almacen (reset a cero)</td></tr>';   

echo '<tr><td>Creando movimiento almacen (actualizando stock del proveedor)</td></tr>';   
}

?>
</table>


<table width="100%">
    <tr class="maintitle">
        <td>ID Linea fichero CSV</td>
        <td>ID Producto</td>
    </tr>


<?php

$idtemp = '0';
foreach($fchkprocesa as $idlineacsv){

    $idproducto = $fhidproducto[$idlineacsv];
    
    echo '<tr>';
    echo '<td>'.$idlineacsv.'</td>';
    echo '<td>'.$idproducto.'</td>';
    echo '</tr>';    

$idtemp = $idtemp +1;
}

?>
</table>

<div align="center" class="rectangulobtnsguardar">

<a class="btnsubmit" href="index.php?module=almacen&section=prostockimp">Finalizado</a>

</div>

