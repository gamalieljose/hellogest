<?php

?>

<p>
<a href="index.php?module=core&section=empresas&action=new" class="btnedit">Nueva empresa</a>
</p>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="10"></td>
	<td>Empresa</td>
	<td>NIF</td>
	<td>Nombre comercial</td>
</tr>

<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
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

echo '<td><a href="index.php?module=core&section=empresas&action=edit&id='.$col["id"].'" class="btnedit">'.LABEL_BTN_EDIT.'</a></td>';

if($col["activo"] == '0'){$imagen = 'img/no.png';}
if($col["activo"] == '1'){$imagen = 'img/yes.png';}


echo '<td><img src="'.$imagen.'" /></td>';
echo '<td>'.$col["razonsocial"].'</td>';
echo '<td>'.$col["nif"].'</td>';
echo '<td>'.$col["nomcomercial"].'</td>';
echo '</tr>';

}

?>



</table>