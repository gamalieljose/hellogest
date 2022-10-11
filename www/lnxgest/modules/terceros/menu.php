<?php


echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


if(lnx_check_perm(2000) > 0)
{

if ($_GET["section"] == 'terceros' || $_GET["section"] == 'contactos' || $_GET["section"] == 'dir' || $_GET["section"] == 'tercerosvinc' || $_GET["section"] == 'terceroslopd')
	{
		
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'users';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Terceros">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=terceros">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Terceros</span>';
  echo '</a>';
echo '</li>';

if(lnx_check_perm(2007) > 0)
{
if ($_GET["section"] == 'buscar')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'user-tie';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Buscar contactos">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=buscar">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Buscar contactos</span>';
  echo '</a>';
echo '</li>';
}

if(lnx_check_perm(2011) > 0)
{
if ($_GET["section"] == 'lopd' || $_GET["section"] == 'lopdcampos')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'newspaper';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Plantillas LOPD">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=lopd">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Plantillas LOPD</span>';
  echo '</a>';
echo '</li>';
}


// Ir al modulo CRM
if(lnx_check_perm(1000) > 0)
{
$menuseleccionado = 'users';
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="CRM">';
   echo '<a class="nav-link" href="index.php?module=crm">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> CRM</span>';
  echo '</a>';
echo '</li>';
}

$permisosolicitado = lnx_check_perm(30);   // chekea permiso
if($permisosolicitado > '0')
{
	
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

	if ($_GET["section"] == 'expgoogle')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'download';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exportar Google">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=expgoogle">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Exportar Google</span>';
  echo '</a>';
echo '</li>';
	
	if ($_GET["section"] == 'expterceros')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'download';
	}

	
	
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exportar Terceros">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=expterceros">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Exportar Terceros</span>';
  echo '</a>';
echo '</li>';
}


$permisosolicitado = lnx_check_perm(31);   // chekea permiso Acceso a estadisticas
if($permisosolicitado > '0')
{

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


if ($_GET["section"] == 'stat1')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'chart-bar';
	}



echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estadisticas Origen">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=stat1">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">1 - Origen</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'stat2')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'chart-bar ';
	}




echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estadisticas Actividad">';
   echo '<a class="nav-link" href="index.php?module=terceros&section=stat2">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">2 - Actividad</span>';
  echo '</a>';
echo '</li>';




}




}
else
{
	echo '<div align="center">
	<table class="msgaviso">
	<tr><td class="maintitle">Permiso de acceso</td></tr>
	<tr><td>Acceso DENEGADO</td></tr>
	</table>
	</div>';
	
}

?>