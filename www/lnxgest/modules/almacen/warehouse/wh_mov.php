<?php include("modules/almacen/warehouse/botonera.php"); 

$idwarehouse = $_GET["id"];
?>

<table width="100%">
<tr class="maintitle">
	
	<td>Procede</td>
	<td>Producto</td>
	<td>Unidades</td>
	<td>movimiento</td>
	<td>fecha</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."wh_lineas where idalmacen = '".$idwarehouse."' order by fecha desc";
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
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."wh_mov where id = '".$columna["idwhmov"]."'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbmovimiento = $row["movimiento"];
	echo '<td>'.$dbmovimiento.'</td>';
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$columna["idproducto"]."'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbproducto = $row["concepto"];
	
	echo '<td>'.$dbproducto.'</td>';
	echo '<td>'.$columna["unid"].'</td>';
	
	if ($columna["movimiento"] == "IN"){$smovimiento = "Entrada";}
	if ($columna["movimiento"] == "OLD_REGULA"){$smovimiento = "Antes de regularizar";}
	if ($columna["movimiento"] == "REGULARIZA"){$smovimiento = "Stock Regularizado";}
	
	echo '<td>'.$smovimiento.'</td>';
	echo '<td>'.$columna["fecha"].'</td>';
	echo '</tr>'; 
}
?>

</table>

