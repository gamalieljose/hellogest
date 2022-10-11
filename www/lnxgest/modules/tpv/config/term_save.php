<?php
$fhidterminal = $_POST["hidterminal"];
$flstseriesv = $_POST["lstseriesv"];
$flstseriesc = $_POST["lstseriesc"];
$flstprinter = $_POST["lstprinter"];
$flsttercero = $_POST["lsttercero"];


if ($fhidterminal > 0)
{

$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."tpv_cfg where idterminal = '".$fhidterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$existecfg = $rowaux["contador"];

if($existecfg == '0')
{
	//No existe configuración del TPV
	$sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_cfg (idterminal, idserie, idseriec, idprinter, idtercero ) VALUES ('".$fhidterminal."', '".$flstseriesv."', '".$flstseriesc."', '".$flstprinter."', '".$flsttercero."')");
}
else
{
		//Si que tiene configuración el TPV
	$sqltpv = $mysqli->query("update ".$prefixsql."tpv_cfg set idserie = '".$flstseriesv."', idseriec = '".$flstseriesc."', idprinter = '".$flstprinter."', idtercero = '".$flsttercero."' where idterminal = '".$fhidterminal."' ");

	
}
	
	
}



header( "refresh:2;url=index.php?module=tpv&section=cfgterm" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module=tpv&section=cfgterm">Aceptar</a></td></tr>
	</table></div>';
?>