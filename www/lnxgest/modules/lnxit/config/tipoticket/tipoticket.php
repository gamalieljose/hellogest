<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=lnxit&section=tipoticket&action=new">Nuevo tipo de ticket</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Tipos de ticket</td>
<td width="80"> </td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."it_tipos order by tipo";
$ConsultaMySql= $mysqli->query($cnssql);

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
	echo '<td >	<a class="btnedit" href="index.php?module=lnxit&section=tipoticket&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["tipo"].'</td>
	<td align="right">	<a class="btnenlacecancel" href="index.php?module=lnxit&section=tipoticket&action=del&id='.$cat["id"].'">Borrar</a></td>
	<tr>';
	
}
?>

</table>

<p></p>
