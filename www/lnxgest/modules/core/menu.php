<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."menus where module = 'core' and section = 'dic'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$menupadre = $row["idmenu"];



echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == 'users' || 
$_GET["section"] == 'groups' || 
$_GET["section"] == 'sesiones' || 
$_GET["section"] == 'users_printers' || 
$_GET["section"] == 'regblock' || 
$_GET["section"] == 'permisosespecificos' || 
$_GET["section"] == 'utiendas' || 
$_GET["section"] == 'notifica')
{

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
	   echo '<a class="nav-link" href="index.php?module=core">';
		  echo '<i class="fa fa-fw fa-cogs"></i>';
		echo '<span class="nav-link-text"> Configuración</span>';
	  echo '</a>';
	echo '</li>';

	echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

	//Mostramos los menus de usuarios, grupos y sesiones

	if ($_GET["section"] == 'users' || $_GET["section"] == 'users_printers' || $_GET["section"] == 'permisosespecificos' || $_GET["section"] == 'utiendas')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'user-tie';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">';
       echo '<a class="nav-link" href="index.php?&module=core&section=users">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Usuarios</span>';
      echo '</a>';
    echo '</li>';

if ($_GET["section"] == 'groups')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'users';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Grupos">';
       echo '<a class="nav-link" href="index.php?&module=core&section=groups">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Grupos</span>';
      echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'notifica')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'comment-dots';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">';
       echo '<a class="nav-link" href="index.php?&module=core&section=notifica">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Notificaciones</span>';
      echo '</a>';
    echo '</li>';
	
if ($_GET["section"] == 'sesiones')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'diagnoses';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sesiones">';
       echo '<a class="nav-link" href="index.php?&module=core&section=sesiones">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Sesiones</span>';
      echo '</a>';
    echo '</li>';
	
	if ($_GET["section"] == 'regblock')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'user-lock';
	}

	$ConsultaMySql= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."bloqueos ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$registrosbloqueados = $row['contador'];

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registros bloqueados ('.$colaimpresion.')">';
   echo '<a class="nav-link" href="index.php?module=core&section=regblock">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Reg. bloqueados ('.$registrosbloqueados.')</span>';
  echo '</a>';
echo '</li>';

}
elseif ($_GET["section"] == 'empresas' || $_GET["section"] == 'etiendas' || $_GET["section"] == 'impuestos' || $_GET["section"] == 'series')
{
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
	   echo '<a class="nav-link" href="index.php?module=core">';
		  echo '<i class="fa fa-fw fa-cogs"></i>';
		echo '<span class="nav-link-text"> Configuración</span>';
	  echo '</a>';
	echo '</li>';

	echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

	if ($_GET["section"] == 'empresas')
	{
		$menuseleccionado = 'caret-right';
		
	}
	else
	{
		$menuseleccionado = 'briefcase';	
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empresas">';
	   echo '<a class="nav-link" href="index.php?module=core&section=empresas">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Empresas</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'etiendas')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'users';	
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tiendas / Terminales">';
	   echo '<a class="nav-link" href="index.php?module=core&section=etiendas">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Tiendas / Terminales</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'impuestos')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'users';	
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Impuestos">';
	   echo '<a class="nav-link" href="index.php?module=core&section=impuestos">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Impuestos</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'series')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'users';	
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Series">';
	   echo '<a class="nav-link" href="index.php?module=core&section=series">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Series</span>';
	  echo '</a>';
	echo '</li>';
}
else 
{
	



if ($_GET["section"] == 'empresas')
	{
		$menuseleccionado = 'caret-right';
		
	}
	else
	{
		$menuseleccionado = 'briefcase';	
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empresas">';
	   echo '<a class="nav-link" href="index.php?module=core&section=empresas">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Empresas</span>';
	  echo '</a>';
	echo '</li>';

if ($_GET["section"] == 'users' || $_GET["section"] == 'users_printers')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'user-tie';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios y grupos">';
       echo '<a class="nav-link" href="index.php?&module=core&section=users">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Usuarios y grupos</span>';
      echo '</a>';
    echo '</li>';

if ($_GET["section"] == 'dic')
    {
        $menuseleccionado = 'caret-right ';
    }
    else
    {
        $menuseleccionado = 'book';
    }

	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Diccionarios">';
	   echo '<a class="nav-link" href="index.php?module=core&section=dic">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Diccionarios</span>';
	  echo '</a>';
	echo '</li>';


	if ($_GET["section"] == 'menus')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menus">';
	   echo '<a class="nav-link" href="index.php?module=core&section=menus">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Menus</span>';
	  echo '</a>';
	echo '</li>';



	if ($_GET["section"] == 'lnxrouter')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="LNXRouter">';
	   echo '<a class="nav-link" href="index.php?module=lnxrouter">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> LNXRouter</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'cfpc')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="CFPC">';
	   echo '<a class="nav-link" href="index.php?module=core&section=cfpc">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> CFPC</span>';
	  echo '</a>';
	echo '</li>';

if ($_GET["section"] == 'docprint')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'file';
	}

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Informes y listados">';
	   echo '<a class="nav-link" href="index.php?module=core&section=docprint">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Informes y listados</span>';
	  echo '</a>';
	echo '</li>';

if ($_GET["section"] == 'printers')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'print';
	}

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Impresoras">';
	   echo '<a class="nav-link" href="index.php?module=core&section=printers">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Impresoras</span>';
	  echo '</a>';
	echo '</li>';


	$menuseleccionado = 'database';

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ficheros">';
	   echo '<a class="nav-link" href="index.php?module=ficheros">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Ficheros</span>';
	  echo '</a>';
	echo '</li>';

}
?>