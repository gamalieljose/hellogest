<?php
echo '<p><a class="btnedit" href="index.php?module=cfpcmods&section=permisos&action=new">Nuevo permiso</a></p>';
?>

<table width="100%">
<tr class="maintitle"><td width="60">Accion</td>
<td>ID modulo</td>
<td>ID Permiso</td>
<td>Nombre permiso</td>

<tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."permisos");
	$color = '1';
	while($modulo = mysqli_fetch_array($ConsultaMySql))
	{
		if ($color == '1')
		{
			$color = '2';
			$pintacolor = 'listacolor2';
		}
		else
		{
			$color = '1';
			$pintacolor = 'listacolor1';
		}
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td><a class="btnedit" href="index.php?module=cfpcmods&section=permisos&action=edit&id='.$modulo["id"].'">Editar</a></td>';
		
		echo '<td>'.$modulo["idmod"].'</td>
			<td>'.$modulo["idpermiso"].'</td>
			<td>'.$modulo["display"].'</td>
			</tr>';
	}
?>


</table>

<p>&nbsp;</p>
<p>&nbsp;</p>