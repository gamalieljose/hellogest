<?php
require("../../../core/cfpc.php");


$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'FR' and cv = '2' and idempresa = '".$_POST["idempresa"]."' and activo = '1' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

    if ($columna["dft"] == '1')
{
    echo '<label><b><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" checked=""> '.$columna["serie"].'</b></label> ';
}
else
{
	echo '<label><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" > '.$columna["serie"].'</label> ';
}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}

?>

