<?php
//$ficheroxml tiene la ruta completa heredada de backup/restaura.php

$xmltemp = simplexml_load_file($ficheroxml);

$xml_modulo = $xmltemp->module;
$xml_tipoxml = $xmltemp->tipoxml;



if($xml_modulo == 'core' && $xml_tipoxml == 'DIC_ACTIVIDADES')
{

    
    foreach ($xmltemp->actividades->actividad as $nodoactividad) 
    {
    
        $idregistro = $nodoactividad->id;
        $nombreactividad = addslashes($nodoactividad->nomactividad);
        
        $sqlrecovery = $mysqli->query("delete from ".$prefixsql."dic_actividades where id = '".$idregistro."' ");
        $sqlrecovery = $mysqli->query("insert into ".$prefixsql."dic_actividades (id, actividad) values ('".$idregistro."', '".$nombreactividad."')");
    }
    
    unlink($ficheroxml);

}


if($xml_modulo == 'core' && $xml_tipoxml == 'DIC_LOPDCATS')
{

    
    foreach ($xmltemp->categorias->categoria as $nodoactividad) 
    {
    
        $idregistro = $nodoactividad->id;
        $nombreactividad = addslashes($nodoactividad->nomcategoria);
        
        $sqlrecovery = $mysqli->query("delete from ".$prefixsql."dic_lopd where id = '".$idregistro."' ");
        $sqlrecovery = $mysqli->query("insert into ".$prefixsql."dic_lopd (id, lopdcat) values ('".$idregistro."', '".$nombreactividad."')");
    }
    
    unlink($ficheroxml);

}

?>