<?php

require("../../core/cfpc.php");

if ($_COOKIE["lnxuserid"] > '0')
{

$idfichero = $_GET["id"];

$sqlfichero= $mysqli->query("select * from ".$prefixsql."ficheros  where id = '".$idfichero ."'");
$row = mysqli_fetch_assoc($sqlfichero);

$dbidfichero = $row['fichero'];
$dbextension = $row['extension'];
$dbnombrefichero = $row['nombre'];
$dbtipomime = $row['tipomime'];
$dbdirfichero = $row['dirfichero'];

header('Content-disposition: attachment; filename="'.$dbnombrefichero.'"');
header("Content-type: ".$dbtipomime);

$lnxficheromuestra = $lnxrutaficheros.$dbdirfichero."/".$dbidfichero;

readfile($lnxficheromuestra );

}

?>