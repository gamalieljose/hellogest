<?php
$limiteregistros = 200;
if($_COOKIE["lnxuserid"] > '0')
{
require("../cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."productos where concepto like '%".$_POST["elegido"]."%' or codventa like '%".$_POST["elegido"]."%' order by concepto");

$contadorregistros = $cnsprov->num_rows;

if($contadorregistros > $limiteregistros)
{    
    $cnsprov = $mysqli->query("SELECT * from ".$prefixsql."productos where concepto like '%".$_POST["elegido"]."%' or codventa like '%".$_POST["elegido"]."%' order by concepto limit ".$limiteregistros);
}

while($prov = mysqli_fetch_array($cnsprov))
{
    echo '<option value="'.$prov["id"].'" >'.$prov["codventa"].' - '.$prov["concepto"].'</option>';
}
$existe = $cnsprov->num_rows;
if($contadorregistros == "0") {echo '<option value="0">-Sin especificar-</option>';}

if($contadorregistros > $limiteregistros)
{ 
    echo '<option value="0">Acote busqueda para mostrar más resultados</option>';
}


echo '</select>';
}



?>