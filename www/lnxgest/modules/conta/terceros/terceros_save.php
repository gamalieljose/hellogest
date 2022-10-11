<?php
$fhidtercero = $_POST["hidtercero"];
$fhaccion = $_POST["haccion"];
$idempresa = $_COOKIE["lnxcontaidempresa"];

$flblcontacodcli = $_POST["lblcontacodcli"];
$ftxtcontacodcli = $_POST["txtcontacodcli"];
$ftxtcontacodpro = $_POST["txtcontacodpro"];
$flblcontacodpro = $_POST["lblcontacodpro"];




if($_POST["hcontacli"] == "OK" || ($flblcontacodcli == "" || $ftxtcontacodcli == "" || $flblcontacodcli == "ERROR"))
{    
    $actualizacliente = "NO";
}
else
{    
    $actualizacliente = "YES";
}

if($_POST["hcontapro"] == "OK" || ($flblcontacodpro == "" || $ftxtcontacodpro == "" || $flblcontacodpro == "ERROR"))
{    
    $actualizaproveedor = "NO";
}
else
{    
    $actualizaproveedor = "YES";
}

/*
echo '<p>Actualiza cli: '.$actualizacliente.'</p>';
echo '<p>Actualiza pro: '.$actualizaproveedor.'</p>';
*/


if($fhaccion == "update")
{   
    if($actualizacliente == "YES")
    {
        //Asignamos codigo contable empresa / tercero
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$fhidtercero."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lblrazonsocial = $rowaux["razonsocial"];
        $lblrazonsocial = "Cliente: ".$lblrazonsocial;
        
        $xcodigoconta = explode(".", $flblcontacodcli);

        $sqlconta = $mysqli->query("insert into ".$prefixsql."conta_master (idempresa, grupo, subcuenta, descripcion, modulo, idreg) values ('".$idempresa."', '".$xcodigoconta[0]."', '".$xcodigoconta[1]."', '".$lblrazonsocial."', 'terceros-cli', '".$fhidtercero."')"); 
    }
    
    if($actualizaproveedor == "YES")
    {
        //Asignamos codigo contable empresa / tercero
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$fhidtercero."'"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lblrazonsocial = $rowaux["razonsocial"];
        $lblrazonsocial = "Proveedor ".$lblrazonsocial;
        
        $xcodigoconta = explode(".", $flblcontacodpro);
        $sqlconta = $mysqli->query("insert into ".$prefixsql."conta_master (idempresa, grupo, subcuenta, descripcion, modulo, idreg) values ('".$idempresa."', '".$xcodigoconta[0]."', '".$xcodigoconta[1]."', '".$lblrazonsocial."', 'terceros-pro', '".$fhidtercero."')"); 
    }
    
    $msg_mensaje = "Cambios efectuados con éxito";
}



$url_atras = "index.php?module=conta&section=terceros&action=edit&idtercero=".$fhidtercero;
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">mensaje:</td></tr>
<tr><td>'.$msg_mensaje.'</td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';

?>