<?php
echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';


	if ($_GET["section"] == 'cuentascajas')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'piggy-bank';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cuentas">';
	   echo '<a class="nav-link" href="index.php?module=bancos&section=cuentascajas">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Cuentas</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'bancos')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'university';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bancos">';
	   echo '<a class="nav-link" href="index.php?module=bancos&section=bancos">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Bancos</span>';
	  echo '</a>';
	echo '</li>';

	
	if ($_GET["section"] == 'tiposcuenta')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'university';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tipos de cuenta">';
	   echo '<a class="nav-link" href="index.php?module=bancos&section=tiposcuenta">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Tipos de cuenta</span>';
	  echo '</a>';
	echo '</li>';

	if ($_GET["section"] == 'fpago')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'money-bill-alt';
	}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Forma de pago">';
	   echo '<a class="nav-link" href="index.php?module=bancos&section=fpago">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Forma de pago</span>';
	  echo '</a>';
	echo '</li>';     
	
	if ($_GET["section"] == 'cpago')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'hand-holding-usd';
	}

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Condiciones de pago">';
	   echo '<a class="nav-link" href="index.php?module=bancos&section=cpago">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Condiciones de pago</span>';
	  echo '</a>';
	echo '</li>'; 
		


?>