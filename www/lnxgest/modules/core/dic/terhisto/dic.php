<p><a class="btnedit" href="index.php?module=core&section=dic&subs=terhisto&action=new">Nueva tabla</a></p>

<?php

echo '<table width="100%">';

?>


<tr class="maintitle">
<td> </td>
<td>tabla</td>
<td>ID</td>
<td>fecha</td>
<td>Codigo</td>
<td>descripcion</td>
<td>tipo</td>
</tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_historico_cfg");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td width="60"><a class="btnedit" href="index.php?module=core&section=dic&subs=terhisto&action=edit&id='.$columna["id"].'">editar</a></td>';
	echo '<td>'.$columna["tabla"].'</td>';
	echo '<td>'.$columna["campoid"].'</td>';
	echo '<td>'.$columna["fecha"].'</td>';
	echo '<td>'.$columna["codigo"].'</td>';
	echo '<td>'.$columna["descripcion"].'</td>';
	echo '<td>'.$columna["tipo"].'</td>';
echo '</tr>';
}





?>
</table>
