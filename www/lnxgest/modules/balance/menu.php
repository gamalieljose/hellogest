<style type="text/css">
#inferior{
position: fixed;
  z-index: 100; /*Crea una capa nueva por encima, si tenemos una con valor 2 estará a una altura o por encima de una con 
                valor 1*/
   margin-left:0px; /*Con este margen posicionamos el div donde queramos*/
 }
</style>


<?php
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
	
	if ($_GET["section"] == 'trimestre' )
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Trimestre">';
	   echo '<a class="nav-link" href="index.php?module=balance&section=trimestre">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Trimestre</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'com' )
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Comerciales">';
	   echo '<a class="nav-link" href="index.php?module=balance&section=com">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Comerciales</span>';
	  echo '</a>';
	echo '</li>';
		
	if ($_GET["section"] == 'mod347' )
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mod 347">';
	   echo '<a class="nav-link" href="index.php?module=balance&section=mod347">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Mod 347</span>';
	  echo '</a>';
	echo '</li>';
	

		
		










?>