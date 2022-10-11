<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

$ary_users_cola = array();

$fiduseractual = $_POST["iduseractual"];

$cnssql = $mysqli->query("SELECT DISTINCT(idusuario) as idusuario FROM ".$prefixsql."it_colas_perm where idcola = '".$_POST["idcola"]."' ");
while($col = mysqli_fetch_array($cnssql))
{
	//Pasamos los usuarios que pertenecen a una cola
	array_push ( $ary_users_cola , $col["idusuario"] );
}


echo '<select>';
echo '<option value="0">-Sin especificar-</option>';

$cnssql = $mysqli->query("SELECT * FROM ".$prefixsql."users where activo = '1' or id = '".$fiduseractual."' order by display ");
while($col = mysqli_fetch_array($cnssql))
{	
	$muestrausercola = '';
	foreach($ary_users_cola as $iduserencola)
	{
		if($iduserencola == $col["id"])	
		{
			$muestrausercola = 'style="background-color: #b3d5eb;"';
		}
	}
	if($fiduseractual == $col["id"]){$seleccionado = 'selected=""'; $useroriginal = 'class="maintitle"';}else{$seleccionado = ''; $useroriginal = '';}

	echo '<option value="'.$col["id"].'" '.$useroriginal.' '.$muestrausercola.' '.$seleccionado.'>'.$col["display"].'</option>';
}

echo '</select>';
}
?>