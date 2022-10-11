<?php

if ($_GET["section"] == '' || $_GET["section"] == 'list') {include("modules/ficheros/ficheros_list.php");}
if ($_GET["section"] == 'new') {include("modules/ficheros/ficheros_new.php");}
if ($_GET["section"] == 'edit') {include("modules/ficheros/ficheros_edit.php");}
if ($_GET["section"] == 'del') {include("modules/ficheros/ficheros_del.php");}
if ($_GET["section"] == 'save') {include("modules/ficheros/ficheros_save.php");}
if ($_GET["section"] == 'download') {include("modules/ficheros/download.php");}

//muestra subir archivo o buscar existente
if ($_GET["section"] == 'sel') {include("modules/ficheros/sel/sel.php");}
if ($_GET["section"] == 'selsave') {include("modules/ficheros/sel/sel_save.php");}

if ($_GET["section"] == 'seledit') {include("modules/ficheros/sel/sel_edit.php");}
if ($_GET["section"] == 'selborra') {include("modules/ficheros/sel/sel_borra.php");}


//Elementos huerfanos / purga

if ($_GET["section"] == 'purgar') {include("modules/ficheros/purgar/purgar_list.php");}
if ($_GET["section"] == 'purgar2') {include("modules/ficheros/purgar/purgar_paso2.php");}
if ($_GET["section"] == 'purgarsave') {include("modules/ficheros/purgar/purgar_save.php");}


//Categorias ficheros
if ($_GET["section"] == 'cat') {include("modules/ficheros/catfiles/catfile_list.php");}
if ($_GET["section"] == 'catnew') {include("modules/ficheros/catfiles/catfile_new.php");}
if ($_GET["section"] == 'catedit') {include("modules/ficheros/catfiles/catfile_edit.php");}
if ($_GET["section"] == 'catdel') {include("modules/ficheros/catfiles/catfile_del.php");}
if ($_GET["section"] == 'catsave') {include("modules/ficheros/catfiles/catfile_save.php");}

if ($_GET["section"] == 'icf') {include("modules/ficheros/icf/icf.php");}
if ($_GET["section"] == 'icfsave') {include("modules/ficheros/icf/icfsave.php");}
?>