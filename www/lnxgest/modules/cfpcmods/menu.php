<?php

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if($_GET["section"] == 'modulos' )
{	
    $menuseleccionado = 'caret-right';		
}
else
{
    $menuseleccionado = 'chalkboard';	
}
	
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modulos">';
   echo '<a class="nav-link" href="index.php?module=cfpcmods&section=modulos">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Modulos</span>';
  echo '</a>';
echo '</li>';

if($_GET["section"] == 'permisos' )
{	
    $menuseleccionado = 'caret-right';		
}
else
{
    $menuseleccionado = 'chalkboard';	
}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Permisos">';
   echo '<a class="nav-link" href="index.php?module=cfpcmods&section=permisos">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Permisos</span>';
  echo '</a>';
echo '</li>';



?>