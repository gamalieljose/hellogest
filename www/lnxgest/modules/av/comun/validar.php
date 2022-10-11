<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#txtvencimiento").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#txtvencimiento_value").val(dateText);
		}
	});
	

});
  </script>

<?php
$idfv = $_GET["id"];

//Consultamos si esta habilitado el control de stock

if($lnxinvoice == "ac"){$campobuscar = "stkupd_ac";}
if($lnxinvoice == "fc"){$campobuscar = "stkupd_fc";}
if($lnxinvoice == "av"){$campobuscar = "stkupd_av";}
if($lnxinvoice == "fv"){$campobuscar = "stkupd_fv";}

//leeremos configuracion
$sqlarticulo = $mysqli->query("select * from ".$prefixsql."empresa where campo = '".$campobuscar."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbcontrolstock = $row["valor"]; //stock albaran de compra 


$sqltipobanco= $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$codigopedido = $row['codigo'];
	$dbfecha = $row["fecha"];
	$dbvencimiento = $row["vencimiento"];
	$dbcodigoint = $row["codigoint"];
	$dbeditfv = $row["editfv"];

	
if($dbcodigoint == '0' && $dbeditfv == '0')
{
	$datetime1 = new DateTime($dbfecha);
	$datetime2 = new DateTime($dbvencimiento);
	$interval = $datetime1->diff($datetime2);
	$diferenciadias = $interval->format('%a');
	
	
	//Es borrador y comprobamos la fecha de emisión
	$fechahoy = date("Y-m-d");
	if($fechahoy > $dbfecha)
	{
		$dbfecha = $fechahoy;
		$dbvencimiento = $fechahoy;
		
		$dias = $diferenciadias * 86400;
		
		
		$dbvencimiento = date('Y-m-d', strtotime($dbfecha) + $dias);
		
		$xfecha = explode("-", $dbvencimiento);
			$fano = $xfecha[0];
			$fmes = $xfecha[1];
			$fdia = $xfecha[2];
		
		$dbvencimiento = $fdia."/".$fmes."/".$fano;
		
		$xfecha = explode("-", $dbfecha);
			$fano = $xfecha[0];
			$fmes = $xfecha[1];
			$fdia = $xfecha[2];
		
		$dbfecha = $fdia."/".$fmes."/".$fano;
		
	}
	else
	{
		$xfecha = explode("-", $dbfecha);
			$fano = $xfecha[0];
			$fmes = $xfecha[1];
			$fdia = $xfecha[2];
		
		$dbfecha = $fdia."/".$fmes."/".$fano;
		
		$xfecha = explode("-", $dbvencimiento);
			$fano = $xfecha[0];
			$fmes = $xfecha[1];
			$fdia = $xfecha[2];
		
		$dbvencimiento = $fdia."/".$fmes."/".$fano;
		
	}
	
	
	
}





if($dbcontrolstock == "yes")
{
	
	include("modules/".$lnxinvoice."/cstock/inicio.php");
	
}
else	
{
	echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=validar&action=save" method="post">';

	echo '<input type="hidden" name="haccion" value="delete">';
	echo '<input type="hidden" name="hidfv" value="'.$idfv.'">';

	
	

	echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td>¿Desea VALIDAR este Pedido?</td></tr>
		<tr><td align="center"><b>'.$codigopedido.'</b></br></br></td></tr>
		<tr>
		<td align="center">Fecha: '.$dbfecha.' <input type="hidden" value="'.$dbfecha.'" name="txtfecha" /> </br>
		Vencimiento: <input type="text" value="'.$dbvencimiento.'" id="txtvencimiento" name="txtvencimiento" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy" />
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td align="center">
		<input class="btnsubmit" name="btneliminar" value="Aceptar" type="submit">
		<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'">Cancelar</a></td></tr>
		</table></div>';

		echo '</form>';
}
?>