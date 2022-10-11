<link rel="StyleSheet" href="../../../core/css/custom.css" media="all" type="text/css">
<?php
if($_COOKIE["lnxuserid"] > 0) 
{
require("../../../core/cfpc.php");



$ficherito = $_GET["file"];

$ficheroxml = $lnxrecoverymode_files.$ficherito; 

echo '<p>Fichero: '.$ficheroxml.'</p>';

$xml = simplexml_load_file($ficheroxml);

$xml_modulo = $xml->module;
$xml_tipoxml = $xml->tipoxml;

?>

<table width="100%">
<tr class="maintitle">
<th>Fichero</th>
<th align="center">Campo</th>
<th>Base de datos</th>
</tr>


<?php
if($xml_modulo == "core" && $xml_tipoxml == "DIC_ACTIVIDADES")
{
    //$dbidregistro = $xml->tercero->id;
    
    echo '<tr><td>';
    foreach ($xml->actividades->actividad as $nodoactividad) 
    {
        echo $nodoactividad->id." - ".$nodoactividad->nomactividad."</br>";
    }

    echo '</td><td align="center">&nbsp;</td><td>';
    $cnssql= $mysqli->query("select * from ".$prefixsql."dic_actividades order by id asc");	
    while($col = mysqli_fetch_array($cnssql))
    {
        echo $col["id"]." - ".$col["actividad"].'</br>';
        
    }

    echo'</td></tr>';
    

}



// ---------------- CATEGORIAS LOPD  --------------------

if($xml_modulo == "core" && $xml_tipoxml == "DIC_LOPDCATS")
{
        
    echo '<tr><td>';
    foreach ($xml->categorias->categoria as $nodoactividad) 
    {
        echo $nodoactividad->id." - ".$nodoactividad->nomcategoria."</br>";
    }

    echo '</td><td align="center">&nbsp;</td><td>';
    $cnssql= $mysqli->query("select * from ".$prefixsql."dic_lopd order by id asc");	
    while($col = mysqli_fetch_array($cnssql))
    {
        echo $col["id"]." - ".$col["lopdcat"].'</br>';
        
    }

    echo'</td></tr>';
    

}



echo '</table>';

}
?>
