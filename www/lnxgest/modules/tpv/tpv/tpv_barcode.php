<?php
$idtpv = $_POST["hidtpv"];
$ftxtbarcode = addslashes($_POST["txtbarcode"]);

$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where barcode = '".$ftxtbarcode."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$id_producto = $rowaux["id"];

if ($id_producto > 0)
{
	$sqlaux = $mysqli->query("select max(orden) as contador from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dborden = $rowaux["contador"] +1;

$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$id_producto."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodventa = $rowaux["codventa"];
$dbconcepto = $rowaux["concepto"];
$dbprecio = $rowaux["precio"];


$sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_lineas (idtpv, orden, codventa, concepto, unidades, precio, importe) VALUES ('".$idtpv."', '".$dborden."', '".$dbcodventa."', '".$dbconcepto."', '1', '".$dbprecio."', '".$dbprecio."')");


$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."tpv_lineas "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$ultimoidlinea = $rowaux["contador"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbididserie = $rowaux["idserie"];


//Ahora insertamos los impuestos

//Primero buscamos los impuestos relacionados con la serie
$ConsultaMySql = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbididserie."' order by orden");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    $db_editable = $col["editable"];
    $db_idimpuesto = $col["idimpuesto"];
    $db_valor = $col["valor"];
    
    if($db_editable == '1')
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."productos_tax where idproducto = '".$id_producto."' and idtax = '".$db_idimpuesto."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbvalortaxproducto = $rowaux["valor"];
        $existetax = $sqlaux->num_rows;
                
        if($existetax == '1')
        {
            $db_valor = $dbvalortaxproducto;
        }
        
        $cal_importe = $dbprecio / 100 * $db_valor;
    }
    $sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_lineas_tax (idtpv, idlinea, idtax, valor, importe )VALUES ('".$idtpv."', '".$ultimoidlinea."', '".$db_idimpuesto."', '".$db_valor."', '".$cal_importe."')");
    
}
	
	
	
}



header ("Location: index.php?module=tpv&section=tpv&action=view&id=".$idtpv);
?>

