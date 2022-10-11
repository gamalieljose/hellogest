<?php
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."conta_ejercicios where idempresa = '".$_POST["elegido"]."' order by codigoint");
while($col = mysqli_fetch_array($cnsprov))
{

	echo '<option value="'.$col["id"].'" >'.$col["codigo"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0">-Sin especificar-</option>';}
echo '</select>';
?>
