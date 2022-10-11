<?php
$idticket = $_POST["txtidticket"];

$ConsultaMySql= $mysqli->query("SELECT COUNT(*) as contador from ".$prefixsql."it_tickets where id = '".$idticket."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcontador = $row['contador'];

if ($dbcontador == '1')
{
	
	header("Location: index.php?module=lnxit&section=tickets&action=edit&id=".$idticket);
	
}
else
{
$urlatras = "index.php?module=lnxit&section=tickets&subsection=list";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td><img src="img/exclamation.png" />No existe el ticket solicitado</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}
?>