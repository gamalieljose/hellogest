<?php
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
echo '<a class="nav-link" href="index.php?module=core">';
   echo '<i class="fa fa-fw fa-cogs"></i>';
 echo '<span class="nav-link-text"> Configuración</span>';
echo '</a>';
echo '</li>';

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == '' || $_GET["section"] == 'main')
{
	$menuseleccionado = 'caret-right ';
}
else
{
	$menuseleccionado = 'piggy-bank';
}
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Listado">';
   echo '<a class="nav-link" href="index.php?module=ficheros">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Listado</span>';
  echo '</a>';
echo '</li>';
	

if ($_GET["section"] == 'purgar' || $_GET["section"] == 'purgar2')
{
	$menuseleccionado = 'caret-right ';
}
else
{
	$menuseleccionado = 'piggy-bank';
}
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Elementos huierfanos">';
   echo '<a class="nav-link" href="index.php?module=ficheros&section=purgar">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Elementos huerfanos</span>';
  echo '</a>';
echo '</li>';



if ($_GET["section"] == 'cat')
{
	$menuseleccionado = 'caret-right ';
}
else
{
	$menuseleccionado = 'piggy-bank';
}
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorias">';
   echo '<a class="nav-link" href="index.php?module=ficheros&section=cat">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Categorias</span>';
  echo '</a>';
echo '</li>';


if ($_GET["section"] == 'icf') //Indexa Contenido Fichero
{
	$menuseleccionado = 'caret-right ';
}
else
{
	$menuseleccionado = 'sync-alt';
}
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reindexar">';
   echo '<a class="nav-link" href="index.php?module=ficheros&section=icf">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Reindexar</span>';
  echo '</a>';
echo '</li>';



?>
