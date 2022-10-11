<?php

require("../../../core/cfpc.php");


$return_arr = array();
$term=$_REQUEST["term"];
$query = "SELECT codventa FROM ".$prefixsql."productos WHERE codventa LIKE '%".$term."%'";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       $return_arr[] =  $row["codventa"];
    }

    /* free result set */
    $result->free();
}

echo json_encode($return_arr);




?>