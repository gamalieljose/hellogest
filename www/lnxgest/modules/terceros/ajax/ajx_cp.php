<?php
require("../../../core/cfpc.php");

$cnsdir = $mysqli->query("SELECT * FROM ".$prefixsql."poblaciones where cp = '".$_POST["cp"]."' and idpais = '".$_POST["idpais"]."'");
$row = mysqli_fetch_assoc($cnsdir);
	
$dbpoblacion = $row["poblacion"];
$dbidprov = $row["idprov"];


//echo $dbpoblacion;


    $data = array(
        "poblacion" => $dbpoblacion,
        "idprov" => $dbidprov
    );
     
    echo json_encode($data);
//    exit();

?>

