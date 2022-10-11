<?php

?>

<p><a href="index.php?module=lnxit&section=mant&action=new" class="btnedit">Nuevo contrato</a></p>


<table width="100%">
<tr class="maintitle">
<td width="60">Editar</td>
<td>id</td>
<td>Ref</td>
<td>Tercero</td>
<td>Tipo</td>
<td>Inicio</td>
<td>Fin</td>
<td>Horas Contratadas</td>
<td>Horas restantes</td>
<td>descripcion</td>
<td>activo</td>
</tr>


<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_mant order by id desc";
$ConsultaMySql= $mysqli->query($cnssql);

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
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a href="index.php?module=lnxit&section=mant&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td>'.$col["id"].'</td>';
	echo '<td>'.$col["ref"].'</td>';
	
	
	$cnsaux= $mysqli->query("SELECT id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbrazonsocial = $rowaux['razonsocial'];
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."it_tipomant where id = '".$col["idtipo"]."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbtipomantenimiento = $rowaux['tipomant'];
	
	
	
	echo '<td>'.$dbrazonsocial.'</td>';
	echo '<td>'.$dbtipomantenimiento.'</td>';
	echo '<td>'.$col["finicio"].'</td>';
	echo '<td>'.$col["ffin"].'</td>';
	echo '<td>'.$col["hcontratado"].'</td>';
	echo '<td>'.$col["hrestantes"].'</td>';
	echo '<td>'.$col["descripcion"].'</td>';
	
	
	
	
	if ($col["activo"] == '0'){$coloractivo = "#FF0000";}else{$coloractivo = "#31B404";}
	
	echo '<td bgcolor='.$coloractivo.'>&nbsp;</td>';
	
	echo '</tr>';
	
}
?>

</table>