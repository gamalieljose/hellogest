<script src="core/com/js_productos-codnom.js"></script> 
<?php
$idregla = $_GET["id"];

$sqlregla = $mysqli->query("select * from ".$prefixsql."tpv_cfg_ia where id = '".$idregla."'");
$rowregla = mysqli_fetch_assoc($sqlregla);
$dbactivo = $rowregla["activo"];
$dbregla = $rowregla["regla"];
$dbcuando = $rowregla["cuando"];

$idproducto = $rowregla["idproducto"];
$dbdocprint = $rowregla["docprint"];
$dbcopias = $rowregla["copias"];
$dbtexto = $rowregla["texto"];

if($dbcuando == "ENPRO" )
{ 
    $dbmin = $rowregla["min"];
    $dbmax = $rowregla["max"];
    $dbmin_precio = "0";
    $dbmax_precio = "9999";
}
if($dbcuando == "IMPTO" )
{
    $dbmin = "1";
    $dbmax = "9999";
    $dbmin_precio = $rowregla["min"];
    $dbmax_precio = $rowregla["max"];
}
if($dbcuando == "TEXTO" )
{
    $dbmin = $rowregla["min"];
    $dbmax = $rowregla["max"];
}    

$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$idproducto."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodventa = $rowaux["codventa"];
$dbconcepto = $rowaux["concepto"];



    
    
?>

<?php echo '<p><a href="index.php?module=tpv&section=cfgia&action=del&id='.$idregla.'" class="btnenlacecancel">Eliminar</a></p>'; ?>

<form name="nuevacondicion" method="POST" action="index.php?module=tpv&section=cfgia&action=save" >

<input type="hidden" value="update" name="haccion" />
<input type="hidden" value="<?php echo $idregla; ?>" name="hidregla" />
    
<div class="row">
    <div class="col maintitle" align="left">
        Editando condicion
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
<?php
if($dbactivo == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<label><input type="checkbox" '.$seleccionado.' name="chkactivo" value="1"/> Condición activa</label>';
                
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
      Nombre regla  
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="50" name="txtnombreregla" value="<?php echo $dbregla; ?>" required="" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Cuando
    </div>
    <div class="col" align="left">
        <select name="lstcondicion" style="width: 100%;">
<?php
if($dbcuando == "ENPRO" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="ENPRO" '.$seleccionado.'>Cuando se encuentre un producto especifico</option>';

if($dbcuando == "IMPTO" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="IMPTO" '.$seleccionado.'>El importe total sea entre estos valores</option>';

if($dbcuando == "TEXTO" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="TEXTO" '.$seleccionado.'>contenga el texto</option>';
?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
      Cantidad minima  
    </div>
    <div class="col-sm-2" align="left">
        <input type="number" min="0" max="9999" name="txtcantidadmin" value="<?php echo $dbmin; ?>"/>
    </div>
    <div class="col-sm-2" align="left">
      Cantidad maxima  
    </div>
    <div class="col" align="left">
        <input type="number" min="1" max="9999" name="txtcantidadmax" value="<?php echo $dbmax; ?>"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
      Producto  
    </div>
    <div class="col" align="left">
        <input type="text" placeholder="Busque el codigo o nombre del producto" maxlength="50" name="txtbuscaproducto" id="txtbuscaproducto" style="width: 100%" />
        <select name="lstproducto" id="lstproducto" style="width: 100%;">
<?php
    echo '<option value="'.$idproducto.'">'.$dbcodventa.' - '.$dbconcepto.'</option>';
?>
        </select>
    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
      Texto
    </div>
    <div class="col" align="left">
        <input type="text" placeholder="Texto que debe encontrar" value="<?php echo $dbtexto; ?>" maxlength="50" name="txttexto" id="txttexto" style="width: 100%" />
    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        copias
    </div>
    <div class="col" align="left">
<?php
if($dbcopias == "2" || $dbcopias == "0"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<label><input type="radio" '.$seleccionado.' value="2" name="optcuanto" /> Imprimir X veces tantas como cantidades</label> </br>';
if($dbcopias == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<label><input type="radio" '.$seleccionado.' value="1" name="optcuanto" /> Imprimir solo 1 por producto encontrado en el ticket</label>';
?>
    </div>
</div>
    


<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla
    </div>
    <div class="col" align="left">
        <select name="lstplantilla" style="width: 100%;">
<?php

if($dbdocprint == "vale_practica.php" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="vale_practica.php" '.$seleccionado.'>Practica</option>';
if($dbdocprint == "copiaresumen.php" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}    
    echo '<option value="copiaresumen.php" '.$seleccionado.'>Copia resumen</option>';


?>
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=tpv&section=cfgia">Cancelar</a>


</div>
</form>