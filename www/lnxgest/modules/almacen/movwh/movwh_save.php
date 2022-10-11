<?php
$fechainicio = $_POST["txtfecha"];
$fechafin = $_POST["txtfechafin"];
$ftxtresumen = $_POST["txtresumen"];
$tchkalmacen = $_POST["chkalmacen"];


$fano = substr($fechainicio, 6, 4);  
$fmes = substr($fechainicio, 3, 2);  
$fdia = substr($fechainicio, 0, 2);  

$cfechainicio = $fano.'-'.$fmes.'-'.$fdia;

$fano = substr($fechafin, 6, 4);  
$fmes = substr($fechafin, 3, 2);  
$fdia = substr($fechafin, 0, 2);  

$cfechafin = $fano.'-'.$fmes.'-'.$fdia;

?>
<p><a href="index.php?module=almacen&section=movwh" class="btnedit">Nueva consulta</a></p>
<div align="center">
<table class="msgaviso">
<tr>
<td align="center">Desde: <b><?php echo $fechainicio; ?></b> Hasta: <b><?php echo $fechafin; ?></b></td>
</tr>
<tr>
<td align="center">Movimiento: <?php echo $ftxtresumen; ?> </td>
</tr>
</table>
</div>
<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td>ID</td>
	<td>Movimiento</td>
	<td>Producto</td>
	<td>Unidades</td>
	<td>fecha</td>
	<td>Documento</td>
</tr>
<?php
$ssql = "SELECT * from ".$prefixsql."wh_mov where movimiento like '%".$ftxtresumen."%' and (fecha >= '".$cfechainicio."' and fecha <= '".$cfechafin."')";
$ConsultaMySql= $mysqli->query($ssql);

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	
	
	echo '<tr class="maintitle">';
	
	echo '<td>'.$columna["id"].'</td>';
	echo '<td colspan="3">'.$columna["movimiento"].'</td>';
	echo '<td>'.$columna["fecha"].'</td>';
	
	if($columna["modulo"] == "ac" || $columna["modulo"] == "av" || $columna["modulo"] == "fc" || $columna["modulo"] == "fv")
	{
		$documento = '<a href="index.php?module='.$columna["modulo"].'&section=main&action=view&id='.$columna["iddocumento"].'" class="btnedit">Documento</a>';
	}
	else
	{
		$documento = '';
	}
	
	echo '<td>'.$documento.'</td>';
	echo '</tr>';
	
	$cnsaux = $mysqli->query("select * from ".$prefixsql."wh_lineas where idwhmov = '".$columna["id"]."'");

	while($colaux = mysqli_fetch_array($cnsaux))
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
		
		if($colaux["movimiento"] == 'IN'){$smovimiento = "Entrada";}
		if($colaux["movimiento"] == 'OLD_REGULA'){$smovimiento = "Antes de regularizar";}
		if($colaux["movimiento"] == 'REGULARIZA'){$smovimiento = "Regularización de stock";}
		
		echo '<td>'.$smovimiento.'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$colaux["idproducto"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbproducto = $rowaux["concepto"];
		
		echo '<td>'.$dbproducto.'</td>';
		echo '<td>'.$colaux["unid"].'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."almacenes where id = '".$colaux["idalmacen"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbalmacen = $rowaux["almacen"];
		
		echo '<td>'.$dbalmacen.'</td>';
		echo '<td>&nbsp;</td>';
		echo '</tr>';
	}
	
	
	
}
?>


</table>