<p><a class="btnedit" href="index.php?module=almacen&section=wh&action=new">Nuevo almacen</a></p>

<form name="fbuscar" method="POST" action="index.php?module=almacen&section=wh">



<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="80">ID</td>
	<td width="40"> </td>
	<td>Almacen</td>
</tr>


<?php
$ssql = "SELECT * from ".$prefixsql."almacenes ";
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=wh&action=edit&id='.$columna["id"].'">Editar</a></td>';
	echo '<td>'.$columna["id"].'</td>';
	if ($columna["dft"] == '1')
	{
		echo '<td><img src="img/yes.png" /></td>';
	}
	else
	{
		echo '<td>&nbsp;</td>';
	}
	
	
	echo '<td>'.$columna["almacen"].'</td>';
	echo '</tr>'; 
}
?>

</table>

