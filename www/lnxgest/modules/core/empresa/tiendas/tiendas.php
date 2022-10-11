<p><a class="btnedit" href="index.php?module=core&section=etiendas&action=new">Nueva tienda / sucursal</a></p>
<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td width="80"> </td>
<td>Empresa</td>
<td>Tienda / sucursal</td></tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tiendas");
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

	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$columna["idempresa"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbempresa = $rowaux["razonsocial"];
	
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a class="btnedit" href="index.php?&module=core&section=etiendas&action=edit&id='.$columna["id"].'">editar</a></td>';
	echo '<td>'.$dbempresa.'</td>';
	echo '<td>'.$columna["tienda"].'</td>';
	echo '</tr>';

}



?>
</table>