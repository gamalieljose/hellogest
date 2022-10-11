<?php

require("../../../core/cfpc.php");

if ($_COOKIE["lnxuserid"] > '0')
{
$formatosalida = $_GET["formato"];

$idfichero = $_GET["id"];
$idtercero = $_GET["idtercero"];
$idplantilla = $_GET["idplantilla"];

$sqlfichero= $mysqli->query("select * from ".$prefixsql."ficheros  where id = '".$idfichero ."'");
$row = mysqli_fetch_assoc($sqlfichero);

$dbidfichero = $row['fichero'];
$dbextension = $row['extension'];
$dbdirfichero = $row['dirfichero'];
$dbnombrefichero = $row['nombre'];
$dbtipomime = $row['tipomime'];


$sqlaux = $mysqli->query("select * from ".$prefixsql."users  where id = '".$_COOKIE["lnxuserid"]."'");
$rowaux = mysqli_fetch_assoc($sqlaux);

$dbusername = $rowaux['username'];

$nuevo_fichero = $lnxrutaficherostemp."usr/".$dbusername."/plantilla.fodt";
$lnxficheromuestra = $lnxrutaficheros.$dbdirfichero."/".$dbidfichero;

copy($lnxficheromuestra, $nuevo_fichero);

//una vez copiado tenemso que reemplazar textos

$contenidofichero = file_get_contents($nuevo_fichero);

//Obtenemos las variables -------------------------------------------------------------------------

$sqlaux = $mysqli->query("select * from ".$prefixsql."lopd  where id = '".$idplantilla."'");
$rowaux = mysqli_fetch_assoc($sqlaux);

$tmplt_idempresa = $rowaux["idempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas  where id = '".$tmplt_idempresa."'");
$rowaux = mysqli_fetch_assoc($sqlaux);

$empresa_razonsocial = $rowaux['razonsocial'];
$empresa_nif = $rowaux['nif'];
$empresa_dir = $rowaux['dir'];
$empresa_cp = $rowaux['cp'];
$empresa_pobla = $rowaux['pobla'];
$empresa_tel = $rowaux['tel'];
$empresa_email = $rowaux['email'];
$empresa_representante = $rowaux["responsable"];
$empresa_nifrepresentante = $rowaux["nifresponsable"];

    $idprov = $rowaux['idprov'];
    $idpais = $rowaux['idpais'];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."provincias  where id = '".$idprov."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
$empresa_prov = $rowaux['provincia'];
    $sqlaux = $mysqli->query("select * from ".$prefixsql."paises  where id = '".$idpais."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
$empresa_pais = $rowaux['pais'];



$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros  where id = '".$idtercero."'");
$rowaux = mysqli_fetch_assoc($sqlaux);

$cli_falta = $rowaux['fechaalta'];
    $fano = substr($cli_falta, 0, 4);  
    $fmes = substr($cli_falta, 5, 2);  
    $fdia = substr($cli_falta, 8, 2);  

    $cli_falta = $fdia.'/'.$fmes.'/'.$fano;

$cli_razonsocial = $rowaux['razonsocial'];
$cli_nif = $rowaux['nif'];
$cli_tel = $rowaux['tel'];
$cli_dir = $rowaux['dir'];
$cli_cp = $rowaux['cp'];
$cli_pobla = $rowaux['pobla'];
$cli_codcli = $rowaux['codcli'];
    if($cli_codcli == '0'){$cli_codcli = '';}

    $idprov = $rowaux['idprov'];
    $idpais = $rowaux['idpais'];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."provincias  where id = '".$idprov."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
$cli_prov = $rowaux['provincia'];
    $sqlaux = $mysqli->query("select * from ".$prefixsql."paises  where id = '".$idpais."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
$cli_pais = $rowaux['pais'];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd  where idtercero = '".$idtercero."' and campo = 'representante'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $cli_representante = $rowaux['valor'];
$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd  where idtercero = '".$idtercero."' and campo = 'representantenif'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $cli_representantenif = $rowaux['valor'];
//FIN obtencion variables -----------------------------------------------------------------------------

$contenidofichero = str_replace("[[EMPRESA_RAZONSOCIAL]]", $empresa_razonsocial, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_NIF]]", $empresa_nif, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_DIR]]", $empresa_dir, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_CP]]", $empresa_cp, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_POBLA]]", $empresa_pobla, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_PROV]]", $empresa_prov, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_PAIS]]", $empresa_pais, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_TEL]]", $empresa_tel, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_EMAIL]]", $empresa_email, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_REPRESENTANTE]]", $empresa_representante, $contenidofichero);
$contenidofichero = str_replace("[[EMPRESA_NIFREPRESENTANTE]]", $empresa_nifrepresentante, $contenidofichero);



$contenidofichero = str_replace("[[CLI_FALTA]]", $cli_falta, $contenidofichero);
$contenidofichero = str_replace("[[CLI_RAZONSOCIAL]]", $cli_razonsocial, $contenidofichero);
$contenidofichero = str_replace("[[CLI_NIF]]", $cli_nif, $contenidofichero);
$contenidofichero = str_replace("[[CLI_TEL]]", $cli_tel, $contenidofichero);
$contenidofichero = str_replace("[[CLI_DIR]]", $cli_dir, $contenidofichero);
$contenidofichero = str_replace("[[CLI_CP]]", $cli_cp, $contenidofichero);
$contenidofichero = str_replace("[[CLI_POBLA]]", $cli_pobla, $contenidofichero);
$contenidofichero = str_replace("[[CLI_CODCLI]]", $cli_codcli, $contenidofichero);
$contenidofichero = str_replace("[[CLI_PROV]]", $cli_prov, $contenidofichero);
$contenidofichero = str_replace("[[CLI_PAIS]]", $cli_pais, $contenidofichero);
$contenidofichero = str_replace("[[CLI_REPRESENTANTE]]", $cli_representante, $contenidofichero);
$contenidofichero = str_replace("[[CLI_REPRESENTANTENIF]]", $cli_representantenif, $contenidofichero);

$fechahoy = date("d/m/Y");

$contenidofichero = str_replace("[[FECHA_HOY]]", $fechahoy, $contenidofichero);

file_put_contents($nuevo_fichero, $contenidofichero);




if ($formatosalida == "doc"){$formatodoc = "docx"; $nomficherosalida = "fichero.docx"; $dbtipomime = "application/docx";}
if ($formatosalida == "odt"){$formatodoc = "odt"; $nomficherosalida = "fichero.odt"; $dbtipomime = "application/odt";}
if ($formatosalida == "pdf"){$formatodoc = "pdf"; $nomficherosalida = "fichero.pdf"; $dbtipomime = "application/pdf";;}

$fichero_origen = $nuevo_fichero;
$fichero_salida = $lnxrutaficherostemp."usr/".$dbusername."/".$nomficherosalida;

shell_exec('sudo /lnxgest/scripts/libreofficeconverter.sh ' . $fichero_salida .' '.$fichero_origen.' '.$formatodoc);


//Muestra el archivo resultante

header('Content-disposition: attachment; filename="'.$nomficherosalida.'"');
header("Content-type: ".$dbtipomime);

readfile($fichero_salida);



}

?>

