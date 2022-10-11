<?php
$idfv = $_POST["hidfv"];

$valorimpuesto = $_POST["txttax"];
$idimpuesto = $_POST["txtidtax"];

$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$idfv."' ");

	$ssql = "SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$idfv."' ";
	$ConsultaMySql = $mysqli->query($ssql);

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		$idlinea = $columna["id"];
		$dbimporte = $columna["importe"];
		$dbexclufactu = $columna["exclufactu"];
		
		for ($i=0; $i< count($valorimpuesto); $i++){
			//echo '<p>'.$valorimpuesto[$i].' id: '.$idimpuesto[$i].'</p>';
			$newimportetax = ($dbimporte / 100) * $valorimpuesto[$i];
			$newimportetax = round($newimportetax, 2);
			
			if ($dbexclufactu == '1')
			{
				$valortax = '0';
				$newimportetax = '0';
			}
			else
			{
				$valortax = $valorimpuesto[$i];
			}
			
			$ssql_instaxes = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_lineas_tax (".$campomasterid.", ".$campomasterid."linea, idtax, valor, importe) values ('".$idfv."','".$idlinea."','".$idimpuesto[$i]."','".$valortax."','".$newimportetax."' )");
			
			
		}
		
		
		
		
	}




$urlatras = 'index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv;
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
?>



