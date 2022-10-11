<?php
$flstempresa = $_POST["lstempresa"];
$flstejercicio = $_POST["lstejercicio"];
if($flstempresa > 0)
{
	setcookie("lnxcontaidempresa",$flstempresa);
        setcookie("lnxcontaidejercicio",$flstejercicio);
}
else
{
	setcookie("lnxcontaidempresa","0");	
        setcookie("lnxcontaidejercicio","0");
}


$url_atras = "index.php?module=conta";

header( "Location: ".$url_atras );

?>