<p><a class="btnedit" href="index.php?module=core&section=dic&subs=pobla&action=new">Nueva poblacion</a></p>

<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td width="60"> </td><td>CP</td><td>Poblacion</td><td>Provincia</td><td>Pais</td><td>id</td></tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."poblaciones order by poblacion");
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
	
	echo '<td><a class="btnedit" href="index.php?module=core&section=dic&subs=pobla&action=edit&id='.$columna["id"].'">editar</a></td>';
	echo '<td>'.$columna["cp"].'</td>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$columna["idprov"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbprovincia = $rowaux["provincia"];
	
	echo '<td>'.$columna["poblacion"].'</td>';
	echo '<td>'.$dbprovincia.'</td>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises where id = '".$columna["idpais"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbpais = $rowaux["pais"];
	
	echo '<td>'.$dbpais.'</td>';
	echo '<td>'.$columna["id"].'</td>';
	echo '</tr>';
}





?>
</table>