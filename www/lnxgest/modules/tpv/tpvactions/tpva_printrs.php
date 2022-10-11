<?php
$idtpv = $_POST["hidtpv"];

$url_atras = "index.php?module=tpv&section=tpvactions&id=".$idtpv;

header( "refresh:2;url=".$url_atras );
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Impresión realizada con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';
        
        
$idimpresora = $_POST["lstprinters"];
$docprinttemplate = $_POST["lstdocprint"];
    
include("modules/tpv/docprint/".$docprinttemplate);
if($_POST["chkadicionales"] == "1")
{
    include("modules/tpv/docprint/tck_condiciones.php");
}
?>

