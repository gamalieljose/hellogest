<?php
$ftxtbuscar = $_POST["txtbuscar"];
$fhcontrol = $_POST["hcontrol"];
echo '<form name="frmbuscar" method="POST" action="index.php?module='.$lnxinvoice.'&section=buscar" >';
?>
<input type="hidden" value="control" name="hcontrol"/>
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
</div>

<div class="row">
<div class="col maintitle">
Buscar dentro de las facturas
</div>
</div>

<div class="row">
<div class="col-sm-2">
Buscar
</div>
<div class="col">
    <input type="text" maxlength="30" name="txtbuscar" required="" value="<?php echo $ftxtbuscar; ?>" class="campoencoger"/>
</div>
</div>
<div class="row">
<div class="col-sm-2">

</div>
<div class="col">
    <i>Resultado limitado a 250 registros</i>
</div>
</div>
</form>

<table width="100%">
<tr class="maintitle">
<th width="50"></th>
<th>Factura</th>
<th>Fecha</th>
<th>Posicion</th>
<th>codigo</th>
<th>concepto</th>
<th>unidades</th>
<th>Precio</th>
<th>Dto</th>
<th>importe</th>
</tr>




<?php
if($fhcontrol == "control")
{

$ftxtbuscar = addslashes($ftxtbuscar);

$sqlbuscar = "SELECT * FROM ".$prefixsql.$lnxinvoice."_lineas where cod like '%".$ftxtbuscar."%' or concepto like '%".$ftxtbuscar."%' limit 250";
$cnssql= $mysqli->query($sqlbuscar);	
while($col = mysqli_fetch_array($cnssql))
{
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$col[$campomasterid]."' "); 
    $fvrow = mysqli_fetch_assoc($sqlaux);
    $fv_codigo = $fvrow["codigo"];
    $fv_fecha = $fvrow["fecha"];

    $xtemp = explode("-", $fv_fecha);
    $fv_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$col[$campomasterid].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$fv_codigo.'</td>';
    echo '<td>'.$fv_fecha.'</td>';
    echo '<td>'.$col["orden"].'</td>';
    echo '<td>'.$col["cod"].'</td>';
    echo '<td>'.$col["concepto"].'</td>';
    echo '<td>'.$col["unid"].'</td>';
    echo '<td>'.$col["precio"].'</td>';
    echo '<td>'.$col["dto"].'</td>';
    echo '<td>'.$col["importe"].'</td>';
    echo '</tr>';
}



}
?>

</table>