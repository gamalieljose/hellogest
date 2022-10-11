<?php
$rutafichero = $_POST["hrutafichero"];
if ($rutafichero !== "")
{

$fhnlinea = $_POST["hnlinea"];
$fhrazonsocial = $_POST["hrazonsocial"];
$fhnomcomercial = $_POST["hnomcomercial"];
$fhnif = $_POST["hnif"];
$fhtel = $_POST["htel"];
$fhactivo = $_POST["hactivo"];
$fhcodcli = $_POST["hcodcli"];
$fhcodpro = $_POST["hcodpro"];
$fhdir = $_POST["hdir"];
$fhcp = $_POST["hcp"];
$fhpobla = $_POST["hpobla"];
$fhidprov = $_POST["hidprov"];
$fhidpais = $_POST["hidpais"];
$fhcodclipro = $_POST["hcodclipro"];
$fhfechaalta = $_POST["hfechaalta"];
$fhncuenta = $_POST["hncuenta"];
$fhnotas = $_POST["hnotas"];
$fhorigen = $_POST["horigen"];
$fhemail = $_POST["hemail"];
$fhnotaimp = $_POST["hnotaimp"];
$fhcomercial = $_POST["hcomercial"];



foreach($fhnlinea as $idlinea => $valor)
{

    $db_razonsocial = addslashes($fhrazonsocial[$idlinea]);
    $db_nomcomercial = addslashes($fhnomcomercial[$idlinea]);
    $db_nif = addslashes($fhnif[$idlinea]);
    $db_tel = addslashes($fhtel[$idlinea]);
    $db_activo = $fhactivo[$idlinea];
    $db_codcli = addslashes($fhcodcli[$idlinea]);
    $db_codpro = addslashes($fhcodpro[$idlinea]);
    $db_dir = addslashes($fhdir[$idlinea]);
    $db_cp = addslashes($fhcp[$idlinea]);
    $db_pobla = addslashes($fhpobla[$idlinea]);
    $db_idprov = $fhidprov[$idlinea];
    $db_idpais = $fhidpais[$idlinea];
    $db_idtarifa = "0";
    $db_codclipro = addslashes($fhcodclipro[$idlinea]);
    $db_fechaalta = addslashes($fhfechaalta[$idlinea]);
    $db_ncuenta = addslashes($fhncuenta[$idlinea]);
    $db_notas = addslashes($fhnotas[$idlinea]);
    $db_origen = addslashes($fhorigen[$idlinea]);
    $db_email = addslashes($fhemail[$idlinea]);
    $db_notaimp = addslashes($fhnotaimp[$idlinea]);
    $db_idcomercial = $fhcomercial[$idlinea];
    $db_idtipotercero = "0";
    $db_idactividad = "0";
    $db_clifp = "0";
    $db_clidp = "0";
    $db_profp = "0";
    $db_prodp = "0";
    $db_idzona = "0";

    if($db_fechaalta == "")
    {
        $db_fechaalta = "0000-00-00";
    }
    else
    {
        $xtemp = explode("/", $db_fechaalta);
        $db_fechaalta = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];
    }
    if($db_codcli == "ADD")
    {
        //Alta como cliente
        $sqlaux = $mysqli->query("select max(codcli) as codclimax from ".$prefixsql."terceros "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $db_codcli = $rowaux["codclimax"] +1;
    }
    else
    {
        $db_codcli = "0";
    }

    if($db_codpro == "ADD")
    {
        //Alta como cliente
        $sqlaux = $mysqli->query("select max(codpro) as codpromax from ".$prefixsql."terceros "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $db_codpro = $rowaux["codpromax"] +1;
    }
    else
    {
        $db_codpro = "0";
    }

if($db_idprov > 0)
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."provincias where id = '".$db_idprov."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $db_idpais = $rowaux["idpais"];
}
else
{
    $db_idprov = 0;
}
    
    


    $sqlinsertar = "insert into ".$prefixsql."terceros 
    (razonsocial, 
    nomcomercial, 
    nif, 
    tel, 
    activo, 
    codcli, 
    codpro, 
    dir, 
    cp, 
    pobla, 
    idprov, 
    idpais, 
    idtarifa, 
    codclipro, 
    fechaalta, 
    ncuenta, 
    notas, 
    origen, 
    email, 
    notaimp, 
    idcomercial, 
    idtipotercero, 
    idactividad, 
    clifp, 
    clidp, 
    profp, 
    prodp, 
    idzona) values ('".$db_razonsocial."', 
    '".$db_nomcomercial."', 
    '".$db_nif."', 
    '".$db_tel."', 
    '".$db_activo."', 
    '".$db_codcli."', 
    '".$db_codpro."', 
    '".$db_dir."', 
    '".$db_cp."', 
    '".$db_pobla."', 
    '".$db_idprov."', 
    '".$db_idpais."', 
    '".$db_idtarifa."', 
    '".$db_codclipro."', 
    '".$db_fechaalta."', 
    '".$db_ncuenta."', 
    '".$db_notas."', 
    '".$db_origen."', 
    '".$db_email."', 
    '".$db_notaimp."', 
    '".$db_idcomercial."', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0')";


    $sqlregistros = $mysqli->query($sqlinsertar); 
    //echo '<p>'.$idlinea.' - '.$sqlinsertar.'</p>';

}



}
$url_atras = "index.php?module=crm&section=import";
//header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">Importación:</td></tr>
<tr><td align="center">Importación realizada con éxito</br></br></td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';
?>