<?php

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


if ($_GET["section"] == 'prestamos' || $_GET["section"] == '')
	{
		
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'book-reader';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Terceros">';
   echo '<a class="nav-link" href="index.php?module=biblio&section=prestamos">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Prestamos</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'libros' )
	{
		
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'book';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Libros">';
   echo '<a class="nav-link" href="index.php?module=biblio&section=libros">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Libros</span>';
  echo '</a>';
echo '</li>';

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == 'autores' )
	{
		
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'users';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Autores">';
   echo '<a class="nav-link" href="index.php?module=biblio&section=autores">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Autores</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'categorias' )
	{
		
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'th-large';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorias">';
   echo '<a class="nav-link" href="index.php?module=biblio&section=categorias">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Categorias</span>';
  echo '</a>';
echo '</li>';



$menuseleccionado = 'flag-usa';

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Idiomas">';
   echo '<a class="nav-link" href="index.php?module=core&section=dic&subs=idiomas">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Idiomas</span>';
  echo '</a>';
echo '</li>';



?>