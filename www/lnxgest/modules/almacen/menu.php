<?php

echo '<li style="width: 100%; border-style: double; height: 1px;"><li>';
if(lnx_check_perm(3000) > 0)
{

if ($_GET["section"] == '' || $_GET["section"] == 'articulos' || $_GET["section"] == 'pro' || $_GET["section"] == 'stock' || $_GET["section"] == 'stockfix' || $_GET["section"] == 'stocktransfer')
        {
		$menuseleccionado = "caret-right";
	}
        else
	{
		$menuseleccionado = "cubes";
	}

        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_ARTICULOS.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=articulos">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_ARTICULOS.'</span>';
           echo '</a>';
         echo '</li>';

         

	

if ($_GET["section"] == 'wh' || $_GET["section"] == 'whstock' || $_GET["section"] == 'whmov')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'warehouse';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_ALMACENES.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=wh">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_ALMACENES.'</span>';
           echo '</a>';
         echo '</li>';


if ($_GET["section"] == 'movwh')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'exchange-alt';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_MOVIMIENTOS.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=movwh">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_MOVIMIENTOS.'</span>';
           echo '</a>';
         echo '</li>';
         
	

if ($_GET["section"] == 'prostock' || $_GET["section"] == 'prostockimp')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'users';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_PROVEEDORES.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=prostock">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_PROVEEDORES.'</span>';
           echo '</a>';
         echo '</li>';




if ($_GET["section"] == 'fab')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'industry';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_FABRICANTES.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=fab">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_FABRICANTES.'</span>';
           echo '</a>';
         echo '</li>';

	

if ($_GET["section"] == 'tipo')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'folder';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_TIPOS_ARTICULO.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=tipo">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_TIPOS_ARTICULO.'</span>';
           echo '</a>';
         echo '</li>';
	

if ($_GET["section"] == 'config')
	{
		$menuseleccionado = 'caret-right';
	}
        else
	{
		$menuseleccionado = 'cogs';
	}
        echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.LABEL_MNU_CONFIGURACIÓN.'">';
            echo '<a class="nav-link" href="index.php?module=almacen&section=config">';
                   echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
                 echo '<span class="nav-link-text"> '.LABEL_MNU_CONFIGURACIÓN.'</span>';
           echo '</a>';
         echo '</li>';
		

        
        
        
        
        



if ($_GET["section"] == 'pro' )
{
	$idarticulo = $_GET["id"];
	$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos where id = '".$idarticulo."'");
	$row = mysqli_fetch_assoc($sqlarticulo);
	$dbcodventa = $row["codventa"];
	$dbconcepto = $row["concepto"];
	
	echo '<div align="center">
	<p>&nbsp;</p>
	<p><b>'.LABEL_MNU_PRODUCTO.'</b></p>
	<p>'.$dbcodventa.'</br>'.$dbconcepto.'</p>
	</div>';
}

}
else{lnx_permdenegado();}

?>

