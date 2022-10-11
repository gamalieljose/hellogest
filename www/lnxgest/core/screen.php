<?php
require("core/cfpc.php");

$screen = strtoupper($_POST["txtscreen"]);

$sqlscreen = $mysqli->query("select * from ".$prefixsql."screens where screen = '".$screen."'");

$existe = $sqlscreen->num_rows;
	if ($existe == '1')
	{
	$camposscreen = mysqli_fetch_assoc($sqlscreen);
	$urlscreen = $camposscreen['url'];
	
	header('Location: '.$urlscreen);
	}
	else
	{
	header('Location: index.php?idmenu=0&error=si');
	}
?>
