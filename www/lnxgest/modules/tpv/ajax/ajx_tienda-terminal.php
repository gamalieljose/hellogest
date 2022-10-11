<?php
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."pos_terminales where idtienda = '".$_POST["elegido"]."' order by descripcion");

while($prov = mysqli_fetch_array($cnsprov))
{

	echo '<option value="'.$prov["id"].'" >'.$prov["descripcion"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0">NO existen terminales</option>';}
echo '</select>';
?>

