<?php
$fhidproducto = $_POST["hidproducto"];
$flstalmacenorigen = $_POST["lstalmacenorigen"];
$flstalmacendestino = $_POST["lstalmacendestino"];
$ftxtcantidad = $_POST["txtcantidad"];
$ftxtconcepto = $_POST["txtconcepto"];

//comprovamos que existan los registros articulo y almacen&section
//sino existen, se crean con cantidad de stock = 0

$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$flstalmacenorigen."'");
$existe = $sqlaux->num_rows;

if($existe == '0')
{
	$sqlproductowh = $mysqli->query("insert into ".$prefixsql."productos_wh (idproducto, idwh, stock ) VALUES ('".$fhidproducto."', '".$flstalmacenorigen."', '0')");
}
$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$flstalmacendestino."'");
$existe = $sqlaux->num_rows;

if($existe == '0')
{
	$sqlproductowh = $mysqli->query("insert into ".$prefixsql."productos_wh (idproducto, idwh, stock ) VALUES ('".$fhidproducto."', '".$flstalmacendestino."', '0')");
}

//una vez creado los registro si fueran necesarios procedemos al caluclo

$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$flstalmacenorigen."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbstock_origen = $rowaux["stock"];

$nuevacantidad = $dbstock_origen - $ftxtcantidad;

$sqlproductowh = $mysqli->query("update ".$prefixsql."productos_wh set stock = '".$nuevacantidad."' where idwh = '".$flstalmacenorigen."' and idproducto = '".$fhidproducto."'");



$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$flstalmacendestino."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbstock_destino = $rowaux["stock"];

$nuevacantidad = $dbstock_destino + $ftxtcantidad;

$sqlproductowh = $mysqli->query("update ".$prefixsql."productos_wh set stock = '".$nuevacantidad."' where idwh = '".$flstalmacendestino."' and idproducto = '".$fhidproducto."'");


	
$url_atras = "index.php?module=almacen&section=stock&id=".$fhidproducto;
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>