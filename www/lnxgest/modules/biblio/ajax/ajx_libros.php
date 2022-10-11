<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");


echo '<table width="100%">';
echo '<tr class="maintitle">';
echo '<th width="80"> </th>';
echo '<th>Codigo</th>';
echo '<th>Libro</th>';
echo '<th>En prestamo desde</th>';
echo '</tr>';

$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."biblio_libros where libro like '%".$_POST["elegido"]."%' or codigo like '%".$_POST["elegido"]."%' order by libro");
while($col = mysqli_fetch_array($cnsprov))
{

	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."biblio_prestamos where idlibro = '".$col["id"]."' and fechain = '0000-00-00' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbexistenprestamos = $rowaux["contador"];



	$opt_prestar = '';

	if($dbexistenprestamos > 0)
	{
		if($dbexistenprestamos == 1)
		{
			$sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_prestamos where idlibro = '".$col["id"]."' and fechain = '0000-00-00' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbxiduser = $rowaux["idusuario"];
			$dbfechadesde = $rowaux["fechaout"];

			$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$dbxiduser."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$lbltercerocontacto = $rowaux["nombre"];


			$lbl_prestamo = $dbfechadesde.' por '.$lbltercerocontacto;
		}
		else 
		{
			$lbl_prestamo = 'ERROR prestado sin generar entrega';
		}
		
	}
	else
	{
		$lbl_prestamo = '';
		$opt_prestar = '<input type="radio" name="optlibro" value="'.$col["id"].'" />';
	}



	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	echo '<td align="center">';
		echo $opt_prestar;
	echo '</td>';
	echo '<td>'.$col["codigo"].'</td>';
	echo '<td>'.$col["libro"].'</td>';
	echo '<td>'.$lbl_prestamo.'</td>';
	echo '</tr>';

	
}

echo '</table>';
}
?>