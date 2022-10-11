<script src="core/com/js_terceros_all.js"></script>

<script src="scripts/tinymce/tinymce.min.js" ></script>
<script>
tinymce.init({
    selector: 'textarea#txtdocumentacion',
    language: 'es', 
    height : "400",
    plugins: "lists paste image table advtable link fullscreen code codesample ",
    toolbar: 'undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image table | codesample | fullscreen',
    paste_data_images : true
});
</script>


<?php
$fechahoy = date("d/m/Y");
$iddocumlinea = $_GET["id"];


$sqldocumlines = $mysqli->query("select * from ".$prefixsql."it_docum_lines where id = '".$iddocumlinea."' "); 
$rowdoclns = mysqli_fetch_assoc($sqldocumlines);
$iddocum = $rowdoclns["iddocum"];
$docum_doc = htmlentities($rowdoclns["documentacion"]);

$sqldocum = $mysqli->query("select * from ".$prefixsql."it_docum where id = '".$iddocum."' "); 
$rowdocum = mysqli_fetch_assoc($sqldocum);
$dbidtercero = $rowdocum["idtercero"];
$dbtitulo = $rowdocum["titulo"];
$dbfcreado = $rowdocum["fcreado"];
$dbfmodificado = $rowdocum["fmodificado"];
$dbiditcat = $rowdocum["iditcat"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero_rs = $rowaux["razonsocial"];


?>
<form name="frmdocum" method="POST" action="index.php?module=lnxit&section=docum&action=save" enctype="multipart/form-data">

<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hiddocum" value="<?php echo $iddocum; ?>" />
<input type="hidden" name="hiddocumlinea" value="<?php echo $iddocumlinea; ?>" />


<div class="row">
    <div class="col-sm-2" align="left">
        Fecha Creado
    </div>
    <div class="col" align="left">
        <?php echo $dbfcreado; ?>
    </div>
    <div class="col-sm-2" align="left">
        Fecha modificación
    </div>
    <div class="col" align="left">
        <?php echo $dbfmodificado; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
<?php
if($dbidtercero > 0){$seleccionado = 'checked=""';}else{$seleccionado = '';}
        echo '<label><input type="checkbox" '.$seleccionado.' value="1" name="chktercero" /> Tercero</label>';
?>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" autocomplete="off" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php	  
    echo '<option value="'.$dbidtercero.'" >'.$lbl_tercero_rs.'</option>'; 
?>
</select>
</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Categoría
    </div>
    <div class="col" align="left">
<?php
	//seleciona categoria de it categorias
	
	echo '<select name="lstcategoria" id="lstcategoria" class="campoencoger">';
	if($dbiditcat == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-sin especificar-</option>'; 
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{   
            if($colter["id"] == $dbiditcat){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["categoria"].'</option>'; 
		}
		echo '</select>';
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
    <b>Titulo</b>
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="50" required="" placeholder="Escriba el título de esta documentación" value="<?php echo $dbtitulo; ?>" name="txttitulo" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Descripción
    </div>
    <div class="col" align="left">
    <div style="width: 100%; max-width: 950px; background-color: #ffffff;" >
        <textarea id="txtdocumentacion" name="txtdocumentacion" ><?php echo $docum_doc; ?></textarea>
    </div>
    </div>
</div>
<?php
$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocum."' and idlinea1 = '".$iddocumlinea."' "); 
$rowfichero = mysqli_fetch_assoc($sqlfichero);

$existefichero = $sqlfichero->num_rows;
if($existefichero > 0)
{
    echo '<div class="row">
    <div class="col-sm-2" align="left">
        Archivo existente
    </div>
    <div class="col" align="left">';
    echo '<a href="modules/ficheros/download.php?id='.$rowfichero["idfichero"].'" class="btnedit">Descargar archivo</a> ';
    echo '<input type="checkbox" value="'.$rowfichero["idfichero"].'" name="chkficheroborrar" /> ';

    echo '<select name="lstdelaction">';
    echo '<option value="1">Eliminar archivo de la documentación</option>';
    echo '<option value="2">Desvincular archivo</option>';
    echo '</select>';



    echo '</div>
    </div>';

    $lbl_subirarchivo = 'Reemplazar archivo';
}
else 
{
    $lbl_subirarchivo = 'Adjuntar archivo';
}
?>
<div class="row">
    <div class="col-sm-2" align="left">
        <?php echo $lbl_subirarchivo; ?>
    </div>
    <div class="col" align="left">
        <input type="file" name="fileficherito" />
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Vincular archivo
    </div>
    <div class="col" align="left">
<?php
$cnssql = $mysqli->query("SELECT * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocum."' and idlinea1 = '0'");
$existe = $cnssql->num_rows;

if($existe > 0){$habilitarcontrol = '';}else{$habilitarcontrol = 'disabled=""';}

    echo '<select name="lstficheritos" style="width: 100%;" '.$habilitarcontrol.'/>
        <option value="0" selected="">- Selecciona fichero -</option>';


while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$col["idfichero"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbdescripcion = $rowaux["descripcion"];

    echo '<option value="'.$col["id"].'">'.$col["idfichero"].' - '.$dbdescripcion.' ('.$col["display"].')</option>';
}
?>
    </select>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>                
<?php 
echo '<a href="index.php?module=lnxit&section=docum&action=view&id='.$iddocum.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; 
?>
</div>

</form>