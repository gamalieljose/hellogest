<?php

?>

<form name="frmdocprint" method="POST" enctype="multipart/form-data" action="index.php?module=core&section=docprint&action=save" >
<input type="hidden" name="haccion" value="new" />

<div class="row">
<div class="col maintitle">
	Nuevo Documento de impresión
</div>
</div>
<div class="row">
<div class="col-sm-2">
	
</div>
<div class="col">
	<label><input type="checkbox" name="chkactivo" value="1" checked=""> Habilitado</label>
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
    echo '<option value="'.$col["idmod"].'">'.$col["display"].'</option>';
    
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
    echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
    
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
	<input type="text" maxlength="10" name="txtcodinforme" style="width: 100%" required=""/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Descripcion
</div>
<div class="col">
	<input type="text" maxlength="50" name="txtdescripcion" style="width: 100%" required=""/>
</div>
</div>



<div class="row">
<div class="col-sm-2">
	Plantilla HTML
</div>
<div class="col">
	<input type="file" name="fileplantilla" accept=".php" required=""/>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Procesador
</div>
<div class="col">
	<input type="file" name="fileprocesador" accept=".php" />
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Fichero FODT
</div>
<div class="col">
	<input type="file" name="fileprocesadorfodt" accept=".fodt" />
</div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=docprint">Cancelar</a>

</div>
</form>
