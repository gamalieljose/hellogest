<?php
$fhaccion = $_POST["haccion"];
$fhidterminal = $_POST["hidterminal"];
$lstproducto = $_POST["lstproducto"];

$url_atras = "index.php?module=tpv&section=cfgtermproduct&id=".$fhidterminal;

if($fhaccion == "new" && $lstproducto > '0')
{   
    $sqlaux = $mysqli->query("select max(orden) as orden from ".$prefixsql."tpv_cfg_home where idterminal = '".$fhidterminal."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dborden = $rowaux["orden"] + 1;
        
    $sqlterm = $mysqli->query("insert into ".$prefixsql."tpv_cfg_home (idterminal, idproducto, orden) values('".$fhidterminal."', '".$lstproducto."', '".$dborden."')");
}

$fidlinea = '';
$fidlinea = $_GET["idlinea"];
$movimiento = $_GET["pos"];
if($fidlinea > '0' && $movimiento <> '')
{    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg_home where id = '".$fidlinea."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $fhidterminal = $rowaux["idterminal"];
    $ordenorigen = $rowaux["orden"];
    
    $url_atras = "index.php?module=tpv&section=cfgtermproduct&id=".$fhidterminal;
    
    if($movimiento == 'up')
    {
        $nuevoorden = $ordenorigen + 1;
    }
    if($movimiento == 'down')
    {
        $nuevoorden = $ordenorigen - 1;
    }
    
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg_home where idterminal = '".$fhidterminal."' and orden = '".$nuevoorden."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $idlineadestino = $rowaux["id"];
    
        $sqlterm = $mysqli->query("update ".$prefixsql."tpv_cfg_home set orden = '".$nuevoorden."' where id = '".$fidlinea."' ");
        
        $sqlterm = $mysqli->query("update ".$prefixsql."tpv_cfg_home set orden = '".$ordenorigen."' where id = '".$idlineadestino."' ");
        
    
    if($movimiento == 'del')
    {
        $sqlterm = $mysqli->query("delete from ".$prefixsql."tpv_cfg_home where id = '".$fidlinea."' ");
        $nuevoid = '0';
        $cnstemp = $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg_home where idterminal = '".$fhidterminal."' order by orden");
        while($coltemp = mysqli_fetch_array($cnstemp))
        {
            $nuevoid = $nuevoid + 1;
            $sqlterm = $mysqli->query("update ".$prefixsql."tpv_cfg_home set orden = '".$nuevoid."' where id = '".$coltemp["id"]."' ");
        }
    }
    
    
}




header("Location: ".$url_atras);
?>