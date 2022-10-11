<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where nombre like '%".$_POST["elegido"]."%' and idtercero = '".$_POST["idtercero"]."' order by nombre");
while($prov = mysqli_fetch_array($cnsprov))
{

	echo '<option value="'.$prov["id"].'" >'.$prov["nombre"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0">-Sin especificar-</option>';}
echo '</select>';
}
?>