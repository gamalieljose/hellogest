<?php
$lnxinvoice = $_GET["module"];
$campomasterid = "id".$lnxinvoice;

if ($lnxinvoice == "fv") 
{
	$numscreen = "200";
	$textodisplaytitle = "Facturas de venta";
	
}

if ($lnxinvoice == "fvr") 
{
	$numscreen = "";
	$textodisplaytitle = "Facturas de venta Rectificativas";
	
}

if ($lnxinvoice == "pv") 
{
	$numscreen = "";
	$textodisplaytitle = "Pedido de venta";
	
}

if ($lnxinvoice == "ov") 
{
	$numscreen = "";
	$textodisplaytitle = "Presupuestos de venta";
	
}

if ($lnxinvoice == "av") 
{
	$numscreen = "";
	$textodisplaytitle = "Albaranes de venta";
	
}


if ($lnxinvoice == "fc") 
{
	$numscreen = "300";
	$textodisplaytitle = "Facturas de compra";
	
}

$iddocumentoscreen = $_GET["id"];

if ($_GET["section"] == "print" && $_GET["action"] == "print")
{
	$iddocumentoscreen = $_POST["hidfv"];
}

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumentoscreen."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$coddocfactu = $rowprincipal["codigo"];
$dbidserie = $rowprincipal["idserie"];
$dbidusuario = $rowprincipal["idusuario"];
$dbidestado = $rowprincipal["estado"];
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$dbidserie."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbserie = $rowaux["serie"];
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$dbidusuario."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbusuario = $rowaux["display"];




$displaytitle = $coddocfactu." - ".$textodisplaytitle ;
?>