<?php
$fhaccion = $_POST["haccion"];

$fchkimpresion = $_POST["chkimpresion"];

if ($fhaccion == 'delete')
{
	$idtemp = '0';
		foreach($fchkimpresion as $idjob){
					
			$sqlaux = $mysqli->query("select * from ".$prefixsql."printjobs where id = '".$idjob."'");
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbprintfile = $rowaux["printfile"];
					
			$sqltercero= $mysqli->query("delete from ".$prefixsql."printjobs where id = '".$idjob."'");

			unlink($lnxprintspool.$dbprintfile);
				
			$idtemp = $idtemp +1;
				
		}
	$sqlaux = $mysqli->query("ALTER TABLE ".$prefixsql."printjobs AUTO_INCREMENT = 1");
	
}


$url_atras = "index.php?module=userpanel&section=spool";

header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';
	
?>