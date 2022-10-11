<?php

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
echo '<a class="nav-link" href="index.php?module=core">';
   echo '<i class="fa fa-fw fa-cogs"></i>';
 echo '<span class="nav-link-text"> Configuración</span>';
echo '</a>';
echo '</li>';

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == 'extapps')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'users';
	}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Aplicaciones externas">';
   echo '<a class="nav-link" href="index.php?module=lnxrouter&section=extapps">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Aplicaciones externas</span>';
  echo '</a>';
echo '</li>';



?>