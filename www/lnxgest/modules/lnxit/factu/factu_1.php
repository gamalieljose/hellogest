<?php
$flstfv = $_POST["lstfv"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstfv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_serie = $rowaux["serie"];
$idempresa = $rowaux["idempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"];

?>
<form name="frmfactura" method="POST" action="index.php?module=lnxit&section=factu&paso=2" >

<input type="hidden" value="<?php echo $flstfv; ?>" name="lstfv" />
<input type="hidden" value="<?php echo $_POST["optprocesofacturar"]; ?>" name="hoptprocesofacturar" />

<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
		<?php echo $lbl_empresa; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Serie
    </div>
    <div class="col" align="left">
		<?php echo $lbl_serie; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Método
    </div>
    <div class="col" align="left">
		<?php 

		if ($_POST["optprocesofacturar"] == "1"){ echo 'Facturar por Cliente';}
		if ($_POST["optprocesofacturar"] == "2"){ echo 'Facturar por Ticket';}

		?>
    </div>
</div>


<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
        <tr><td class="maintitle">mensaje:</td></tr>
        <tr><td><p align="center">¿Este prcoeso generará BORRADORES de facturas, usted las tendrá que revisar antes de emitirlas. Este proceso NO es reversible</b></p>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td align="center">
        <input class="btnsubmit" name="btneliminar" value="Procesar" type="submit">
        <a class="btncancel" href="index.php?module=lnxit&section=factu">Cancelar</a></td></tr>
	</table>
</div>


<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
	<td width="40" > </td>
	<td>Facturar</td>
	<td>Cierre</td>
	<td width="75">Tipo</td>
	<td>Resumen</td>
	<td>Asignado</td>
	<td>Tercero</td>
	<td>Partes de trabajo</td>
</tr>
<?php


$tfacturar = $_POST['chkfacturar'];
$accionticket = $_POST["optfacturar"];

foreach($tfacturar as $ticket){
    $valor = $ticket;

	if($accionticket[$ticket] <> "0")
	{
		$sqlticket = $mysqli->query("select * from ".$prefixsql."it_tickets where id = '".$ticket."' "); 
		$rowticket = mysqli_fetch_assoc($sqlticket);
		$dbidtercero = $rowticket["idtercero"];
		$dbresumen = $rowticket["resumen"];
		$lbl_fcierre = substr($rowticket["fcierre"], 0, 10);
			$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$lbl_razonsocial = $rowaux["razonsocial"];
			
			$sqlaux= $mysqli->query("select * from ".$prefixsql."it_tipos where id = '".$rowticket["idtipo"]."'");
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$lbl_tipoticket = $rowaux['tipo'];
			
			
			if ($rowticket["idasignado"] == '0')
			{
				$lbl_tecnico = "-sin asignar-";
			}
			else
			{
				$sqlaux = $mysqli->query("select id, display from ".$prefixsql."users where id = '".$rowticket["idasignado"]."'");
				$rowaux = mysqli_fetch_assoc($sqlaux);
				$lbl_tecnico = $rowaux['display'];
			}
			
		$partes = "";
		$sqlaux = "SELECT * FROM ".$prefixsql."partes where idticket = '".$rowticket["id"]."' ";
		$cnsaux= $mysqli->query($sqlaux);
		while($colaux = mysqli_fetch_array($cnsaux))
		{
			$partes = $partes." ".$colaux["codigo"];
		}
		
		
		
		if ($color == '1')
		{
			$color = '2';
			$pintacolor = "listacolor2";
		}
		else
		{
			$color = '1';
			$pintacolor = "listacolor1";
		}
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td width="40" ><a href="index.php?module=lnxit&section=tickets&action=edit&id='.$ticket.'" class="btnedit" >'.$ticket.'</a></td>';
		
		if($accionticket[$ticket] == "-1"){$lbl_accion = "NO Facturar";}
		if($accionticket[$ticket] == "1"){$lbl_accion = "Facturar";}
		
		echo '<td>'.$lbl_accion.'</td>
		<td>'.$lbl_fcierre.'</td>
		<td width="75">'.$lbl_tipoticket.'</td>
		<td>'.$dbresumen.'</td>
		<td>'.$lbl_tecnico.'</td>
		<td>'.$lbl_razonsocial.'</td>
		<td>'.$partes.'</td>
	</tr>';
	}


echo '<input type="hidden" value="'.$ticket.'" name="hticket[]" />';
echo '<input type="hidden" value="'.$accionticket[$ticket].'" name="hactionticket['.$ticket.']" />';


    $tickets_aux[] =" id = '".$valor. "' or ";
}
$valores = implode(' ', $tickets_aux);
$sql_valores = $valores;

?>
</table>
</div>



