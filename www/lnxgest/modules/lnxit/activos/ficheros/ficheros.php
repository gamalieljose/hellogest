<?php
include("modules/lnxit/activos/tabs.php");
$idactivo = $_GET["id"];
?>




<?php




echo '<form name="form1" action ="index.php?module=ficheros&section=sel" method="POST">';
echo '<input type="submit" class="btnedit_verde" value="Agregar archivo" />';
echo '<input type="hidden" name="url_origen" value="index.php?module=lnxit&section=activos&ss=ficheros&id='.$idactivo.'&tab=3" />';

echo '<input type="hidden" name="archivo_module" value="IT_ACTIVO"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$idactivo.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';
echo '</form>';





echo '<form name="form2" action ="index.php?module=ficheros&section=seledit" method="POST">';

echo '<input type="hidden" name="url_origen" value="index.php?module=lnxit&section=activos&ss=ficheros&id='.$idactivo.'&tab=3" />';

echo '<input type="hidden" name="archivo_module" value="IT_ACTIVO"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$idactivo.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';


?>
<p>Listado ficheros:</p>

<?php


echo '<table width="100%">
<tr class="maintitle"><td width="50"><input type="submit" class="btnedit" value="Editar" /></td>
<td width="18"> </td>
<td>Nombre del archivo</td>
<td> </td>
<td>Descripcion</td>
<td>Notas</td>
<td>Categoria</td>
</tr>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'IT_ACTIVO' and idlinea0 = '".$idactivo."'");
$color = '1';
while($ficheros = mysqli_fetch_array($ConsultaMySql))
{
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."ficheros where id = '".$ficheros["idfichero"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbnombre = $rowaux["nombre"];
	$dbdescripcion = $rowaux["descripcion"];
	
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
	echo '<td align="center"><input type="radio" value="'.$ficheros["id"].'" name="optfichero"></td>';
	if($ficheros["publico"] == '1'){$imagen = '<img src="img/mundo.jpg">';}else{$imagen = '';}
	echo '<td>'.$imagen.'</td>';
	
	echo '<td>'.$dbnombre.'</td>';
	echo '<td width="50"><a class="btnedit_verde" href="modules/ficheros/download.php?id='.$ficheros["idfichero"].'">Download</a></td>';
	echo '<td>'.$dbdescripcion.'</td>';
	echo '<td>'.$ficheros["display"].'</td>';
	
	if($ficheros["idcat"] > '0')
	{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_cat where id = '".$ficheros["idcat"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbcategoria = $rowaux["categoria"];
	}
	else
	{
		$dbcategoria = '';
	}
	
	echo '<td>'.$dbcategoria.'</td>';
	
	echo '</tr>';
}

echo '</table>';
echo '</form>';

?>