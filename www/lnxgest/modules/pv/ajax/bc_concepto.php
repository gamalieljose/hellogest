<?php
//Buscar campo concepto

require("../../../core/cfpc.php");


$return_arr = array();
$term=$_REQUEST["term_concepto"];
$query = "SELECT concepto FROM ".$prefixsql."productos WHERE concepto LIKE '%".$term."%'";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       $return_arr[] =  $row["concepto"];
    }

    /* free result set */
    $result->free();
}

echo json_encode($return_arr);




?>