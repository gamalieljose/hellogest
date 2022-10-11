<p>Listado partes de trabajo</p>

<table width="100%">
<tr class="maintitle">
<td width="30"> </td>
<td>Num Parte</td>
<td>Cliente</td>
<td>Fecha</td>
<td>Entrada</td>
<td>Salida</td>
<td>importe</td>
<td width="50">Pagado</td>
<td width="50">finalizado</td>
<td>email</td>
<td>firmanombre</td>

<tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."partes");
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
		echo '<td width="30"><a class="btnedit" href="index.php?module=partes&action=edit&id='.$parte["id"].'">Ver</a></td>
		<td>'.$parte["codigo"].'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$parte["idtercero"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $rowaux["razonsocial"];
		
		echo '<td>'.$dbrazonsocial.'</td>';
		echo '<td>'.$parte["fecha"].'</td>
		<td>'.$parte["horain"].'</td>
		<td>'.$parte["horaout"].'</td>
		<td>'.$parte["importe"].'</td>';
		
		if($parte["pagado"] == '1')
		{$imagen = "img/yes.png";}else{$imagen = "img/no.png";}
		echo '<td align="center"><img src="'.$imagen.'"></td>';
		
		if($parte["finalizado"] == '1')
		{$imagen = "img/yes.png";}else{$imagen = "img/no.png";}
		echo '<td align="center"><img src="'.$imagen.'"></td>';
		
		echo '<td>'.$parte["email"].'</td>
		<td>'.$parte["firmanombre"].'</td>
		<tr>';
		
	}
?>


</table>