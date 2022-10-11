<?php
$fhaccion = $_POST["haccion"];
$fchkstock = $_POST["chkstock"];

if($fchkstock == '1'){$fchkstock = 'YES';}else{$fchkstock = 'NO';}

$sqltercero = $mysqli->query("delete from ".$prefixsql."wh_cfg where opcion = 'controlstock'");
$sqltercero = $mysqli->query("insert into ".$prefixsql."wh_cfg (opcion, valor) VALUES ('controlstock', '".$fchkstock."')");


$url_atras = "index.php?module=almacen&section=config";
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>