<?php

$fhaccion = $_POST["haccion"];
$fchkallowlogin = $_POST["chkallowlogin"];
if($fchkallowlogin == ""){$fchkallowlogin = "NO";}
$fhiduserallowed = $_POST["hiduserallowed"];

$fchkuidsession = $_POST["chkuidsession"];

if($fhaccion == "login")
{
    $sqllogin = $mysqli->query("delete from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN'");
    $sqllogin = $mysqli->query("insert into ".$prefixsql."users_config (opcion, valor) values ('ALLOW_LOGIN', '".$fchkallowlogin."') ");
    
    $sqllogin = $mysqli->query("delete from ".$prefixsql."users_config where opcion = 'IDUSERALLOWED'");
    $sqllogin = $mysqli->query("insert into ".$prefixsql."users_config (opcion, valor) values ('IDUSERALLOWED', '".$fhiduserallowed."') ");

    if($fchkallowlogin == "NO")
    {
        foreach($fchkuidsession as $sesionborrar)
        {
        $sqltercero= $mysqli->query("delete from ".$prefixsql."users_uid where uidsession = '".$sesionborrar."'");
        }  
    }
}


$urlatras = "index.php?&module=core&section=users";
header( "Location: ".$urlatras);

?>