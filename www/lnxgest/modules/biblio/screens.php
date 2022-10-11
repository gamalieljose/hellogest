<?php

$numscreen = "";
$displaytitle = "Biblioteca";

if ($_GET["section"] == 'prestamos' || $_GET["section"] == '')
{
	$displaytitle = "Prestamos en curso";
}


if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'new'){$displaytitle = "Nuevo prestamo";}
if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'edit'){$displaytitle = "Editando prestamo";}
if ($_GET["section"] == 'prestamos' && $_GET["action"] == 'entrega'){$displaytitle = "Entrega prestamo";}


if ($_GET["section"] == 'libros' && $_GET["action"] == ''){$displaytitle = "Gestión de libros";}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'new'){$displaytitle = "Nuevo libro";}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'edit'){$displaytitle = "Editando libro";}
if ($_GET["section"] == 'libros' && $_GET["action"] == 'del'){$displaytitle = "Eliminar libro";}

if ($_GET["section"] == 'autores' && $_GET["action"] == ''){$displaytitle = "Autores";}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'new'){$displaytitle = "Nuevo autor";}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'edit'){$displaytitle = "Editando autor";}
if ($_GET["section"] == 'autores' && $_GET["action"] == 'del'){$displaytitle = "Eliminar autor";}

if ($_GET["section"] == 'categorias' && $_GET["action"] == ''){$displaytitle = "Categorias";}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'new'){$displaytitle = "Nueva categoría";}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'edit'){$displaytitle = "Editando categoría";}
if ($_GET["section"] == 'categorias' && $_GET["action"] == 'del'){$displaytitle = "Eliminar categoría";}

?>