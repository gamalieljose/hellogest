<?php
$fhaccion = $_POST["haccion"];
$foptfichero = $_POST["optfichero"];
$url_origen = $_POST["url_origen"];


$farchivo_module = $_POST["archivo_module"];
$farchivo_linea0 = $_POST["archivo_linea0"];
$farchivo_linea1 = $_POST["archivo_linea1"];
$farchivo_linea2 = $_POST["archivo_linea2"];
$farchivo_display = $_POST["archivo_display"];
$farchivo_publico = $_POST["archivo_publico"];
$farchivo_cat = $_POST["archivo_cat"];

if($farchivo_cat == ''){$farchivo_cat = '0';}



if ($foptfichero == '')
{
	header( "refresh:2;url=".$url_origen );
	
	echo '<div align="center">';
	echo '<table class="msgaviso">';
	echo '<tr class="maintitle"><td>Error editar fichero adjunto</td></tr>';
	echo '<tr><td>No se ha seleccionado ningun fichero</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
	echo '</table></div>';
}
else
{
	$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where id = '".$foptfichero."'");
	$row = mysqli_fetch_assoc($sqlfichero);
	$dbidfichero = $row["idfichero"];
	$dbdisplay = $row["display"];
	$dbpublico = $row["publico"];
	$dbidcat = $row["idcat"];
	
	$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfichero."'");
	$row = mysqli_fetch_assoc($sqlfichero);
	$dbnombre = $row["nombre"];
	$dbdescripcion = $row["descripcion"];
	$dbfsubido = $row["fsubido"];
	
	echo '<form name="form3" action ="index.php?module=ficheros&section=selsave" method="POST">';
	echo '<input type="hidden" name="haccion" value="seledita"/>';

	echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
	echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
	echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
	echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
	echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
	echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
	echo '<input type="hidden" name="archivo_publico" value="'.$farchivo_publico.'"/>';
	echo '<input type="hidden" name="archivo_cat" value="'.$farchivo_cat.'"/>';
	
	echo '<input type="hidden" name="hidfichero" value="'.$foptfichero.'"/>';
	
	?>
<div class="row">
<div class="col-sm-2">
	Nombre fichero
</div>
<div class="col">
<?php echo $dbnombre; ?>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Descripcion
</div>
<div class="col">
<?php echo $dbdescripcion; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Subido
</div>
<div class="col">
<?php echo $dbfsubido; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Nota
</div>
<div class="col">
<input type="text" required="" value="<?php echo $dbdisplay; ?>" name="txtnota" style="width: 100%;"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Privacidad
</div>
<div class="col">
<?php 
echo '<select name="lstpublico" style="width: 100%;">';
if($dbpublico == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Privado</option>';
if($dbpublico == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="1" '.$seleccionado.'>Publico</option>';

echo '</select>';

?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Categoria
</div>
<div class="col">
<?php
echo '<select name="lstcat" style="width: 100%">';
	
if($dbidcat == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.' >Sin categoria</option>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
while($colcat = mysqli_fetch_array($ConsultaMySql))
{
	if($colcat["id"] == $dbidcat){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$colcat["id"].'" '.$seleccionado.'>'.$colcat["categoria"].'</option>';
}


echo '</select>';
?>
</div>
</div>


<div align="center" class="rectangulobtnsguardar" >

	<button type="submit" class="btnsubmit" >
		<i class="hidephonview fa fa-check-circle fa-lg"></i> Guardar
	</button>

	<a class="btncancel" href="<?php echo $url_origen; ?>"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
	 

</div>
</form>


<?php

echo '<div align="center">';
	
		echo '<form name="form4" action ="index.php?module=ficheros&section=selborra" method="POST">';
		
		echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
	echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
	echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
	echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
	echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
	echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
	
	echo '<input type="hidden" name="hidfichero" value="'.$foptfichero.'"/>';
		
		
		
		echo '<p><input type="submit" class="btncancel" value="Eliminar archivo" /></p>
	
	
	</form></div>';

}

?>