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

if($xml_modulo == "lnxit" && $xml_tipoxml == "INFOPASS")
{

    $xmlidregistro = $xml->infopass->id;
    

    $sqlaux = $mysqli->query("select * from ".$prefixsql."it_infopass where id = '".$xmlidregistro."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbidregistro = $rowaux["id"];
    $dbusuario = $rowaux["usuario"];
    $dbpassword = $rowaux["password"];
    $dbemail = $rowaux["email"];
    $dbdonde = $rowaux["donde"];
    $dbnotas = $rowaux["notas"];
    $dbidtercero = $rowaux["idtercero"];
    $dburlweb = $rowaux["urlweb"];

    
    echo '<tr><td>'.$xml->infopass->id.'</td><td align="center"><b>ID</b></td><td>'.$dbidregistro.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->usuario.'</td><td align="center"><b>usuario</b></td><td>'.$dbusuario.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->password.'</td><td align="center"><b>password</b></td><td>'.$dbpassword.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->email.'</td><td align="center"><b>email</b></td><td>'.$dbemail.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->donde.'</td><td align="center"><b>donde</b></td><td>'.$dbdonde.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->notas.'</td><td align="center"><b>notas</b></td><td>'.$dbnotas.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->idtercero.'</td><td align="center"><b>idtercero</b></td><td>'.$dbidtercero.'</td></tr>';
    echo '<tr><td>'.$xml->infopass->urlweb.'</td><td align="center"><b>urlweb</b></td><td>'.$dburlweb.'</td></tr>';
    

    echo '<tr class="maintitle"><td colspan="3">Permisos</td></tr>';

    echo '<tr><td>';

    foreach ($xml->infopass_perm->permiso as $nodopermiso) 
    {
        echo $nodopermiso->idusuario." - ".$nodopermiso->idgrupo."</br>";
    }
    

    echo '</td><td></td>';
    echo '<td>';
    //Cargamos permsiso bbdd
    $cnssql = $mysqli->query("select * from ".$prefixsql."it_infopass_perm where idinfopass = '".$xmlidregistro."'");	
    while($col = mysqli_fetch_array($cnssql))
    {
        echo $col["idusuario"]."-".$col["idgrupo"]."</br>";
        
    }

    echo '</td></tr>';
}
echo '</table>';

}
?>