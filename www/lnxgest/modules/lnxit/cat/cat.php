<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=lnxit&section=cat&action=new">Nueva categoria</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td width="40" > </td>
<td>Categoria</td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."it_categorias order by categoria";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
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
	echo '<td >
	<a class="btnedit" href="index.php?module=lnxit&section=cat&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["categoria"].'</td>
	<tr>';
	
}
?>

</table>

<p></p>
