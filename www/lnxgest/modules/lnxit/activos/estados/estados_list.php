<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=lnxit&section=activos&ss=estados&action=new">Nuevo estado</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Tipos de estado</td>
<td width="80"> </td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."ita_estados order by estado";
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
	echo '<td><a class="btnedit" href="index.php?module=lnxit&section=activos&ss=estados&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["estado"].'</td>
	<td align="right"><a class="btnenlacecancel" href="index.php?module=lnxit&section=activos&ss=estados&action=del&id='.$cat["id"].'">Borrar</a></td>
	<tr>';
	
}
?>

</table>

<p></p>
