<?php

if(lnx_check_perm(2000) > '0') // chekea permiso acceso a terceros
{
	if($_COOKIE["lnxrecoverymode"] == "ON")
	{
		if ($_GET["section"] == 'terceros' && $_GET["action"] == 'recovery'){include("./modules/terceros/terceros/recovery.php");}	
	}

	if ($_GET["section"] == '' && $_GET["action"] == '')
	{
		header("Location: index.php?module=terceros&section=terceros");
	}

	if ($_GET["module"] == 'terceros' && $_GET["section"] == 'terceros' && $_GET["action"] == ''){include("./modules/terceros/terceros/terceros.php");}
		
	
	if ($_GET["section"] == 'terceros' && $_GET["action"] == 'new')	{if(lnx_check_perm(2001) > 0){include("./modules/terceros/terceros/terceros_new.php");}else{lnx_permdenegado();} }
	if ($_GET["section"] == 'terceros' && $_GET["action"] == 'edit'){if(lnx_check_perm(2002) > 0){include("./modules/terceros/terceros/terceros_edit.php");}else{lnx_permdenegado();} }
	if ($_GET["section"] == 'terceros' && $_GET["action"] == 'del'){if(lnx_check_perm(2003) > 0){include("./modules/terceros/terceros/terceros_del.php");}else{lnx_permdenegado();} }
	if ($_GET["section"] == 'terceros' && $_GET["action"] == 'save'){include("./modules/terceros/terceros/terceros_save.php");}
	
	if ($_GET["section"] == 'tercerosvinc')
	{
		if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == ''){include("./modules/terceros/tercerosvinc/vinc.php");}
		if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'new'){include("./modules/terceros/tercerosvinc/vinc_new.php");}
		if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'edit'){include("./modules/terceros/tercerosvinc/vinc_edit.php");}
		if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'del'){include("./modules/terceros/tercerosvinc/vinc_del.php");}
		if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'save'){include("./modules/terceros/tercerosvinc/vinc_save.php");}
	}



	if ($_GET["section"] == 'terceroslopd')
	{
		if(lnx_check_perm(2004) > 0)
		{
			if ($_GET["section"] == 'terceroslopd' && $_GET["action"] == ''){include("./modules/terceros/terceros/lopd.php");}
         	if ($_GET["section"] == 'terceroslopd' && $_GET["action"] == 'new'){include("./modules/terceros/terceros/lopd_new.php");}
            if ($_GET["section"] == 'terceroslopd' && $_GET["action"] == 'edit'){include("./modules/terceros/terceros/lopd_edit.php");}
            if ($_GET["section"] == 'terceroslopd' && $_GET["action"] == 'del'){include("./modules/terceros/terceros/lopd_del.php");}
			if ($_GET["section"] == 'terceroslopd' && $_GET["action"] == 'save'){include("./modules/terceros/terceros/lopd_save.php");}
		}
		else{lnx_permdenegado();}
	}	

	if ($_GET["section"] == 'lopd' || $_GET["section"] == 'lopdcampos')
	{
		if(lnx_check_perm(2011) > 0)
		{
		if ($_GET["section"] == 'lopd' && $_GET["action"] == ''){include("./modules/terceros/lopd/listado.php");}
		if ($_GET["section"] == 'lopd' && $_GET["action"] == 'new'){include("./modules/terceros/lopd/lopd_new.php");}
		if ($_GET["section"] == 'lopd' && $_GET["action"] == 'edit'){include("./modules/terceros/lopd/lopd_edit.php");}
		if ($_GET["section"] == 'lopd' && $_GET["action"] == 'del'){include("./modules/terceros/lopd/lopd_del.php");}
		if ($_GET["section"] == 'lopd' && $_GET["action"] == 'save'){include("./modules/terceros/lopd/lopd_save.php");}
		
			if ($_GET["section"] == 'lopdcampos' && $_GET["action"] == ''){include("./modules/terceros/lopd/campo_list.php");}
			if ($_GET["section"] == 'lopdcampos' && $_GET["action"] == 'new'){include("./modules/terceros/lopd/campo_new.php");}
			if ($_GET["section"] == 'lopdcampos' && $_GET["action"] == 'edit'){include("./modules/terceros/lopd/campo_edit.php");}
			if ($_GET["section"] == 'lopdcampos' && $_GET["action"] == 'del'){include("./modules/terceros/lopd/campo_del.php");}
			if ($_GET["section"] == 'lopdcampos' && $_GET["action"] == 'save'){include("./modules/terceros/lopd/campo_save.php");}
		}
		else{lnx_permdenegado();}
	}
       
		if ($_GET["section"] == 'docs' )
			{if(lnx_check_perm(2005) > 0){include("modules/terceros/docs/docs.php");}else{lnx_permdenegado();}}
		
		if ($_GET["section"] == 'alta' && $_GET["action"] == 'cli'){include("./modules/terceros/alta_cli.php");}
		if ($_GET["section"] == 'alta' && $_GET["action"] == 'pro'){include("./modules/terceros/alta_pro.php");}
		
		if ($_GET["section"] == 'alta' && $_GET["action"] == 'contacli'){include("./modules/terceros/alta_contacli.php");}
		if ($_GET["section"] == 'alta' && $_GET["action"] == 'contapro'){include("./modules/terceros/alta_contapro.php");}
		
		if ($_GET["section"] == 'dir')
		{
			if(lnx_check_perm(2008) > 0)
			{
				if ($_GET["section"] == 'dir' && $_GET["action"] == ''){include("./modules/terceros/dir/dir.php");}
				if ($_GET["section"] == 'dir' && $_GET["action"] == 'new'){include("./modules/terceros/dir/dir_new.php");}
				if ($_GET["section"] == 'dir' && $_GET["action"] == 'edit'){include("./modules/terceros/dir/dir_edit.php");}
				if ($_GET["section"] == 'dir' && $_GET["action"] == 'del'){include("./modules/terceros/dir/dir_del.php");}
				if ($_GET["section"] == 'dir' && $_GET["action"] == 'save'){include("./modules/terceros/dir/dir_save.php");}	
			}
			else{lnx_permdenegado();}
		}
		
		
		if ($_GET["section"] == 'contactos')
		{
			if(lnx_check_perm(2007) > 0)
			{
				if ($_GET["section"] == 'contactos' && $_GET["action"] == ''){include("./modules/terceros/contactos/contacto.php");}
				if ($_GET["section"] == 'contactos' && $_GET["action"] == 'new'){include("./modules/terceros/contactos/contacto_new.php");}
				if ($_GET["section"] == 'contactos' && $_GET["action"] == 'edit'){include("./modules/terceros/contactos/contacto_edit.php");}
				if ($_GET["section"] == 'contactos' && $_GET["action"] == 'del'){include("./modules/terceros/contactos/contacto_del.php");}
				if ($_GET["section"] == 'contactos' && $_GET["action"] == 'save'){include("./modules/terceros/contactos/contacto_save.php");}		
			}
			else{lnx_permdenegado();}

		}
		
		
		if ($_GET["section"] == 'historico' )
		{
			if(lnx_check_perm(2010) > 0)
			{
				if ($_GET["section"] == 'historico' ){include("./modules/terceros/historico/historico.php");}
			}
			else{lnx_permdenegado();}
		}
		
			
	if ($_GET["module"] == 'terceros' && $_GET["section"] == 'parametros' && $_GET["action"] == ''){include("./modules/terceros/parametros.php");}
