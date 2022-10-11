<?php
if($_COOKIE["lnxuserid"] > '0')
{
    require("../../../core/cfpc.php");

    $sqlaux = $mysqli->query("select * from ".$prefixsql."it_infopass where id = '".$_POST["idinfopass"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbid = $rowaux["id"];
        if($dbid == ''){$dbid = '0';}
$data = array();

$data = array("existeinfopass" => $dbid);

echo json_encode($data);

}
?>