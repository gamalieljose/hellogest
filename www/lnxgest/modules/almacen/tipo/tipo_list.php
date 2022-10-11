<p><a class="btnedit" href="index.php?module=almacen&section=tipo&action=new">Nuevo tipo articulo</a></p>
<p>&nbsp;</p>
<form name="fbuscar" method="POST" action="index.php?module=almacen&section=tipo">

<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="80">ID</td>
	<td>Tipo de producto</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."productos_tipo order by tipo asc";
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=tipo&action=edit&id='.$columna["id"].'">Editar</a></td>';
	echo '<td>'.$columna["id"].'</td>';
	echo '<td>'.$columna["tipo"].'</td>';
	echo '</tr>'; 
}
?>

</table>

