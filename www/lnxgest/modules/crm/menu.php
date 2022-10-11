<?php

if(lnx_check_perm(1000) > 0)
{

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


if(lnx_check_perm(2000) > 0)
{   
   $menuseleccionado = 'users';

    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Terceros">';
       echo '<a class="nav-link" href="index.php?module=terceros&section=terceros">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text">Terceros</span>';
      echo '</a>';
    echo '</li>';
    
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
}

$menu_campanas = "0";

if ($_GET["section"] == 'camp'){$menu_campanas = $menu_campanas + 1;}
if ($_GET["section"] == 'campterceros'){$menu_campanas = $menu_campanas + 1;}
if ($_GET["section"] == 'campseg'){$menu_campanas = $menu_campanas + 1;}

if ($menu_campanas > '0')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'newspaper';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Campañas">';
   echo '<a class="nav-link" href="index.php?module=crm&section=camp">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Campañas</span>';
  echo '</a>';
echo '</li>';


if ($_GET["section"] == 'phonecalls')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'newspaper';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Llamadas">';
   echo '<a class="nav-link" href="index.php?module=crm&section=phonecalls">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Llamadas</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'seguimientos')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'comments';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Seguimientos y anotaciones">';
   echo '<a class="nav-link" href="index.php?module=crm&section=seguimientos">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Seguimientos</span>';
  echo '</a>';
echo '</li>';


if ($_GET["section"] == 'import')
	{
		$menuseleccionado = 'caret-right';
	}
	else
	{
		$menuseleccionado = 'file-import';
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Importacion">';
   echo '<a class="nav-link" href="index.php?module=crm&section=import">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Importacion</span>';
  echo '</a>';
echo '</li>';

}
else{lnx_permdenegado();}
?>