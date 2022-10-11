<?php

require("../../../core/cfpc.php");

$return_arr = array();
$term=$_GET["term_concepto"];
$query = "SELECT * FROM ".$prefixsql."productos WHERE concepto = '".$term."'";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       $return_arr[] =  $row;
    }

    /* free result set */
    $result->free();
}

echo json_encode($return_arr);




?>