<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=biblio&section=categorias&action=new">Nueva categoria</a> ';
echo '</p>';
?>

<p></p>
<table width="100%">
<tr class="maintitle">
<td width="50"></td>
<td width="100">Codigo</td>
<td>Categoria</td>
</tr>

<?php
$cnssql = "SELECT * FROM ".$sqlpfxbiblio."categorias";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cloud = mysqli_fetch_array($ConsultaMySql))
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
	echo '<td width="50"><a class="btnedit" href="index.php?module=biblio&section=categorias&action=edit&idcategoria='.$cloud["id"].'">Editar</a></td>';
		
	echo '<td>'.$cloud["id"].'</td>';
		
	echo '<td>'.$cloud["categoria"].'</td>';
	echo '</tr>';
	
	
}
?>

</table>