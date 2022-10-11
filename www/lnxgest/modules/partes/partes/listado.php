<?php

?>

<p>
<a href="index.php?module=partes&section=partes&action=new" class="btnedit">Nuevo parte</a> 
<a href="index.php?module=partes&section=partes&action=sync" class="btnedit">SINCRONIZAR</a>

</p>

<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td width="100">Num Parte</td>
<td width="50">Ticket</td>
<td>Tercero</td>
<td width="150">Fecha</td>
<td width="80">Salida</td>
<td>Remoto</td>
<td colspan="3">Firmado</td>
</tr>


<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."partes order by id desc");
	$color = '1';
	while($parte = mysqli_fetch_array($ConsultaMySql))
	{

$xfecha = explode(" ", $parte["fechain"]);
$x1fecha = explode("-", $xfecha[0]);
$lbl_fecha = $x1fecha[2]."/".$x1fecha[1]."/".$x1fecha[0];

$xfechaout = explode(" ", $parte["fechaout"]);
$x1fechaout = explode(":", $xfechaout[1]);
$lbl_horaout = $x1fechaout[0].":".$x1fechaout[1]; 

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
		echo '<td width="80"><a class="btnedit" href="index.php?module=partes&section=partes&action=editactions&id='.$parte["id"].'">Editar</a></td>
		<td>'.$parte["codigo"].'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$parte["idtercero"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $rowaux["razonsocial"];
		
		$xtemp = explode(":", $xfecha[1]);
			$lbl_horain = $xtemp[0].":".$xtemp[1];

		
		echo '<td>'.$parte["idticket"].'</td>';
		echo '<td>'.$dbrazonsocial.'</td>';
		echo '<td>'.$lbl_fecha.' '.$lbl_horain.'</td>
		<td>'.$lbl_horaout.'</td>
		<td>'.$parte["remoto"].'</td>
		<td>'.$parte["nomfirma"].'</td>
		<td>'.$parte["mailfirma"].'</td>';
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'partes' and idlinea0 = '".$parte["id"]."' ");
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$idficheroparte = $rowaux["idfichero"];
			$existe = $sqlaux->num_rows;
			
			if($existe > 0)
			{
				$imgpdf = '<img src="img/extensions/pdf.png" >';
			}
			else
			{
				$imgpdf = "";
			}
		
		
		echo '<td width="34">'.$imgpdf.'</td>';
		echo '<tr>';
		
	}
?>



</table>

</div>
