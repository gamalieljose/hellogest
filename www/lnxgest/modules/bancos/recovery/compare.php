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

?>

<table width="100%">
<tr class="maintitle">
<th>Fichero</th>
<th align="center">Campo</th>
<th>Base de datos</th>
</tr>

<?php
foreach($xml->bancos->banco as $nodoregistro) 
{
    $dbidbanco = "";
    $dbbanco = "";

    $sqlaux = $mysqli->query("select * from ".$prefixsql."bancos where id = '".$nodoregistro->id."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbbanco = $rowaux["banco"];
    $dbidbanco = $rowaux["id"];

    echo '<td>'.$nodoregistro->id.'</td>';
    echo '<td align="center"><b>ID</b></td>';
    echo '<td>'.$dbidbanco.'</td>';
    echo '</tr>';
    echo '<td>'.$nodoregistro->banco.'</td>';
    echo '<td align="center"><b>Banco</b></td>';
    echo '<td>'.$dbbanco.'</td>';
    echo '</tr>';
    
}


echo '</table>';

}
?>