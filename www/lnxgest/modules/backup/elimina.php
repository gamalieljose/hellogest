<?php

$ficherito = $_GET["xmlfile"];

$ficheroxml = $lnxrecoverymode_files.$ficherito;

if($ficherito <> '')
{
    unlink($ficheroxml);
}

header("Location: index.php?module=backup");

?>