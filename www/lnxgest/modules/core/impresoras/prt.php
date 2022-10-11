<p>
<a class="btnedit" href="index.php?module=core&section=printers&action=new">Nueva impresora</a> 
<a class="btnedit_verde" href="downloads/print_client.zip">Download LNX Print Client</a> 
</p>
<h3>lnx_impresoras</h3>
<?php

echo '<table width="100%">';

?>
<tr class="maintitle"><td width="80"></td><td>Impresora</td><td>Tipo</td><td>notas</td><td>id</td></tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from lnx_impresoras");
$color = '2';
$clasecolor = 'class="listacolor2"';

echo '<tr '.$clasecolor.'><td></td><td>PDF</td><td>PDF</td><td>Impresora LNXGEST</td><td>0</td></tr>';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
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
	
	echo '<tr '.$clasecolor.'><td><a class="btnedit" href="index.php?module=core&section=printers&action=edit&id='.$columna["id"].'">editar</a></td><td>'.$columna["nombre"].'</td>';
	if ($columna["tipo"] == '2') {$textotipo = 'WIN_PRINTER';}
	if ($columna["tipo"] == '3') {$textotipo = 'TEXT_PRINTER';}
	echo '<td>'.$textotipo.'</td>';
	echo '<td>'.$columna["notas"].'</td><td>'.$columna["id"].'</td></tr>';
}





?>
</table>