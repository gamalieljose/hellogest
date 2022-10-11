<?php
//$ficheroxml tiene la ruta completa heredada de backup/restaura.php

$xmltemp = simplexml_load_file($ficheroxml);

$xml_modulo = $xmltemp->module;
$xml_tipoxml = $xmltemp->tipoxml;

if($xml_modulo == "lnxit" && $xml_tipoxml == "INFOPASS")
{
    $xmllbl_id = $xmltemp->infopass->id;
    $xmllbl_usuario = addslashes($xmltemp->infopass->usuario);
    $xmllbl_password = addslashes($xmltemp->infopass->password);
    $xmllbl_email = addslashes($xmltemp->infopass->email);
    $xmllbl_donde = addslashes($xmltemp->infopass->donde);
    $xmllbl_notas = addslashes($xmltemp->infopass->notas);
    $xmllbl_idtercero = addslashes($xmltemp->infopass->idtercero);
    $xmllbl_urlweb = addslashes($xmltemp->infopass->urlweb);

    $sqlrecovery = $mysqli->query("delete from ".$prefixsql."it_infopass where id = '".$xmllbl_id."' "); 
    $sqlrecovery = $mysqli->query("delete from ".$prefixsql."it_infopass_perm where idinfopass = '".$xmllbl_id."' "); 

    
    $sqlrecovery = $mysqli->query("insert into ".$prefixsql."it_infopass (id, usuario, password, email, donde, notas, idtercero, urlweb) values ('".$xmllbl_id."', '".$xmllbl_usuario."', '".$xmllbl_password."', '".$xmllbl_email."', '".$xmllbl_donde."', '".$xmllbl_notas."', '".$xmllbl_idtercero."', '".$xmllbl_urlweb."') ");

    foreach ($xmltemp->infopass_perm->permiso as $nodopermiso) 
    {
        $sqlrecovery = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) values ('".$nodopermiso->idusuario."', '".$nodopermiso->idgrupo."', '".$xmllbl_id."')");
    }


    unlink($ficheroxml);
}


?>