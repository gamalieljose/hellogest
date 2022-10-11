<?php
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$_POST["elegido"]."' order by provincia");
while($prov = mysqli_fetch_array($cnsprov))
{

	echo '<option value="'.$prov["id"].'" >'.$prov["provincia"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0">-Sin especificar-</option>';}
echo '</select>';
?>

