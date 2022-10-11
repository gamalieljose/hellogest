<?php
$iddocprint = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$iddocprint."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidmod = $rowaux["idmod"];
$dbcodinforme = $rowaux["codinforme"];
$dbdescripcion = $rowaux["descripcion"];
$dbidempresa = $rowaux["idempresa"];
$dbhabilitado = $rowaux["habilitado"];

$dbidfileplantilla = $rowaux["idfileplantilla"];
$dbidfileprocesador = $rowaux["idfileprocesador"];
$dbidfilefodt = $rowaux["idfilefodt"];




echo '<p><a href="index.php?module=core&section=docprint&action=del&id='.$iddocprint.'" class="btnenlacecancel"/>Eliminar</a></p>';
?>
<form name="frmdocprint" method="POST" enctype="multipart/form-data" action="index.php?module=core&section=docprint&action=save" >
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hiddocprint" value="<?php echo $iddocprint; ?>" />

<div class="row">
<div class="col maintitle">
	Editando Documento de impresión
</div>
</div>
<div class="row">
<div class="col-sm-2">
	<?php echo '<b>'.$iddocprint.'</b>'; ?>
</div>
<div class="col">
<?php
if($dbhabilitado == "1"){$seleccionado = 'checked=""';} else {$seleccionado = '';}
echo '<label><input type="checkbox" name="chkactivo" value="1" '.$seleccionado.'> Habilitado</label>';
	
?>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Modulo
</div>
<div class="col">
	<select name="lstmodulo" class="campoencoger" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."modulos order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	
	if($dbidmod == $col["idmod"]){$seleccionado = 'selected=""';} else {$seleccionado = '';}
    echo '<option value="'.$col["idmod"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}


?>	
	</select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Empresa
</div>
<div class="col">
	<select name="lstempresa" style="width: 100%" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."empresas order by razonsocial");	
while($col = mysqli_fetch_array($cnssql))
{
	if($dbidempresa == $col["id"]){$seleccionado = 'selected=""';} else {$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
    
}

?>	
	</select>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Cod. Informe
</div>
<div class="col">
	<input type="text" maxlength="10" name="txtcodinforme" value="<?php echo $dbcodinforme; ?>" style="width: 100%" required=""/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Descripcion
</div>
<div class="col">
	<input type="text" maxlength="50" name="txtdescripcion" value="<?php echo $dbdescripcion; ?>" style="width: 100%" required=""/>
</div>
</div>



<div class="row">
<div class="col-sm-2">
	Plantilla HTML
</div>
<div class="col">
<?php
if($dbidfileplantilla > 0)
{
		echo '<a class="btnedit" href="modules/ficheros/download.php?id='.$dbidfileplantilla.'">Download</a> </br>';
	
}

?>
	
	<input type="file" name="fileplantilla" /></br></br>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Procesador
</div>
<div class="col">
	
<?php
if($dbidfileprocesador > 0)
{
		echo '<a class="btnedit" href="modules/ficheros/download.php?id='.$dbidfileprocesador.'">Download</a> </br>';

}

?>
	<input type="file" name="fileprocesador" accept=".php" />
</div>
</div>



<div class="row">
<div class="col-sm-2">
	Fichero FODT
</div>
<div class="col">
<?php
if($dbidfilefodt > 0)
{
		echo '<a class="btnedit" href="modules/ficheros/download.php?id='.$dbidfilefodt.'">Download</a> </br>';
	
}

?>
	
	<input type="file" name="fileprocesadorfodt" /></br></br>
</div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=docprint">Cancelar</a>

</div>
</form>
