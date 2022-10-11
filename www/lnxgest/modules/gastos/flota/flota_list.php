<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=gastos&section=flota&action=new">Nuevo vehiculo</a> ';
echo '</p>';
?>



<p></p>
<table width="100%">
<tr class="maintitle">
<td> </td>
<td>Vehiculo</td>
<td>Matricula</td>
<td>kms</td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."flota";
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
	<a class="btnedit" href="index.php?module=gastos&section=flota&action=edit&id='.$cat["id"].'">Editar</a></td>
	<td>'.$cat["vehiculo"].'</td>
	<td>'.$cat["matricula"].'</td>';
	
	$kmscoche = number_format($cat["kms"], 0, ',', ' ');
	
	echo '<td>'.$kmscoche.'</td>
	<tr>';
	
}
?>

</table>

<p></p>
