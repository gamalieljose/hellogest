<p><a class="btnedit" href="index.php?module=core&section=dic&subs=prov&action=new">Nueva provincia</a></p>

<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td width="60"> </td><td>Provincia</td><td>Pais</td><td>id</td></tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT ".$prefixsql."provincias.id, ".$prefixsql."provincias.provincia, ".$prefixsql."provincias.idpais, ".$prefixsql."paises.pais FROM ".$prefixsql."provincias, ".$prefixsql."paises WHERE ".$prefixsql."provincias.idpais=".$prefixsql."paises.id order by ".$prefixsql."provincias.provincia");
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
	
	echo '<td><a class="btnedit" href="index.php?module=core&section=dic&subs=prov&action=edit&id='.$columna["id"].'">editar</a></td><td>'.$columna["provincia"].'</td><td>'.$columna["pais"].'</td><td>'.$columna["id"].'</td></tr>';
}





?>
</table>