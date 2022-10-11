<?php
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


//si existe el modulo partes muestra la entrada en el menu
$nombre_fichero = 'modules/lnxit/main.php';

if (file_exists($nombre_fichero)) 
{
	if ($_GET["section"] == 'workorders')
	{	
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'desktop';
	}

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión y soporte">';
	   echo '<a class="nav-link" href="index.php?module=lnxit">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text">Gestión y soporte</span>';
	  echo '</a>';
	echo '</li>';
} 




	if ($_GET["section"] == '')
	{	
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'sticky-note';
	}

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Partes de trabajo">';
	   echo '<a class="nav-link" href="index.php?module=partes">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text">Partes de trabajo</span>';
	  echo '</a>';
	echo '</li>';


?>