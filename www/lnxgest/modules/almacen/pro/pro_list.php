<?php 
include("modules/almacen/art/botonera.php"); 
$idproducto = $_GET["id"];


echo '<p><a class="btnedit" href="index.php?module=almacen&section=pro&action=new&id='.$idproducto.'">Nueva referencia con proveedor</a></p>';

?>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td>Tercero</td>
	<td>Referencia</td>
	<td>Precio compra</td>
	<td>Ultima actualizacion</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."productos_pro where idproduct = '".$idproducto."'";
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=pro&action=edit&id='.$idproducto.'&idlinea='.$columna["id"].'">Editar</a></td>';
	
	$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$columna["idtercero"]."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
		
	$dbrazonsocial = $rowaux["razonsocial"];
	
	echo '<td>'.$dbrazonsocial.'</td>';
	echo '<td>'.$columna["referencia"].'</td>';
	echo '<td>'.$columna["precio"].'</td>';
	echo '<td>'.$columna["ultactu"].'</td>';
	echo '</tr>'; 
}
?>

</table>

