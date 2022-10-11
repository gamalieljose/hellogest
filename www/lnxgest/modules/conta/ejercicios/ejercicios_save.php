<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$fhidejercicio = $_POST["hidejercicio"];

$fhaccion = $_POST["haccion"];
$flstserie = $_POST["lstserie"];
$ftxtdescripcion = addslashes( $_POST["txtdescripcion"]);
$ftxtfinicio = $_POST["txtfinicio"];
$ftxtffin = $_POST["txtffin"];
$flstestado = $_POST["lstestado"];

$xfecha = explode("/", $ftxtfinicio);
    $fdia = $xfecha[0];
    $fmes = $xfecha[1];
    $fano = $xfecha[2];
        $ftxtfinicio = $fano."-".$fmes."-".$fdia;
        
$xfecha = explode("/", $ftxtffin);
    $fdia = $xfecha[0];
    $fmes = $xfecha[1];
    $fano = $xfecha[2];
        $ftxtffin = $fano."-".$fmes."-".$fdia;
        
if($fhaccion == "new")
{   
    $sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."conta_ejercicios where idserie = '".$flstserie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $codigointerno = $rowaux["contador"] +1;

    $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstserie."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["serie"];
    
    $codigoejercicio = $lbl_serie.$codigointerno;

    $sqlconta = $mysqli->query("insert into ".$prefixsql."conta_ejercicios (idempresa, idserie, codigoint, codigo, descripcion, finicio, ffin, idestado) values('".$idempresa."', '".$flstserie."', '".$codigointerno."', '".$codigoejercicio."', '".$ftxtdescripcion."', '".$ftxtfinicio."', '".$ftxtffin."', '".$flstestado."')");
    
}
if($fhaccion == "update")
{ 
    $sqlconta = $mysqli->query("update ".$prefixsql."conta_ejercicios set descripcion = '".$ftxtdescripcion."', finicio = '".$ftxtfinicio."', ffin = '".$ftxtffin."', idestado = '".$flstestado."' where id = '".$fhidejercicio."' ");
}


$url_atras = "index.php?module=conta&section=ejercicios";
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">mensaje:</td></tr>
<tr><td>Cambios efectuados con éxito</td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';



?>

