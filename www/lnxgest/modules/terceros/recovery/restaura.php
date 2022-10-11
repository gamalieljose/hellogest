<?php
//$ficheroxml tiene la ruta completa heredada de backup/restaura.php

$xmltemp = simplexml_load_file($ficheroxml);

$xml_modulo = $xmltemp->module;
$xml_tipoxml = $xmltemp->tipoxml;

if($xml_modulo == "terceros" && $xml_tipoxml == "TERCERO")
{

    $idregistro = $xmltemp->tercero->id;

    
    $xmllbl_razonsocial = addslashes($xmltemp->tercero->razonsocial);
    $xmllbl_nomcomercial = addslashes($xmltemp->tercero->nomcomercial);
    $xmllbl_nif = addslashes($xmltemp->tercero->nif);
    $xmllbl_tel = addslashes($xmltemp->tercero->tel);
    $xmllbl_activo = $xmltemp->tercero->activo;
    $xmllbl_codcli = $xmltemp->tercero->codcli;
    $xmllbl_codpro = $xmltemp->tercero->codpro;
    $xmllbl_dir = addslashes($xmltemp->tercero->dir);
    $xmllbl_cp = $xmltemp->tercero->cp;
    $xmllbl_pobla = addslashes($xmltemp->tercero->pobla);
    $xmllbl_idprov = $xmltemp->tercero->idprov;
    $xmllbl_idpais = $xmltemp->tercero->idpais;
    $xmllbl_idtarifa = $xmltemp->tercero->idtarifa;
    $xmllbl_codclipro = $xmltemp->tercero->codclipro;
    $xmllbl_fechaalta = $xmltemp->tercero->fechaalta;
    $xmllbl_ncuenta = addslashes($xmltemp->tercero->ncuenta);
    $xmllbl_notas = addslashes($xmltemp->tercero->notas);
    $xmllbl_origen = addslashes($xmltemp->tercero->origen);
    $xmllbl_email = addslashes($xmltemp->tercero->email);
    $xmllbl_notaimp = addslashes($xmltemp->tercero->notaimp);
    $xmllbl_idcomercial = $xmltemp->tercero->idcomercial;
    $xmllbl_idtipotercero = $xmltemp->tercero->idtipotercero;
    $xmllbl_idactividad = $xmltemp->tercero->idactividad;
    $xmllbl_clifp = $xmltemp->tercero->clifp;
    $xmllbl_clidp = $xmltemp->tercero->clidp;
    $xmllbl_profp = $xmltemp->tercero->profp;
    $xmllbl_prodp = $xmltemp->tercero->prodp;
    $xmllbl_idzona = $xmltemp->tercero->idzona;
   
    

    $sqlrecovery = $mysqli->query("delete from ".$prefixsql."terceros where id = '".$idregistro."' "); 
    $sqlrecovery = $mysqli->query("insert into ".$prefixsql."terceros 
	(id, razonsocial, nomcomercial, nif, tel, activo, codcli, codpro, dir, cp, pobla, idprov, idpais, idtarifa, codclipro, fechaalta, ncuenta, notas, origen, email, notaimp, idcomercial, idtipotercero, idactividad, clifp, clidp, profp, prodp, idzona) 
	values 
	('".$idregistro."', '".$xmllbl_razonsocial."', '".$xmllbl_nomcomercial."', '".$xmllbl_nif."', '".$xmllbl_tel."', '".$xmllbl_activo."', '".$xmllbl_codcli."', '".$xmllbl_codpro."', '".$xmllbl_dir."', '".$xmllbl_cp."', '".$xmllbl_pobla."', '".$xmllbl_idprov."', '".$xmllbl_idpais."', '".$xmllbl_idtarifa."', '".$xmllbl_codclipro."', '".$xmllbl_fechaalta."', '".$xmllbl_ncuenta."', '".$xmllbl_notas."', '".$xmllbl_origen."', '".$xmllbl_email."', '".$xmllbl_notaimp."', '".$xmllbl_idcomercial."', '".$xmllbl_idtipotercero."', '".$xmllbl_idactividad."', '".$xmllbl_clifp."', '".$xmllbl_clidp."', '".$xmllbl_profp."', '".$xmllbl_prodp."', '".$xmllbl_idzona."')");


        

    unlink($ficheroxml);

}

?>