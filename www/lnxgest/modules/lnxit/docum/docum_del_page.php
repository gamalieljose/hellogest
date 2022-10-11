<?php
$fechahoy = date("d/m/Y");
$iddocumlinea = $_GET["id"];


$sqldocumlines = $mysqli->query("select * from ".$prefixsql."it_docum_lines where id = '".$iddocumlinea."' "); 
$rowdoclns = mysqli_fetch_assoc($sqldocumlines);
$iddocum = $rowdoclns["iddocum"];
$docum_doc = $rowdoclns["documentacion"];

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

$sqlaux = $mysqli->query("select * from ".$prefixsql."it_categorias where id = '".$dbiditcat."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_categoria = $rowaux["categoria"];


?>
<form name="frmdocum" method="POST" action="index.php?module=lnxit&section=docum&action=save">

<input type="hidden" name="haccion" value="delpage" />
<input type="hidden" name="hiddocum" value="<?php echo $iddocum; ?>" />
<input type="hidden" name="hiddocumlinea" value="<?php echo $iddocumlinea; ?>" />
<div align="center">
    <table class="msgaviso" style="width:100%; max-width: 400px;">
    <tr><td class="maintitle">Eliminar registro</td></tr>
    <tr><td align="center">
    <p>¿Esta seguro de querer eliminar este registro y sus archivos adjuntos?</p>
    <p>
    <button type="submit" class="btnsubmit" >
                    <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button> 
    <?php 
    echo '<a href="index.php?module=lnxit&section=docum&action=view&id='.$iddocum.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; 
    ?>
    </p>
    </td></tr>
    </table>
</div>


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
        Tercero
    </div>
    <div class="col" align="left">
<?php  echo $lbl_tercero_rs;  ?>

    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Categoría
    </div>
    <div class="col" align="left">
<?php	echo $lbl_categoria; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
    <b>Titulo</b>
    </div>
    <div class="col" align="left">
        <b><?php echo $dbtitulo; ?></b>
    </div>
</div>
<?php

$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocum."' and idlinea1 = '".$iddocumlinea."' "); 
$rowfichero = mysqli_fetch_assoc($sqlfichero);

$existefichero = $sqlfichero->num_rows;
if($existefichero > 0)
{
    echo '<div class="row">';
    echo '<div class="col-sm-2">Fichero adjunto</div>';
    echo '<div class="col">';
    echo '<a href="modules/ficheros/download.php?id='.$rowfichero["idfichero"].'" class="btnedit">Descargar archivo</a>';
    echo '</div>';
    echo '</div>';

}
?>
<div class="row">
    <div class="col-sm-2" align="left">
        Descripción
    </div>
    <div class="col" align="left">
    <div style="width: 100%; max-width: 900px; background-color: #ffffff;" >
        <?php echo $docum_doc; ?>
    </div>
    </div>
</div>


</form>