<?php
include("modules/lnxit/activos/tabs.php");

$idactivo = $_GET["id"];

echo '<p><a href="index.php?module=lnxit&section=activos&ss=vinculos&id='.$idactivo.'&tab=3&action=new" class="btnedit">Vincular activo</a></p>';
?>
<table width="100%">
<tr class="maintitle">
	<th width="80"> </th>
	<th>ID</th>
	<th>Codigo</th>
	<th>Activo vinculado</th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."ita_activos_vinc where idactivo = '".$idactivo."'");	
while($col = mysqli_fetch_array($cnssql))
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

	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$col["idvinculado"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_codigo = $rowaux["codigo"];
	$lbl_nombre = $rowaux["nombre"];

	
	
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=vinculos&id='.$idactivo.'&tab=3&action=del&del='.$idactivo.'-'.$col["idvinculado"].'" class="btnenlacecancel">Quitar</a></td>';
	echo '<td>'.$col["idvinculado"].'</td>';
	echo '<td>'.$lbl_codigo.'</td>';
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["idvinculado"].'" >'.$lbl_nombre.'</a></td>';
echo '</tr>';
}

?>
</table>