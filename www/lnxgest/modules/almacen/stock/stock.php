<?php
include("modules/almacen/art/botonera.php");

$idproducto = $_GET["id"];

echo '<p>';
echo '<a href="index.php?module=almacen&section=stockfix&id='.$idproducto.'" class="btnedit">Regularización Stock</a> ';
echo '<a href="index.php?module=almacen&section=stocktransfer&id='.$idproducto.'" class="btnedit">Transferir Stock</a> ';
echo '</p>';

?>

<p>Control stock</p>


<table width="100%">
<tr class="maintitle">
	<td>Almacen</td>
	<td>Cantidad</td>
</tr>

<?php
$ssql = "SELECT * from ".$prefixsql."productos_wh where idproducto = '".$idproducto."' ";
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
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."almacenes where id = '".$columna["idwh"]."' ");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbalmacen = $rowaux["almacen"];
	
	echo '<td>'.$dbalmacen.'</td>';
	echo '<td>'.$columna["stock"].'</td>';
	echo '</tr>'; 
}
?>

</table>