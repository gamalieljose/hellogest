<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

$cnsdir = $mysqli->query("SELECT * FROM ".$prefixsql."terceroscontactos where id = '".$_POST["idcontacto"]."' ");
$row = mysqli_fetch_assoc($cnsdir);
	
$dbtel = $row["tel"];
$dbnombre = $row["nombre"];


    $data = array(
        "nombre" => $dbnombre,
        "telefono" => $dbtel
    );
     
    echo json_encode($data);
}
?>