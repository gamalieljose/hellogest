<table width="100%">
<tr class="maintitle"><td align="center" colspan="5">Facturado por agente</td></tr>

<?php

$sqlusuarios = $mysqli->query("SELECT * from ".$prefixsql."users order by display");

while($col = mysqli_fetch_array($sqlusuarios))
{
	if($fchkfv == 'all'){$seriebuscar = '';} else {$seriebuscar = "and idserie = '".$serieventas."'";}
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."fv where codigoint > '0' and idusuario = '".$col["id"]."' ".$seriebuscar);
	$existe = $sqlaux->num_rows;
	
	if ($existe > '0')
	{
		echo '<tr class="maintitle"><td colspan="5">'.$col["display"].'</td></tr>';
		
	// Ahora que tenemos el usuario a vendido algo, comenzamos a mostrar las facturas
		
		echo '<tr class="maintitle">';
		echo '<td>Serie</td>';
		echo '<td>Factura</td>';
		echo '<td>Fecha</td>';
		echo '<td>Importe bruto</td>';
		echo '<td>Total</td>';
		echo '</tr>';
		
		$cnssql = "select * from ".$prefixsql."fv where codigoint > '0' and idusuario = ".$col["id"]." ".$seriebuscar." order by idserie, codigoint";

		$sqlfacturas = $mysqli->query($cnssql);
		while($colfactu = mysqli_fetch_array($sqlfacturas))
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
		echo '<td><a class="btnedit" href="index.php?module=fv&section=main&action=view&id='.$colfactu["id"].'" >Ver</a></td>';
		echo '<td>'.$colfactu["codigo"].'</td>';
		echo '<td>'.$colfactu["fecha"].'</td>';
		echo '<td>'.$colfactu["impbruto"].'</td>';
		echo '<td>'.$colfactu["total"].'</td>';
		echo '</tr>';
	
		}
	
	}
	
}

?>

</table>