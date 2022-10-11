<?php
include("modules/lnxit/activos/tabs.php");


echo '<p><a href="index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'" class="btnedit">Agregar caracteristica</a></p>';

$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);

$dbplantilla = $row["plantilla"];

$lbl_caracteristica = "Caracteristica";
$lbl_valor1 = "Valor 1";
$lbl_valor2 = "Valor 2";
$lbl_valor3 = "Valor 3";
$lbl_valor4 = "Valor 4";


if ($dbplantilla <> '')
{
	include('modules/lnxit/activos/plantillas/'.$dbplantilla);
}


if($_GET["sc"] <> '')
{
	echo '<p>mostrando registros para '.$_GET["sc"].' - <a class="btnedit" href="index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'">Mostrar todo</a></p>';
}
else
{
	echo '<p>mostrando todas las caracterisiticas</p>';
}

?>

<table width="100%">
<tr class="maintitle">
<td width="60"></td>
<td width="20"></td>
<td><?php echo $lbl_caracteristica; ?></td>
<td><?php echo $lbl_valor1; ?></td>
<td><?php echo $lbl_valor2; ?></td>
<td><?php echo $lbl_valor3; ?></td>
<td><?php echo $lbl_valor4; ?></td>
<td width="60"> </td>
</tr>


<?php

if($_GET["sc"] <> '')
{
	$cnssql = "SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = '".$_GET["sc"]."'";
}
else
{
	$cnssql = "SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."'";
}


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
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=caracteristicas&action=edit&id='.$_GET["id"].'&idcaracter='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td bgcolor="'.$col["color"].'">&nbsp;</td>';
	echo '<td>'.$col["opcion"].'</td>';
	echo '<td>'.$col["valor"].'</td>';
	echo '<td>'.$col["valor2"].'</td>';
	echo '<td>'.$col["valor3"].'</td>';
	echo '<td>'.$col["valor4"].'</td>';
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=caracteristicas&action=del&id='.$_GET["id"].'&idcaracter='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';
	
	echo '</tr>';
}
?>

</table>