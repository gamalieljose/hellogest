<?php

echo '<h2>Estadisticas tickets cerrados por usuario</h2>';

?>

<div align="center">
<p><b>Fecha inicio:</b> <?php echo $cfechainicio; ?></p>
<p><b>Fecha fin:</b> <?php echo $cfechafin; ?></p>
</div>


<table width="100%">

<?php
$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users order by display");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	
	$ssql = "SELECT * FROM ".$prefixsql."it_tickets where fcierre >= '".$cfechainicio."' and fcierre <= '".$cfechafin."' and idasignado = '".$columna["id"]."' and idestado = '0' ";
	$cnssql = $mysqli->query($ssql);
	$nregistros = $cnssql->num_rows;
	$sumatd = '00:00';
	$sumatc = '00:00';
	if ($nregistros > '0')
	{
		echo '<tr class="maintitle"><td colspan="8">Tecnico: '.$columna["display"].'</td></tr>';
		echo '<tr class="maintitle"><td>Ticket</td><td>Estado</td><td>Fecha cierre</td><td>resumen</td><td>Categoria</td><td>tiempo</td><td>Computado</td><td>Facturado</td></tr>';
		$color = '1';
		while($coltickets = mysqli_fetch_array($cnssql))
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
			echo '<td><a href="index.php?module=lnxit&section=tickets&action=edit&id='.$coltickets["id"].'" class="btnedit">'.$coltickets["id"].'</a></td>';
			if ($coltickets["idestado"] == '0'){$estado = "Cerrado";}
			if ($coltickets["idestado"] == '1'){$estado = "Abierto";}
			if ($coltickets["idestado"] == '2'){$estado = "En proceso";}
			if ($coltickets["idestado"] == '3'){$estado = "Pendiente de terceros";}
			
			echo '<td>'.$estado.'</td>';
			echo '<td>'.$coltickets["fcierre"].'</td>';
			echo '<td>'.$coltickets["resumen"].'</td>';
			$cnsauxtempo= $mysqli->query("SELECT * from ".$prefixsql."it_categorias where id = '".$coltickets["idcategoria"]."' ");
			$row = mysqli_fetch_assoc($cnsauxtempo);

			$dbcategoria = $row["categoria"];
			
			echo '<td>'.$dbcategoria.'</td>';
			
			// Calcular tiempos		
			
				$cnsauxtempo= $mysqli->query("SELECT sum(HOUR(tiempo)) as hora, sum(MINUTE(tiempo)) as minutos from ".$prefixsql."it_seguimiento where idticket = '".$coltickets["id"]."' ");
				$row = mysqli_fetch_assoc($cnsauxtempo);

				$horas = $row["hora"];
				$min = $row["minutos"];
				$minutos = $min%60;
				$h=0;
				$h=(int)($min/60);
				$horas+=$h;

				//echo "TOTAL: ".$horas."h ".$minutos."m";
				$totaltiempodedicado = $horas." h ".$minutos." m";
				$xtotaltiempodedicado = $horas.":".$minutos;
				$sumatd = date('H:s', strtotime($sumatd + $horas.":".$minutos));


				$cnsauxtempo= $mysqli->query("SELECT sum(HOUR(tiempo)) as hora, sum(MINUTE(tiempo)) as minutos from ".$prefixsql."it_seguimiento where idticket = '".$coltickets["id"]."' and computa = '1'");
				$row = mysqli_fetch_assoc($cnsauxtempo);

				$horas = $row["hora"];
				$min = $row["minutos"];
				$minutos = $min%60;
				$h=0;
				$h=(int)($min/60);
				$horas+=$h;

				//echo "TOTAL: ".$horas."h ".$minutos."m";
				$totaltiempocomputado = $horas." h ".$minutos." m";
				
			//FIN calcular tiempos
			
			
			
			
			echo '<td>'.$totaltiempodedicado.'</td>';
			echo '<td>'.$totaltiempocomputado.'</td>';			
			if ($coltickets["idfv"] > '0')
			{
				echo '<td><a href="index.php?module=fv&section=main&action=view&id='.$coltickets["idfv"].'" class="btnedit">Ver factura</a></td>';
			}
			else
			{
				echo '<td> </td>';
			}
			echo '</tr>';
		}
		
		
		
		echo '<tr bgcolor="#CEE3F6">';
		echo '<td>&nbsp;</td>';
		echo '<td> </td>';
		echo '<td><b>Total registros: '.$nregistros.'</b></td>';
		echo '<td> </td>';
		echo '<td> </td>';
		echo '<td> </td>';
		echo '<td> </td>';
		echo '<td> </td>';
		echo '</tr>';
	}
}

?>

</table>