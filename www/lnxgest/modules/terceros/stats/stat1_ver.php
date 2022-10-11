<?php

?>

<p><a href="index.php?module=terceros&section=stat1" class="btncancel">Volver al listado</a></p>

<table width="100%">
	<tr class="maintitle">
		<td width="100">&nbsp;
		</td>
		<td>
			Razon Social
		</td>
		<td>
			Nombre Comercial
		</td>
		<td>
			Telf.
		</td>
	</tr>
<?php

$sqlterceros= $mysqli->query("select * FROM `".$prefixsql."terceros` where origen = '".$_GET["origen"]."' order by razonsocial");

while($col = mysqli_fetch_array($sqlterceros))
{
	echo '<tr>
		<td>
			<a href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$col["id"].'" class="btnedit">Ver ficha</a>
		</td>
		<td>'.$col["razonsocial"].'</td>
		<td>'.$col["nomcomercial"].'</td>
		<td>'.$col["tel"].'</td>
	</tr>';
}
?>
</table>