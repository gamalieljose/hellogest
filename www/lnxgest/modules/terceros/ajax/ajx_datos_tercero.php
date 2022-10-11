<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

$cnsdir = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$_POST["idtercero"]."' ");
$row = mysqli_fetch_assoc($cnsdir);
	
$dbtel = $row["tel"];
$dbrazonsocial = $row["razonsocial"];


    $data = array(
        "poblacion" => $dbrazonsocial,
        "telefono" => $dbtel
    );
     
    echo json_encode($data);
}
?>