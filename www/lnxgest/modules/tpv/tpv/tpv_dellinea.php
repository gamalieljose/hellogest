<?php
$idlinea = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_lineas where id = '".$idlinea."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtpv = $rowaux["idtpv"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$dbidtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodigoint = $rowaux["codigoint"];
$dbedittpv = $rowaux["edittpv"];

if($dbcodigoint == '0' || $dbedittpv == '1')
{   
    $cnsmarca = $mysqli->query("delete from ".$prefixsql."tpv_lineas where id = '".$idlinea."'");
    
    $cnsmarca = $mysqli->query("delete from ".$prefixsql."tpv_lineas_tax where idlinea = '".$idlinea."'");
    
    $norden = 0;
    $cnsordenlineas = $mysqli->query("SELECT * FROM ".$prefixsql."tpv_lineas where idtpv = '".$dbidtpv."' order by orden");    
    while($colline = mysqli_fetch_array($cnsordenlineas))
    {
        $norden = $norden +1;
        $idlinea = $colline["id"];
        $sqleditaorden = $mysqli->query("update ".$prefixsql."tpv_lineas set orden = '".$norden."' where id = '".$idlinea."' ");
    }
    
    
}

header ("Location: index.php?module=tpv&section=tpv&action=view&id=".$dbidtpv."#tpvview");

?>

