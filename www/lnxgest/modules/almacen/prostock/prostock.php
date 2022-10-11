<div class="grupotabs">
<div class="campoencoger">
    <a href="index.php?module=almacen&section=prostock" class="btn_tab_sel">Listado</a>
    
    <a href="index.php?module=almacen&section=prostockimp" class="btn_tab">Importar</a>
</div>
</div>
<div class="tblbuscar" style="width: 100%;" align="center">
<form action="index.php?module=almacen&section=prostock" method="POST" >
Proveedor <select name="lsttercero">

<?php
$idtercero = $_POST["lsttercero"];

$ssql = "SELECT * from ".$prefixsql."terceros where codpro > '0' order by razonsocial";
$ConsultaMySql= $mysqli->query($ssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if($idtercero == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
}

?>
</select>

<input type="submit" class="btnsubmit" value="Buscar"/>
</form>
</div>


<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td>Cod Venta</td>
	<td>Cod Compra</td>
	<td>Producto</td>
	<td>Ultima Actualizacion</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."productos_pro where idtercero = '".$idtercero."' order by idproduct";
$ConsultaMySql= $mysqli->query($ssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
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
	$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos where id = '".$col["idproduct"]."'");
	$row = mysqli_fetch_assoc($sqlarticulo);
	$dbcodventa = $row["codventa"];
	$dbconcepto = $row["concepto"];
	
	
	echo '<td>'.$dbcodventa.'</td>';
	echo '<td>'.$col["referencia"].'</td>';
	echo '<td>'.$dbconcepto.'</td>';
	echo '<td>'.$col["ultactu"].'</td>';
	echo '</tr>';
}

?>
</table>