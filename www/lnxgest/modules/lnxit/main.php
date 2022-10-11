<?php

if(lnx_check_perm(4000) > 0)
{

	
	if ($_GET["section"] == ''){header("location: index.php?module=lnxit&section=tickets&subsection=list");}
	
	if(lnx_check_perm(4100) > 0 and ($_GET["section"] == 'tickets' || $_GET["section"] == 'seguimiento' || $_GET["section"] == 'docs' || $_GET["section"] == 'ticketactivos' || $_GET["section"] == 'ticketfactu' || $_GET["section"] == 'print' || $_GET["section"] == 'buscaseg'))
	{
		if ($_GET["section"] == 'tickets' && $_GET["subsection"] == 'list'){include("modules/lnxit/tickets/listado.php");}
		if ($_GET["section"] == 'tickets' && $_GET["subsection"] == 'goto'){include("modules/lnxit/tickets/goto.php");}
		
		if ($_GET["section"] == 'tickets' && $_GET["action"] == 'new'){include("modules/lnxit/tickets/ticket_new.php");}
		if ($_GET["section"] == 'tickets' && $_GET["action"] == 'edit' && $_GET["id"] > '0'){include("modules/lnxit/tickets/ticket_edit.php");}
		if ($_GET["section"] == 'tickets' && $_GET["action"] == 'del' && $_GET["id"] > '0'){include("modules/lnxit/tickets/ticket_del.php");}
		if ($_GET["section"] == 'tickets' && $_GET["action"] == 'save'){include("modules/lnxit/tickets/ticket_save.php");}


		if ($_GET["section"] == 'seguimiento' && $_GET["action"] == 'new'){include("modules/lnxit/seguimiento/seguimiento_new.php");}
		if ($_GET["section"] == 'seguimiento' && $_GET["action"] == 'edit'){include("modules/lnxit/seguimiento/seguimiento_edit.php");}
		if ($_GET["section"] == 'seguimiento' && $_GET["action"] == 'del'){include("modules/lnxit/seguimiento/seguimiento_del.php");}
	
		if ($_GET["section"] == 'seguimiento' && $_GET["action"] == 'save'){include("modules/lnxit/seguimiento/seguimiento_save.php");}
	
		if ($_GET["section"] == 'docs' ){include("modules/lnxit/docs/docs.php");}

		if ($_GET["section"] == 'ticketactivos' && $_GET["action"] == ''){include("modules/lnxit/activos/tickets/listado.php");}
		if ($_GET["section"] == 'ticketactivos' && $_GET["action"] == 'del'){include("modules/lnxit/activos/tickets/at_del.php");}
		if ($_GET["section"] == 'ticketactivos' && $_GET["action"] == 'save'){include("modules/lnxit/activos/tickets/at_save.php");}
		
		if ($_GET["section"] == 'ticketfactu' && $_GET["action"] == ''){include("modules/lnxit/tickets/factu/factu.php");}
		
		if ($_GET["section"] == 'buscaseg' ){include("modules/lnxit/buscaseg/buscaseg.php");}

		//if ($_GET["section"] == 'print' && $_GET["action"] == 'setup' ){include("modules/lnxit/tickets/print.php");}
		//if ($_GET["section"] == 'print' && $_GET["action"] == 'print' ){include("modules/lnxit/tickets/print_proceso.php");}

		if ($_GET["section"] == 'print' && $_GET["action"] == 'setup'){ include("modules/lnxit/informes/print.php"); }
		if ($_GET["section"] == 'print' && $_GET["action"] == 'preprint'){ include("modules/lnxit/informes/print_preproceso.php"); }
		if ($_GET["section"] == 'print' && $_GET["action"] == 'print'){ include("modules/lnxit/informes/print_proceso.php"); }
		
	}
	

	
	// Entrada taller
	
	if ($_GET["section"] == 'et' && $_GET["paso"] == '1'){include("modules/lnxit/tickets/et/et_paso1.php");} //formulario buscar cliente
	
	if ($_GET["section"] == 'et' && $_GET["paso"] == 'altacli'){include("modules/lnxit/tickets/et/et_faltacli.php");} //si no existe el cliente se crea de forma rápida (formulario)
	if ($_GET["section"] == 'et' && $_GET["paso"] == 'savecli'){include("modules/lnxit/tickets/et/et_savecli.php");}
		
	//estadisticas
	if ($_GET["section"] == 'stats' && $_GET["action"] == ''){include("modules/lnxit/stats/stats.php");}
	if ($_GET["section"] == 'stats' && $_GET["action"] == 'result'){include("modules/lnxit/stats/stats_rs.php");}

	//categorias
	if ($_GET["section"] == 'cat' && $_GET["action"] == ''){include("modules/lnxit/cat/cat.php");}
	if ($_GET["section"] == 'cat' && $_GET["action"] == 'new'){include("modules/lnxit/cat/cat_new.php");}
	if ($_GET["section"] == 'cat' && $_GET["action"] == 'edit'){include("modules/lnxit/cat/cat_edit.php");}
	if ($_GET["section"] == 'cat' && $_GET["action"] == 'save'){include("modules/lnxit/cat/cat_save.php");}
	
	//old partes de trabajo
	if ($_GET["section"] == 'partes' && $_GET["action"] == ''){include("modules/lnxit/partes/partes.php");}
	if ($_GET["section"] == 'partes' && $_GET["action"] == 'ver'){include("modules/lnxit/partes/partes_ver.php");}
	
	//Partes de trabajo 
	if ($_GET["section"] == 'workorders' && $_GET["action"] == ''){include("modules/lnxit/workorders/workorders.php");}
	if ($_GET["section"] == 'workorders' && $_GET["action"] == 'ver'){include("modules/lnxit/workorders/workorders_ver.php");}
	
	
	//gestion de activos
	if ($_GET["section"] == 'activos'){include("modules/lnxit/activos/main.php");}
	
	//Contratos mantenimeinto
	if ($_GET["section"] == 'mant' && $_GET["action"] == ''){include("modules/lnxit/mant/mant.php");}
	if ($_GET["section"] == 'mant' && $_GET["action"] == 'new'){include("modules/lnxit/mant/mant_new.php");}
	if ($_GET["section"] == 'mant' && $_GET["action"] == 'del'){include("modules/lnxit/mant/mant_del.php");}
	if ($_GET["section"] == 'mant' && $_GET["action"] == 'edit'){include("modules/lnxit/mant/mant_edit.php");}
	if ($_GET["section"] == 'mant' && $_GET["action"] == 'save'){include("modules/lnxit/mant/mant_save.php");}
	
	//tipos mantenimientos
	if ($_GET["section"] == 'tiposmant' && $_GET["action"] == ''){include("modules/lnxit/mant/tipos/tipos.php");}
	if ($_GET["section"] == 'tiposmant' && $_GET["action"] == 'new'){include("modules/lnxit/mant/tipos/tipos_new.php");}
	if ($_GET["section"] == 'tiposmant' && $_GET["action"] == 'del'){include("modules/lnxit/mant/tipos/tipos_del.php");}
	if ($_GET["section"] == 'tiposmant' && $_GET["action"] == 'edit'){include("modules/lnxit/mant/tipos/tipos_edit.php");}
	if ($_GET["section"] == 'tiposmant' && $_GET["action"] == 'save'){include("modules/lnxit/mant/tipos/tipos_save.php");}
	
	//Facturar
	if ($_GET["section"] == 'factu' && $_GET["action"] == '' && $_GET["paso"] == ''){include("modules/lnxit/factu/factu.php");}
	if ($_GET["section"] == 'factu' && $_GET["action"] == '' && $_GET["paso"] == '1'){include("modules/lnxit/factu/factu_1.php");}
	if ($_GET["section"] == 'factu' && $_GET["action"] == '' && $_GET["paso"] == '2'){include("modules/lnxit/factu/factu_2.php");}
	
	if($_GET["section"] == 'infopass')
	{
		if(lnx_check_perm(4800) > 0)
		{
		//infopass
		if ($_GET["section"] == 'infopass' && $_GET["action"] == '' ){include("modules/lnxit/infopass/infopass.php");}
		if ($_GET["section"] == 'infopass' && $_GET["action"] == 'new' ){include("modules/lnxit/infopass/infopass_new.php");}
		if ($_GET["section"] == 'infopass' && $_GET["action"] == 'edit' ){include("modules/lnxit/infopass/infopass_edit.php");}
		if ($_GET["section"] == 'infopass' && $_GET["action"] == 'del' ){include("modules/lnxit/infopass/infopass_del.php");}
		if ($_GET["section"] == 'infopass' && $_GET["action"] == 'save' ){include("modules/lnxit/infopass/infopass_save.php");}
		if ($_GET["section"] == 'infopass' && $_GET["action"] == 'goto' ){include("modules/lnxit/infopass/goto.php");}
		}
	}
	// informes
	if ($_GET["section"] == 'informes' && $_GET["action"] == ''){include("modules/lnxit/informes/informes.php");}
		if ($_GET["section"] == 'informes' && $_GET["action"] == 'form1'){include("modules/lnxit/informes/form1.php");}
		if ($_GET["section"] == 'informes' && $_GET["action"] == 'form1_rs'){include("modules/lnxit/informes/form1_rs.php");}
		
		if ($_GET["section"] == 'informes' && $_GET["action"] == 'inf1'){include("modules/lnxit/informes/inf1.php");}
		if ($_GET["section"] == 'informes' && $_GET["action"] == 'inf1_rs'){include("modules/lnxit/informes/inf1_rs.php");}

		if ($_GET["section"] == 'informes' && $_GET["action"] == 'inf2'){include("modules/lnxit/informes/inf2.php");}
		if ($_GET["section"] == 'informes' && $_GET["action"] == 'inf2_rs'){include("modules/lnxit/informes/inf2_rs.php");}
		
	if ($_GET["section"] == 'activosrc' ){include("modules/lnxit/activosrc/listado.php");}
	if ($_GET["section"] == 'activosfea' ){include("modules/lnxit/activosfea/listado.php");}
	
	
	
	if ($_GET["section"] == 'colas' && $_GET["action"] == '' ){include("modules/lnxit/colas/colas.php");}
	if ($_GET["section"] == 'colas' && $_GET["action"] == 'new' ){include("modules/lnxit/colas/colas_new.php");}
	if ($_GET["section"] == 'colas' && $_GET["action"] == 'edit' ){include("modules/lnxit/colas/colas_edit.php");}
	if ($_GET["section"] == 'colas' && $_GET["action"] == 'del' ){include("modules/lnxit/colas/colas_del.php");}
	if ($_GET["section"] == 'colas' && $_GET["action"] == 'save' ){include("modules/lnxit/colas/colas_save.php");}
	
	
		
	if ($_GET["section"] == 'config' ){include("modules/lnxit/config/config.php");}
        
        if ($_GET["section"] == 'tipoticket' && $_GET["action"] == '' ){include("modules/lnxit/config/tipoticket/tipoticket.php");}
        if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'new' ){include("modules/lnxit/config/tipoticket/tipoticket_new.php");}
        if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'edit' ){include("modules/lnxit/config/tipoticket/tipoticket_edit.php");}
        if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'del' ){include("modules/lnxit/config/tipoticket/tipoticket_del.php");}
        if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'save' ){include("modules/lnxit/config/tipoticket/tipoticket_save.php");}

	if ($_GET["section"] == 'docum' && $_GET["action"] == ''){include("modules/lnxit/docum/docum.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'new'){include("modules/lnxit/docum/docum_new.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'view'){include("modules/lnxit/docum/docum_view.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'newpage'){include("modules/lnxit/docum/docum_new_page.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'edit'){include("modules/lnxit/docum/docum_edit.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'del'){include("modules/lnxit/docum/docum_del.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'delpage'){include("modules/lnxit/docum/docum_del_page.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'save'){include("modules/lnxit/docum/docum_save.php");}
	if ($_GET["section"] == 'docum' && $_GET["action"] == 'ficheros'){include("modules/lnxit/docum/docum_ficheros.php");}
	
        
		
}
else{lnx_permdenegado();}

?>
