<?php

?>

<p><a href="index.php?module=core&section=docprint&action=new" class="btnedit">Nuevo informe</a> </p>

<div style="display: block; overflow-x: auto;">
    
<table width="100%">
    <tr class="maintitle">
    <th width="80"> </th>
	<th>ID</th>
    <th>Modulo</th>
    <th>Cod. informe</th>
    <th>Descripcion</th>
    <th>Plantilla</th>
	<th>Procesador</th>
	<th>FODT</th>
    <th>Empresa</th>
    <th>Habilitado</th>
</tr>
<?php



$cnssql= $mysqli->query("select * from ".$prefixsql."docprint order by id");	
while($col = mysqli_fetch_array($cnssql))
{

	$sqlaux = $mysqli->query("select * from ".$prefixsql."modulos where idmod = '".$col["idmod"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_modulo = $rowaux["display"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_empresa = $rowaux["razonsocial"];

    
	
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

	echo '<td><a href="index.php?module=core&section=docprint&action=edit&id='.$col["id"].'" class="btnedit">Editar</a> </td>';
	echo '<td>'.$col["id"].'</td>';
	echo '<td>'.$lbl_modulo.'</td>';
	echo '<td>'.$col["codinforme"].'</td>';
	echo '<td>'.$col["descripcion"].'</td>';
	echo '<td>'.$col["idfileplantilla"].'</td>';
	echo '<td>'.$col["idfileprocesador"].'</td>';
	echo '<td>'.$col["idfilefodt"].'</td>';
	echo '<td>'.$lbl_empresa.'</td>';
	echo '<td>'.$col["habilitado"].'</td>';
	echo '</tr>';
    
}




?>


</table>
    
</div>