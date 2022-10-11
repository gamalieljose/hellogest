<?php

echo '<h2>Estadisticas tickets por dia</h2>';


/*	$ssql = "SELECT DISTINCT CAST(`fcreacion` AS DATE) AS dateonly FROM ".$prefixsql."it_tickets where fcreacion >= '".$cfechainicio."' and fcreacion <= '".$cfechafin."' order by fcreacion";
	$cnssql = $mysqli->query($ssql);
	$nregistros = $cnssql->num_rows;
*/
?>
<div align="center">
<p><b>Fecha inicio:</b> <?php echo $cfechainicio; ?></p>
<p><b>Fecha fin:</b> <?php echo $cfechafin; ?></p>
</div>


<div align="center">
<?php

	$ssql = "SELECT DISTINCT CAST(`fcreacion` AS DATE) AS dateonly FROM ".$prefixsql."it_tickets where fcreacion >= '".$cfechainicio."' and fcreacion <= '".$cfechafin."' order by fcreacion";
	$cnssql = $mysqli->query($ssql);
	$nregistros = $cnssql->num_rows;
	echo '<table>';
	echo '<tr class="maintitle">
	<td>Fecha</td>
	<td>Total</td>
	<td>Abiertos</td>
	<td>En proceso</td>
	<td>pendiente de terceros</td>
	<td>Cerrados</td>
	</tr>';
$color = '1';
	while($columna = mysqli_fetch_array($cnssql))
	{
		//muestra los dias únicos
		//ahora solo falta realizar un count
		$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where fcreacion >= '".$columna["dateonly"]." 00:00:00' and fcreacion <= '".$columna["dateonly"]." 23:59:59'");
		$rowaux = mysqli_fetch_assoc($cnssqlaux);
		$contaatodos = $rowaux['contador'];
		//abiertos
		$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where fcreacion >= '".$columna["dateonly"]." 00:00:00' and fcreacion <= '".$columna["dateonly"]." 23:59:59' and idestado > '0'");
		$rowaux = mysqli_fetch_assoc($cnssqlaux);
		$contaabiertos = $rowaux['contador'];
		//En proceso
		$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where fcreacion >= '".$columna["dateonly"]." 00:00:00' and fcreacion <= '".$columna["dateonly"]." 23:59:59' and idestado > '2'");
		$rowaux = mysqli_fetch_assoc($cnssqlaux);
		$contaproceso = $rowaux['contador'];
		//pendiente terceros
		$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where fcreacion >= '".$columna["dateonly"]." 00:00:00' and fcreacion <= '".$columna["dateonly"]." 23:59:59' and idestado > '3'");
		$rowaux = mysqli_fetch_assoc($cnssqlaux);
		$contaterceros = $rowaux['contador'];
		//cerrados
		$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_tickets where fcreacion >= '".$columna["dateonly"]." 00:00:00' and fcreacion <= '".$columna["dateonly"]." 23:59:59' and idestado = '0'");
		$rowaux = mysqli_fetch_assoc($cnssqlaux);
		$contacerrados = $rowaux['contador'];
		
		
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
		echo  '<td>'.$columna["dateonly"].'</td>';
		echo  '<td>'.$contaatodos.'</td>';
		if($contaabiertos == '0'){$contaabiertos = '';}
			echo  '<td>'.$contaabiertos.'</td>';
		if($contaproceso == '0'){$contaproceso = '';}
			echo  '<td>'.$contaproceso.'</td>';
		if($contaterceros == '0'){$contaterceros = '';}
			echo  '<td>'.$contaterceros.'</td>';
		if($contacerrados == '0'){$contacerrados = '';}
			echo  '<td>'.$contacerrados.'</td>';
		echo  '</tr>';
	}
	echo '</table>';
	
?>
</div>