<?php

?>

<h2>Terceros por origen</h2>

<table width="100%">

<tr class="maintitle">
	<td width="50"> </td><td>Origen</td><td>Clientes</td><td>Proveedores</td><td>_</td><td>Total</td>
</tr>

<?PHP
$sqlcontactos= $mysqli->query("SELECT DISTINCT(origen) as miorigen FROM `".$prefixsql."terceros` order by origen");

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
	
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where origen like '".$col["miorigen"]."' and codcli > 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbclientes = $rowaux['contador'];
		if ($dbclientes == 0){$dbclientes = '';}
		
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where origen like '".$col["miorigen"]."' and codpro > 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbproveedroes = $rowaux['contador'];
		if ($dbproveedroes == 0){$dbproveedroes = '';}
		
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where origen like '".$col["miorigen"]."' and codcli = 0 and codpro = 0");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbprospect = $rowaux['contador'];
		if ($dbprospect == 0){$dbprospect = '';}
	
		$cnsaux= $mysqli->query("SELECT count(id) as contador from ".$prefixsql."terceros where origen = '".$col["miorigen"]."'");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbtodos = $rowaux['contador'];
	
	
	echo '<td><a class="btnedit" href="index.php?module=terceros&section=stat1&action=ver&origen='.$col["miorigen"].'">Ver</a></td>';
	echo '<td>'.$col["miorigen"].'</td><td>'.$dbclientes.'</td><td>'.$dbproveedroes.'</td><td>'.$dbprospect.'</td><td>'.$dbtodos.'</td>';
	echo '</tr>';
	 
	}
?>
	</table>
