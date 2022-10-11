<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$_POST["elegido"]."' ");

echo '<option value="0">Todos los terminales</option>';

while($col = mysqli_fetch_array($cnsprov))
{
   echo '<option value="'.$col["id"].'" >'.$col["descripcion"].'</option>';
}

echo '</select>';
}
?>