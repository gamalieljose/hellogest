<p>
<a class="btnedit" href="index.php?module=almacen&section=articulos"><?php echo LABEL_MNU_ARTICULOS; ?></a>
</p>

<h1>stock</h1>

<table width="100%">
<tr class="maintitle">
	<td>Producto</td>
	<td>Stock</td>
<?php
$ssqlwh = "SELECT * from ".$prefixsql."almacenes order by almacen";
$cnswh = $mysqli->query($ssqlwh);

while($colwh = mysqli_fetch_array($cnswh))
{
	echo '<td>'.$colwh["almacen"].'</td>';
	
}
?>
</tr>
<?php
$ssql = "SELECT * from ".$prefixsql."productos where stock_ctrl = '1' order by concepto";
$ConsultaMySql= $mysqli->query($ssql);

while($columna = mysqli_fetch_array($ConsultaMySql))
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


echo '<td>'.$columna["concepto"].'</td>';

$sqlaux = $mysqli->query("select sum(stock) as stock from ".$prefixsql."productos_wh where idproducto = '".$columna["id"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbstock_total = $rowaux["stock"];

echo '<td>'.$dbstock_total.'</td>';

	
	$ssqlwh = "SELECT * from ".$prefixsql."almacenes order by almacen";
	$cnswh = $mysqli->query($ssqlwh);

	while($colwh = mysqli_fetch_array($cnswh))
	{
		$dbstock_wh = "0";
		$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$columna["id"]."' and idwh = '".$colwh["id"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbstock_wh = $rowaux["stock"];
		echo '<td>'.$dbstock_wh.'</td>';
		
	}
	


echo '</tr>';
}

?>

</table>