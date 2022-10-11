<?php
$idpreproceso = $_GET["idpreproceso"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$idpreproceso."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$docprint_descripcion = $rowaux["descripcion"];
$docprint_idfileplantilla = $rowaux["idfileplantilla"];
$docprint_idfileprocesador = $rowaux["idfileprocesador"];
$docprint_idfilefodt = $rowaux["idfilefodt"];
$docprint_idempresa = $rowaux["idempresa"];
$docprint_habilitado = $rowaux["habilitado"];

$iddocumento = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$iddocserie = $rowaux["idserie"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$iddocserie."'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$serieidempresa = $rowaux["idempresa"];
$errorcheck = 0;
if($docprint_idempresa <> $serieidempresa){$errorcheck = $errorcheck + 1;}
if($docprint_habilitado == '0'){$errorcheck = $errorcheck + 1;}

if($errorcheck > '0')
{
    $urlatras = 'index.php?module='.$lnxinvoice.'&section=print&action=setup&id='.$iddocumento;
    header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Este informe esta deshabilitado o no esta vinculado con la empresa</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}
else 
{

echo '<form name="frmdocprint" method="POST" action="index.php?module='.$lnxinvoice.'&section=print&action=print&idpreproceso='.$idpreproceso.'&id='.$iddocumento.'" >';

echo '<input type="hidden" name="hidfv" value="'.$iddocumento.'" />';

echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
echo '<input type="hidden" name="hidpreproceso" value="'.$idpreproceso.'" />';
echo '<input type="hidden" name="docprint_descripcion" value="'.$docprint_descripcion.'" />';
echo '<input type="hidden" name="docprint_idfileplantilla" value="'.$docprint_idfileplantilla.'" />';
echo '<input type="hidden" name="docprint_idfileprocesador" value="'.$docprint_idfileprocesador.'" />';
echo '<input type="hidden" name="docprint_idfilefodt" value="'.$docprint_idfilefodt.'" />';
echo '<input type="hidden" name="docprint_idempresa" value="'.$docprint_idempresa.'" />';


?>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Imprimir</button> 
<?php 

echo '<a href="index.php?module='.$lnxinvoice.'&section=print&action=setup&id='.$iddocumento.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> ';
?>
</div>

<?php
    // Seleccionamos impresora

    echo '<div class="row"><div class="col maintitle">'.$docprint_descripcion.'</div></div>';

    echo '<div class="row"><div class="col-sm-2">Impresora</div>';

    echo '<div class="col">';

    echo '<select name="lstprinter" class="campoencoger">';

    $sqlaux = $mysqli->query("SELECT sum(dft) as contador FROM ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $pdfisdft = $rowaux["contador"];

    if($pdfisdft == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
    


    echo '<option value="0" '.$seleccionado.'>PDF</option>';
    $cnssql = $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."'");	
    while($col = mysqli_fetch_array($cnssql))
    {   
        $sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$col["idprinter"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lblprt_nombre = $rowaux["nombre"];
        $lblprt_notas = $rowaux["notas"];

        if($col["dft"] == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$col["idprinter"].'" '.$seleccionado.'>'.$lblprt_nombre.' - '.$lblprt_notas.'</option>';
        
    }
    echo '</select>';

    echo '</div></div>';

    //Mostramos el fichero

    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$docprint_idfileplantilla."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $fch_fichero = $rowaux["fichero"];
    $fch_dirfichero = $rowaux["dirfichero"];
    
    $rutaficheroplantilla = $lnxrutaficheros.$fch_dirfichero."/".$fch_fichero;

    include($rutaficheroplantilla);

echo '</form>';
}
?>