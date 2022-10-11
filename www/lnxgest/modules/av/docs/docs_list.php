<?php
$idfv = $_GET["id"];
if($LNXERP_bloqueado == "NO")
{
echo '<form name="form1" action ="index.php?module=ficheros&section=sel" method="POST">';
echo '<input type="submit" class="btnedit_verde" value="Agregar archivo" />';
echo '<input type="hidden" name="url_origen" value="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'" />';

echo '<input type="hidden" name="archivo_module" value="'.$lnxinvoice.'"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$idfv.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';
echo '</form>';





echo '<form name="form2" action ="index.php?module=ficheros&section=seledit" method="POST">';

echo '<input type="hidden" name="url_origen" value="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'" />';

echo '<input type="hidden" name="archivo_module" value="'.$lnxinvoice.'"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$idfv.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';
}

?>
<p>Listado ficheros:</p>

<?php


echo '<table width="100%">
<tr class="maintitle"><td width="50">';
if($LNXERP_bloqueado == "NO")
{
echo '<input type="submit" class="btnedit" value="Editar" />';
}
echo '</td>
<td width="18"> </td>
<td>Nombre del archivo</td>
<td> </td>
<td>Descripcion</td>
<td>Notas</td>
<td>Categoria</td>
</tr>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = '".$lnxinvoice."' and idlinea0 = '".$idfv."'");
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
	echo '<td align="center">';
	if($LNXERP_bloqueado == "NO")
	{
	echo '<input type="radio" value="'.$ficheros["id"].'" name="optfichero">';
	}
	echo '</td>';
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