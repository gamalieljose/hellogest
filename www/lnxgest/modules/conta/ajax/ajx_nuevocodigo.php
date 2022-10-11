<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idejercicio = $_COOKIE["lnxcontaidejercicio"];

if($_COOKIE["lnxuserid"] > '0' && $idempresa > '0')
{
    require("../../../core/cfpc.php");
    
    $codigoabuscar = $_POST["codigo"];
       
    $xcodigobusca = explode(".", $codigoabuscar);
    
        
    $digitosgrupo = strlen($xcodigobusca[0]);
    
    $cerosanadir = 4 - $digitosgrupo;

    $i = 0;
    $textoceros = "";
    do {
        $i = $i + 1;
        $textoceros = $textoceros."0";
    } 
    while ($i < $cerosanadir);
    
    
    $cuentabuscar = $xcodigobusca[0].$textoceros;
     
       
    
    $sqlaux = $mysqli->query("select count(subgrupo) as contador from ".$prefixsql."conta_subgrupos where idserie = '".$idejercicio."' and idempresa = '".$idempresa."' and subgrupo = '".$cuentabuscar."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $existe = $rowaux["contador"];
    
    if($existe > 0)
    {
        $sqlaux = $mysqli->query("select max(subcuenta) as contador from ".$prefixsql."conta_master where idempresa = '".$idempresa."' and grupo = '".$cuentabuscar."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbcuenta = $rowaux["contador"] +1;

        $rs_contabreviado = $cuentabuscar.".".$dbcuenta;      
       
        $sqlaux = $mysqli->query("select * from ".$prefixsql."conta_subgrupos where idserie = '".$idejercicio."' and idempresa = '".$idempresa."' and subgrupo = '".$cuentabuscar."' limit 1"); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $rs_contalabel = $rowaux["descripcion"];
    }
    else
    {
        $rs_contabreviado = "ERROR";
        $rs_contalabel = "ERROR";
        
    }
    $data = array("conta_abreviado" => $rs_contabreviado, "conta_label" => $rs_contalabel);
    
    echo json_encode($data);
}

