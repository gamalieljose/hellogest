<?php
$fhaccion = $_POST["haccion"];
$fhidregla = $_POST["hidregla"];

$fchkactivo = $_POST["chkactivo"];
    if($fchkactivo == '' ){$fchkactivo = '0';}
$ftxtnombreregla = addslashes($_POST["txtnombreregla"]);
$flstcondicion = $_POST["lstcondicion"];
$ftxtcantidadmin = $_POST["txtcantidadmin"];
$ftxtcantidadmax = $_POST["txtcantidadmax"];
$fidproducto = $_POST["lstproducto"];
$flstplantilla = $_POST["lstplantilla"];
$foptcuanto = $_POST["optcuanto"];
$ftxttexto = addslashes($_POST["txttexto"]);

    if($flstcondicion == "TEXTO")
    {
        $fidproducto = '0';
    }

if($fhaccion == "new")
{
    $sqlreglas = $mysqli->query("insert into ".$prefixsql."tpv_cfg_ia (activo, regla, cuando, min, max, idproducto, docprint, copias, texto) VALUES ('".$fchkactivo."', '".$ftxtnombreregla."', '".$flstcondicion."', '".$ftxtcantidadmin."', '".$ftxtcantidadmax."', '".$fidproducto."', '".$flstplantilla."', '".$foptcuanto."', '".$ftxttexto."')");

}
if($fhaccion == "update")
{
    $sqlreglas = $mysqli->query("update ".$prefixsql."tpv_cfg_ia set activo = '".$fchkactivo."', regla = '".$ftxtnombreregla."', cuando = '".$flstcondicion."', min = '".$ftxtcantidadmin."', max = '".$ftxtcantidadmax."', idproducto = '".$fidproducto."', docprint = '".$flstplantilla."', copias = '".$foptcuanto."', texto = '".$ftxttexto."' where id = '".$fhidregla."'");

}
if($fhaccion == "delete")
{
    $sqlreglas = $mysqli->query("delete from ".$prefixsql."tpv_cfg_ia where id = '".$fhidregla."'");

}

$url_atras = "index.php?module=tpv&section=cfgia";
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';
?>