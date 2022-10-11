<?php

?>
<div class="row">
  <div class="col maintitle" align="left">
    Seguimiento
  </div>
</div>

<table width="100%">
<tr class="maintitle">
	<td width="40"> </td>
	<td width="150">Fecha</td>
	<td width="80">Tiempo</td>
	<td width="16"> </td>
	<td width="100"d>Usuario</td>
	<td>Seguimiento</td>
	<td> </td>
</tr>
<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."it_seguimiento where idticket = '".$_GET["id"]."' order by fecha desc");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	
	
	$cnsusuario= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$columna["iduser"]."' ");
	$row = mysqli_fetch_assoc($cnsusuario);
	$displayuser = $row['display'];
	
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
	echo '<td valign="top"><a class="btnedit" href="index.php?module=lnxit&section=seguimiento&action=edit&id='.$_GET["id"].'&idseguimiento='.$columna["id"].'">Editar</a></td>
		<td valign="top">'.$columna["fecha"].'</td>
		<td valign="top">'.$columna["tiempo"].'</td>';
	echo '<td>';
		
		
		if ($columna["computa"] == '1')
		{
			echo '<img src="img/maintenance.png" title="computa para mantenimiento" alt="computa para mantenimiento" height="16" width="16" />';
		}
	echo '</td>';	
		
		
		
		echo '<td valign="top">'.$displayuser.'</td>
		<td>'.$columna["seguimiento"].'</td>
		<td align="right" valign="top"><a class="btnenlacecancel" href="index.php?module=lnxit&section=seguimiento&action=del&id='.$_GET["id"].'&idseguimiento='.$columna["id"].'">Borrar</a></td>
	</tr>';

}
?>

</table>

<p>&nbsp;</p>
<p>&nbsp;</p>