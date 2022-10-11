<?php
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$_POST["elegido"]."' order by serie");

$existe = $cnsprov->num_rows;
if($existe == "0") 
{
	echo '<option value="0">NO existen series</option>';
}
else
{
	echo '<optgroup label="Compra">';
	$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$_POST["elegido"]."' and cv = '1' order by serie");
	while($col = mysqli_fetch_array($cnsprov))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $rowaux["razonsocial"];

		if($col["cv"] == '1'){$tipocv = 'Compra';}
		if($col["cv"] == '2'){$tipocv = 'Venta';}

	echo '<option value="'.$col["id"].'" >'.$col["serie"].' - '.$tipocv.' - ('.$dbrazonsocial.')</option>';
		
	}
	
	echo '<optgroup label="Ventas">';
	$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$_POST["elegido"]."' and cv = '2' order by serie");
	while($col = mysqli_fetch_array($cnsprov))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $rowaux["razonsocial"];

		if($col["cv"] == '1'){$tipocv = 'Compra';}
		if($col["cv"] == '2'){$tipocv = 'Venta';}

	echo '<option value="'.$col["id"].'" >'.$col["serie"].' - '.$tipocv.' - ('.$dbrazonsocial.')</option>';
		
	}
}
echo '</select>';
?>

