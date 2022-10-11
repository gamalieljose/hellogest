<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");


$fiduseractual = $_POST["iduseractual"];

echo '<select>';
$cnsajax = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$_POST["idtercero"]."' and nombre like '%".$_POST["nombrecontacto"]."%' order by nombre");

echo '<option value="0" >- Sin Asignar -</option>'; 

while($col = mysqli_fetch_array($cnsajax))
{

	echo '<option value="'.$col["id"].'" >'.$fiduseractual.' '.$col["nombre"].'</option>';
	
}

echo '</select>';
}
?>