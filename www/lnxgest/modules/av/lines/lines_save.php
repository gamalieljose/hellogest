<?php

$fhaccionlinea = $_POST["haccionlinea"];
$fhiddocumento = $_POST["hiddocumento"];

$fhidlinea = $_POST["hidlinea"];

$flstseries = $_POST["lstseries"]; //serie factura
$flsttercero = $_POST["lsttercero"]; //tercero

$ftxtcodventa = $_POST["txtcodventa"];
$ftxtconcepto = $_POST["txtconcepto"];
$ftxtunidades = $_POST["txtunidades"];
$ftxtprecio = $_POST["txtprecio"];
$ftxtdto = $_POST["txtdto"];
$ftxtimporte = $_POST["txtimporte"];

$fchkexcluir = $_POST["chkexcluir"];
if ($fchkexcluir == ''){$fchkexcluir = '0';}

if ($fhaccionlinea == 'new')
{
//Se inserta linea
	//calculamos el n linea que le toca (orden)
	$cnsaux= $mysqli->query("select max(orden) as maxorden from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$fhiddocumento."' and exclufactu ='".$fchkexcluir."' ");
	$row = mysqli_fetch_assoc($cnsaux);
	$ordenactual = $row["maxorden"] +1;
	
	
	$ConsultaMySql= $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_lineas (".$campomasterid.", cod, concepto, unid, precio, dto, importe, orden, exclufactu) values ('".$fhiddocumento."', '".$ftxtcodventa."', '".$ftxtconcepto."', '".$ftxtunidades."', '".$ftxtprecio."', '".$ftxtdto."', '".$ftxtimporte."', '".$ordenactual."', '".$fchkexcluir."')");
	
	//ontenemos id documento o factura
	$ConsultaMySql= $mysqli->query("select max(id) as contador from ".$prefixsql.$lnxinvoice."_lineas ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idlineafactura = $row["contador"];
		
	//inserta los valores de impuestos
	$timpuestos = $_POST['txttax'];
	$idtemp = '0';
	foreach($timpuestos as $impimpuesto){
		$valor = $impimpuesto;
			
		$var = $_POST['hidimpuesto'][$idtemp];
				
			$idimpuesto = $var;
			$valorimpuesto = $valor;
			
			
			
			$importetaxlinea = $ftxtimporte / 100 * $valorimpuesto;
			//$importetaxlinea =round($importetaxlinea, 2);
			
			//insertamos los impuestos a la bbdd
				if ($fchkexcluir == '1')
				{
					$valorimpuesto = '0';
					$importetaxlinea = '0';
				}
			
			
				$ssqlx = "insert into ".$prefixsql.$lnxinvoice."_lineas_tax (".$campomasterid.", ".$campomasterid."linea, idtax, valor, importe) values ('".$fhiddocumento."','".$idlineafactura."','".$idimpuesto."','".$valorimpuesto."','".$importetaxlinea."' )";
				$ssql_insimp = $mysqli->query($ssqlx);
			
			
			
		$idtemp = $idtemp +1;
			
	}
	
}

if ($fhaccionlinea == 'update')
{
//Se modifica linea

$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice."_lineas set cod = '".$ftxtcodventa."', concepto = '".$ftxtconcepto."', unid = '".$ftxtunidades."', precio = '".$ftxtprecio."', dto = '".$ftxtdto."', importe = '".$ftxtimporte."', exclufactu = '".$fchkexcluir."' where id = '".$fhidlinea."'");

//Modificamos las FV_lineas_atx

//Borramos los tax actuales
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid."linea = '".$fhidlinea."'");

//inserta los valores de impuestos
	$timpuestos = $_POST['txttax'];
	$idtemp = '0';
	foreach($timpuestos as $impimpuesto){
		$valor = $impimpuesto;
			
		$var = $_POST['hidimpuesto'][$idtemp];
				
			$idimpuesto = $var;
			$valorimpuesto = $valor;
						
			$importetaxlinea = $ftxtimporte / 100 * $valorimpuesto;
			//$importetaxlinea = round($importetaxlinea, 2);
			
			//insertamos los impuestos a la bbdd
				if ($fchkexcluir == '1')
				{
					$valorimpuesto = '0';
					$importetaxlinea = '0';
				}
			
			
				$ssqlx = "insert into ".$prefixsql.$lnxinvoice."_lineas_tax (".$campomasterid.", idfvlinea, idtax, valor, importe) values ('".$fhiddocumento."','".$fhidlinea."','".$idimpuesto."','".$valorimpuesto."','".$importetaxlinea."' )";
				$ssql_insimp = $mysqli->query($ssqlx);
			
			
			
		$idtemp = $idtemp +1;
			
	}
	
}


$importetotal = round($sumatotal,2);
$cnscalulos= $mysqli->query("update ".$prefixsql.$lnxinvoice." set total = '".$importetotal."' where id = '".$fhiddocumento."'");

header("Location: index.php?module=".$lnxinvoice."&section=main&action=view&id=".$fhiddocumento);

?>
