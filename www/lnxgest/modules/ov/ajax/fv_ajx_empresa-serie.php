<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'F' and cv = '2' and idempresa = '".$_POST["elegido"]."' order by serie");
while($prov = mysqli_fetch_array($cnsprov))
{
    if($prov["dft"] == '1'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$prov["id"].'" '.$seleccionado.'>'.$prov["serie"].'</option>';
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<option value="0"Seleccione una empresa</option>';}
echo '</select>';

}
?>

