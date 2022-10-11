<?php

?>

<p><a href="index.php?module=core&section=menus&action=new" class="btnedit">Nuevo menu</a> </P>

<table width="100%">
<tr class="maintitle">
	<td width="50"></td>
	<td>id</td>
	<td>idmenu</td>
	<td>module</td>
	<td>section</td>
	<td>display</td>
	<td>orden</td>
	<td>idpermiso</td>
        <td width="50"></td>
</tr>
<?php
$sqlscreens = $mysqli->query("SELECT * from ".$prefixsql."menus order by idmenu, orden");
while($col = mysqli_fetch_array($sqlscreens))
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
	echo '<td><a href="index.php?module=core&section=menus&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td>'.$col["id"].'</td>';
	echo '<td>'.$col["idmenu"].'</td>';
	echo '<td>'.$col["module"].'</td>';
	echo '<td>'.$col["section"].'</td>';
	echo '<td>'.$col["display"].'</td>';
	echo '<td>'.$col["orden"].'</td>';
	echo '<td>'.$col["idpermiso"].'</td>';
        echo '<td><a href="index.php?module=core&section=menus&action=del&id='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';
	echo '</tr>';
}
?>
</table>