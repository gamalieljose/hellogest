<?php

if(lnx_check_perm(3000) > 0)
{

if (($_GET["section"] == '' || $_GET["section"] == 'articulos') && $_GET["action"] == '' ){include("modules/almacen/art/art_list.php");}

if ($_GET["section"] == 'articulos' && $_GET["action"] == 'new' ){include("modules/almacen/art/art_new.php");}
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'edit' ){include("modules/almacen/art/art_edit.php");}
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'del' ){include("modules/almacen/art/art_del.php");}
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'save' ){include("modules/almacen/art/art_save.php");}


if ($_GET["section"] == 'articulos' && $_GET["action"] == 'stock' ){include("modules/almacen/art/art_stock.php");}

if ($_GET["section"] == 'wh' && $_GET["action"] == '' ){include("modules/almacen/warehouse/wh_list.php");}
if ($_GET["section"] == 'wh' && $_GET["action"] == 'new' ){include("modules/almacen/warehouse/wh_new.php");}
if ($_GET["section"] == 'wh' && $_GET["action"] == 'edit' ){include("modules/almacen/warehouse/wh_edit.php");}
if ($_GET["section"] == 'wh' && $_GET["action"] == 'del' ){include("modules/almacen/warehouse/wh_del.php");}
if ($_GET["section"] == 'wh' && $_GET["action"] == 'save' ){include("modules/almacen/warehouse/wh_save.php");}


	if ($_GET["section"] == 'whstock' && $_GET["action"] == '' ){include("modules/almacen/warehouse/wh_stock.php");}

	if ($_GET["section"] == 'whmov' && $_GET["action"] == '' ){include("modules/almacen/warehouse/wh_mov.php");}
	

if ($_GET["section"] == 'fab' && $_GET["action"] == '' ){include("modules/almacen/fab/fab_list.php");}
if ($_GET["section"] == 'fab' && $_GET["action"] == 'new' ){include("modules/almacen/fab/fab_new.php");}
if ($_GET["section"] == 'fab' && $_GET["action"] == 'edit' ){include("modules/almacen/fab/fab_edit.php");}
if ($_GET["section"] == 'fab' && $_GET["action"] == 'del' ){include("modules/almacen/fab/fab_del.php");}
if ($_GET["section"] == 'fab' && $_GET["action"] == 'save' ){include("modules/almacen/fab/fab_save.php");}

if ($_GET["section"] == 'tipo' && $_GET["action"] == '' ){include("modules/almacen/tipo/tipo_list.php");}
if ($_GET["section"] == 'tipo' && $_GET["action"] == 'new' ){include("modules/almacen/tipo/tipo_new.php");}
if ($_GET["section"] == 'tipo' && $_GET["action"] == 'edit' ){include("modules/almacen/tipo/tipo_edit.php");}
if ($_GET["section"] == 'tipo' && $_GET["action"] == 'del' ){include("modules/almacen/tipo/tipo_del.php");}
if ($_GET["section"] == 'tipo' && $_GET["action"] == 'save' ){include("modules/almacen/tipo/tipo_save.php");}

if ($_GET["section"] == 'pro' && $_GET["action"] == '' ){include("modules/almacen/pro/pro_list.php");}
if ($_GET["section"] == 'pro' && $_GET["action"] == 'new' ){include("modules/almacen/pro/pro_new.php");}
if ($_GET["section"] == 'pro' && $_GET["action"] == 'edit' ){include("modules/almacen/pro/pro_edit.php");}
if ($_GET["section"] == 'pro' && $_GET["action"] == 'del' ){include("modules/almacen/pro/pro_del.php");}
if ($_GET["section"] == 'pro' && $_GET["action"] == 'save' ){include("modules/almacen/pro/pro_save.php");}

if ($_GET["section"] == 'stock' && $_GET["action"] == '' ){include("modules/almacen/stock/stock.php");}
if ($_GET["section"] == 'stockfix' && $_GET["action"] == '' ){include("modules/almacen/stock/stock_fix.php");}
if ($_GET["section"] == 'stockfix' && $_GET["action"] == 'save' ){include("modules/almacen/stock/stock_fix_save.php");}
if ($_GET["section"] == 'stocktransfer' && $_GET["action"] == '' ){include("modules/almacen/stock/stock_transfer.php");}
if ($_GET["section"] == 'stocktransfer' && $_GET["action"] == 'save' ){include("modules/almacen/stock/stock_transfer_save.php");}


if ($_GET["section"] == 'config' && $_GET["action"] == '' ){include("modules/almacen/config/config.php");}
if ($_GET["section"] == 'config' && $_GET["action"] == 'save' ){include("modules/almacen/config/config_save.php");}

if ($_GET["section"] == 'movwh' && $_GET["action"] == '' ){include("modules/almacen/movwh/movwh.php");}
if ($_GET["section"] == 'movwh' && $_GET["action"] == 'save' ){include("modules/almacen/movwh/movwh_save.php");}

if ($_GET["section"] == 'prostock' && $_GET["action"] == '' ){include("modules/almacen/prostock/prostock.php");}
if ($_GET["section"] == 'prostockimp' && $_GET["action"] == '' ){include("modules/almacen/prostock/importar.php");}
if ($_GET["section"] == 'prostockimp' && $_GET["action"] == 'pre' ){include("modules/almacen/prostock/importar_pre.php");}
if ($_GET["section"] == 'prostockimp' && $_GET["action"] == 'procesar' ){include("modules/almacen/prostock/importar_proc.php");}


}
else
{
	lnx_permdenegado();
}
?>