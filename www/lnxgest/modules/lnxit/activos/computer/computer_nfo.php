<?php
include("modules/lnxit/activos/tabs.php");

$idactivo = $_GET["id"];
?>

<table width="100%">
<tr class="maintitle">
<th>Importar archivo NFO</th>
</tr>
</table>
<p>
<?php
echo '<a href="index.php?module=lnxit&section=activos&ss=computer&id='.$idactivo.'" class="btn_tab"><i class="hidephonview fa fa-save fa-lg"></i> Resumen</a> ';

echo '<a href="index.php?module=lnxit&section=activos&ss=computer&action=nfo&id='.$idactivo.'" class="btn_tab_sel"><i class="hidephonview fa fa-upload fa-lg"></i> Importar NFO</a>';
?>
</p>

<?php
echo '<form name="frmactivomsinfo32" method="POST" action="index.php?module=lnxit&section=activos&ss=computer&id='.$_GET["id"].'&action=premsinfo32" enctype="multipart/form-data" >';
?>
<input type="hidden" name="hidactivo" value="<?php echo $_GET["id"]; ?>" />

<div class="msgaviso">
    <div style="width: Calc(100% - 10px);"
<div class="row">
<div class="col-sm-2">
    Archivo NFO
</div>
<div class="col">
    Sube el archivo NFO generado desde msinfo32 de windows para cargar automaticamente los datos </br>
    <input type="file" name="ficheritonfo" />
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Archivo NFO (idioma)
</div>
<div class="col">
    <label><input type="radio" value="es" checked="" name="optidioma" /> Español</label> 
    <label><input type="radio" value="en" name="optidioma" /> Ingles</label>
</div>
</div>
<div align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Procesar</button> 
</div>
    </div>
</div>

</form>