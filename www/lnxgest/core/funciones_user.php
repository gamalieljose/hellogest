<?php

function lnx_user_tempdir($lnxuserid)
{
    require("core/cfpc.php");
    $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$lnxuserid."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $nomuser = $rowaux["username"];

    $direcotriotemporalusuario = $lnxrutaficherostemp."usr/".$nomuser."/";

    return $direcotriotemporalusuario;
}

?>