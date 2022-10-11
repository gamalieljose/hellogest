<p><a class="btnedit" href="index.php?module=core&section=dic&subs=permisos&action=new">Nuevo permiso</a></p>


<form name="form1" action="index.php?module=core&section=dic&subs=permisos" method="POST">
Ordenar por: 
<select name="lstordenar">
<?php
if ($_POST["lstordenar"] == "idmod" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="idmod" '.$seleccionado.'>Modulo</option>';
if ($_POST["lstordenar"] == "display" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="display" '.$seleccionado.'>Permiso</option>';
if ($_POST["lstordenar"] == "idpermiso" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="idpermiso" '.$seleccionado.'>ID Permiso</option>';
	?>
</select>
<input type="submit" value="Ordenar"/>
</form>


<table width="100%">


<tr class="maintitle"><td width="60"> </td>

<td>ID Modulo</td>
<td>Modulo</td>
<td>ID Permiso</td>
<td>Permiso</td>

</tr>
<?php


if ($_POST["lstordenar"] <> '')
{
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."permisos order by ".$_POST["lstordenar"]);
}
else
{
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."permisos");
}
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
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



	echo '<td width="60"><a class="btnedit" href="index.php?module=core&section=dic&subs=permisos&action=edit&id='.$columna["id"].'">editar</a></td>';

	echo '<td>'.$columna["idmod"].'</td>';
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."modulos where idmod = '".$columna["idmod"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbdisplaymodulo = $rowaux["display"];
	
	echo '<td>'.$dbdisplaymodulo.'</td>';
	echo '<td>'.$columna["idpermiso"].'</td>';
	echo '<td>'.$columna["display"].'</td>';
	echo '</tr>';
}





?>
</table>