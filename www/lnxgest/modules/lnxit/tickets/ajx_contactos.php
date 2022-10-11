<?php
require("../../../core/cfpc.php");


$cnscontactos = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$_POST["elegido"]."' order by nombre");
while($contactos = mysqli_fetch_array($cnscontactos))
{

	echo '<option value="'.$contactos["id"].'" >'.$contactos["nombre"].'</option>';
	
}
$existe = $cnscontactos->num_rows;
if($existe == "0") {echo '<option value="0">-Sin especificar-</option>';}

?>

