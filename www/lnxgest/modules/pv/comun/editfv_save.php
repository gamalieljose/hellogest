<?php
$fhiddocumento = $_POST["hiddoc"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$fhiddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigoint = $row["codigoint"];
$dbeditfv = $row["editfv"];


//Consultamos si esta habilitado el control de stock

if($lnxinvoice == "ac"){$campobuscar = "stkupd_ac";}
if($lnxinvoice == "fc"){$campobuscar = "stkupd_fc";}
if($lnxinvoice == "av"){$campobuscar = "stkupd_av";}
if($lnxinvoice == "fv"){$campobuscar = "stkupd_fv";}

//leeremos configuracion
$sqlarticulo = $mysqli->query("select * from ".$prefixsql."empresa where campo = '".$campobuscar."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbcontrolstock = $row["valor"]; //stock albaran de compra 


if($dbeditfv == '0')
{
	//si no se esta editando pasamos el codigoint a 0 y el editfv al codigo que tiene interno
	$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set codigoint = '0', editfv = '".$dbcodigoint."' where id = '".$fhiddocumento."'");
	
	if($dbcontrolstock == "yes")
	{
		
		//Eliminamos los movimientos de alamcen
		$sqlstock = $mysqli->query("select * from ".$prefixsql."wh_mov where modulo = '".$lnxinvoice."' and iddocumento = '".$fhiddocumento."'");
		$rowstock = mysqli_fetch_assoc($sqlstock);
		$id_wh_mov = $rowstock["id"];

		$sqlstock = $mysqli->query("SELECT * from ".$prefixsql."wh_lineas where idwhmov = '".$id_wh_mov."'");
		while($columna = mysqli_fetch_array($sqlstock))
		{
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$columna["idproducto"]."' and idwh = '".$columna["idalmacen"]."'");
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$stock_actual = $rowaux["stock"];
			
			$nuevo_stock = $stock_actual - $columna["unid"];
			$sqlaux = $mysqli->query("update ".$prefixsql."productos_wh set stock = '".$nuevo_stock."' where idproducto = '".$columna["idproducto"]."' and idwh = '".$columna["idalmacen"]."'");
		}


		$sqlaux = $mysqli->query("delete from ".$prefixsql."wh_lineas where idwhmov = '".$id_wh_mov."'");
		$sqlaux = $mysqli->query("delete from ".$prefixsql."wh_mov where id = '".$id_wh_mov."'");
	}
	
}
if($dbcodigoint == '0')
{
	//si no se esta editando pasamos el codigoint a 0 y el editfv al codigo que tiene interno
	$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set codigoint = '".$dbeditfv."', editfv = '0' where id = '".$fhiddocumento."'");
	
}


$urlatras = 'index.php?module='.$lnxinvoice."&section=main&action=view&id=".$fhiddocumento;

header("Location: ".$urlatras);

	 
	?>