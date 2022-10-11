<?php
$fhaccion = $_POST["haccion"];
$idproducto = $_POST["hidproducto"];
$idlinea = $_POST["hidlinea"];

$flsttercero = $_POST["lsttercero"];
$ftxtreferencia = $_POST["txtreferencia"];
$ftxtprecio = $_POST["txtprecio"];

$fechaahora = date("Y-m-d H:i:s");


if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."productos_pro (idproduct, idtercero, precio, referencia, ultactu ) VALUES ('".$idproducto."', '".$flsttercero."', '".$ftxtprecio."', '".$ftxtreferencia."', '".$fechaahora."' )");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."productos_pro set idtercero = '".$flsttercero."', precio = '".$ftxtprecio."', referencia = '".$ftxtreferencia."', ultactu = '".$fechaahora."' where id = '".$idlinea."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."productos_pro where id = '".$idlinea."'");
}

			  


	if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?module=almacen&section=pro&id=".$idproducto;
		header( "refresh:20;url=".$url_atras );
	}
	if(isset($_POST["btnaplicar"])) 
	{

		$url_atras = "index.php?module=almacen&section=pro&action=edit&id=".$idproducto."&idlinea=".$idlinea."&upd=ate";
		header( "Location: ".$url_atras );
	}


	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>
