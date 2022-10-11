<?php
//$ficheroxml tiene la ruta completa heredada de backup/restaura.php

$xmltemp = simplexml_load_file($ficheroxml);

$xml_modulo = $xmltemp->module;
$xml_tipoxml = $xmltemp->tipoxml;

if($xml_modulo == "bancos" && $xml_tipoxml == "BANCOS")
{
    
    foreach($xml->bancos->banco as $nodoregistro) 
    {
        $idregistro = $nodoregistro->id;
        $xmllbl_banco = addslashes($nodoregistro->banco);
        $sqlrecovery = $mysqli->query("delete from ".$prefixsql."bancos where id = '".$idregistro."' "); 
        $sqlrecovery = $mysqli->query("insert into ".$prefixsql."bancos (id, banco) values ('".$idregistro."', '".$xmllbl_banco."') ");

//        echo '<p>Restaurando... Banco: '.$xmllbl_banco.'</p>';
        
    }

    unlink($ficheroxml);
}

?>