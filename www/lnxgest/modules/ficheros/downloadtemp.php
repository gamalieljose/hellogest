<?php

require("../../core/cfpc.php");

if ($_COOKIE["lnxuserid"] > '0')
{
$xfichero = base64_decode($_GET["fichero"]);
$nomfichero = $_GET["nomfichero"];


header('Content-disposition: attachment; filename="'.$nomfichero.'"');

$extension = explode(".", $nomfichero);

if ($extension[1] == "pdf"){header('Content-type: application/pdf');}

if ($extension[1] == "xlsx"){header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");}

//header("Content-type: ".$dbtipomime);

$lnxficheromuestra = $lnxrutaficherostemp.$xfichero;

readfile($lnxficheromuestra );

}

?>

