<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=lnxit&section=tiposmant&action=new">Nuevo tipo de mantenimiento</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td> </td>
<td>Tipos de mantenimiento</td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."it_tipomant order by tipomant";
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
	<a class="btnedit" href="index.php?module=lnxit&section=tiposmant&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["tipomant"].'</td>
	<tr>';
	
}
?>

</table>

<p></p>
