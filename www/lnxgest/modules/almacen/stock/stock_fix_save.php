<?php
$fhidproducto = $_POST["hidproducto"];
$ftxtconcepto = $_POST["txtconcepto"];

$thidwh = $_POST["hidwh"];
$ttxtstock = $_POST["txtstock"];

//Generamos nuevo movimiento de almacen
$xfecha = date("Y-m-d");
$sqlstock = $mysqli->query("insert into ".$prefixsql."wh_mov (movimiento, fecha, modulo, iddocumento) values ('".$ftxtconcepto."', '".$xfecha."', '', '0')");

$sqlstock = $mysqli->query("select max(id) as contador from ".$prefixsql."wh_mov ");
$row = mysqli_fetch_assoc($sqlstock);

$idmovimiento = $row["contador"];

foreach($thidwh as $nidlinea)
{		
	$sqlstock = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$thidwh[$nidlinea]."'");
	$row = mysqli_fetch_assoc($sqlstock);
	$stock_antiguo = $row["stock"];

	if($stock_antiguo == ''){$stock_antiguo = '0';}
	$sqlstock = $mysqli->query("insert into ".$prefixsql."wh_lineas (idwhmov, idproducto, unid, idalmacen, movimiento, fecha) values ('".$idmovimiento."', '".$fhidproducto."', '".$stock_antiguo."', '".$thidwh[$nidlinea]."', 'OLD_REGULA', '".$xfecha."')");

	$sqlstock = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$fhidproducto."' and idwh = '".$thidwh[$nidlinea]."'");
	$existe = $sqlstock->num_rows;
	
	
	
	
	if($existe == '1')
	{
		//update
		$sqlstock = $mysqli->query("update ".$prefixsql."productos_wh set stock = '".$ttxtstock[$nidlinea]."' where idproducto = '".$fhidproducto."' and idwh = '".$thidwh[$nidlinea]."'");
	}
	else
	{
		//crear
		$sqlstock = $mysqli->query("insert into ".$prefixsql."productos_wh (idproducto, idwh, stock) values('".$fhidproducto."', '".$thidwh[$nidlinea]."', '".$ttxtstock[$nidlinea]."')");
	}
	
	$sqlstock = $mysqli->query("insert into ".$prefixsql."wh_lineas (idwhmov, idproducto, unid, idalmacen, movimiento, fecha) values ('".$idmovimiento."', '".$fhidproducto."', '".$ttxtstock[$nidlinea]."', '".$thidwh[$nidlinea]."', 'REGULARIZA', '".$xfecha."')");
}



$url_atras = "index.php?module=almacen&section=stock&id=".$fhidproducto;
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>