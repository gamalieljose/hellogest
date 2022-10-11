<link rel="stylesheet" type="text/css" href="scripts/tinymce/prism.css">
<script src="scripts/tinymce/prism.js"></script>

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

echo '<a href="index.php?module=lnxit&section=docum&action=del&id='.$iddocum.'" class="btnenlacecancel">Eliminar documentación</a> ';

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

<?php
echo '<p><a href="index.php?module=lnxit&section=docum&action=newpage&iddocum='.$iddocum.'" class="btnedit">Nueva pagina</a></p>'; 
?>

<div align="center" class="rectangulobtnsguardar">
    <a href="index.php?module=lnxit&section=docum" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Documentación</a>
</div>




<div style="display: block; overflow-x: auto;">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."it_docum_lines where iddocum = '".$iddocum."' ");	
while($col = mysqli_fetch_array($cnssql))
{
    
    $sqlaux = $mysqli->query("select id, display from ".$prefixsql."users where id = '".$col["iduser"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $documline_usuario = $rowaux["display"];
    
    echo '<div class="msgaviso">';
    echo '<div class="row" style="margin-left: 5px; margin-right: 5px; );">
    <div class="col">';
    echo '<a href="#item'.$col["id"].'" name="item'.$col["id"].'">#'.$col["id"].'</a> <b>'.$dbtitulo.'</b> '.$documline_usuario.' - '.$col["fmodificado"].' <a href="index.php?module=lnxit&section=docum&action=edit&id='.$col["id"].'" alt="Editar" title="Editar"><i class="fa fa-edit"> Editar</i></a> ';
    echo '<a href="index.php?module=lnxit&section=docum&action=delpage&id='.$col["id"].'" alt="Eliminar" title="Eliminar"><i class="fa fa-trash-alt"> Eliminar</i></a> ';
    echo '</div></div>';
    echo '<div class="row" style="margin-left: 5px; margin-right: 5px; );">
    <div class="col" style="background-color: #FFFFFF" >'.$col["documentacion"].'</div>
    </div>';

    $sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lnxit_docum' and idlinea0 = '".$iddocum."' and idlinea1 = '".$col["id"]."' "); 
    $rowfichero = mysqli_fetch_assoc($sqlfichero);

    $existefichero = $sqlfichero->num_rows;
    if($existefichero > 0)
    {
        echo '<div class="row maintitle" style="margin-left: 5px; margin-right: 5px; );">';
        echo '<div class="col-sm-2">Fichero adjunto</div>';
        echo '<div class="col">';
        echo '<a href="modules/ficheros/download.php?id='.$rowfichero["idfichero"].'" class="btnedit">Descargar archivo</a>';
        echo '</div>';
        echo '</div>';
    
    }

    echo '</div>';
}

?>
</div>
<p>
<?php echo '<a href="index.php?module=lnxit&section=docum&action=newpage&iddocum='.$iddocum.'" class="btnedit">Nueva pagina</a> '; ?>
</p>