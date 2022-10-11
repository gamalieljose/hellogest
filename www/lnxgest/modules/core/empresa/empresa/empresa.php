<p><a class="btnedit" href="index.php?module=empresa&section=empresa&action=edit">Editar configuracion</a></p>

<?php
$sqlempresa= $mysqli->query("SELECT * from lnx_empresa order by orden");
$color = '1';
echo '<table>';
echo '<tr class="maintitle"><td></td><td></td><td>Descripcion</td></tr>';
while($row = mysqli_fetch_array($sqlempresa))
{
	$dbdisplay = $row["display"];
	$dbrequerido = $row["requerido"];
		if ($requerido == '1'){$dbrequerido = 'required=""';}else{$dbrequerido = "";}
	$dbdescripcion = $row["descripcion"];
	$dbtipo = $row["tipo"];
	$dbcampo = $row["campo"];
	$dbvalor = $row["valor"];
	
	$tabla = $row["tabla"];
	$nombrecampo = $row["campotabla"];
	
	
	if ($color == '1')
		{
			$color = '2';
			$clasecolor = 'class="listacolor2"';
		}
		else
		{
			$color = '1';
			$clasecolor = 'class="listacolor1"';
		}
	
	echo '<tr '.$clasecolor.'>';
	echo '<td>'.$dbdisplay.'</td>';
	
	if($dbtipo == '2')
	{
		
		$sqltablaux= $mysqli->query("SELECT ".$nombrecampo." as micampo from ".$prefixsql.$tabla." where id = '".$dbvalor."'");
		$rowaux = mysqli_fetch_assoc($sqltablaux);
		$dbvalor = $rowaux['micampo'];
		
	}
	
	
	echo '<td>'.$dbvalor.'</td>';
	echo '<td>'.$dbdescripcion.'</td>';
	echo '</tr>';
}

echo '</table>';


?>
