<?php
$idparte = $_GET["id"];

$sqlparte = $mysqli->query("select * from ".$prefixsql."partes where id = '".$idparte."' ");
$rowparte = mysqli_fetch_assoc($sqlparte);
$dbcodigo = $rowparte["codigo"];
$dbremoto = $rowparte["remoto"];
$dbidserie = $rowparte["idserie"];
$dbidtercero = $rowparte["idtercero"];
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tercero = $rowaux["razonsocial"];

$sqlftp = $mysqli->query("select * from ".$prefixsql."partes_config where idserie = '".$dbidserie."'");
$rowftp = mysqli_fetch_assoc($sqlftp);
$ftp_server = $rowftp["ftpserver"];
$ftp_user_name = $rowftp["ftpusername"];
$ftp_user_pass = $rowftp["ftppassword"];
$destination_file = $rowftp["ftpsyncin"].$dbremoto.".xml";
$source_file = $ficheroxml;



$ftp_connection = ftp_connect($ftp_server);
$login_result = ftp_login($ftp_connection, $ftp_user_name, $ftp_user_pass);

$file_size = ftp_size($ftp_connection, $destination_file);

ftp_close($ftp_connection);

if($file_size > 0)
{
echo '<form name="frmborraftp" method="POST" action="index.php?module=partes&section=partes&action=save" >';

echo '<input type="hidden" value="'.$idparte.'" name="hidparte" />';
echo '<input type="hidden" value="borrarremoto" name="haccion" />';


echo '<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td><p>¿Desea cancelar la firma remota del siguiente parte:?</p>
	<p>Parte: <b>'.$dbcodigo.'</b></br>'.$lbl_tercero.'</p>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=partes">Cancelar</a></td></tr>
	</table></div>';
	
echo '</form>';
	

}
else
{


header( "refresh:2;url=index.php?module=partes" );
        echo '<div align="center">
        <table width="300" class="msgaviso">
        <tr><td class="maintitle">mensaje:</td></tr>
        <tr><td>El archivo ya ha sido firmado</td></tr>
        <tr><td align="center"><a class="btnedit" href="index.php?module=partes">Aceptar</a></td></tr>
        </table></div>';

}
?>



<p>Fichero FTP a borrar :<?php echo $destination_file; ?></p>
<p>Tamaño: <?php echo $file_size; ?></p>


