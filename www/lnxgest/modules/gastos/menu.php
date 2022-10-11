<?php

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="RRHH">';
echo '<a class="nav-link" href="index.php?module=hr">';
       echo '<i class="fa fa-fw fa-user-tie"></i>';
     echo '<span class="nav-link-text"> RRHH</span>';
echo '</a>';
echo '</li>';

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if(lnx_check_perm(5100) > 0)
{
if ($_GET["section"] == 'viajes')
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'route';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Viajes">';
   echo '<a class="nav-link" href="index.php?module=gastos&section=viajes">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Viajes</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'flota')
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'car-side';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Flota">';
   echo '<a class="nav-link" href="index.php?module=gastos&section=flota">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Flota</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'gastos')
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'money-bill';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gastos">';
   echo '<a class="nav-link" href="index.php?module=gastos&section=gastos">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Gastos</span>';
  echo '</a>';
echo '</li>';


echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

if ($_GET["section"] == "cfg" || $_GET["section"] == "cfg_main" || $_GET["section"] == "cfg_tg")
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'cogs';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
   echo '<a class="nav-link" href="index.php?module=gastos&section=cfg">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Configuración</span>';
  echo '</a>';
echo '</li>';

}
else{lnx_permdenegado();}


?>
