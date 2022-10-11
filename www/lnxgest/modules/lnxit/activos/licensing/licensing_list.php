<?php
include("modules/lnxit/activos/tabs.php");



$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$_GET["id"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbtratarcomo = $rowaux["tratarcomo"];


echo '<p><a href="index.php?module=lnxit&section=activos&ss=licensing&action=new&id='.$_GET["id"].'" class="btnedit">Agregar licencia</a></p>';
?>

<table width="100%">
<tr class="maintitle">
<th width="60"></th>
<th>Producto</th>
<th>Licencia</th>
<th>Fecha</th>
<?php
if($dbtratarcomo == '1')
{
	echo '<th align="center" width="80" >Cantidad</th>';
	echo '<th align="center" width="80" > </th>';
}
?>
<th width="60"> </th>
</tr>


<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_licensing where idactivo = '".$_GET["id"]."'";
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
	
	echo '<td>';
	if($dbtratarcomo == '0' && $col["idlic"] == '0')
	{
	
	}
	else 
	{
		
		//busca si existe el idlic
		echo '<a href="index.php?module=lnxit&section=activos&ss=licensing&action=edit&id='.$_GET["id"].'&idlicencia='.$col["id"].'" class="btnedit">Editar</a>';
	}
	echo '</td>';
	
	
	echo '<td>'.$col["producto"].'</td>';
	echo '<td>'.$col["licencia"].'</td>';
	echo '<td>'.$col["fecha"].'</td>';

	
	if($dbtratarcomo == '1')
	{

		$sqlaux = $mysqli->query("select sum(cantidad) as cantidad from ".$prefixsql."it_licensing where idlic = '".$col["id"]."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dblicusadas = $rowaux["cantidad"];
		if($dblicusadas == ''){$dblicusadas = '0';}

		echo '<td align="center">'.$dblicusadas.'/'.$col["cantidad"].'</td>';

		
		echo '<td>';
		if ($col["idinfopass"] > 0){echo '<a href="index.php?module=lnxit&section=infopass&action=edit&id='.$col["idinfopass"].'" class="btnedit">Infopass</a>';}
		echo '</td>';
	}
	

	echo '<td><a href="index.php?module=lnxit&section=activos&ss=licensing&action=del&id='.$_GET["id"].'&idlicencia='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';
	
	echo '</tr>';
}
?>

</table>