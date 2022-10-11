<?php
//customers
$rutacfpc = "../../core/cfpc.php";
require($rutacfpc);


echo '<select name="cbprov">';

	
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$_GET["idpais"]."'");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
    
	echo '<option value="'.$columna["id"].'">'.$columna["provincia"].'</option>';

}
			
	
echo '</select>';
?>