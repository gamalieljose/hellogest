<?php

$lnxserver = "localhost";
$lnxdbuser = "administrator";
$lnxdbpassword = "password";
$lnxdatabase = "lnxgesterp";

$mysqli = new mysqli($lnxserver, $lnxdbuser, $lnxdbpassword, $lnxdatabase);

$prefixsql = "lnx_";
$lnxrutaficheros = "/lnxgest/files/";
$lnxrutascripts = "/lnxgest/scripts/";
$lnxrutaficherostemp = "/lnxgest/filestemp/";

$lnxprintspool = "/lnxgest/spool/";

//Directorio donde generará los achivos del snapshot (recovery mode)
$lnxrecoverymode_files = "/lnxgest/recovery/"; 


?>