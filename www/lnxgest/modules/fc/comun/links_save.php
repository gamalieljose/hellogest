<?php

$fhaccion = $_POST["haccion"];
$iddocumento = $_POST["hidmasterdoc"]; //Inidica el ID del documento
$foptdoc = $_POST["optdoc"];// XX-YY donde XX es el id del documento y YY es tipo FV, FVR...
$fhtipoa = strtoupper($_POST["htipoa"]); //indica si es fv, fc, av...

$xtemp = explode("-", $foptdoc);
$iddocb = $xtemp[0];
$tipob = strtoupper($xtemp[1]);


$fhtipob = strtoupper($_POST["htipob"]);
$fhidtipob = $_POST["hidtipob"];


if($fhaccion == "new")
{
    $cnsvinculo = $mysqli->query("delete from ".$prefixsql."opafr where tipoa = '".$fhtipoa."' and idtipoa = '".$iddocumento."' and tipob = '".$tipob."' and idtipob = '".$iddocb."'");
    $cnsvinculo = $mysqli->query("delete from ".$prefixsql."opafr where tipoa = '".$tipob."' and idtipoa = '".$iddocb."' and tipob = '".$fhtipoa."' and idtipob = '".$iddocumento."'");

    $cnsvinculo = $mysqli->query("insert into ".$prefixsql."opafr (tipoa, idtipoa, tipob, idtipob) values ('".$fhtipoa."', '".$iddocumento."', '".$tipob."', '".$iddocb."')");
    $cnsvinculo = $mysqli->query("insert into ".$prefixsql."opafr (tipoa, idtipoa, tipob, idtipob) values ('".$tipob."', '".$iddocb."', '".$fhtipoa."', '".$iddocumento."')");

}

if($fhaccion == "delete")
{
    $cnsvinculo = $mysqli->query("delete from ".$prefixsql."opafr where tipoa = '".$fhtipoa."' and idtipoa = '".$iddocumento."' and tipob = '".$fhtipob."' and idtipob = '".$fhidtipob."'");
    $cnsvinculo = $mysqli->query("delete from ".$prefixsql."opafr where tipoa = '".$fhtipob."' and idtipoa = '".$fhidtipob."' and tipob = '".$fhtipoa."' and idtipob = '".$iddocumento."'");
}


$url_atras = 'index.php?module='.$lnxinvoice.'&section=links&id='.$iddocumento;

header("Location: ".$url_atras);
?>