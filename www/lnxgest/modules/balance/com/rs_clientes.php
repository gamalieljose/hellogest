<table width="100%">
<tr class="maintitle"><td colspan="6" align="center">Facturado por cliente agrupado por agente</td></tr>

<?php
if($fchkfv == 'all'){$seriebuscar = '';} else {$seriebuscar = " and idserie = '".$serieventas."'";}

$sqlusuarios = $mysqli->query("SELECT * from ".$prefixsql."users order by display");

while($colusuarios = mysqli_fetch_array($sqlusuarios))
{
	$sqlterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where idcomercial = '".$colusuarios["id"]."' order by razonsocial");
	$existeterceros = $sqlterceros->num_rows;
	
	if ($existeterceros > '0')
	{
	
		echo '<tr class="maintitle"><td colspan="6"><h2>Agente asigando: '.$colusuarios["display"].'</h2></td></tr>';
		
		$sqlterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where idcomercial = '".$colusuarios["id"]."' order by razonsocial");
		while($colterceros = mysqli_fetch_array($sqlterceros))
		{
			
			
			
				
			$sqlfacturas = $mysqli->query("SELECT * from ".$prefixsql."fv where idtercero = '".$colterceros["id"]."' and codigoint > '0' ".$seriebuscar." and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')");
			$existenfacturas = $sqlfacturas->num_rows;
	
			if ($existenfacturas > '0')
			{
				echo '<tr class="maintitle"><td>&nbsp;</td><td colspan="5">Cliente id '.$colterceros["razonsocial"].'</td></tr>';
				
				while($colfv = mysqli_fetch_array($sqlfacturas))
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
					echo '<td>&nbsp;</td>';
					echo '<td><a class="btnedit" href="index.php?module=fv&section=main&action=view&id='.$colfv["id"].'" >Ver</a></td>';
					echo '<td>'.$colfv["codigo"].'</td>';
					echo '<td>'.$colfv["fecha"].'</td>';
					echo '<td>'.$colfv["impbruto"].'</td>';
					echo '<td>'.$colfv["total"].'</td>';
					echo '</tr>';
					
					$suma_totalbruto = $suma_totalbruto + $colfv["impbruto"];
										
				}	
			}

		
		}
echo '<tr class="maintitle"><td colspan="6" align="center">Total facturado los clientes de '.$colusuarios["display"].' - Bruto: '.$suma_totalbruto.'</td></tr>';
$suma_totalbruto = "0";
	} //fin existe tercero
}

?>

</table>