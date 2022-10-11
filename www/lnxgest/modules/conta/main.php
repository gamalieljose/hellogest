<?php
if($_GET["section"] == "login" && $_GET["action"]=="save"){include("modules/conta/empresa_save.php");}

if($_COOKIE["lnxcontaidempresa"] > 0)
{
	if($_GET["section"] == "" && $_GET["action"]==""){include("modules/conta/empresa_ok.php");}
	if($_GET["section"] == "login" && $_GET["action"]=="save"){include("modules/conta/empresa_save.php");}
	if($_GET["section"] == "login" && $_GET["action"]=="logout"){include("modules/conta/empresa_logout.php");}      

        if($_GET["section"] == "ejercicios" && $_GET["action"] == ""){include("modules/conta/ejercicios/ejercicios.php");}
        if($_GET["section"] == "ejercicios" && $_GET["action"] == "new"){include("modules/conta/ejercicios/ejercicios_new.php");}
        if($_GET["section"] == "ejercicios" && $_GET["action"] == "edit"){include("modules/conta/ejercicios/ejercicios_edit.php");}
        if($_GET["section"] == "ejercicios" && $_GET["action"] == "save"){include("modules/conta/ejercicios/ejercicios_save.php");}
        
        if($_GET["section"] == "grupos" && $_GET["action"] == ""){include("modules/conta/grupos/grupos.php");}
        if($_GET["section"] == "grupos" && $_GET["action"] == "new"){include("modules/conta/grupos/grupos_new.php");}
        if($_GET["section"] == "grupos" && $_GET["action"] == "edit"){include("modules/conta/grupos/grupos_edit.php");}
        if($_GET["section"] == "grupos" && $_GET["action"] == "save"){include("modules/conta/grupos/grupos_save.php");}
        
        if($_GET["section"] == "subgrupos" && $_GET["action"] == ""){include("modules/conta/subgrupos/subgrupos.php");}
        if($_GET["section"] == "subgrupos" && $_GET["action"] == "new"){include("modules/conta/subgrupos/subgrupos_new.php");}
        if($_GET["section"] == "subgrupos" && $_GET["action"] == "edit"){include("modules/conta/subgrupos/subgrupos_edit.php");}
        if($_GET["section"] == "subgrupos" && $_GET["action"] == "save"){include("modules/conta/subgrupos/subgrupos_save.php");}
        
        if($_GET["section"] == "terceros" && $_GET["action"] == ""){include("modules/conta/terceros/terceros.php");}
        if($_GET["section"] == "terceros" && $_GET["action"] == "edit"){include("modules/conta/terceros/terceros_edit.php");}
        if($_GET["section"] == "terceros" && $_GET["action"] == "save"){include("modules/conta/terceros/terceros_save.php");}

        if($_GET["section"] == "pgc" && $_GET["action"] == ""){include("modules/conta/pgc/pgc.php");}
        
        if($_GET["section"] == "config" && $_GET["action"] == ""){include("modules/conta/config/config.php");}
        if($_GET["section"] == "config" && $_GET["action"] == "save"){include("modules/conta/config/config_save.php");}
}
else
{
	include("modules/conta/empresa.php");
}



	
?>