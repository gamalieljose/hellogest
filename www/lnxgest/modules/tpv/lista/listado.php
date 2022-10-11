<?php

?>

<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Ticket</td>
	<td>Tienda</td>
	<td>Usuario</td>
	<td>Terminal</td>
	<td>Tercero</td>
	<td>Estado</td>
	<td>Fecha</td>
	<td>Total</td>
	<td>Pendiente</td>
</tr>

<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tpv order by fecha desc");
	while($col = mysqli_fetch_array($ConsultaMySql))
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
		
	$sqlaux = $mysqli->query("select sum(importe) as sumaimporte from ".$prefixsql."tpv_pagos where idtpv = '".$col["id"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbsumaimporte = $rowaux["sumaimporte"];
	
	$sqlaux = $mysqli->query("select sum(importe) as sumalineas from ".$prefixsql."tpv_lineas where idtpv = '".$col["id"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbsumalineas = $rowaux["sumalineas"];
	$sqlaux = $mysqli->query("select sum(importe) as sumalineas from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbsumalineastax = $rowaux["sumalineas"];
	
	$totalticket = $dbsumalineas + $dbsumalineastax;
	$totalticket = round($totalticket, 2);
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbrazonsocial = $rowaux["razonsocial"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$col["iduser"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbdisplay = $rowaux["display"];
	
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$col["idtienda"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tienda = $rowaux["tienda"];
        
	$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$col["idterminal"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbterminal_descripcion = $rowaux["descripcion"];
	
	/* 
	estado 0,1, 2
	0 - Ticket ya cerrado
	1 - Abierto / en uso
	

	*/
	if($col["estado"] == "0"){$lblestado = "Finalizado";}
	if($col["estado"] == "1"){$lblestado = "Abierto / En uso";}
	if($col["estado"] == "2"){$lblestado = "Aparcado";}
	if($col["edittpv"] == "1"){$lblestado = "Modificando";}
        
	$resultado = $totalticket - $dbsumaimporte;
        
        $resultado = round($resultado, 2);
	
	if($col["estado"] == "0" && $resultado == '0')
	{
		// El ticket está cerrado y pagado
	}
	else
	{
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
		echo '<td><a class="btnedit" href="index.php?module=tpv&section=tpv&action=view&id='.$col["id"].'">Editar</a></td>';
		echo '<td>'.$col["codigo"].'</td>';
		echo '<td>'.$lbl_tienda.'</td>';
		echo '<td>'.$dbdisplay.'</td>';
		echo '<td>'.$dbterminal_descripcion.'</td>';
		echo '<td>'.$dbrazonsocial.'</td>';
		echo '<td>'.$lblestado.'</td>';
		echo '<td>'.$col["fecha"].'</td>';
		
		echo '<td align="right">'.$totalticket.'</td>';
		echo '<td align="right">'.$resultado.'</td>';
		
		echo '</tr>';
	}
}
?>

</table>