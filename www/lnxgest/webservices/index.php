<?php
header("Content-type: text/xml");
require("../core/cfpc.php");

//Comprobamos el usuario y contraseña enviado por POST
$lnx_username = $_POST["lnx_username"];
$lnx_password = $_POST["lnx_password"];
$lnx_module = $_POST["lnx_module"];
$lnx_userid = '0';

$cnssql = $mysqli->query("select * from ".$prefixsql."users where username  = '".$lnx_username."'");
$row = mysqli_fetch_assoc($cnssql);
$dbpassword = $row["password"];
$lnx_userid = $row["id"];
$lnx_userdisplay = $row["display"];

if($lnx_password == $dbpassword)
{
	$lnx_userid = $row["id"];
	$lnx_userdisplay = $row["display"];
}
else
{
	$lnx_userid = '0';
	$lnx_userdisplay = '';
}



	echo '<?xml version="1.0" encoding="UTF-8" ?>'. PHP_EOL ;
	echo '<lnxgest>'. PHP_EOL;
	echo '<userparam>'. PHP_EOL;
	echo '   <lnxuserid>'.$lnx_userid.'</lnxuserid>'. PHP_EOL;
	echo '   <lnxuserdisplay>'.$lnx_userdisplay.'</lnxuserdisplay>'. PHP_EOL;
	echo '</userparam>'. PHP_EOL;


	if($lnx_userid > '0' && $lnx_module <> "")
	{

		include("../modules/".$lnx_module."/ws.php");

	}


	echo '</lnxgest>'. PHP_EOL;


?>
