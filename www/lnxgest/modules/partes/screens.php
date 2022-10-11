<?php

	$numscreen = "";
	$displaytitle = "Partes de trabajo";

if($_GET["section"] == "partes" && $_GET["action"] == "")
{    
    $numscreen = "";
    $displaytitle = "Partes de trabajo";
}
if($_GET["section"] == "partes" && $_GET["action"] == "new")
{    
    $numscreen = "";
    $displaytitle = "Nuevo - Parte de trabajo";
}
if($_GET["section"] == "partes" && $_GET["action"] == "edit")
{    
    $numscreen = "";
    $displaytitle = "Editando - Parte de trabajo";
}
        
?>