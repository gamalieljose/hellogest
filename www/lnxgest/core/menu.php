<?php
$idmenu = $_GET["idmenu"];
$modulo = $_GET["module"];

if ($modulo == "")
{

	if( $idmenu > "0" )
	{
		$sqllistamenu = "select * from ".$prefixsql."menus where idmenu = '".$idmenu."' order by orden";
		
		$idmenuant = '0';
			$sqlaux = $mysqli->query("select * from ".$prefixsql."menus where id = '".$idmenu."' ");	
			$campossqlaux = mysqli_fetch_assoc($sqlaux);
			$idmenuant = $campossqlaux['idmenu'];
			$displaymenu = $campossqlaux['display'];
			$iconofontawesome = $campossqlaux['icono'];
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."menus_lang where idmenu = '".$idmenu."' and idlang = '".$_COOKIE["lnxuseridlang"]."'");	
			$existe = $sqlaux->num_rows;
			$camposlang = mysqli_fetch_assoc($sqlaux);
			if($existe == "1"){$displaymenu = $camposlang["etiqueta"];}else{$displaymenu = $campossqlaux["display"];}
		/*
		echo '<ul>';
		echo '<li><a href="index.php?idmenu='.$idmenuant.'"><b><i>Atras</i></b></a></li>';
		echo '<li><a href="#"><b>'.$displaymenu.'</b></a></li>';
		echo '</ul>';
		*/
		
		echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Atras">';
           echo '<a class="nav-link" href="index.php?idmenu='.$idmenuant.'">';
              echo '<i class="fa fa-fw fa-wrenche"></i>';
            echo '<span class="nav-link-text"><b><i>Atras</i></b></span>';
          echo '</a>';
        echo '</li>';
		
		echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.$displaymenu.'">';
           echo '<a class="nav-link" href="#">';
              echo '<i class="fa fa-fw fa-'.$iconofontawesome.'"></i>';
            echo '<span class="nav-link-text"><b>'.$displaymenu.'</b></span>';
          echo '</a>';
        echo '</li>';
		
		
		
	}
	else
	{
		$sqllistamenu = "select * from ".$prefixsql."menus where idmenu = '0' order by orden";

		
		if($_COOKIE["lnxrecoverymode"] == "ON")
		{
		$menuseleccionado = 'database';
			
				echo '<li class="nav-item" data-toggle="tooltip" style="background-color: #04B45F;" data-placement="right" title="Backup">';
					echo '<a class="nav-link" href="index.php?module=backup">';
						echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
						echo '<span class="nav-link-text"> Backup</span>';
				echo '</a>';
				echo '</li>';
		}

	}

	$sqlmenus = $mysqli->query($sqllistamenu);
	
	// echo '<ul>';
	
	while($dbmenu = mysqli_fetch_array($sqlmenus))
	{
		
		$permisosolicitado = lnx_check_perm($dbmenu["idpermiso"]);   // chekea permiso Acceso a menu
		if($permisosolicitado > '0')
		{
			
			//Comprueba si el menu tiene submenus
			
			$sqlsubmenus = $mysqli->query("select * from ".$prefixsql."menus where idmenu = '".$dbmenu["id"]."'");
			$submenus = $sqlsubmenus->num_rows;
			
			if ($submenus == '0')
			{
				//no tienes submenus 
				//por lo que directamente cargaremos el modulo
								
				$displaymenu = $dbmenu["display"];
				
				$sqlaux = $mysqli->query("select * from ".$prefixsql."menus_lang where idmenu = '".$dbmenu["id"]."' and idlang = '".$_COOKIE["lnxuseridlang"]."'");	
				$existe = $sqlaux->num_rows;
				$camposlang = mysqli_fetch_assoc($sqlaux);
				if($existe == "1"){$displaymenu = $camposlang["etiqueta"];}else{$displaymenu = $dbmenu["display"];}
				
				if ($dbmenu["section"] <> "-"){$enlaceseccion = "&section=".$dbmenu["section"];}else{$enlaceseccion = "";}
				// echo '<li><a href="index.php?module='.$dbmenu["module"].$enlaceseccion.'">'.$displaymenu.'</a></li>';
				
				
				echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.$displaymenu.'">';
				   echo '<a class="nav-link" href="index.php?module='.$dbmenu["module"].$enlaceseccion.'">';
					  echo '<i class="fa fa-fw fa-'.$dbmenu["icono"].'"></i>';
					echo '<span class="nav-link-text"> '.$displaymenu.'</span>';
				  echo '</a>';
				echo '</li>';
				
				
			}
			else
			{
				//tiene submenus
				
				$displaymenu = $dbmenu["display"];
				
				$sqlaux = $mysqli->query("select * from ".$prefixsql."menus_lang where idmenu = '".$dbmenu["id"]."' and idlang = '".$_COOKIE["lnxuseridlang"]."'");	
				$existe = $sqlaux->num_rows;
				$camposlang = mysqli_fetch_assoc($sqlaux);
				if($existe == "1"){$displaymenu = $camposlang["etiqueta"];}else{$displaymenu = $dbmenu["display"];}
				
				
				
				echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.$displaymenu.'">';
				   echo '<a class="nav-link" href="index.php?idmenu='.$dbmenu["id"].'">';
					  echo '<i class="fa fa-fw fa-'.$dbmenu["icono"].'"></i>';
					echo '<span class="nav-link-text"> '.$displaymenu.'</span>';
				  echo '</a>';
				echo '</li>';
			}
		}
	}
	// echo '</ul>';
}
else
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."menus where module = '".$modulo."' and section='-'");	
			$campossqlaux = mysqli_fetch_assoc($sqlaux);
			$idmenuant = $campossqlaux['idmenu'];
			$displaymenu = $campossqlaux['display'];
			
		
	
		
		echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Atras">';
		   echo '<a class="nav-link" href="index.php?idmenu='.$idmenuant.'">';
			  echo '<i class="fa fa-fw fa-wrenche"></i>';
			echo '<span class="nav-link-text">Atras</span>';
		  echo '</a>';
		echo '</li>';
	
	
	include("modules/".$modulo."/menu.php");
}

?>

