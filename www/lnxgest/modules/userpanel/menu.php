<?php
if(lnx_check_perm(6000) > 0)
{
echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Panel de usuario">';
   echo '<a class="nav-link" href="#">';
	  echo '<i class="fa fa-fw fa-bars"></i>';
	echo '<span class="nav-link-text"><b>Panel de usuario</b></span>';
  echo '</a>';
echo '</li>';


	
	$ConsultaMySql= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."printjobs where iduser = '".$_COOKIE["lnxuserid"]."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$colaimpresion = $row['contador'];
	
	
if ($_GET["section"] == 'perfil' || $_GET["section"] == '')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'user-tie';
	}
	

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil usuario">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=perfil">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Perfil usuario</span>';
  echo '</a>';
echo '</li>';
	

if ($_GET["section"] == 'bloques' )
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'shapes';
	}
	

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bloques inicio">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=bloques">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Bloques inicio</span>';
  echo '</a>';
echo '</li>';



if ($_GET["section"] == 'spool')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'print';
	}


	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cola de impresiones ('.$colaimpresion.')">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=spool">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Impresiones ('.$colaimpresion.')</span>';
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

	$ConsultaMySql= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."bloqueos where iduser = '".$_COOKIE["lnxuserid"]."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$registrosbloqueados = $row['contador'];

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registros bloqueados ('.$colaimpresion.')">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=regblock">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Reg. bloqueados ('.$registrosbloqueados.')</span>';
  echo '</a>';
echo '</li>';

if(lnx_check_perm(5001) > 0)
{
if ($_GET["section"] == 'rrhh')
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'user-tag';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Recursos Humanos">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=rrhh">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> RRHH</span>';
  echo '</a>';
echo '</li>';
}

if ($_GET["section"] == 'dz')
        {
                $menuseleccionado = 'caret-right ';
        }
        else
        {
                $menuseleccionado = 'plane';
        }


        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Desplazamientos">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=dz">';
          echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
        echo '<span class="nav-link-text"> Desplazamientos</span>';
  echo '</a>';
echo '</li>';


if ($_GET["section"] == 'logoff')
	{
		$menuseleccionado = 'caret-right ';
	}
	else
	{
		$menuseleccionado = 'sign-out-alt ';
	}
	

	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cerrar sesion">';
   echo '<a class="nav-link" href="index.php?module=userpanel&section=logoff">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Cerrar sesion</span>';
  echo '</a>';
echo '</li>';
}
else{lnx_permdenegado();}


?>
