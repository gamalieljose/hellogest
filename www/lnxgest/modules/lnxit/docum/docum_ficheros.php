<?php
$iddocum = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."it_docum where id = '".$iddocum."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtercero = $rowaux["idtercero"];
$dbiduser = $rowaux["iduser"];
$dbtitulo = $rowaux["titulo"];
$dbfcreado = $rowaux["fcreado"];
$dbfmodificado = $rowaux["fmodificado"];
$dbiditcat = $rowaux["iditcat"];

$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$dbidtercero."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select id, display from ".$prefixsql."users where id = '".$dbiduser."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_usuario = $rowaux["display"];

$sqlaux = $mysqli->query("select id, categoria from ".$prefixsql."it_categorias where id = '".$dbiditcat."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_categoria = $rowaux["categoria"];

$sqlaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocum."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_contadorficheros = $rowaux["contador"];
?>

<div class="grupotabs">
<?php 
if ($_GET["action"] == "view"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=docum&action=view&id='.$iddocum.'">Documentación</a> ';

if ($_GET["action"] == "ficheros"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=docum&action=ficheros&id='.$iddocum.'">Ficheros ['.$lbl_contadorficheros.']</a> ';


?>
</div>

<div class="row campoencoger">
    <div class="col-sm-2" align="left">
        Creado
    </div>
    <div class="col" align="left">
        <?php echo $dbfcreado; ?>
    </div>
    <div class="col-sm-2" align="left">
	Modificado
    </div>
    <div class="col" align="left">
        <?php echo $dbfmodificado; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
    <?php echo $lbl_tercero; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Categoría
    </div>
    <div class="col" align="left">
    <?php echo $lbl_categoria; ?>
    </div>
</div>
<div class="row maintitle">
    <div class="col" align="left">
        <?php echo $iddocum.' - '.$dbtitulo; ?>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">
    <a href="index.php?module=lnxit&section=docum" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Documentación</a>
</div>

<?php

$iddocumentacion = $_GET["id"];
echo '<form name="form1" action ="index.php?module=ficheros&section=sel" method="POST">';
echo '<input type="submit" class="btnedit_verde" value="Agregar archivo" />';
echo '<input type="hidden" name="url_origen" value="index.php?module=lnxit&section=docum&action=ficheros&id='.$iddocumentacion.'" />';

echo '<input type="hidden" name="archivo_module" value="lnxit_docum"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$iddocumentacion.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';
echo '</form>';





echo '<form name="form2" action ="index.php?module=ficheros&section=seledit" method="POST">';

echo '<input type="hidden" name="url_origen" value="index.php?module=lnxit&section=docum&action=ficheros&id='.$iddocumentacion.'" />';

echo '<input type="hidden" name="archivo_module" value="lnxit_docum"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$iddocumentacion.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="0"/>';
echo '<input type="hidden" name="archivo_linea2" value="0"/>';


?>
<p>Listado ficheros:</p>

<?php


echo '<table width="100%">
<tr class="maintitle">
<td width="18">ID</td>
<td width="50"><input type="submit" class="btnedit" value="Editar" /></td>
<td width="18"> </td>
<td>Nombre del archivo</td>
<td> </td>
<td>Descripcion</td>
<td>Notas</td>
<td>Categoria</td>
</tr>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocumentacion."'");
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
	echo '<td>'.$ficheros["idfichero"].'</td>';
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