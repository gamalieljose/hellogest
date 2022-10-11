<p><a class="btnedit" href="index.php?module=core&section=dic&subs=lopdcats&action=new">Nueva categoria LOPD</a></p>

<table width="100%">


<tr class="maintitle"><td width="60"> </td><td>Categoria LOPD</td></tr>
<?php



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_lopd");
$color = '1';
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



	echo '<td width="60"><a class="btnedit" href="index.php?module=core&section=dic&subs=lopdcats&action=edit&id='.$columna["id"].'">editar</a></td>
	<td>'.$columna["lopdcat"].'</td></tr>';
}





?>
</table>