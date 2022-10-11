<?php
$fhaccion = $_POST["haccion"];
$fhidactivo = $_POST["hidactivo"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dirusuario = $rowaux["username"];

$rutaficheromsinfo = $lnxrutaficherostemp."usr/".$dirusuario."/fichero.xml";

if($fhaccion == "nfo" || $fhaccion == "update")
{
    if($fhaccion == "nfo")
    {
        //eliminamos el ficherito
        unlink($rutaficheromsinfo);
    }

    //Importancion fichero nfo
    $ftxtpc_os = addslashes($_POST["txtpc_os"]);
    $ftxtpc_osv = addslashes($_POST["txtpc_osv"]);
    $ftxtpc_cn = addslashes($_POST["txtpc_cn"]);
    $ftxtpc_model = addslashes($_POST["txtpc_model"]);
    $ftxtpc_mbf = addslashes($_POST["txtpc_mbf"]);
    $ftxtpc_mbm = addslashes($_POST["txtpc_mbm"]);
    $ftxtpc_procesador = addslashes($_POST["txtpc_procesador"]);
    $ftxtpc_user = addslashes($_POST["txtpc_user"]);
    $ftxtpc_memoria = addslashes($_POST["txtpc_memoria"]);
    //Uniodades de red
    $ftxtnetmap_id = $_POST["txtnetmap_id"];
    $ftxtnetmap_unidad = $_POST["txtnetmap_unidad"];
    $ftxtnetmap_map = $_POST["txtnetmap_map"];
    $ftxtnetmap_user = $_POST["txtnetmap_user"];

    //Tarjetas de red
    $fhidtarjeta = $_POST["hidtarjeta"];
    $ftxtnetname = $_POST["txtnetname"];
    $ftxtnetmac = $_POST["txtnetmac"];
    $ftxtnetdhcp = $_POST["txtnetdhcp"];
        
    //Direcciones IP del XML
    if($fhaccion == "nfo")
    {
        $fxml_netips = $_POST["xml_netips"];
    }
    if($fhaccion == "update")
    {
        
        $fhidiptarjeta = $_POST["hidiptarjeta"];
        $ftxtiptarjeta = $_POST["txtiptarjeta"];
        $fhidtarjetaasoc = $_POST["hidtarjetaasoc"];
        
    }
    

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_NAME' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_NAME', '".$ftxtpc_cn."', '', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_MODEL' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_MODEL', '".$ftxtpc_model."', '', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_OS' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_OS', '".$ftxtpc_os."', '".$ftxtpc_osv."', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_MOTHERBOARD' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_MOTHERBOARD', '".$ftxtpc_mbf."', '".$ftxtpc_mbm."', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_CPU' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_CPU', '".$ftxtpc_procesador."', '', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_RAM' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_RAM', '".$ftxtpc_memoria."', '', '', '', '') ");

    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'COMPUTER_USER' ");
    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'COMPUTER_USER', '".$ftxtpc_user."', '', '', '', '') ");
    
    //Cargamos las unidades de red en la bbdd
    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and opcion = 'MAPUNIT' ");
    
    foreach ($ftxtnetmap_id as $idmapeo) 
    {
        $x_mapunidad = addslashes($ftxtnetmap_unidad[$idmapeo]);
        $x_mapmap = addslashes($ftxtnetmap_map[$idmapeo]);
        $x_mapuser = addslashes($ftxtnetmap_user[$idmapeo]);
        
        $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'MAPUNIT', '".$x_mapunidad."', '".$x_mapmap."', '".$x_mapuser."', '".$idmapeo."', '') ");
    }

    //Cargamos las tarjetas de red
    $sqlaux = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$fhidactivo."' and (opcion = 'NETCARD' or opcion = 'NETCARD_IP' or opcion = 'NETCARD_DHCP')");
    
    foreach ($fhidtarjeta as $idtarjeta) 
    {
        $x_netname = addslashes($ftxtnetname[$idtarjeta]);
        $x_netmac = addslashes($ftxtnetmac[$idtarjeta]);
        $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'NETCARD', '".$x_netname."', '".$x_netmac."', '', '".$idtarjeta."', '') ");


        if($ftxtnetdhcp[$idtarjeta] == '')
        {
            $x_dhcp_db = 'No';
        }
        else 
        {
            $x_dhcp_db = 'Sí';
        }
        $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'NETCARD_DHCP', '".$x_dhcp_db."', '', '', '".$idtarjeta."', '') ");
        

        //Direcciones IP del XML
        if($fhaccion == "nfo")
        {
            $x_ips = explode(", ", $fxml_netips[$idtarjeta]);
            foreach ($x_ips as $ipindividual) 
            {
                if($ipindividual <> "")
                {
                    $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'NETCARD_IP', '".$ipindividual."', '', '', '".$idtarjeta."', '') ");
                }
            } 
        }
        
        
    }
    if($fhaccion == "update")
    {
        //Cargamos las IP
        foreach ($ftxtiptarjeta as $idip => $valorip) 
        {
            $valorip = addslashes($valorip);
            $sqlaux = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) values ('".$fhidactivo."', 'NETCARD_IP', '".$valorip."', '', '', '".$fhidtarjetaasoc[$idip]."', '') ");
        }
    }
    
}





$urlatras = "index.php?module=lnxit&section=activos&ss=computer&id=".$fhidactivo;
header("Location: ".$urlatras);


?>