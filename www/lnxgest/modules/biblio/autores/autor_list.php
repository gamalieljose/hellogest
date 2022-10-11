<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=biblio&section=autores&action=new">Nuevo autor</a> ';
echo '</p>';
?>

<p></p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<td width="50"></td>
<td width="100">Codigo</td>
<td>Autor</td>
</tr>

<?php
$cnssql = "SELECT * FROM ".$sqlpfxbiblio."autores order by autor";
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
	echo '<td width="50"><a class="btnedit" href="index.php?module=biblio&section=autores&action=edit&idautor='.$cloud["id"].'">Editar</a></td>';
		
	echo '<td>'.$cloud["id"].'</td>';
		
	echo '<td>'.$cloud["autor"].'</td>';
	echo '</tr>';
	
	
}
?>

</table>
</div>