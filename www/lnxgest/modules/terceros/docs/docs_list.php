<?php
$lnx_modulo = "terceros";
$idregistro = $_GET["idtercero"];

$url_origen = "index.php?module=terceros&section=docs&idtercero=".$idregistro;

$ftxtfilestext = addslashes($_POST["txtfilestext"]);

?>
<div class="row">
	<div class="col-sm-2">

		<?php
		echo '<form name="form1" action ="index.php?module=ficheros&section=sel" method="POST">';
		echo '<input type="submit" class="btnedit_verde" value="Agregar archivo" />';
		echo '<input type="hidden" name="url_origen" value="index.php?module=terceros&section=docs&idtercero='.$idregistro.'" />';

		echo '<input type="hidden" name="archivo_module" value="'.$lnx_modulo.'"/>';
		echo '<input type="hidden" name="archivo_linea0" value="'.$idregistro.'"/>';
		echo '<input type="hidden" name="archivo_linea1" value="0"/>';
		echo '<input type="hidden" name="archivo_linea2" value="0"/>';

		echo '</form>';
		?>

	</div>
	<div class="col" align="right">
<form name="frmbuscatextofiles" method="POST" action="<?php echo $url_origen; ?>">
		<input name="txtfilestext" value="<?php echo $_POST["txtfilestext"]; ?>" type="text" placeholder="Buscar dentro de los archivos" style="width: Calc(100% - 100px);"/>
		<input type="submit" class="btnedit_verde" value="Buscar" />

</form>
	</div>
</div>

<?php
echo '<form name="form2" action ="index.php?module=ficheros&section=seledit" method="POST">';

echo '<input type="hidden" name="url_origen" value="index.php?module=terceros&section=docs&idtercero='.$idregistro.'" />';

echo '<input type="hidden" name="archivo_module" value="'.$lnx_modulo.'"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$idregistro.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';


?>


<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = '".$lnx_modulo."' and idlinea0 = '".$idregistro."'");

$cuentaficheros = $ConsultaMySql->num_rows;

echo '<table width="100%">
<tr class="maintitle"><td width="50">';

if($cuentaficheros > '0')
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

// $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = '".$lnx_modulo."' and idlinea0 = '".$idregistro."'");

while($ficheros = mysqli_fetch_array($ConsultaMySql))
{
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."ficheros where id = '".$ficheros["idfichero"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbnombre = $rowaux["nombre"];
	$dbdescripcion = $rowaux["descripcion"];
	$fchr_extension = $rowaux["extension"];
	
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."ficheros_keyword where idfichero = '".$ficheros["idfichero"]."' and palabrasclave like '%".$ftxtfilestext."%'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$fencontrado = $rowaux["contador"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_ext where extension = '".$fchr_extension."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$icono = $rowaux["icono"];
		$lbltituloicono = $rowaux["display"];
		

		if($icono != '')
		{
			$imgicono = '<img src="img/extensions/'.$icono.'" alt="'.$lbltituloicono.'" title="'.$lbltituloicono.'" />';
		}
		else 
		{
			$imgicono = $fchr_extension." -";
		}



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
	
	if($fencontrado > 0 && strlen($ftxtfilestext) > 0)
	{
		$pintacolor = "lstcolorficherofound";
	}
	
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td align="center"><input type="radio" value="'.$ficheros["id"].'" name="optfichero"></td>';
	if($ficheros["publico"] == '1'){$imagen = '<img src="img/mundo.jpg">';}else{$imagen = '';}
	echo '<td>'.$imagen.'</td>';
	
	echo '<td>'.$imgicono.' '.$dbnombre.'</td>';
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
