<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=gastos&section=cfg_tg&action=new">Nuevo tipo de gasto</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td> </td>
<td>Tipo de gasto</td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."gastos_tipo order by tipogasto";
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
	echo '<td width="60" >
	<a class="btnedit" href="index.php?module=gastos&section=cfg_tg&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["tipogasto"].'</td>';
	
	echo '</tr>';
	
}
?>

</table>

<p></p>
