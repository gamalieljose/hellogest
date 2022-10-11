<?php

?>

<h2>Terceros por Sector Actividad</h2>

<table width="100%">

<tr class="maintitle">
	<td>Sector</td><td>Clientes</td><td>Proveedores</td><td>_</td><td>Total</td>
</tr>

<?PHP
$sqlcontactos= $mysqli->query("SELECT * FROM `".$prefixsql."dic_actividades` order by actividad");

	while($col = mysqli_fetch_array($sqlcontactos))
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
	
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where idactividad = '".$col["id"]."' and codcli > 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbclientes = $rowaux['contador'];
		if ($dbclientes == 0){$dbclientes = '';}
		
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where idactividad = '".$col["id"]."' and codpro > 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbproveedroes = $rowaux['contador'];
		if ($dbproveedroes == 0){$dbproveedroes = '';}
		
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where idactividad = '".$col["id"]."' and codcli = 0 and codpro = 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbprospect = $rowaux['contador'];
		if ($dbprospect == 0){$dbprospect = '';}
	
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where idactividad = '".$col["id"]."'");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbtodos = $rowaux['contador'];
	
	
	
	echo '<td>'.$col["actividad"].'</td><td>'.$dbclientes.'</td><td>'.$dbproveedroes.'</td><td>'.$dbprospect.'</td><td>'.$dbtodos.'</td>';
	echo '</tr>';
	 
	}
?>
	</table>
