<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where idempresa = '".$_POST["elegido"]."' and tipo = 'TPV' and cv = '2'");
$existe = $cnsprov->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen series</option>';}
    else
{echo '<option value="0">Todas las series TPV</option>';}

while($col = mysqli_fetch_array($cnsprov))
{
	echo '<option value="'.$col["id"].'" >'.$col["serie"].'</option>';
}

echo '</select>';
}
?>