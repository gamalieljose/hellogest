<?php

if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");



$cnsseries = $mysqli->query("SELECT * FROM ".$prefixsql."productos where id_tipoarticulo = '".$_POST["idcategoria"]."' ");

$data = array();

while($col = mysqli_fetch_array($cnsseries))
{

    
	
	$prtlinea = '<a href="index.php?module=tpv&section=tpv&action=add&id='.$_POST["idtpv"].'&idproducto='.$col["id"].'"><div class="contenedor_producto"><p>'.$col["concepto"].'</p><p>'.$col["codventa"].'</p></div></a>';
	array_push($data, $prtlinea);	
}

    echo json_encode($data);
}


?>