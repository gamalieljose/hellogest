


<div class="grupotabs">
<div class="campoencoger">
<?php

$idtercero = $_GET["idtercero"];

if($_COOKIE["lnxrecoverymode"] == "ON")
{
	echo '<a class="btnedit_verde" href="index.php?module=terceros&section=terceros&action=recovery&idtercero='.$idtercero.'">Recovery Completo</a> ';
}


if ($_GET["section"] == "terceros" && $_GET["action"] <> "del"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$idtercero.'">Ficha Tercero</a> ';

if ($_GET["section"] == "tercerosvinc" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=terceros&section=tercerosvinc&idtercero='.$idtercero.'">Vinculos</a> ';

if(lnx_check_perm(2004) > 0)
{
	if ($_GET["section"] == "terceroslopd" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
	echo '<a class="'.$claseboton.'" href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'">LOPD</a> ';
}

if(lnx_check_perm(2005) > 0)
{
	if ($_GET["section"] == "docs" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
	echo '<a class="'.$claseboton.'" href="index.php?module=terceros&section=docs&idtercero='.$idtercero.'">Documentos</a> ';
}

if(lnx_check_perm(2007) > 0)
{
	if ($_GET["section"] == "contactos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
	echo ' <a class="'.$claseboton.'" href="index.php?module=terceros&section=contactos&idtercero='.$idtercero.'">Contactos</a> ';
}
if(lnx_check_perm(2008) > 0)
{
	if ($_GET["section"] == "dir"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
	echo ' <a class="'.$claseboton.'" href="index.php?module=terceros&section=dir&idtercero='.$idtercero.'">Direcciones</a> ';
}
if(lnx_check_perm(2009) > 0)
{
	if ($_GET["section"] == "factu"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
	echo ' <a class="'.$claseboton.'" href="index.php?module=terceros&section=factu&action=edit&idtercero='.$idtercero.'">Facturacion</a> ';
}
if(lnx_check_perm(2010) > 0)
{
if ($_GET["section"] == "historico" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=terceros&section=historico&idtercero='.$idtercero.'">Histórico</a> ';
}

if(lnx_check_perm(2003) > '0')
{
	if ($_GET["section"] == "terceros" && $_GET["action"] == "del" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab_del";}
	echo ' <a class="'.$claseboton.'" href="index.php?module=terceros&section=terceros&action=del&idtercero='.$idtercero.'">Eliminar</a>';
}
	
?>
</div>
</div>
<p></p>