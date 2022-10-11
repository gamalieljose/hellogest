


<p><?php echo '<a class="btnedit" href="index.php?module=core&section=groups&action=new&id='.$iduser.'">Nuevo grupo</a>'; ?></p>

<table width="100%">
<tr class="maintitle"><td width="80"></td><td>Grupos</td></tr>

<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."groups order by grupo");
$color = '1';
while($columna = mysqli_fetch_array($sqlusers))
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
	
    echo '<td><a class="btnedit" href="index.php?module=core&section=groups&action=edit&id='.$columna["id"].'">Editar</a></td>';

	echo '<td>'.$columna["grupo"].'</td>';
	
	echo '</tr>';
}


?>

</table>
