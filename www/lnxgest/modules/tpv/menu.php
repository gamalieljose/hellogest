<?php

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';

//TPV Generico

	if ($_GET["section"] == '' )
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'chalkboard';	
	}
	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio TPV">';
   echo '<a class="nav-link" href="index.php?module=tpv">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Inicio TPV</span>';
  echo '</a>';
echo '</li>';
	
if ($_GET["section"] == 'tpvactions' || ($_GET["section"] == 'tpv' && $_GET["action"] == 'view' && $_GET["id"] > '0'))
{	
$menu_idtpv = $_GET["id"];

if ($_GET["section"] == 'tpvactions')
{
		$menuseleccionado = 'chalkboard';	
	
	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Continuar TPV">';
	   echo '<a class="nav-link" href="index.php?module=tpv&section=tpv&action=view&id='.$menu_idtpv.'">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Continuar TPV</span>';
	  echo '</a>';
	echo '</li>';
}

	if ($_GET["section"] == 'tpvactions')
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'external-link-alt';	
	}
	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Operaciones TPV">';
	   echo '<a class="nav-link" href="index.php?module=tpv&section=tpvactions&id='.$menu_idtpv.'">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Operaciones TPV</span>';
	  echo '</a>';
	echo '</li>';
}
	
	
	
if ($_GET["section"] == 'mov' )
	{	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'chart-line ';	
	}
	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Movimientos de caja">';
   echo '<a class="nav-link" href="index.php?module=tpv&section=mov">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Movimientos de caja</span>';
  echo '</a>';
echo '</li>';

	
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
	


if ($_GET["section"] == 'cfgterm' || $_GET["section"] == 'cfgcg')
    {	
		$menuseleccionado = 'caret-right';		
	}
	else
	{
		$menuseleccionado = 'cogs';
	}                                                                                                 
        
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configurar TPV">';
   echo '<a class="nav-link" href="index.php?module=tpv&section=cfgterm">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Configurar TPV</span>';
  echo '</a>';
echo '</li>';
       
?>
