<?php
include("modules/biblio/bibliocfpc.php");

if (($_GET["section"] == 'prestamos' || $_GET["section"] == '') && $_GET["action"] == ''){include("modules/biblio/prestamos/prestamos.php");}
if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'new'){include("modules/biblio/prestamos/prestamos_new.php");}
if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'edit'){include("modules/biblio/prestamos/prestamos_edit.php");}

if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'entrega'){include("modules/biblio/prestamos/prestamos_entrega.php");}



if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'save'){include("modules/biblio/prestamos/prestamos_save.php");}
//libros

if ($_GET["section"] == 'libros' && $_GET["action"] == ''){include("modules/biblio/libros/libro_list.php");}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'new'){include("modules/biblio/libros/libro_new.php");}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'edit'){include("modules/biblio/libros/libro_edit.php");}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'del'){include("modules/biblio/libros/libro_del.php");}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'save'){include("modules/biblio/libros/libro_save.php");}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'docprint'){include("modules/biblio/libros/docprint.php");}

if ($_GET["section"] == 'autores' && $_GET["action"] == ''){include("modules/biblio/autores/autor_list.php");}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'new'){include("modules/biblio/autores/autor_new.php");}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'edit'){include("modules/biblio/autores/autor_edit.php");}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'del'){include("modules/biblio/autores/autor_del.php");}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'save'){include("modules/biblio/autores/autor_save.php");}

if ($_GET["section"] == 'categorias' && $_GET["action"] == ''){include("modules/biblio/categorias/categoria_list.php");}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'new'){include("modules/biblio/categorias/categoria_new.php");}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'edit'){include("modules/biblio/categorias/categoria_edit.php");}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'del'){include("modules/biblio/categorias/categoria_del.php");}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'save'){include("modules/biblio/categorias/categoria_save.php");}


?>