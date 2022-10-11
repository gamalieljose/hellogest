<?php
$idtpv = $_POST["hidtpv"];
$fhaccion = $_POST["haccion"];
$ftxtimporte = $_POST["txtimporte"];
$flstfpago = $_POST["lstfpago"];

$flstusuarios = $_POST["lstusuarios"];


$ftxtfecha = date("Y-m-d h:m:s"); //En el formulario de origen no existe campo de modificar fecha

if ($fhaccion == 'new')
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbidserie = $rowaux["idserie"];
    $dbidterminal = $rowaux["idterminal"];
    $dbidtienda = $rowaux["idtienda"];
        
    $sqlpago = $mysqli->query("insert into ".$prefixsql."tpv_pagos (idtienda, iduser, idterminal, idserie, idtpv, tipo, fecha, idfpago, importe) values('".$dbidtienda."', '".$flstusuarios."', '".$dbidterminal."', '".$dbidserie."', '".$idtpv."', 'TPAGO', '".$ftxtfecha."', '".$flstfpago."', '".$ftxtimporte."')");
}
if ($fhaccion == 'update')
{
    $idpago = $_POST["hidpago"];
    $ffecha = $_POST["txtfecha"];
    
    $xfecha = explode("/", $ffecha);
    
    
    $fhora = $_POST["lsthh"];
    $fminutos = $_POST["lstmm"];
    
    $fecha = $xfecha[2].'-'.$xfecha[1].'-'.$xfecha[0].' '.$fhora.':'.$fminutos.':00';
    
    $sqlpago= $mysqli->query("update ".$prefixsql."tpv_pagos set iduser = '".$flstusuarios."', fecha = '".$fecha."', idfpago = '".$flstfpago."', importe = '".$ftxtimporte."' where id = '".$idpago."'");
}
if ($fhaccion == 'delete')
{
	//$sqltercero= $mysqli->query("delete from ".$prefixsql."bancos where id = '".$idbanco."'");
}

$url_atras = "index.php?module=tpv&section=tpv&action=view&id=".$idtpv;
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';

?>

