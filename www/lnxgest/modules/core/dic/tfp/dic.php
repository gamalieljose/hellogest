<p><a class="btnedit" href="index.php?module=core&section=dic&subs=tfp&action=new">Nueva tipo documento</a></p>

<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td width="60"></td><td>Tipo documento</td><td>valor</td></tr>
<?php



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_docseries");
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


	echo '<td><a class="btnedit" href="index.php?module=core&section=dic&subs=tfp&action=edit&id='.$columna["id"].'">editar</a></td><td>'.$columna["docserie"].'</td><td>'.$columna["valor"].'</td></tr>';
}





?>
</table>