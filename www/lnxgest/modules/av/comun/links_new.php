<div class="row">
<div class="col maintitle">
Nuevo vinculo
</div>
</div>

<?php
$iddocumento = $_GET["id"];

echo '<form name="frmlink" method="POST" action="index.php?module='.$lnxinvoice.'&section=links&action=new&id='.$iddocumento.'" >';

$flsttipodoc = $_POST["lsttipodoc"];
$ftxtbuscar = addslashes($_POST["txtbuscar"]);
$flstorden = $_POST["lstorden"];
$flstordencampo = $_POST["lstordencampo"];

?>
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
<?php
echo '<a href="index.php?module='.$lnxinvoice.'&section=links&id='.$iddocumento.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> ';
?>

</div>

<div class="row">
    <div class="col-sm-2">
    Tipo documento
    </div>
    <div class="col">
    <select name="lsttipodoc" class="campoencoger">
<?php
if($flsttipodoc == "O"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="O" '.$seleccionado.'>Presupuestos</option>';
if($flsttipodoc == "P"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="P" '.$seleccionado.'>Pedidos</option>';
if($flsttipodoc == "A"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="A" '.$seleccionado.'>Albaranes</option>';
if($flsttipodoc == "F"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="F" '.$seleccionado.'>Facturas</option>';
if($flsttipodoc == "FR"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="FR" '.$seleccionado.'>Facturas Rectificativas</option>';
?>
    </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
    Documento
    </div>
    <div class="col">
    <input type="text" maxlength="20" name="txtbuscar" value="<?php echo $_POST["txtbuscar"]; ?>" class="campoencoger"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
    Ordenar
    </div>
    <div class="col">
    Campo</br>
    <select name="lstordencampo" style="width: 100%;" />
    <?php
if($flstordencampo == "codigo"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="codigo" '.$seleccionado.'>Codigo</option>';
if($flstordencampo == "factura"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="factura" '.$seleccionado.'>Documento</option>';
if($flstordencampo == "fecha"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="fecha" '.$seleccionado.'>Fecha</option>';
if($flstordencampo == "fecha"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="tipo" '.$seleccionado.'>Tipo</option>';
?>
    </select>
    </div>

    <div class="col">
    Orden</br>
    <select name="lstorden" style="width: 100%;" />
    <?php
if($flstorden == "asc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="asc" '.$seleccionado.'>Ascendente</option>';
if($flstorden == "desc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="desc" '.$seleccionado.'>Descendente</option>';
?>
    </select>
    </div>
</div>

</form>

<?php 
echo '<form name="frmlinkdoc" method="POST" action="index.php?module='.$lnxinvoice.'&section=links&action=save" >';
?>

<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-link fa-lg"></i> Vincular</button> 

<input type="hidden" name="haccion" value="new" />
<input type="hidden" name="hidmasterdoc" value="<?php echo $iddocumento; ?>" />
<input type="hidden" name="htipoa" value="<?php echo $lnxinvoice; ?>" />

<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<th width="40"></th>
<th>Codigo</th>
<th>Documento</th>
<th width=90>Fecha</th>
<th>Tipo</th>
</tr>

<?php
$ftxtbuscar = addslashes($ftxtbuscar);

if($flsttipodoc == "O")
{

$sqlbuscar = "(SELECT ".$prefixsql."oc.id, ".$prefixsql."oc.codigo, ".$prefixsql."oc.factura, ".$prefixsql."oc.fecha, 'OC' as tipo FROM ".$prefixsql."oc where codigo like '".$ftxtbuscar."' or factura like '".$ftxtbuscar."') "
." UNION ALL "
."(SELECT ".$prefixsql."ov.id, ".$prefixsql."ov.codigo, '' as factura, ".$prefixsql."ov.fecha, 'OV' as tipo FROM ".$prefixsql."ov where codigo like '".$ftxtbuscar."') ";

}

if($flsttipodoc == "P")
{

$sqlbuscar = "(SELECT ".$prefixsql."pc.id, ".$prefixsql."pc.codigo, ".$prefixsql."pc.factura, ".$prefixsql."pc.fecha, 'PC' as tipo FROM ".$prefixsql."pc where codigo like '".$ftxtbuscar."' or factura like '".$ftxtbuscar."') "
." UNION ALL "
."(SELECT ".$prefixsql."pv.id, ".$prefixsql."pv.codigo, '' as factura, ".$prefixsql."pv.fecha, 'PV' as tipo FROM ".$prefixsql."pv where codigo like '".$ftxtbuscar."') ";

}

if($flsttipodoc == "A")
{

$sqlbuscar = "(SELECT ".$prefixsql."ac.id, ".$prefixsql."ac.codigo, ".$prefixsql."ac.factura, ".$prefixsql."ac.fecha, 'AC' as tipo FROM ".$prefixsql."ac where codigo like '".$ftxtbuscar."' or factura like '".$ftxtbuscar."') "
." UNION ALL "
."(SELECT ".$prefixsql."av.id, ".$prefixsql."av.codigo, '' as factura, ".$prefixsql."av.fecha, 'AV' as tipo FROM ".$prefixsql."av where codigo like '".$ftxtbuscar."') ";

}

if($flsttipodoc == "F")
{

$sqlbuscar = "(SELECT ".$prefixsql."fc.id, ".$prefixsql."fc.codigo, ".$prefixsql."fc.factura, ".$prefixsql."fc.fecha, 'FC' as tipo FROM ".$prefixsql."fc where codigo like '".$ftxtbuscar."' or factura like '".$ftxtbuscar."') "
." UNION ALL "
."(SELECT ".$prefixsql."fv.id, ".$prefixsql."fv.codigo, '' as factura, ".$prefixsql."fv.fecha, 'FV' as tipo FROM ".$prefixsql."fv where codigo like '".$ftxtbuscar."') ";

}

if($flsttipodoc == "FR")
{

$sqlbuscar = "(SELECT ".$prefixsql."fvr.id, ".$prefixsql."fvr.codigo, '' as factura, ".$prefixsql."fvr.fecha, 'FVR' as tipo FROM ".$prefixsql."fvr where codigo like '".$ftxtbuscar."' )";

}

$sqlcontador = "select count(*) as contador from (".$sqlbuscar.") as a";
$sqlaux = $mysqli->query($sqlcontador); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$contador = $rowaux["contador"];

$sqlbuscar = $sqlbuscar."order by ".$flstordencampo." ".$flstorden." limit 250";
$cnssql= $mysqli->query($sqlbuscar);	
while($col = mysqli_fetch_array($cnssql))
{

$iddoc = $col["id"]."-".$col["tipo"];


if($col["tipo"] == "OV"){$lbl_tipo = "Presupuesto Venta";}
if($col["tipo"] == "OC"){$lbl_tipo = "Presupuesto Compra";}
if($col["tipo"] == "PV"){$lbl_tipo = "Pedido Venta";}
if($col["tipo"] == "PC"){$lbl_tipo = "Pedido Compra";}
if($col["tipo"] == "AV"){$lbl_tipo = "Albaran Venta";}
if($col["tipo"] == "AC"){$lbl_tipo = "Albaran Compra";}
if($col["tipo"] == "FV"){$lbl_tipo = "Factura Venta";}
if($col["tipo"] == "FC"){$lbl_tipo = "Factura Compra";}
if($col["tipo"] == "FVR"){$lbl_tipo = "Factura V. Rectificativa";}

$xtemp = explode("-", $col["fecha"]);
$lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td align="center"><input type="radio" value="'.$iddoc.'" name="optdoc" /></td>';
echo '<td><a href="#">'.$col["codigo"].'</td>';
echo '<td>'.$col["factura"].'</td>';
echo '<td>'.$lbl_fecha.'</td>';
echo '<td>'.$lbl_tipo.'</td>';
echo '</tr>';
}


if($contador > 250)
{
    echo '<tr class="maintitle"><td colspan="5" align="center">Acote mejor su búsqueda se muestran 250 registros de '.$contador.' disponibles</td></tr>';
}
?>
</table>
</form>


