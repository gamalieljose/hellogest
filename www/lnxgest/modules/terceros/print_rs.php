<?php
$idempresa = $_POST["lstempresas"];
$idimpresora = $_POST["lstimpresora"];
$docprintfile = $_POST["lstinformes"];
$url_inicio = $_POST["hurlinicio"];
$lnx_idtercero = $_POST["hidtercero"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$docprintfile."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$fl_idfileplantilla = $rowaux["idfileplantilla"];
$lbl_docprinttitle = $rowaux["descripcion"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$fl_idfileplantilla."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$fchr_fichero = $rowaux["fichero"];
$fchr_dirfichero = $rowaux["dirfichero"];


$lnxdocprint_fichero = $lnxrutaficheros.$fchr_dirfichero."/".$fchr_fichero;

echo '<h3>'.$lbl_docprinttitle.'</h3>';
echo '<p> </p>';
?>
<form name="frmprinting" method="POST" action="index.php?module=terceros&section=terceros&action=printprocess" />
<input type="hidden" name="hidtercero" value="<?php echo $lnx_idtercero; ?>" />
<input type="hidden" name="hiddocprint" value="<?php echo $docprintfile; ?>" />
<input type="hidden" name="hlstprinter" value="<?php echo $idimpresora; ?>" />

<?php
include($lnxdocprint_fichero);

?>
</form>



