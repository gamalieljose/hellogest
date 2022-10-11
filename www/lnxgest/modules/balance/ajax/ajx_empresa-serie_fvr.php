<?php
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'FR' and cv = '2' and idempresa = '".$_POST["idempresa"]."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

    if ($columna["dft"] == '1'){$defecto = " selected";}else{$defecto = "";}
    echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["serie"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0">NO existen series</option>';}
echo '</select>';
?>

