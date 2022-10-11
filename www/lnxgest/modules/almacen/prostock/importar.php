<script src="core/com/js_terceros_pro.js"></script>
<div class="grupotabs">
<div class="campoencoger">
    <a href="index.php?module=almacen&section=prostock" class="btn_tab">Listado</a>
    
    <a href="index.php?module=almacen&section=prostockimp" class="btn_tab_sel">Importar</a>
</div>
</div>

<form name="form1" action ="index.php?module=almacen&section=prostockimp&action=pre" enctype="multipart/form-data" method="POST">
<div class="row">
    <div class="col maintitle" align="left">
        Importador de productos y stock de proveedores
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Proveedor
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona proveedor
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where activo = '1' AND codpro > '0' order by razonsocial limit 200");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
                    if($colter["id"] == $dbidtercero){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Almacen por defecto
    </div>
    <div class="col" align="left">
        <select name="lstalmacen" style="width: 100%;"/>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."almacenes order by almacen");	
while($col = mysqli_fetch_array($cnssql))
{
    if($col["dft"] == '1'){$seleccionado = ' selected=""';} else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["almacen"].'</option>';
    
}

?>     
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla
    </div>
    <div class="col" align="left">
        <select name="lstplantilla" style="width: 100%;"/>
        <option value="generica.php">Generica</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Fichero
    </div>
    <div class="col" align="left">
        <input type="file" name="fileficherito" required=""/>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Procesar" type="submit"> 

<?php //echo ' <a class="btncancel" href="index.php?module=tpv&section=tpv&action=view&id='.$idtpv.'">Cancelar</a>'; ?>



</div>
</form>