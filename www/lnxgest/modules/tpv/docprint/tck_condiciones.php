<?php


// $idtpv es el identificador del ticket

$sqlcondiciones = $mysqli->query("select * from ".$prefixsql."tpv_cfg_ia where activo = '1'");
while($col = mysqli_fetch_array($sqlcondiciones))
{
    if($col["cuando"] == 'ENPRO')
    {
        $idproducto = $col["idproducto"];
        $impresos_min = $col["min"];
        $impresos_max = $col["max"];
        
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$idproducto."'");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbcodventa = $rowaux["codventa"];
        
        
        
        $sqllineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' and codventa = '".$dbcodventa."' and (unidades >= '".$impresos_min."' and unidades <= '".$impresos_max."') ");
        while($collineas = mysqli_fetch_array($sqllineas))
        {
            if($col["copias"] == '2'){$numcopias = $collineas["unidades"];}
            if($col["copias"] == '1'){$numcopias = "1";}
       
            include("modules/tpv/docprint/".$col["docprint"]);

        }

        
    }
    
    if($col["cuando"] == 'IMPTO')
    {
        $importe_min = $col["min"];
        $importe_max = $col["max"];
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."'");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbimporte = $rowaux["importe"];
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbimportetax = $rowaux["importe"];
        
        $importetotal = $dbimporte + $dbimportetax;
        if($importetotal >= $importe_min && $importetotal <= $importe_max)
        {
            include("modules/tpv/docprint/".$col["docprint"]);
        }
        
        
    }
    
    if($col["cuando"] == 'TEXTO')
    {
        $cantidad_min = $col["min"];
        $cantidad_max = $col["max"];
        $dbtexto = $col["texto"];
        
        
        $sqllineas = $mysqli->query("select * from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' and concepto like '%".$dbtexto."%' and (unidades >= '".$cantidad_min."' and unidades <= '".$cantidad_max."') ");
        while($collineas = mysqli_fetch_array($sqllineas))
        {
            if($col["copias"] == '2'){$numcopias = $collineas["unidades"];}
            if($col["copias"] == '1'){$numcopias = "1";}
       
            include("modules/tpv/docprint/".$col["docprint"]);
            
            $numcopias = "0";

        }
        
    }
}


?>