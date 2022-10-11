<?php

echo '<form name="form1" action="index.php?&module=core&section=series&action=save&tab=2" method="post">';

echo '<input type="hidden" name="hidserie" value="'.$_GET["id"].'">';

$consulta = "SELECT * FROM ".$prefixsql."impuestos WHERE NOT EXISTS ( SELECT * FROM ".$prefixsql."impuestosrules WHERE ".$prefixsql."impuestos.id = ".$prefixsql."impuestosrules.idimpuesto AND idserie = '".$_GET["id"]."' )";
$gruposdisponibles= $mysqli->query($consulta);

$disponibles = $gruposdisponibles->num_rows;
if ($disponibles > '0')	
{

?>

<div class="row">
	<div class="col-sm-2">
		Impuesto
	</div>
	<div class="col">
	<select name="sltimpuestos" class="campoencoger">
<?php			
		$gruposdisponibles= $mysqli->query($consulta);
		while($columna = mysqli_fetch_array($gruposdisponibles))
		{
			echo '<option value="'.$columna["id"].'">'.$columna["impuesto"].'</option>';
		}
?>	
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">

	</div>
	<div class="col">
		<label><input type="checkbox" checked="" name="chkrequerido" value="1" /> El valor puede ser editable</label>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Valor por defecto
	</div>
	<div class="col">
	<input type="text" value="0" name="txtvalordefecto" />
	</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-plus-square fa-lg"></i> Agregar</button> 
</div>

<?php

}

?>
</form>

<p></p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Impuesto</th>
<th width="50" align="center">Editable</th>
<th>Valor</th>
<th width="100" align="center">Orden</th>
</tr>

<?php

$sqllistado = "SELECT ".$prefixsql."impuestosrules.id, ".$prefixsql."impuestosrules.valor, ".$prefixsql."impuestosrules.idserie, ".$prefixsql."impuestosrules.idimpuesto, ".$prefixsql."impuestosrules.orden, ".$prefixsql."impuestos.impuesto, ".$prefixsql."impuestosrules.editable FROM ".$prefixsql."impuestosrules, ".$prefixsql."impuestos WHERE ".$prefixsql."impuestosrules.idimpuesto = ".$prefixsql."impuestos.id and ".$prefixsql."impuestosrules.idserie = '".$_GET["id"]."' order by ".$prefixsql."impuestosrules.orden";

$reglasimpuestos = $mysqli->query($sqllistado);
$numregistros = $reglasimpuestos->num_rows;
//id = es el id de impuestosrules
//idnew es el orden nuevo de impuestosrulescon "up" sube posicion o "down" bajo posicion

$registro = 0;
$color = '1';
while($columna = mysqli_fetch_array($reglasimpuestos))
{  

	$registro = $registro +1;
	
	if ($numregistros > '1')
	{
		if ($registro == '1')
		{
		//es el primer registro y hay más de 1 registro
			$subir = 'no';
			$bajar = 'yes';
		}
		if ($registro > '1' && $registro < $numregistros)
		{
			$subir = 'yes';
			$bajar = 'yes';
		}
		if ($registro == $numregistros)
		{
			$subir = 'yes';
			$bajar = 'no';
		}
	
	}
	

	if ($subir == 'yes')
	{$img_subir = '<a href="index.php?&module=core&section=series&action=orden&id='.$columna["id"].'&newid=up"><IMG SRC="img/flecha-arriba.png" ></a>';}
	else
	{$img_subir = '';}
	if ($bajar == 'yes')
	{$img_bajar = '<a href="index.php?&module=core&section=series&action=orden&id='.$columna["id"].'&newid=down"><IMG SRC="img/flecha-abajo.png" ></a>';}
	else
	{$img_bajar = '';}

	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	echo '<td><a href="index.php?&module=core&section=series&action=delorden&id='.$columna["id"].'&idregla='.$_GET["id"].'" class="btnenlacecancel">Quitar</a></td>
	<td>'.$columna["impuesto"].'</td>';
	

	if($columna["editable"] == '1'){$imgeditable = '<img src="img/yes.png" />';}else{$imgeditable = '<img src="img/no.png" />';}

	echo '<td align="center">'.$imgeditable.'</td>';
	echo '<td>'.$columna["valor"].'</td>
	<td align="center">'.$img_subir.' '.$img_bajar.'</td>
	</tr>';
	
}


?>


</table>
</div>