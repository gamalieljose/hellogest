<?php
$respuestarecoverymode = "";


if($rcvymd_arryvariables["section"] == "dic" && $rcvymd_arryvariables["subs"] == "actividades" )
{
    $rcvymd_fichero = $lnxrecoverymode_files."core_dic_actividades.xml";

    if($rcvymd_arryvariables["id"] > 0)
    {
        $cnssql= $mysqli->query("select * from ".$prefixsql."dic_actividades where id = '".$rcvymd_arryvariables["id"]."'");
        $respuestarecoverymode = "Actividad exportada correctamente";
    }
    else 
    {
        $cnssql= $mysqli->query("select * from ".$prefixsql."dic_actividades order by id asc");
        $respuestarecoverymode = "Lista de actividades exportado correctamente";
    }

    
    $existe = $cnssql->num_rows;


    if($existe > 0)
    {
    $file = fopen($rcvymd_fichero, "w");

    fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
    fwrite($file, "<lnxgest>". PHP_EOL);
    fwrite($file, "   <module>core</module>". PHP_EOL);
    fwrite($file, "   <tipoxml>DIC_ACTIVIDADES</tipoxml>". PHP_EOL);
    fwrite($file, "   <actividades>". PHP_EOL);
    while($col = mysqli_fetch_array($cnssql))
    {

        fwrite($file, "      <actividad>". PHP_EOL);
        fwrite($file, "         <id>".$col["id"]."</id>". PHP_EOL);
        fwrite($file, "         <nomactividad>".$col["actividad"]."</nomactividad>". PHP_EOL);
        fwrite($file, "      </actividad>". PHP_EOL);    
    }
    
    fwrite($file, "   </actividades>". PHP_EOL);
    fwrite($file, "</lnxgest>". PHP_EOL);

    fclose($file);

    
    }
    else {
        $respuestarecoverymode = "No existen actividades a exportar";
    }
}




//----------------- CATEGORIAS GDPR -----------------
if($rcvymd_arryvariables["section"] == "dic" && $rcvymd_arryvariables["subs"] == "lopdcats" )
{
    $rcvymd_fichero = $lnxrecoverymode_files."core_dic_lopdcats.xml";

    if($rcvymd_arryvariables["id"] > 0)
    {
        $cnssql= $mysqli->query("select * from ".$prefixsql."dic_lopd where id = '".$rcvymd_arryvariables["id"]."'");
        $respuestarecoverymode = "Categoria de proteción de datos exportado correctamente";
    }
    else 
    {
        $cnssql= $mysqli->query("select * from ".$prefixsql."dic_lopd order by id asc");
        $respuestarecoverymode = "Lista de categorias de proteción de datos exportado correctamente";
    }

    
    $existe = $cnssql->num_rows;


    if($existe > 0)
    {
    $file = fopen($rcvymd_fichero, "w");

    fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
    fwrite($file, "<lnxgest>". PHP_EOL);
    fwrite($file, "   <module>core</module>". PHP_EOL);
    fwrite($file, "   <tipoxml>DIC_LOPDCATS</tipoxml>". PHP_EOL);
    fwrite($file, "   <categorias>". PHP_EOL);
    while($col = mysqli_fetch_array($cnssql))
    {

        fwrite($file, "      <categoria>". PHP_EOL);
        fwrite($file, "         <id>".$col["id"]."</id>". PHP_EOL);
        fwrite($file, "         <nomcategoria>".$col["lopdcat"]."</nomcategoria>". PHP_EOL);
        fwrite($file, "      </categoria>". PHP_EOL);    
    }
    
    fwrite($file, "   </categorias>". PHP_EOL);
    fwrite($file, "</lnxgest>". PHP_EOL);

    fclose($file);

    
    }
    else {
        $respuestarecoverymode = "No existen registros a exportar";
    }
}

?>