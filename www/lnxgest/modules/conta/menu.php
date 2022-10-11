<?php
if($_COOKIE["lnxcontaidempresa"] > 0)
{    
    if ($_GET["section"] == "ejercicios")
    {
            $menuseleccionado = 'caret-right ';
    }
    else
    {
            $menuseleccionado = 'piggy-bank';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">';
       echo '<a class="nav-link" href="index.php?module=conta&section=ejercicios">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Ejercicios</span>';
      echo '</a>';
    echo '</li>';
    
    if ($_GET["section"] == "terceros")
    {
            $menuseleccionado = 'caret-right ';
    }
    else
    {
            $menuseleccionado = 'piggy-bank';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Terceros">';
       echo '<a class="nav-link" href="index.php?module=conta&section=terceros">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Terceros</span>';
      echo '</a>';
    echo '</li>';
    
    if ($_GET["section"] == "pgc")
    {
            $menuseleccionado = 'caret-right ';
    }
    else
    {
            $menuseleccionado = 'piggy-bank';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Plan General Contable">';
       echo '<a class="nav-link" href="index.php?module=conta&section=pgc">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> P.G.C.</span>';
      echo '</a>';
    echo '</li>';
    
    if ($_GET["section"] == "config")
    {
            $menuseleccionado = 'caret-right ';
    }
    else
    {
            $menuseleccionado = 'piggy-bank';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">';
       echo '<a class="nav-link" href="index.php?module=conta&section=config">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Configuración</span>';
      echo '</a>';
    echo '</li>';
}



if ($_GET["section"] == 'cuentascajas')
    {
            $menuseleccionado = 'caret-right ';
    }
    else
    {
            $menuseleccionado = 'piggy-bank';
    }
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cambiar empresa">';
       echo '<a class="nav-link" href="index.php?module=conta&section=login&action=logout">';
              echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
            echo '<span class="nav-link-text"> Cambiar empresa</span>';
      echo '</a>';
    echo '</li>';

if($_COOKIE["lnxcontaidempresa"] > 0)
{ 
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."conta_ejercicios where id = '".$_COOKIE["lnxcontaidejercicio"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_serie = $rowaux["codigo"];

    
    echo '<div align="center">';
    echo '<p>Ejercicio actual</br>';
    echo '<b>'.$lbl_serie.'</b></p>';   
    echo '</div>';
}  
?>