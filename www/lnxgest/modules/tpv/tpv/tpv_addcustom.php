<?php
$idtpv = $_POST["hidtpv"];
$ftxtconcepto = addslashes($_POST["txtconcepto"]);
$fhtxtprecio = $_POST["htxtprecio"];
$ftxtunidades = $_POST["txtunidades"];

echo '<p>idtpv: '.$idtpv.'</p>';
echo '<p>ftxtconcepto: '.$ftxtconcepto.'</p>';
echo '<p>fhtxtprecio: '.$fhtxtprecio[0].'</p>';
echo '<p>ftxtunidades: '.$ftxtunidades[0].'</p>';

$ftxtvalortax = $_POST["txtvalortax"];

$sqlaux = $mysqli->query("select max(orden) as orden from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbmaxorden = $rowaux["orden"];
$dbmaxorden = $dbmaxorden + 1;

$ximporte = $ftxtunidades[0] * $fhtxtprecio[0];

$sqllinea = $mysqli->query("insert into ".$prefixsql."tpv_lineas (idtpv, orden, codventa, concepto, unidades, precio, importe) values ('".$idtpv."', '".$dbmaxorden."', '', '".$ftxtconcepto."', '".$ftxtunidades[0]."', '".$fhtxtprecio[0]."', '".$ximporte."')"); 

$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."tpv_lineas "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$ultimoid = $rowaux["contador"];



$idtemp = '0';
		foreach($ftxtvalortax as $impimpuesto){
			$valor = $impimpuesto;
				
			$var = $_POST['hidtax'][$idtemp];
					
				$idimpuesto = $var;
				$valorimpuesto = $valor;
				
				// echo '<p>TAX: '.$idimpuesto.' -- '.$valorimpuesto.'</p>';
				
				$importetax = ($ximporte / 100) * $valorimpuesto;
				
				$sqllinea = $mysqli->query("insert into ".$prefixsql."tpv_lineas_tax (idtpv, idlinea, idtax, valor, importe) values ('".$idtpv."', '".$ultimoid."', '".$idimpuesto."', '".$valorimpuesto."', '".$importetax."')"); 


				
			$idtemp = $idtemp +1;
				
		}

header ("Location: index.php?module=tpv&section=tpv&action=view&id=".$idtpv);

?>