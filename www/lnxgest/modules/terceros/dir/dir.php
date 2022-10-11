<?php

include("modules/terceros/botones.php");

$idtercero = $_GET["idtercero"];

echo '<p><a class="btnedit" href="index.php?module=terceros&section=dir&action=new&idtercero='.$idtercero.'">Nueva Direccion</a> </p>';

	echo '<table width="100%">
	<tr class="maintitle">
	<td>acciones</td>
	<td>Ref</td>
	<td>Direccion</td>
	<td>CP</td>
	<td>Poblacion</td>
	<td>Provincia</td>
	<td>Pais</td>
	<td>Tel</td>
	<td></td></tr>';
	$sqlcontactos= $mysqli->query("SELECT * from ".$prefixsql."tercerosdir where idtercero = '".$idtercero."'");

	while($col = mysqli_fetch_array($sqlcontactos))
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
		
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises where id = '".$col["idpais"]."'");
		$rowaux = mysqli_fetch_assoc($ConsultaMySql);
		$dbpais = $rowaux['pais'];
		
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$col["idprov"]."'");
		$rowaux = mysqli_fetch_assoc($ConsultaMySql);
		$dbprov = $rowaux['provincia'];
		
		echo '<td width="60"><a class="btnedit" href="index.php?module=terceros&section=dir&action=edit&idtercero='.$idtercero.'&iddir='.$col["id"].'">Editar</a></td>
		<td>'.$col["referencia"].'</td> 
		<td>'.$col["dir"].'</td>
		<td>'.$col["cp"].'</td>
		<td>'.$col["pobla"].'</td>
		<td>'.$dbprov.'</td>
		<td>'.$dbpais.'</td>
		<td><a href="tel:'.$col["tel"].'" >'.$col["tel"].'</a></td>';
		
		echo '<td width="60"><a class="btncancel" href="index.php?module=terceros&section=dir&action=del&idtercero='.$idtercero.'&iddir='.$col["id"].'">Borrar</a></td>';
	echo '</tr>';
	 
	}
	echo '</table>';




?>

