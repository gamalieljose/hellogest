<?php
$iddocumento = $_GET["id"];
$idlinea = $_GET["idlinea"];
$posicion = $_GET["action"]; //sube o baja

//Eliminamos la linea
$cnsaux= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas where id = '".$idlinea."'");

//elimnamos los numeros de serie
$cnsaux= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_sn where idlinea = '".$idlinea."'");

//eliminamos los impuestos asociados a una linea
$cnsaux= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid."linea = '".$idlinea."'");

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' order by orden");

$ordennlinea = 0;

while($colorden = mysqli_fetch_array($cnsaux))
{
	$ordennlinea = $ordennlinea +1;
	$cnsactualiza= $mysqli->query("update ".$prefixsql.$lnxinvoice."_lineas set orden = '".$ordennlinea."' where id = '".$colorden["id"]."'");
	
}

//calcular lineas e impuestos

$cnscalulos= $mysqli->query("select * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' ");
$importebruto = 0;
while($columna = mysqli_fetch_array($cnscalulos))
{
		$importebruto = $importebruto + $columna["importe"];
}
$importebruto = round($importebruto,2);

$cnscalulos= $mysqli->query("update ".$prefixsql.$lnxinvoice." set impbruto = '".$importebruto."' where id = '".$iddocumento."'");

//fin calcula lineas
//inicio calcula impuestos para el total

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $rowprincipal["idserie"];
$dbidcliente = $rowprincipal["idcliente"];

$sumatotal = $importebruto;
$sumatodo = $importebruto;

//hemos de buscar los impuestos asociados para la serie
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbidserie."' order by orden");
$valoranterior = "0";

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$nomimpuesto = $rowaux['impuesto'];
	$valorimpuesto = $rowaux['valor'];
		
	//¿es obligatorio el impuesto?
	//si es = 1 entonces hacer calculos, si es 0 consultar si el tercero tiene condiciones de venta
	
	if($columna["requerido"] == "1")
	{
		//Como es obligatorio el impuesto lo colocamos
		
		
		$importeimpuesto = $sumatodo /100 * $valorimpuesto;
		$sumatotal = $sumatotal + $importeimpuesto;
		
		
		
		//echo '<tr><td>Obligatorio</td><td>'.$nomimpuesto.'</td><td align="right">'.$valorimpuesto.' %</td><td align="right">'.$importeimpuesto.'</td></tr>';
		
	}
	else
	{
		//Buscamos si el tercero tiene asignado el impuesto
		$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."terceros_tax where idimpuesto = '".$columna["idimpuesto"]."' and venta = '1' and idtercero = '".$dbidcliente."'");
		$existe = $cnsaux->num_rows;

		if ($existe == '1')
		{
			//Como si que existe la condición. añadiremos el impuesto
			//no sin antes comprobar que este impuesto y para esta factura se ha de calcular el impuesto opcional
			$cnstax= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$iddocumento."' and idimpuesto = '".$columna["idimpuesto"]."' ");
			$rowtax = mysqli_fetch_assoc($cnstax);
			$dbcalculartax = $rowtax["calcular"];
			if ($dbcalculartax == "1")
			{
				$importeimpuesto = $sumatodo /100 * $valorimpuesto;
				
				
				$sumatotal = $sumatotal + $importeimpuesto;
				
			}
			
			
		}
	}
}

$importetotal = round($sumatotal,2);
$cnscalulos= $mysqli->query("update ".$prefixsql.$lnxinvoice." set total = '".$importetotal."' where id = '".$iddocumento."'");
//---FIN calcular lineas-------

header("Location: index.php?module=".$lnxinvoice."&section=main&action=view&id=".$iddocumento);

?>