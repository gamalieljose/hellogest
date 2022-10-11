<?php
	//ss = sub section
	if ($_GET["ss"] == '' && $_GET["action"] == ''){include("modules/lnxit/activos/listado.php");}
	if ($_GET["ss"] == 'activo' && $_GET["action"] == 'new'){include("modules/lnxit/activos/activo_new.php");}
	if ($_GET["ss"] == 'activo' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/activo_edit.php");}
    if ($_GET["ss"] == 'activo' && $_GET["action"] == 'del'){include("modules/lnxit/activos/activo_del.php");}
	if ($_GET["ss"] == 'activo' && $_GET["action"] == 'save'){include("modules/lnxit/activos/activo_save.php");}
	
	if ($_GET["ss"] == 'tipos' && $_GET["action"] == ''){include("modules/lnxit/activos/tipos/tipos_list.php");}
	if ($_GET["ss"] == 'tipos' && $_GET["action"] == 'new'){include("modules/lnxit/activos/tipos/tipos_new.php");}
	if ($_GET["ss"] == 'tipos' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/tipos/tipos_edit.php");}
	if ($_GET["ss"] == 'tipos' && $_GET["action"] == 'del'){include("modules/lnxit/activos/tipos/tipos_del.php");}
	if ($_GET["ss"] == 'tipos' && $_GET["action"] == 'save'){include("modules/lnxit/activos/tipos/tipos_save.php");}
	
	if ($_GET["ss"] == 'estados' && $_GET["action"] == ''){include("modules/lnxit/activos/estados/estados_list.php");}
	if ($_GET["ss"] == 'estados' && $_GET["action"] == 'new'){include("modules/lnxit/activos/estados/estados_new.php");}
	if ($_GET["ss"] == 'estados' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/estados/estados_edit.php");}
	if ($_GET["ss"] == 'estados' && $_GET["action"] == 'del'){include("modules/lnxit/activos/estados/estados_del.php");}
	if ($_GET["ss"] == 'estados' && $_GET["action"] == 'save'){include("modules/lnxit/activos/estados/estados_save.php");}
	
	if ($_GET["ss"] == 'licensing' && $_GET["action"] == ''){include("modules/lnxit/activos/licensing/licensing_list.php");}
	if ($_GET["ss"] == 'licensing' && $_GET["action"] == 'new'){include("modules/lnxit/activos/licensing/licensing_new.php");}
	if ($_GET["ss"] == 'licensing' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/licensing/licensing_edit.php");}
	if ($_GET["ss"] == 'licensing' && $_GET["action"] == 'del'){include("modules/lnxit/activos/licensing/licensing_del.php");}
	if ($_GET["ss"] == 'licensing' && $_GET["action"] == 'save'){include("modules/lnxit/activos/licensing/licensing_save.php");}
	
	if ($_GET["ss"] == 'caracteristicas' && $_GET["action"] == ''){include("modules/lnxit/activos/caracteristicas/caracteristicas_list.php");}
	if ($_GET["ss"] == 'caracteristicas' && $_GET["action"] == 'new'){include("modules/lnxit/activos/caracteristicas/caracteristicas_new.php");}
	if ($_GET["ss"] == 'caracteristicas' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/caracteristicas/caracteristicas_edit.php");}
	if ($_GET["ss"] == 'caracteristicas' && $_GET["action"] == 'del'){include("modules/lnxit/activos/caracteristicas/caracteristicas_del.php");}
	if ($_GET["ss"] == 'caracteristicas' && $_GET["action"] == 'save'){include("modules/lnxit/activos/caracteristicas/caracteristicas_save.php");}
	
	if ($_GET["ss"] == 'proveedores' && $_GET["action"] == ''){include("modules/lnxit/activos/pro/pro_list.php");}
	if ($_GET["ss"] == 'proveedores' && $_GET["action"] == 'new'){include("modules/lnxit/activos/pro/pro_new.php");}
	if ($_GET["ss"] == 'proveedores' && $_GET["action"] == 'edit'){include("modules/lnxit/activos/pro/pro_edit.php");}
	if ($_GET["ss"] == 'proveedores' && $_GET["action"] == 'del'){include("modules/lnxit/activos/pro/pro_del.php");}
	if ($_GET["ss"] == 'proveedores' && $_GET["action"] == 'save'){include("modules/lnxit/activos/pro/pro_save.php");}
	
	if ($_GET["ss"] == 'vinculos' && $_GET["action"] == ''){include("modules/lnxit/activos/vinculos/vinculos_list.php");}
	if ($_GET["ss"] == 'vinculos' && $_GET["action"] == 'new'){include("modules/lnxit/activos/vinculos/vinculos_new.php");}
	if ($_GET["ss"] == 'vinculos' && $_GET["action"] == 'del'){include("modules/lnxit/activos/vinculos/vinculos_del.php");}
	if ($_GET["ss"] == 'vinculos' && $_GET["action"] == 'save'){include("modules/lnxit/activos/vinculos/vinculos_save.php");}
	
	if ($_GET["ss"] == 'ficheros' && $_GET["action"] == ''){include("modules/lnxit/activos/ficheros/ficheros.php");}
	
	if ($_GET["ss"] == 'docprint' && $_GET["action"] == ''){include("modules/lnxit/activos/docprint/print.php");}
	if ($_GET["ss"] == 'docprint' && $_GET["action"] == 'print'){include("modules/lnxit/activos/docprint/print_proceso.php");}
	
	if ($_GET["ss"] == 'computer' && $_GET["action"] == ''){include("modules/lnxit/activos/computer/computer.php");}
	if ($_GET["ss"] == 'computer' && $_GET["action"] == 'nfo'){include("modules/lnxit/activos/computer/computer_nfo.php");}
	if ($_GET["ss"] == 'computer' && $_GET["action"] == 'premsinfo32'){include("modules/lnxit/activos/computer/computer_preprocesa.php");}
	if ($_GET["ss"] == 'computer' && $_GET["action"] == 'save'){include("modules/lnxit/activos/computer/computer_save.php");}
	
	
	if ($_GET["ss"] == 'import' && $_GET["action"] == 'aips'){include("modules/lnxit/activos/import_aips.php");}
	if ($_GET["ss"] == 'import' && $_GET["action"] == 'aips_save'){include("modules/lnxit/activos/import_aips_save.php");}
	
	
?>