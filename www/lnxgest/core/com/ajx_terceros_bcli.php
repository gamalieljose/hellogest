<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../cfpc.php");


$cadenabuscar = addslashes($_POST["elegido"]);

echo '<select>';
$sqlregistro = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."terceros where (razonsocial like '%".$cadenabuscar."%' or nomcomercial like '%".$cadenabuscar."%' or codcli like '%".$cadenabuscar."%' or nif like '%".$cadenabuscar."%') and codcli > '0'"); 
$row = mysqli_fetch_assoc($sqlregistro);
$contador = $row["contador"];

$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."terceros where (razonsocial like '%".$cadenabuscar."%' or nomcomercial like '%".$cadenabuscar."%' or codcli like '%".$cadenabuscar."%' or nif like '%".$cadenabuscar."%') and codcli > '0' order by razonsocial limit 250");
while($prov = mysqli_fetch_array($cnsprov))
{
	if($_COOKIE["lnxuserset_showcods"] == 1)
	{
		$lbl_userset_showcods = "[".$prov["codcli"]."]";
	}
	else
	{
		$lbl_userset_showcods = "";
	}

	echo '<option value="'.$prov["id"].'" >'.$prov["razonsocial"].' '.$lbl_userset_showcods.'</option>';
	
}

echo '<option value="0">-Sin especificar-</option>';

if($contador > 250)
{
	echo '<optgroup class="maintitle" label="Acote mejor su búsqueda se muestran 250 registros de '.$contador.' disponibles"></optgroup>';
}

echo '</select>';
}
?>