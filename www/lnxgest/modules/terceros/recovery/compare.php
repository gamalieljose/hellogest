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
if($xml_modulo == "terceros" && $xml_tipoxml == "TERCERO")
{
    $dbidregistro = $xml->tercero->id;
    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidregistro."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbrazonsocial = $rowaux["razonsocial"];
    $dbnomcomercial = $rowaux["nomcomercial"];
    $dbnif = $rowaux["nif"];
    $dbtel = $rowaux["tel"];
    $dbactivo = $rowaux["activo"];
    $dbcodcli = $rowaux["codcli"];
    $dbcodpro = $rowaux["codpro"];
    $dbdir = $rowaux["dir"];
    $dbcp = $rowaux["cp"];
    $dbpobla = $rowaux["pobla"];
    $dbidprov = $rowaux["idprov"];
    $dbidpais = $rowaux["idpais"];
    $dbidtarifa = $rowaux["idtarifa"];
    $dbcodclipro = $rowaux["codclipro"];
    $dbfechaalta = $rowaux["fechaalta"];
    $dbncuenta = $rowaux["ncuenta"];
    $dbnotas = $rowaux["notas"];
    $dborigen = $rowaux["origen"];
    $dbemail = $rowaux["email"];
    $dbnotaimp = $rowaux["notaimp"];
    $dbidcomercial = $rowaux["idcomercial"];
    $dbidtipotercero = $rowaux["idtipotercero"];
    $dbidactividad = $rowaux["idactividad"];
    $dbclifp = $rowaux["clifp"];
    $dbclidp = $rowaux["clidp"];
    $dbprofp = $rowaux["profp"];
    $dbprodp = $rowaux["prodp"];
    $dbidzona = $rowaux["idzona"];

    echo '<tr><td>'.$xml->tercero->id.'</td><td align="center"><b>ID</b></td><td>'.$dbidregistro.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->razonsocial.'</td><td align="center"><b>razonsocial</b></td><td>'.$dbrazonsocial.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->nomcomercial.'</td><td align="center"><b>nomcomercial</b></td><td>'.$dbidregistro.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->nif.'</td><td align="center"><b>nif</b></td><td>'.$dbnif.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->tel.'</td><td align="center"><b>tel</b></td><td>'.$dbtel.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->activo.'</td><td align="center"><b>activo</b></td><td>'.$dbactivo.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->codcli.'</td><td align="center"><b>codcli</b></td><td>'.$dbcodcli.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->codpro.'</td><td align="center"><b>codpro</b></td><td>'.$dbcodpro.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->dir.'</td><td align="center"><b>dir</b></td><td>'.$dbdir.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->cp.'</td><td align="center"><b>cp</b></td><td>'.$dbcp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->pobla.'</td><td align="center"><b>pobla</b></td><td>'.$dbpobla.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idprov.'</td><td align="center"><b>idprov</b></td><td>'.$dbidprov.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idpais.'</td><td align="center"><b>idpais</b></td><td>'.$dbidpais.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idtarifa.'</td><td align="center"><b>idtarifa</b></td><td>'.$dbidtarifa.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->codclipro.'</td><td align="center"><b>codclipro</b></td><td>'.$dbcodclipro.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->fechaalta.'</td><td align="center"><b>fechaalta</b></td><td>'.$dbfechaalta.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->ncuenta.'</td><td align="center"><b>ncuenta</b></td><td>'.$dbncuenta.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->notas.'</td><td align="center"><b>notas</b></td><td>'.$dbnotas.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->origen.'</td><td align="center"><b>origen</b></td><td>'.$dborigen.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->email.'</td><td align="center"><b>email</b></td><td>'.$dbemail.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->notaimp.'</td><td align="center"><b>notaimp</b></td><td>'.$dbnotaimp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idcomercial.'</td><td align="center"><b>idcomercial</b></td><td>'.$dbidcomercial.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idtipotercero.'</td><td align="center"><b>idtipotercero</b></td><td>'.$dbidtipotercero.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idactividad.'</td><td align="center"><b>idactividad</b></td><td>'.$dbidactividad.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->clifp.'</td><td align="center"><b>clifp</b></td><td>'.$dbclifp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->clidp.'</td><td align="center"><b>clidp</b></td><td>'.$clidp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->profp.'</td><td align="center"><b>profp</b></td><td>'.$dbprofp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->prodp.'</td><td align="center"><b>prodp</b></td><td>'.$dbprodp.'</td></tr>';
    echo '<tr><td>'.$xml->tercero->idzona.'</td><td align="center"><b>idzona</b></td><td>'.$dbidzona.'</td></tr>';
   

}


echo '</table>';

}
?>
