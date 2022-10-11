<?php
$lnxinvoice = $_GET["module"];
$campomasterid = "id".$lnxinvoice;

if($lnxinvoice == "fv" || $lnxinvoice == "fc"){$lblnxinvoice = "Factura";}
if($lnxinvoice == "fvr"){$lblnxinvoice = "Factura R.";}
if($lnxinvoice == "ov" || $lnxinvoice == "oc"){$lblnxinvoice = "Presupuesto";}
if($lnxinvoice == "av" || $lnxinvoice == "ac"){$lblnxinvoice = "Albaran";}	
if($lnxinvoice == "pv" || $lnxinvoice == "pc"){$lblnxinvoice = "Pedido";}	


	if ($_GET["section"] == '')
		{
			$menuseleccionado = 'caret-right';
			
		}else
		{
			$menuseleccionado = 'bars';
			
		}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Listado '.$lblnxinvoice.'">';
	echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'">';
		echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text">Listado</span>';
	echo '</a>';
	echo '</li>';	
if ($_GET["section"] == '' || $_GET["section"] == 'buscar')
{
	if ($_GET["section"] == 'buscar')
		{
			$menuseleccionado = 'caret-right';
			
		}else
		{
			$menuseleccionado = 'search';
			
		}
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Buscar '.$lblnxinvoice.'">';
	echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=buscar">';
		echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text"> Buscar</span>';
	echo '</a>';
	echo '</li>';	
}

if ($_GET["section"] <> '' && $_GET["section"] !== 'buscar')
	{
		$menuseleccionado = 'caret-right';
		$idfv = $_GET["id"];

		if ($_GET["section"] == "print" && $_GET["action"] == "print")
		{
			$idfv = $_POST["hidfv"];
		}
		
		
	if ($_GET["section"] == 'main')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'file-alt';
		
	}
		
	
	echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="'.$lblnxinvoice.'">';
	   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'">';
		  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
		echo '<span class="nav-link-text">'.$lblnxinvoice.'</span>';
	  echo '</a>';
	echo '</li>';





if ($_GET["section"] == 'pagos')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'coins';
		
	}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagos">';
   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Pagos</span>';
  echo '</a>';
echo '</li>';


if ($_GET["section"] == 'print')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'print';
		
	}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Imprimir">';
   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=print&action=setup&id='.$idfv.'">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Imprimir</span>';
  echo '</a>';
echo '</li>';


$sqlficheros = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = '".$lnxinvoice."' and idlinea0 = '".$idfv."'");
$cuentaficheros = $sqlficheros->num_rows;

if ($_GET["section"] == 'docs')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'file';
		
	}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Documentos ['.$cuentaficheros.']">';
   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Documentos ['.$cuentaficheros.']</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'links')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'link';
		
	}

echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Enlaces">';
   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=links&id='.$idfv.'">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text"> Enlaces</span>';
  echo '</a>';
echo '</li>';

if ($_GET["section"] == 'otros')
	{
		$menuseleccionado = 'caret-right';
		
	}else
	{
		$menuseleccionado = 'external-link-alt ';
		
	}


echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Otras Acciones">';
   echo '<a class="nav-link" href="index.php?module='.$lnxinvoice.'&section=otros&id='.$idfv.'">';
	  echo '<i class="fa fa-fw fa-'.$menuseleccionado.'"></i>';
	echo '<span class="nav-link-text">Otras Acciones</span>';
  echo '</a>';
echo '</li>';

}
