<?php


if ($_GET["section"] == 'articulos' && $_GET["action"] == '') 
	{
		$numscreen = "";
		$displaytitle = "Articulos";	
	}
	if ($_GET["section"] == 'articulos' && $_GET["action"] == 'new') 
	{
		$numscreen = "";
		$displaytitle = "Nuevo articulo";	
	}
	if ($_GET["section"] == 'articulos' && $_GET["action"] == 'edit') 
	{
		$numscreen = "";
		$displaytitle = "Editando articulo";	
	}
	if ($_GET["section"] == 'articulos' && $_GET["action"] == 'del') 
	{
		$numscreen = "";
		$displaytitle = "Eliminando articulo";	
	}

if ($_GET["section"] == 'movwh' ) 
	{
		$numscreen = "";
		$displaytitle = "Movimientos de almacenes";	
	}
	
	
	
	//Proveedores
	if ($_GET["section"] == 'pro' && $_GET["action"] == '') 
	{
		$numscreen = "";
		$displaytitle = "Proveedores del articulo";	
	}
	if ($_GET["section"] == 'pro' && $_GET["action"] == 'new') 
	{
		$numscreen = "";
		$displaytitle = "Nueva referencia con proveedor";	
	}
	if ($_GET["section"] == 'pro' && $_GET["action"] == 'edit') 
	{
		$numscreen = "";
		$displaytitle = "Editando referencia con proveedor";	
	}
	


if ($_GET["section"] == 'wh' && $_GET["action"] == '') 
	{
		$numscreen = "";
		$displaytitle = "Almacenes";	
	}
	if ($_GET["section"] == 'wh' && $_GET["action"] == 'new') 
	{
		$numscreen = "";
		$displaytitle = "Nuevo Almacen";	
	}
	if ($_GET["section"] == 'wh' && $_GET["action"] == 'edit') 
	{
		$numscreen = "";
		$displaytitle = "Editando Almacen";	
	}

	
	if ($_GET["section"] == 'whstock' ) 
	{
		$numscreen = "";
		$displaytitle = "Edit. Almacen (stock actual)";	
	}
	
	if ($_GET["section"] == 'whmov' ) 
	{
		$numscreen = "";
		$displaytitle = "Edit. Almacen (movimientos)";	
	}


if ($_GET["section"] == 'fab') 
{
	$numscreen = "";
	$displaytitle = "Fabricantes";	
}
if ($_GET["section"] == 'tipo') 
{
	$numscreen = "";
	$displaytitle = "Tipo de articulo";	
}

if ($_GET["section"] == 'config') 
{
	$numscreen = "";
	$displaytitle = "Configuración almacen";	
}
?>