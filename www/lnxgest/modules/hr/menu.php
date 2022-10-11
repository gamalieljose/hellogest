<?php
if(lnx_check_perm(5000) > 0)
{
if ($_GET["section"] == 'nominas' || $_GET["section"] == '')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'user-tie';
	}
	

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nominas">';
   echo '<a class="nav-link" href="index.php?module=hr&section=nominas">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Nominas</span>';
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
   //echo '<a class="nav-link" href="index.php?module=hr&section=gastos">';
   echo '<a class="nav-link" href="index.php?module=gastos&section=gastos">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Gastos</span>';
  echo '</a>';
echo '</li>';


}
else{lnx_permdenegado();}


?>
