<p><a class="btnedit" href="index.php?module=ficheros&section=catnew">Nueva categoria</a></p>

<table width="100%">


<tr class="maintitle"><td width="60"> </td><td>Categoria archivo</td></tr>
<?php



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat");
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



	echo '<td width="60"><a class="btnedit" href="index.php?module=ficheros&section=catedit&id='.$columna["id"].'">editar</a></td><td>'.$columna["categoria"].'</td></tr>';
}





?>
</table>