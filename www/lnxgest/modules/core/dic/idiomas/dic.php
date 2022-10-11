<p><a class="btnedit" href="index.php?module=core&section=dic&subs=idiomas&action=new">Nuevo idioma</a></p>

<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td> </td><td>Idiomas</td><td>fichero</td><td>id</td></tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1')
	{
		$color = '2';
		$clasecolor = 'class="listacolor2"';
	}
	else
	{
		$color = '1';
		$clasecolor = 'class="listacolor1"';
	}
	echo '<tr '.$clasecolor.'>
	<td width="60"><a class="btnedit" href="index.php?module=core&section=dic&subs=idiomas&action=edit&id='.$columna["id"].'">editar</a></td>
	<td>'.$columna["idioma"].'</td>
	<td>'.$columna["fichero"].'</td>
	<td>'.$columna["id"].'</td></tr>';
}





?>
</table>
