<?php
$numscreen = ""; $displaytitle = "";

if ($_GET["section"] == 'bancos' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Bancos";
}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nuevo Banco";
}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando Banco";
}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'del') 
{
	$numscreen = "";
	$displaytitle = "Eliminar Banco";
}


if ($_GET["section"] == 'fpago' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Formas de pago";
}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nueva Forma de pago";
}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando Forma de pago";
}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'del') 
{
	$numscreen = "";
	$displaytitle = "Eliminar Forma de pago";
}

if ($_GET["section"] == 'cpago' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Condiciones de pago";
}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nueva Condición de pago";
}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando Condición de pago";
}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'del') 
{
	$numscreen = "";
	$displaytitle = "Eliminar Condición de pago";
}

if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Cajas / Cuentas";
}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nueva Caja / cuenta";
}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando Caja / cuenta";
}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'del') 
{
	$numscreen = "";
	$displaytitle = "Eliminar Caja / cuenta";
}



if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Tipos de cuenta";}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nuevo - Tipo de cuenta";}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'edit'){$numscreen = ""; $displaytitle = "Editando - Tipo de cuenta";}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'del'){$numscreen = ""; $displaytitle = "Eliminar - Tipo de cuenta";}


?>