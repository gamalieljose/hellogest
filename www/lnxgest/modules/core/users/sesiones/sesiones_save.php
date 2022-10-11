<?php
$fhaccion = $_POST["haccion"];

$fchkuidsession = $_POST["chkuidsession"];

if ($fhaccion == 'delete')
{
    foreach($fchkuidsession as $sesionborrar)
    {
       $sqltercero= $mysqli->query("delete from ".$prefixsql."users_uid where uidsession = '".$sesionborrar."'");
    }   
}



$urlatras = "index.php?&module=core&section=sesiones";

header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center">';
	
	echo ' <a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
	
?>