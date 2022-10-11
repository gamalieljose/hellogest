<?php
$iddocumento = $_GET["id"];
$idlinea = $_GET["idlinea"];
$posicion = $_GET["action"]; //sube o baja

//obtenemos el orden de la linea afectada
$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where id = '".$idlinea."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$nordenactual = $rowaux["orden"];
$dbexclufactu = $rowaux["exclufactu"];

//ahora que ya tenemos el orden actual, tenemos que bsucar la linea de orden menor para subir la linea

if ($posicion == "sube")
{$ordennuevaposicion = $nordenactual -1;}
if ($posicion == "baja")
{$ordennuevaposicion = $nordenactual +1;}

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' and exclufactu = '".$dbexclufactu."' and orden = '".$ordennuevaposicion."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$idnuevoorden = $rowaux["id"]; //con esto obtenemos el id de la linea a la cual le bajaremos la posicion con +1

//Aplicamos las modificaciones

$cnsaux= $mysqli->query("update ".$prefixsql.$lnxinvoice."_lineas set orden = '".$ordennuevaposicion."' where id = '".$idlinea."'");

$cnsaux= $mysqli->query("update ".$prefixsql.$lnxinvoice."_lineas set orden = '".$nordenactual."' where id = '".$idnuevoorden."'");


header("Location: index.php?module=".$lnxinvoice."&section=main&action=view&id=".$iddocumento);

?>