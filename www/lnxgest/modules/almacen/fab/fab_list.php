<p><a class="btnedit" href="index.php?module=almacen&section=fab&action=new">Nuevo fabricante</a></p>

<form name="fbuscar" method="POST" action="index.php?module=almacen&section=fab">



<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="80">ID</td>
	<td>Fabricante</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."fabricantes ";
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=fab&action=edit&id='.$columna["id"].'">Editar</a></td>';
	echo '<td>'.$columna["id"].'</td>';
	echo '<td>'.$columna["fabricante"].'</td>';
	echo '</tr>'; 
}
?>

</table>

