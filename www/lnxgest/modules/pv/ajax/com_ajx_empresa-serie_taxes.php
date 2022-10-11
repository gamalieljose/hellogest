<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

$data = array();

$cnsseries = $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$_POST["idserie"]."' order by orden");
while($col = mysqli_fetch_array($cnsseries))
{
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$col["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimpuesto = $rowaux["impuesto"];
	
	$idtemp = $idtemp +1;

	if($col["editable"] == '1')	
	{$wcampotax =  '<input type="number" value="'.$col["valor"].'" name="txtimpuesto[]" />';} 
	else 
	{$wcampotax =  '<input type="hidden" value="'.$col["valor"].'" name="txtimpuesto[]" />'.$col["valor"];} 

	$wcampoidtax =  '<input type="hidden" value="'.$col["idimpuesto"].'" name="hidimpuesto[]">';

	
	
	$varlinea =  $dbimpuesto.' '.$wcampotax.$wcampoidtax.' </br>';;
	array_push($data, $varlinea);
}

echo json_encode($data);
}
?>

