<?php

?>

<p><a href="index.php?module=core&section=screens&action=new" class="btnedit">Nuevo screen</a></P>

<table width="100%">
<tr class="maintitle">
    <th width="70"></th>
	<th>Screen</th>
	<th>idpermiso</th>
	<th>Display</td>
	<th>url</td>
        <th width="70"></th>
</tr>
<?php
$sqlscreens = $mysqli->query("SELECT * from ".$prefixsql."screens ");
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
	echo '<td><a href="index.php?module=core&section=screens&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td>'.$col["screen"].'</td>';
	echo '<td>'.$col["idpermiso"].'</td>';
	echo '<td>'.$col["display"].'</td>';
	echo '<td>'.$col["url"].'</td>';
        echo '<td><a href="index.php?module=core&section=screens&action=del&id='.$col["id"].'" class="btnenlacecancel">Eliminar</a></td>';
	echo '</tr>';
}
?>
</table>