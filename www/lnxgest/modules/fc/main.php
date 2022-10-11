<?php
$lnxinvoice = $_GET["module"];
$campomasterid = "id".$lnxinvoice;

if($lnxinvoice == "fv" || $lnxinvoice == "fc"){$lblnxinvoice = "Factura";}
if($lnxinvoice == "ov" || $lnxinvoice == "oc"){$lblnxinvoice = "Presupuesto";}
if($lnxinvoice == "av" || $lnxinvoice == "ac"){$lblnxinvoice = "Albaran";}
	
// ov presupuestos
// pv pedidos
// av albaranes
// fv facturas
//fvr facturas rectificativas de venta

	if ($_GET["section"] == '' ) {include("modules/".$lnxinvoice."/listado.php"); }
	if ($_GET["section"] == 'main' && $_GET["action"] == 'new'){ include("modules/".$lnxinvoice."/comun/main_new.php"); }
	if ($_GET["section"] == 'main' && $_GET["action"] == 'edit'){ include("modules/".$lnxinvoice."/comun/main_edit.php"); }
	if ($_GET["section"] == 'main' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/main_save.php"); }
	if ($_GET["section"] == 'main' && $_GET["action"] == 'view'){ include("modules/".$lnxinvoice."/comun/main_view.php"); }

	if ($_GET["section"] == 'lines' && $_GET["action"] == 'edit'){ include("modules/".$lnxinvoice."/lines/lines_edit.php"); }
	if ($_GET["section"] == 'lines' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/lines/lines_save.php"); }
	if ($_GET["section"] == 'lines' && ($_GET["action"] == 'sube' || $_GET["action"] == 'baja')){ include("modules/".$lnxinvoice."/lines/lines_mover.php"); }
	if ($_GET["section"] == 'lines' && $_GET["action"] == 'del' ){ include("modules/".$lnxinvoice."/lines/lines_del.php"); }
	
		if ($_GET["section"] == 'linessn' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/lines/linessn_save.php"); }
		if ($_GET["section"] == 'linessn' && $_GET["action"] == 'edit'){ include("modules/".$lnxinvoice."/lines/linessn_edit.php"); }
		if ($_GET["section"] == 'linessn' && $_GET["action"] == 'delete'){ include("modules/".$lnxinvoice."/lines/linessn_delete.php"); }
	
		
	if ($_GET["section"] == 'print' && $_GET["action"] == 'setup'){ include("modules/".$lnxinvoice."/comun/print.php"); }
	if ($_GET["section"] == 'print' && $_GET["action"] == 'preprint'){ include("modules/".$lnxinvoice."/comun/print_preproceso.php"); }
	if ($_GET["section"] == 'print' && $_GET["action"] == 'print'){ include("modules/".$lnxinvoice."/comun/print_proceso.php"); }
	
	if ($_GET["section"] == 'validar' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/validar.php"); }
	if ($_GET["section"] == 'validar' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/validar_save.php"); }
	
	if ($_GET["section"] == 'validarf' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/convertir.php"); }
	if ($_GET["section"] == 'validarf' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/convertir_save.php"); }
	
	if ($_GET["section"] == 'status' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/mod_estado.php"); }
		
	if ($_GET["section"] == 'vencimiento' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/vencimiento.php"); }
	if ($_GET["section"] == 'vencimiento' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/vencimiento_save.php"); }
	
	if ($_GET["section"] == 'fpago' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/fpago.php"); }
	if ($_GET["section"] == 'fpago' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/fpago_save.php"); }
	
	
	if ($_GET["section"] == 'borrafactura' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/fborra.php"); }
	if ($_GET["section"] == 'borrafactura' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/fborra_save.php"); }
	
	if ($_GET["section"] == 'convertborrador' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/cvborra.php"); }
	if ($_GET["section"] == 'convertborrador' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/cvborra_save.php"); }
	
	//edita factura
	if ($_GET["section"] == 'editfv' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/editfv.php"); }
	if ($_GET["section"] == 'editfv' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/editfv_save.php"); }
	
	
	if ($_GET["section"] == 'conta' ){ include("modules/".$lnxinvoice."/conta/conta.php"); }
	
	if ($_GET["section"] == 'otros' && $_GET["action"] == '' ){ include("modules/".$lnxinvoice."/otros/menu.php"); }
	if ($_GET["section"] == 'otros' && $_GET["action"] == 'ctax' ){ include("modules/".$lnxinvoice."/otros/ctax.php"); }
	if ($_GET["section"] == 'otros' && $_GET["action"] == 'ctaxsave' ){ include("modules/".$lnxinvoice."/otros/ctaxsave.php"); }
	
	
	if ($_GET["section"] == 'docs' ){ include("modules/".$lnxinvoice."/docs/docs.php"); }
	

	if ($_GET["section"] == 'pagos' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/pagos/pagos.php"); }
	if ($_GET["section"] == 'pagos' && $_GET["action"] == 'new'){ include("modules/".$lnxinvoice."/pagos/pagos_new.php"); }
	if ($_GET["section"] == 'pagos' && $_GET["action"] == 'edit'){ include("modules/".$lnxinvoice."/pagos/pagos_edit.php"); }
	if ($_GET["section"] == 'pagos' && $_GET["action"] == 'delete'){ include("modules/".$lnxinvoice."/pagos/pagos_del.php"); }
	if ($_GET["section"] == 'pagos' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/pagos/pagos_save.php"); }
	
	if ($lnxinvoice == "fc")
	{
		if ($_GET["section"] == 'factura' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/fc/factura.php"); }
		if ($_GET["section"] == 'factura' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/fc/factura_save.php"); }

		if ($_GET["section"] == 'express' && $_GET["action"] == 'new'){ include("modules/".$lnxinvoice."/fc/ex_new.php"); }
        if ($_GET["section"] == 'express' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/fc/ex_save.php"); }
	}

	if ($_GET["section"] == 'buscar'){ include("modules/".$lnxinvoice."/otros/buscar.php"); }

	if ($_GET["section"] == 'links' && $_GET["action"] == ''){ include("modules/".$lnxinvoice."/comun/links.php"); }
	if ($_GET["section"] == 'links' && $_GET["action"] == 'new'){ include("modules/".$lnxinvoice."/comun/links_new.php"); }
	if ($_GET["section"] == 'links' && $_GET["action"] == 'del'){ include("modules/".$lnxinvoice."/comun/links_del.php"); }
	if ($_GET["section"] == 'links' && $_GET["action"] == 'save'){ include("modules/".$lnxinvoice."/comun/links_save.php"); }
?>