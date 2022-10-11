<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."modulos where directorio = '".$lnxinvoice."' limit 1"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idmodulo = $rowaux["idmod"];
$iddocumento = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$iddocserie = $rowaux["idserie"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$iddocserie."'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$serieidempresa = $rowaux["idempresa"];

?>


<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Descripcion</th>
</tr>
<?php
$idmodulo = "4000";
$codinforme = "LNXIT";


$cnssql= $mysqli->query("select * from ".$prefixsql."docprint where codinforme = '".$codinforme."' and idmod = '".$idmodulo."' ");	
while($col = mysqli_fetch_array($cnssql))
{
    
    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
		

    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=lnxit&section=print&action=preprint&idpreproceso='.$col["id"].'" class="btnedit">Listado</a></td>';
    echo '<td>'.$col["descripcion"].'</td>';
    echo '</tr>';
}
?>
</table>


