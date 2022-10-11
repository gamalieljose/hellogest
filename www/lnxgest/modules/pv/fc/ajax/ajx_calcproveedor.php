<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../../core/cfpc.php");
$fjs_idtercero = $_POST["idtercero"];
$fjs_fechafactura = $_POST["fechafactura"];

$xtemp = explode("/", $fjs_fechafactura);

$fecha_ymd = $xtemp[2]."-".$xtemp[1]."-".$xtemp[0];

$cnstercero = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$fjs_idtercero."' ");
$rowtercero = mysqli_fetch_assoc($cnstercero);
$dbpro_dp = $rowtercero["prodp"];  
$dbpro_fp = $rowtercero["profp"];  

$cnsbcp = $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago where id = '".$dbpro_fp."' ");
$rowbcp = mysqli_fetch_assoc($cnsbcp);
$pc_cp_dias = $rowbcp["dias"];
$pc_cp_dia = $rowbcp["diapago"];

$fechahoy = $fecha_ymd;
	//Caso 0 - pago dia actual
	//Caso 1 - pago a x dias (sin especificar el dia)
	//Caso 2 - Pago el dia X de cada mes
	//Caso 3 - Pago a X dias el dia Y de cada mes

	//Caso 0
	if($pc_cp_dias == 0 && $pc_cp_dia == 0)
	{
		$fvencimiento = $fechahoy;
	}
	//Caso 1
	if($pc_cp_dias > 0 && $pc_cp_dia == 0)
	{
		$fecha_actual = date("d-m-Y");
		$xtemp = "";
		$xtemp = date("d-m-Y",strtotime($fecha_actual."+ ".$pc_cp_dias." days")); 

		$xtemp2 = explode("-", $xtemp);
		$fvencimiento = $xtemp2[2]."-".$xtemp2[1]."-".$xtemp2[0];
	}

	//Caso 2
	if($pc_cp_dias == 0 && $pc_cp_dia > 0)
	{
		$pc_cp_dia = substr(str_repeat(0, 2).$pc_cp_dia, - 2);


		$fechahoy = date("d-m-Y");
		$xtemp = explode("-", $fechahoy);
		$fecha_actual = $xtemp[2].$xtemp[1].$xtemp[0];

		$fpago = $xtemp[2].$xtemp[1].$pc_cp_dia;
		$fpago_db = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;

		
		if($fpago < $fecha_actual)
		{
			//Sumamos un mes
			$fvencimiento = date("d-m-Y",strtotime($fechahoy."+ 1 months")); 
			$xtemp = explode("-", $fvencimiento );
			$fvencimiento = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimiento = $fpago_db;
		}

		
	}

	//Caso 3
	if($pc_cp_dias > 0 && $pc_cp_dia > 0)
	{
		$pc_cp_dia = substr(str_repeat(0, 2).$pc_cp_dia, - 2);


		$fechahoy = date("d-m-Y");
		$xtemp = explode("-", $fechahoy);
		$fecha_actual = $xtemp[2].$xtemp[1].$xtemp[0];

		$fpago = $xtemp[2].$xtemp[1].$pc_cp_dia;
		$fpago_db = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;

		
		if($fpago < $fecha_actual)
		{
			//Sumamos un mes
			$fvencimiento = date("d-m-Y",strtotime($fechahoy."+ 1 months")); 
			$xtemp = explode("-", $fvencimiento );
			$fvencimiento = $xtemp[2]."-".$xtemp[1]."-".$pc_cp_dia;
		}
		else
		{
			$fvencimiento = $fpago_db;
		}
	}
	//Fin calculo vencimiento


$xtemp = explode("-", $fvencimiento);
$fvencimiento = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];


$arr_datostercero = array("prodp" => $dbpro_dp, "profp" => $dbpro_fp, "fvencimiento" => $fvencimiento);


echo json_encode($arr_datostercero);

}
?>