<?php
$ftxtlicencia = addslashes($_POST["txtlicencia"]);
$ftxtproducto = addslashes($_POST["txtproducto"]);
 

?>

<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=activosfea&srch=licenses" >
<div class="row">
    <div class="col-sm-2" align="left">
        Producto
    </div>
    <div class="col" align="left">
		<input type="text" value="<?php echo $_POST["txtproducto"]; ?>" name="txtproducto" list="listaproductos" style="width: 100%;" />
        
        <datalist id="listaproductos">
<?php

$cnssql= $mysqli->query("select DISTINCT(producto) FROM ".$prefixsql."it_licensing order by producto");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["producto"].'">'.$col["producto"].'</option>';
    
}



?>

    </datalist>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Licencia a buscar
    </div>
    <div class="col" align="left">
		<input type="text" value="<?php echo $_POST["txtlicencia"]; ?>" name="txtlicencia" style="width: 100%;" />
    </div>
</div>


<input type="hidden" name="hcontrol" value="control" />


<div align="center" class="rectangulobtnsguardar">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button>
</div>

</form>

<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Tercero</th>
<th>Activo</th>
<th>Producto</th>
<th>Licencia</th>
</tr>
<?php
if($_POST["hcontrol"] == "control")
{


    

    $sqllicencias = "select ".$prefixsql."it_licensing.idactivo, ".$prefixsql."it_licensing.producto, ".$prefixsql."it_licensing.licencia, ".$prefixsql."ita_activos.nombre, ".$prefixsql."ita_activos.idtercero from ".$prefixsql."it_licensing "
    . " INNER JOIN ".$prefixsql."ita_activos on ".$prefixsql."it_licensing.idactivo = ".$prefixsql."ita_activos.id "
    . " where ".$prefixsql."it_licensing.licencia like '%".$ftxtlicencia."%' and (".$prefixsql."it_licensing.producto like '%".$ftxtproducto."%' or ".$prefixsql."ita_activos.nombre like '%".$ftxtproducto."%') ";

    
$cnssql= $mysqli->query($sqllicencias);	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbtercero = $rowaux["razonsocial"];

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

    echo '<td><a class="btnedit" href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["idactivo"].'">Editar</a></td>';
    echo '<td>'.$dbtercero.'</td>';
    echo '<td>'.$col["nombre"].'</td>';
    echo '<td>'.$col["producto"].'</td>';
    echo '<td>'.$col["licencia"].'</td>';
    echo '</tr>';
}
   

}
?>
</table>
