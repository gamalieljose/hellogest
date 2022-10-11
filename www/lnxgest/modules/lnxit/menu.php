<?php
if(lnx_check_perm(4000) > 0)
{
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
if ($_GET["section"] == 'tickets' || $_GET["section"] == 'seguimiento' || $_GET["section"] == 'docs' || $_GET["section"] == 'ticketactivos' || $_GET["section"] == 'buscaseg' )
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'ticket-alt';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión tickets">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=tickets&subsection=list">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Gestión tickets</span>';
  echo '</a>';
echo '</li>';



if ($_GET["section"] == 'factu')
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'file-alt ';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Facturar">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=factu">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Facturar</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'docum')
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'book';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Documentación">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=docum">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Documentación</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'informes' || $_GET["section"] == 'stats')
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'chart-line';
		
	}
	
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Informes">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=informes">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Informes</span>';
  echo '</a>';
echo '</li>';	




//si existe el modulo partes muestra la entrada en el menu
$nombre_fichero = 'modules/partes/main.php';

if (file_exists($nombre_fichero)) 
{
	if ($_GET["section"] == 'workorders')
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
	echo '<span class="nav-link-text"> Partes de trabajo</span>';
  echo '</a>';
echo '</li>';
	
}


if ($_GET["section"] == 'activosfea' || $_GET["section"] == 'activosrc' || ($_GET["section"] == 'activos' && ($_GET["ss"] !== 'tipos' && $_GET["ss"] !== 'estados')))
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'box-open ';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestión de activos">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=activos">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Gestión de activos</span>';
  echo '</a>';
echo '</li>';
	
		
 

if ($_GET["section"] == 'mant' && $_GET["ss"] == '')
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'file';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contratos Mantenimiento">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=mant">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Contratos Mantenimiento</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'infopass' )
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'key';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="InfoPass">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=infopass">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> InfoPass</span>';
  echo '</a>';
echo '</li>';

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
 
if ($_GET["section"] == 'config' || $_GET["section"] == 'cat' || ($_GET["section"] == 'activos' && $_GET["ss"] == 'tipos') || ($_GET["section"] == 'activos' && $_GET["ss"] == 'estados') || ($_GET["section"] == 'tiposmant' && $_GET["ss"] == ''))
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'cogs';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuracion">';
   echo '<a class="nav-link" href="index.php?module=lnxit&section=config">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Configuracion</span>';
  echo '</a>';
echo '</li>';
}

?>