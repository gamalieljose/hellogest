<?php
$fhaccion = $_POST["haccion"];
$idarticulo = $_POST["hidarticulo"];
$fchkactivo = $_POST["chkactivo"];
$ftxtcod = addslashes($_POST["txtcod"]);
$ftxtconcepto = addslashes($_POST["txtconcepto"]);
$ftxtprecio = $_POST["txtprecio"];
$fchkstock = $_POST["chkstock"];
$ftxtstock = $_POST["txtstock"];
$flstalmacen = $_POST["lstalmacen"];
$ftxtbarcode = $_POST["txtbarcode"];
$ftxtnotas = addslashes($_POST["txtnotas"]);

$ftxttax = $_POST["txttax"];
$ftxtpreciototal = $_POST["txtpreciototal"];

$flstfabricante = $_POST["lstfabricante"];
$flsttipoarticulo = $_POST["lsttipoarticulo"];


$ftxtpeso = $_POST["txtpeso"];
$ftxtprofundidad = $_POST["txtprofundidad"];
$ftxtancho = $_POST["txtancho"];
$ftxtalto = $_POST["txtalto"];


if($fchkactivo == ''){$fchkactivo = "0";}
if($fchkstock == ''){$fchkstock = "0";}


if ($fhaccion == 'new')
{
	
	
	$sqlarticulo = $mysqli->query("select count(id) as contador from ".$prefixsql."productos where codventa = '".$ftxtcod."'");
	$row = mysqli_fetch_assoc($sqlarticulo);
	$dbexiste = $row["contador"];
	
	if ($dbexiste > '0')
	{
		$grabardatos = "no";
	}
	else
	{
		$grabardatos = "yes";
		$sqltercero= $mysqli->query("insert into ".$prefixsql."productos (activo, codventa, concepto, precio, stock_ctrl, id_fabricante, id_tipoarticulo, preciotax, barcode, peso, profundidad, ancho, alto, notas ) VALUES ('".$fchkactivo."', '".$ftxtcod."', '".$ftxtconcepto."', '".$ftxtprecio."', '".$fchkstock."', '".$flstfabricante."', '".$flsttipoarticulo."', '".$ftxtpreciototal."', '".$ftxtbarcode."', '".$ftxtpeso."', '".$ftxtprofundidad."', '".$ftxtancho."', '".$ftxtalto."', '".$ftxtnotas."') ");
		
		$sqlarticulo = $mysqli->query("select max(id) as contador from ".$prefixsql."productos");
		$row = mysqli_fetch_assoc($sqlarticulo);
		$dbmaximoid = $row["contador"];
		
		if($ftxtstock > '0' || $fchkstock == '1')
		{

			$sqlarticulo = $mysqli->query("insert into ".$prefixsql."productos_wh (idproducto, idwh, stock) values('".$dbmaximoid."', '".$flstalmacen."', '".$ftxtstock."')");
		}
		
		//insertamos los impuestos del articulo creado
		
		$idtemp = '0';
		foreach($ftxttax as $impimpuesto){
			$valor = $impimpuesto;
				
			$var = $_POST['hidimpuesto'][$idtemp];
					
				$idimpuesto = $var;
				$valorimpuesto = $valor;
				
				if($valorimpuesto <> '')
				{
					$ssql_insimp = $mysqli->query("insert into ".$prefixsql."productos_tax (idproducto, idtax, valor) values ('".$dbmaximoid."', '".$idimpuesto."', '".$valorimpuesto."')");
				}
				//insertamos los impuestos a la bbdd
				
			$idtemp = $idtemp +1;
				
		}
		
		
	}
}
if ($fhaccion == 'update')
{
	$sqlarticulo = $mysqli->query("select count(id) as contador from ".$prefixsql."productos where codventa = '".$ftxtcod."' and id <> '".$idarticulo."'");
	$row = mysqli_fetch_assoc($sqlarticulo);
	$dbexiste = $row["contador"];
	
	if ($dbexiste > '0')
	{
		$grabardatos = "no";
	}
	else
	{
		$grabardatos = "yes";
		$sqltercero= $mysqli->query("update ".$prefixsql."productos set activo = '".$fchkactivo."', codventa = '".$ftxtcod."', concepto = '".$ftxtconcepto."', precio = '".$ftxtprecio."', stock_ctrl = '".$fchkstock."', id_fabricante = '".$flstfabricante."', id_tipoarticulo = '".$flsttipoarticulo."', preciotax = '".$ftxtpreciototal."', barcode= '".$ftxtbarcode."', peso = '".$ftxtpeso."', profundidad = '".$ftxtprofundidad."', ancho = '".$ftxtancho."', alto = '".$ftxtalto."', notas = '".$ftxtnotas."' where id = '".$idarticulo."'");
	
	//insertamos los impuestos del articulo creado
		
		$sqltercero= $mysqli->query("delete from ".$prefixsql."productos_tax where idproducto = '".$idarticulo."'");
		
		$idtemp = '0';
		foreach($ftxttax as $impimpuesto){
			$valor = $impimpuesto;
				
			$var = $_POST['hidimpuesto'][$idtemp];
					
				$idimpuesto = $var;
				$valorimpuesto = $valor;
				
				if($valorimpuesto <> '')
				{
					$ssql_insimp = $mysqli->query("insert into ".$prefixsql."productos_tax (idproducto, idtax, valor) values ('".$idarticulo."', '".$idimpuesto."', '".$valorimpuesto."')");
				}
				//insertamos los impuestos a la bbdd
				
			$idtemp = $idtemp +1;
				
		}
	
	
	}
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."productos where id = '".$idarticulo."'");
	
	$url_atras = "index.php?module=almacen&section=articulos";
		header( "Location: ".$url_atras );
}

if($grabardatos == "yes")
{
	
				  
	

	if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?module=almacen&section=articulos";
		header( "refresh:2;url=".$url_atras );
	}
	if(isset($_POST["btnaplicar"])) 
	{
		$url_atras = "index.php?module=almacen&section=articulos&action=edit&id=".$idarticulo."&upd=ate";
		header( "Location: ".$url_atras );
	}
	
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito </td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';
}

if($grabardatos == "no")
{
	if ($fhaccion == 'new')
	{
	$url_atras = "index.php?module=almacen&section=articulos&action=new";
	header( "refresh:10;url=".$url_atras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td align="center">El <b>codigo de venta</b> ya esta repetido, porfavor introduzca de nuevo los datos del nuevo articulo</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
		echo '</table></div>';
	}
	
	if ($fhaccion == 'update')
	{
	$url_atras = "index.php?module=almacen&section=articulos&action=edit&id=".$idarticulo;
	header( "refresh:10;url=".$url_atras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td align="center">El <b>codigo de venta</b> ya esta repetido, porfavor introduzca de nuevo los datos del articulo</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
		echo '</table></div>';
	}
}



?>