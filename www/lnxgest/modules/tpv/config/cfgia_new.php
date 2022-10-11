<script src="core/com/js_productos-codnom.js"></script> 

<?php

?>
<form name="nuevacondicion" method="POST" action="index.php?module=tpv&section=cfgia&action=save" >

<input type="hidden" value="new" name="haccion" />
    
<div class="row">
    <div class="col maintitle" align="left">
        Nueva condicion
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" checked="" name="chkactivo" value="1"/> Condición activa</label>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
      Nombre regla  
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="50" name="txtnombreregla" value="" required="" class="campoencoger"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Cuando
    </div>
    <div class="col" align="left">
        <select name="lstcondicion" style="width: 100%;">
            <option value="ENPRO">Cuando se encuentre un producto especifico</option>
            <option value="IMPTO">El importe total sea entre estos valores</option>
            <option value="TEXTO">contenga el texto</option>
        </select>
    </div>
</div>



<div class="row">
    <div class="col-sm-2" align="left">
      Cantidad minima  
    </div>
    <div class="col-sm-2" align="left">
        <input type="number" min="1" max="999" name="txtcantidadmin" value="1"/>
    </div>
    <div class="col-sm-2" align="left">
      Cantidad maxima  
    </div>
    <div class="col" align="left">
        <input type="number" min="1" max="999" name="txtcantidadmax" value="999"/>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
      Producto  
    </div>
    <div class="col" align="left">
        <input type="text" placeholder="Busque el codigo o nombre del producto" maxlength="50" name="txtbuscaproducto" id="txtbuscaproducto" style="width: 100%" />
        <select name="lstproducto" id="lstproducto" style="width: 100%;">
            <option value="0">- Seleccione un producto -</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
      Texto
    </div>
    <div class="col" align="left">
        <input type="text" placeholder="Texto que debe encontrar" maxlength="50" name="txttexto" id="txttexto" style="width: 100%" />
    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        copias
    </div>
    <div class="col" align="left">
        <label><input type="radio" checked="" value="2" name="optcuanto" /> Imprimir X veces tantas como cantidades</label> </br>
        <label><input type="radio" value="1" name="optcuanto" /> Imprimir solo 1 por producto encontrado en el ticket</label>
    </div>
</div>
    
    




<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla
    </div>
    <div class="col" align="left">
        <select name="lstplantilla" style="width: 100%;">
            <option value="vale_practica.php">Practica</option>
            <option value="copiaresumen.php">Copia resumen</option>
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=tpv&section=cfgia">Cancelar</a>


</div>
</form>