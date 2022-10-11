<?php
include("modules/lnxit/activos/tabs.php");

$idactivo = $_GET["id"];
?>

<p><?php echo '<a href="index.php?module=lnxit&section=activos&ss=proveedores&action=new&id='.$idactivo.'" class="btnedit">Nuevo proveedor</a>'; ?></p>
<div class="row">
  <div class="col maintitle" align="left">
    Proveedores
  </div>
</div>

<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Proveedor</td>
	<td>Notas</td>
	<td width="80"> </td>
</tr>
<?php
$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_pro where idactivo = '".$idactivo."' ");
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

	$ConsultaMySql= $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbrazonsocial = $row["razonsocial"];
	
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=proveedores&action=edit&id='.$col["id"].'" class="btnedit" >Editar</a></td>';
	echo '<td>'.$dbrazonsocial.'</td>';
	echo '<td>'.$col["notas"].'</td>';
	echo '<td align="right"><a href="index.php?module=lnxit&section=activos&ss=proveedores&action=del&id='.$col["id"].'" class="btnenlacecancel" >Borrar</a></td>';
	echo '</tr>';
	
}


?>

</table>