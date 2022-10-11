<script type="text/javascript">

 function abrirHijo(popupId, idwarehouse) 
 {
     var pasevariablesurl = "modules/almacen/prostock/vincular.php?id=" + popupId + "&idwh=" + idwarehouse;
 window.open(pasevariablesurl, "popupId", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=800,height=300"); 
 }

function quitavinculo(idlinea) 
{
    var devolver = "vincula" + idlinea;
    var tblsag = "sag" + idlinea;
    var tblsaw = "saw" + idlinea;
    var tblss = "ss" + idlinea;
    var idwarehouse = document.getElementById('hidalmacen').value;
        
    document.getElementById(devolver).innerHTML = "<a href=\"javascript:abrirHijo('"+ idlinea + "', '"+ idwarehouse + "');\" >Vincular</a> <input type=\"hidden\" value=\"0\" name=\"hidproducto[" + idlinea + "]\" />"; 
    document.getElementById(tblsag).innerHTML = "0"; 
    document.getElementById(tblsaw).innerHTML = "0"; 
    document.getElementById(tblss).innerHTML = "0"; 
    
}


function marcar(source) 
{
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
                if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
                {
                        checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
                }
        }
}

 </script>

<form name="frmpreproceso" method="POST" action="index.php?module=almacen&section=prostockimp&action=procesar" > 
<?php
$plantilla_nombre = "Plantilla Generica";
$idalmacen = $_POST["lstalmacen"];
?>
    <input type="hidden" name="hplantillanombre" value="<?php echo $plantilla_nombre; ?>" />
<div class="row">
    <div class="col maintitle" align="left">
        Preparación importancion de productos
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Proveedor
    </div>
    <div class="col" align="left">
<?php

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$_POST["lsttercero"]."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];

echo '<input type="hidden" name="htercerorz" value="'.$dbrazonsocial.'" />';
echo '<input type="hidden" name="hidtercero" value="'.$_POST["lsttercero"].'" />';

echo $dbrazonsocial;

?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Almacen
    </div>
    <div class="col" align="left">
<?php


$sqlaux = $mysqli->query("select * from ".$prefixsql."almacenes where id = '".$idalmacen."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbalmacen = $rowaux["almacen"];


echo $dbalmacen;
echo '<input type="hidden" name="hidalmacen" id="hidalmacen" value="'.$_POST["lstalmacen"].'" />';
echo '<input type="hidden" name="halmacennom" value="'.$dbalmacen.'" />';
?>     
        
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
        <label><input type="radio" value="1" name="optstock" checked=""/> Reemplaza el stock por las unidades en el fichero</label></br>
        <label><input type="radio" value="2" name="optstock"/> Suma al stock actual del almacen</label></br>
        <label><input type="checkbox" value="1" name="chkcero"/> Si un producto de proveedor no se encuentra en esta lista, pon a cero las unidades de stock en el almacen especificado</label></br>
        <label><input type="checkbox" value="1" name="chkcrear"/> Si no existe el producto, crealo en el almacen especificado</label>
    </div>
</div>

<table width="100%">
<tr class="maintitle">
    <th><label><input type="checkbox" onclick="marcar(this);" /> Procesar (Todos) </label></th>
    <th colspan="2">Vincular</th>
    <th>Concepto</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Stock Actual Global</th>
    <th>Stock Actual en el amacen</th>
    <th>Stock suma</th>
</tr>



<?php
$lineanum = 0;    
$file = fopen($rutaficherotemporal, "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
while(!feof($file))
{
    //Leemos la linea y hacemos los tratamientos necesarios
    $linea_texto =  fgets($file);
    if($lineanum > 0)
    {
        $lineacampos = explode(";", $linea_texto);
        
        $lbl_codigo = $lineacampos[0];
        $lbl_concepto = $lineacampos[1];
        $lbl_precio = $lineacampos[2];
        $lbl_stock = $lineacampos[3];

        //Buscamos si producto y proveedor lo tenemos vinculado en nuestra base de datos
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."productos_pro where referencia = '".$lbl_codigo."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbidarticulo = $rowaux["idproduct"];

        if($dbidarticulo > 0)
        {   
            //Existe producto vinculado
            //Calulamos el stock Global del producto
            $sqlaux = $mysqli->query("select sum(stock) as cantidades from ".$prefixsql."productos_wh where idproducto = '".$dbidarticulo."'"); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_stockactualglobal = $rowaux["cantidades"];
            
            $sqlaux = $mysqli->query("select sum(stock) as cantidades from ".$prefixsql."productos_wh where idproducto = '".$dbidarticulo."' and idwh = '".$idalmacen."'"); 
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_stockwhactual = $rowaux["cantidades"];
            if($lbl_stockwhactual == ''){$lbl_stockwhactual = '0';}
        }
        else
        {
            $lbl_stockactualglobal = '0';
            $lbl_stockwhactual = '0';
        }
        
        $lbl_stocksuma = $lbl_stockwhactual + $lbl_stock;
        
        
        //imprimimos la linea tratada
        if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}

	
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
        echo '<td><label><input type="checkbox" name="chkprocesa[]" value="'.$lineanum.'" checked="" /> '.$lbl_codigo.'</label></td>';
        if($dbidarticulo > 0)
        {   
            //Existe producto vinculado
            echo '<td colspan="2" align="center">';
            echo '<i class="fa fa-fw fa-link" title="Vinculado"></i> </a> ';
            echo '<input type="hidden" value="'.$dbidarticulo.'" name="hidproducto['.$lineanum.']" />';
            echo '</td>';
        
        }
        else
        {
            echo "<td><a href=\"javascript:quitavinculo('".$lineanum."')\"><i class=\"fa fa-fw fa-ban\" title=\"Quitar vinculación\"></i> </a></td>";
            echo '<td><div id="vincula'.$lineanum.'">';
            echo '<a href="javascript:abrirHijo('.$lineanum.', '.$idalmacen.');" >Vincular</a> ';
            echo '<input type="hidden" value="0" name="hidproducto['.$lineanum.']" /> </div>';
            echo '</td>';
        }
        echo '<td>'.$lbl_concepto.'</td>';
        echo '<td align="right">'.$lbl_precio.'</td>';
        echo '<td align="right"><div id="stck'.$lineanum.'">'.$lbl_stock.'</div></td>';
        echo '<td align="right"><div id="sag'.$lineanum.'">'.$lbl_stockactualglobal.'</div></td>';
        echo '<td align="right"><div id="saw'.$lineanum.'">'.$lbl_stockwhactual.'</div></td>';
        echo '<td align="right"><div id="ss'.$lineanum.'">'.$lbl_stocksuma.'</div></td>';
        echo '</tr>';
        
    }
    $lineanum = $lineanum +1;
}
fclose($file);
        
?>

</table>
    
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Procesar" type="submit"> 

<a class="btncancel" href="index.php?module=almacen&section=prostockimp">Cancelar</a>

</div>
    
</form>