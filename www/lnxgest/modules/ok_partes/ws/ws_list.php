<link rel="StyleSheet" href="../modules/partes/ws/movil.css" media="all" type="text/css">

<?php

?>

<p>
 <a href="index.php?module=partes" class="btnprincipal">Atras</a>
Mostrar partes de: 
<select name="lstusuarios">
<option value="0">Todos</option>
<option value="1">Pedro Aguilar</option>
</select>

Plantilla usada: 
<select name="lstusuarios">
<option value="0">Todos</option>
<option value="1">LNXGEST</option>
<option value="2">Zetra</option>
</select>

<input type="submit" value="Buscar" class="btnenviar">
</P>




<table width="100%">
<tr class="maintitle">
	<td width="30"> </td>
	<td>Num Parte</td>
	<td>Cliente</td>
	<td>Fecha</td>
	<td>importe</td>
	<td>PDF</td>
<tr>

<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."partes order by id desc");
	$color = '1';
	while($parte = mysqli_fetch_array($ConsultaMySql))
	{
		if ($color == '1')
		{
			$color = '2';
			$pintacolor = 'listacolor2';
		}
		else
		{
			$color = '1';
			$pintacolor = 'listacolor1';
		}
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		
		echo '<td width="30"><a class="btnedit" href="#'.$parte["id"].'">Ver</a></td>
		<td>'.$parte["codigo"].'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$parte["idtercero"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $rowaux["razonsocial"];
		
		echo '<td>'.$dbrazonsocial.'</td>';
		echo '<td>'.$parte["fecha"].'</td>
		<td>'.$parte["importe"].'</td>';
		
				
		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'partes' and idlinea0 = '".$parte["id"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$ficheroidfichero = $rowaux["idfichero"];
		
		echo '<td><a href="../modules/ficheros/download.php?id='.$ficheroidfichero.'" class="btnedit"/>PDF</a></td>';
	}
?>
</table>