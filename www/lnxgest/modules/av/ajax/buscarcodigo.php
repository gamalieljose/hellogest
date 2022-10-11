<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");


$sqlaux = $mysqli->query("select * from ".$prefixsql."productos where codventa = '".$_POST["codigo"]."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidproducto = $rowaux["id"];
$lblconcepto = $rowaux["concepto"];
$lblprecio = $rowaux["precio"];
	if($lblprecio == ""){$lblprecio = "0";}
$data = array("lbl_concepto" => $lblconcepto, 
"lbl_precio" => $lblprecio );

$sqltaxes = $mysqli->query("select * from ".$prefixsql."productos_tax where idproducto = '".$dbidproducto."'");
while($col = mysqli_fetch_array($sqltaxes))
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$col["idtax"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbimpuesto = $rowaux["impuesto"];
	
	$tax = "tax".$col["idtax"];
	$data[$tax] = $col["valor"];
	
	$lbltax = "lbltax".$col["idtax"];
	$data[$lbltax] = $dbimpuesto;
	
	// array_push($data, $tax => $col["valor"]);
}


    echo json_encode($data);
}
?>