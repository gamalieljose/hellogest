<?php
$hidticket = $_POST["hidticket"];
$flstprinter = $_POST["lstprinter"];

require('scripts/fpdf/fpdf.php');
require('scripts/fpdf/writehtml.php');


$ficherodocprint = $_POST["lstdocprint"];
$printseguimientos = $_POST["chkseguimientos"];

include("modules/lnxit/docprint/".$ficherodocprint);



if ($flstprinter > '0'){ header( "refresh:2;url=index.php?module=lnxit&section=tickets&action=edit&id=".$hidticket );}

echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Impresion realizada con éxito</td></tr>
	<tr><td align="center">
	<a class="btnedit" href="index.php?module=lnxit&section=tickets&action=edit&id='.$hidticket.'">Aceptar</a> ';
	if ($flstprinter == '0'){echo '<a class="btnedit" href="'.$rutaficheropdf.'" target="_blank">Ver documento</a> '; }
	echo '</td></tr>
	</table></div>';


?>