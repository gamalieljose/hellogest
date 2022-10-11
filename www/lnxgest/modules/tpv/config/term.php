<?php

?>
<div class="grupotabs">
    <div class="campoencoger">
<?php
$claseboton = "btn_tab_sel";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgterm">Terminales</a> ';

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgcg">Campos personalizados globales</a> ';

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgia">Impresiones adicionales</a> ';

?>
    </div>
</div>
        
        
<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Terminal</td>
	<td>Tienda</td>
	<td>Empresa</td>
    <td>Serie Ventas</td>
    <td>Serie Compras</td>
    <td>Impresora Tickets</td>
</tr>

<?php

$sqlterminales = $mysqli->query("select * from ".$prefixsql."pos_terminales order by descripcion");
while($col = mysqli_fetch_array($sqlterminales))
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

$sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$col["idtienda"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$idempresa = $rowaux["idempresa"];
$dbtienda = $rowaux["tienda"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$empresa_razonsocial =  $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg where idterminal = '".$col["id"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$xtiposerie = $rowaux["tiposerie"];
$xidserie = $rowaux["idserie"];
$xidseriec = $rowaux["idseriec"];
$idimpresora = $rowaux["idprinter"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$xidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbserie = $rowaux["serie"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$xidseriec."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbseriec = $rowaux["serie"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$idimpresora."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_impresora = $rowaux["nombre"];



echo '<td width="80"><a href="index.php?module=tpv&section=cfgterm&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>'; 
echo '<td>'.$col["descripcion"].'</td>'; 
echo '<td>'.$dbtienda.'</td>';
echo '<td>'.$empresa_razonsocial.'</td>';
echo '<td>'.$dbserie.'</td>';
echo '<td>'.$dbseriec.'</td>';
echo '<td>'.$lbl_impresora.'</td>';
echo '</tr>';

}
?>



</table>
