<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsajax = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$_POST["idtercero"]."' and nombre like '%".$_POST["nombrecontacto"]."%' order by nombre");

echo '<option value="0" >- Sin Asignar -</option>'; 

while($col = mysqli_fetch_array($cnsajax))
{

	echo '<option value="'.$col["id"].'" >'.$col["nombre"].'</option>';
	
}
$existe = $cnsajax->num_rows;
if($existe == "0") {echo '<option value="0">-Sin especificar-</option>';}
echo '</select>';
}
?>