//Imprimir
	if ($_GET["module"] == 'terceros' && $_GET["section"] == 'terceros' && $_GET["action"] == 'print'){include("./modules/terceros/print.php");} //antes de procesar
	if ($_GET["module"] == 'terceros' && $_GET["section"] == 'terceros' && $_GET["action"] == 'printrs'){include("./modules/terceros/print_rs.php");} //procesando impresion
	if ($_GET["module"] == 'terceros' && $_GET["section"] == 'terceros' && $_GET["action"] == 'printprocess'){include("./modules/terceros/print_proceso.php");} //imprimiendo

	

	$permisosolicitado = lnx_check_perm(30);   // chekea permiso
	if($permisosolicitado > '0')
	{
		
		if ($_GET["section"] == 'expgoogle' && $_GET["proceso"] == ''){include("./modules/terceros/expgoogle/expgoogle.php");}	
		if ($_GET["section"] == 'expgoogle' && $_GET["proceso"] == 'file'){include("./modules/terceros/expgoogle/exp_proceso.php");}	

		if ($_GET["section"] == 'expterceros' && $_GET["proceso"] == ''){include("./modules/terceros/expterceros/expterceros.php");}	
		if ($_GET["section"] == 'expterceros' && $_GET["proceso"] == 'file'){include("./modules/terceros/expterceros/exp_proceso.php");}	
	}
	

	if ($_GET["section"] == 'buscar' && $_GET["action"] == ''){include("./modules/terceros/buscar/buscar.php");}	
	if ($_GET["section"] == 'buscar' && $_GET["action"] == 'verficha'){include("./modules/terceros/buscar/ficha.php");}	
	if ($_GET["section"] == 'buscar' && $_GET["action"] == 'vercontacto'){include("./modules/terceros/buscar/contacto.php");}	

	
	if ($_GET["section"] == 'factu' )
	{
		if(lnx_check_perm(2009) > 0)
		{
			if ($_GET["section"] == 'factu' ){include("./modules/terceros/factu/factu.php");}
		}
		else{lnx_permdenegado();}
	}
	

	$permisosolicitado = lnx_check_perm(31);   // chekea permiso Acceso a estadisticas
	if($permisosolicitado > '0')
	{
		
		if ($_GET["section"] == 'stat1' && $_GET["action"] == ''){include("modules/terceros/stats/stat1.php");}
		if ($_GET["section"] == 'stat1' && $_GET["action"] == 'ver'){include("modules/terceros/stats/stat1_ver.php");}

		if ($_GET["section"] == 'stat2' && $_GET["action"] == ''){include("modules/terceros/stats/stat2.php");}
	}


}
else
{
	lnx_permdenegado();
}
?>

