<?php include("modules/almacen/warehouse/botonera.php"); 

$idwarehouse = $_GET["id"];
?>

<table width="100%">
<tr class="maintitle">
	<td width="120"> </td>
	<td>Producto</td>
	<td>Stock</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."productos_wh where idwh = '".$idwarehouse."'";
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=articulos&action=edit&id='.$columna["idproducto"].'">Editar articulo</a></td>';
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$columna["idproducto"]."'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbproducto = $row["concepto"];
	
	echo '<td>'.$dbproducto.'</td>';
	echo '<td>'.$columna["stock"].'</td>';
	echo '</tr>'; 
}
?>

</table>

