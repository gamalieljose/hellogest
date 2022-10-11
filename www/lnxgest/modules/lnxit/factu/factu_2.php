<?php
$flstseries = $_POST["lstfv"];
$fhoptprocesofacturar = $_POST["hoptprocesofacturar"];

$tfacturar = $_POST['hticket'];
$accionticket = $_POST["hactionticket"];

$flstfv = $_POST["lstfv"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstfv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_serie = $rowaux["serie"];
$idempresa = $rowaux["idempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"];


?>
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

		if ($fhoptprocesofacturar == "1"){ echo 'Facturar por Cliente';}
		if ($fhoptprocesofacturar == "2"){ echo 'Facturar por Ticket';}

		?>
    </div>
</div>

<p>&nbsp;</p>

<div align="center" class="rectangulobtnsguardar">

<a class="btnsubmit" href="index.php?module=lnxit&section=tickets&subsection=list">Aceptar</a>

</div>


<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
	<td colspan="2">Cambiados a NO Facturables</td>
</tr>
<tr class="maintitle">
	<td width="100">Ticket</td>
	<td>Resumen</td>
</tr>



<?php


$idfinales = array();

foreach($tfacturar as $ticket)
{

	//echo '<p>'.$accionticket[$ticket].'</p>';
	if($accionticket[$ticket] == "-1")
	{
		//No se factura
		//echo '<p>Se edita para no facturar Ticket '.$ticket.' Accion: '.$accionticket[$ticket].'</p>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."it_tickets where id = '".$ticket."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_resumen = $rowaux['resumen'];
		
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
		echo '<td>'.$ticket.'</td>';
		echo '<td>'.$lbl_resumen.'</td>';
		echo '</tr>';
		
		$sqlfactutickets = $mysqli->query("update ".$prefixsql."it_tickets set idfv = '-1' where id = '".$ticket."'");
		
		
	}
	if($accionticket[$ticket] == "1")
	{
		//Se procede a facturar
		$valor = $ticket;
		$tickets_aux[] =" id = '".$valor. "' or ";
		//echo '<p>Ticket '.$ticket.' Accion: '.$accionticket[$ticket].'</p>';
		
		
		
	}
    
}

?>

</table>
</div>

<p>&nbsp;</p>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
	<td colspan="3">Borradores de factura creados</td>
</tr>

<?php

$valores = implode(' ', $tickets_aux);
$sql_idsvalores = $valores."id = '0'";

// echo '<p>SQL: '.$sql_idsvalores.'</p>';


//Una factura por cliente
if($fhoptprocesofacturar == "1")
{

	$cnssql= $mysqli->query("select distinct (idtercero) from ".$prefixsql."it_tickets where ".$sql_idsvalores);	
	while($col = mysqli_fetch_array($cnssql))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_razonsocial = $rowaux["razonsocial"];
		
		
				
		echo '<tr class="maintitle">';
		echo '<td colspan="3">'.$lbl_razonsocial.'</td>';
		echo '</tr>';
		
		
		$cnssql_tickets= $mysqli->query("select * from ".$prefixsql."it_tickets where idtercero = '".$col["idtercero"]."' and (".$sql_idsvalores.") ");	
		$cuentatickets = $cnssql_tickets->num_rows;
		
		
		if($cuentatickets > 0)
		{
			//Si existe, creamos el borrador de factura
			$fechahoy = date("Y-m-d");
			$sqlfv = $mysqli->query("insert into ".$prefixsql."fv (idserie, codigoint, codigo, idcliente, estado, fecha, vencimiento, pagado, editfv, pc_cp, pc_dp, pc_c, pc_idc) VALUES ('".$flstseries."', '0', 'xxx', '".$col["idtercero"]."', '0', '".$fechahoy."', '".$fechahoy."', '0', '0', '0', '0', '0', '0')");
			
			$sqlfv = $mysqli->query("select max(id) as contador from ".$prefixsql."fv ");
			$rowfv = mysqli_fetch_assoc($sqlfv);
			$ultimoidfv = $rowfv["contador"];
			
			$sqlfv = $mysqli->query("update ".$prefixsql."fv set codigo = '(PROV ".$ultimoidfv.")' where id = '".$ultimoidfv."'");
			
			//Ahora tenemos que establecer los impuestos al borraqdor de factura creados
			$cnssqltax = $mysqli->query("select * from ".$prefixsql."impuestosrules where idserie = '".$flstseries."' order by orden");	
			while($coltax = mysqli_fetch_array($cnssqltax))
			{
				$sqlfv = $mysqli->query("insert into ".$prefixsql."fv_tax (idfv, idimpuesto, valor) values ('".$ultimoidfv."', '".$coltax["idimpuesto"]."', '".$coltax["valor"]."'");
			}
			
			$ordenlinea = 0;
			
		}
		
		
		
		while($coltickets = mysqli_fetch_array($cnssql_tickets))
		{
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
			echo '<td width="30"><a href="index.php?module=fv&section=main&action=view&id='.$ultimoidfv.'" class="btnedit" >Factura</a></td>';
			echo '<td width="150">Ticket: '.$coltickets["id"].'</td>';
			echo '<td>'.$coltickets["resumen"].'</td>';
			echo '</tr>';
			
			//Añadimos la primera linea en el borrador de factura
			$ordenlinea = $ordenlinea +1;
			$xfv_cod = "Ticket ".$coltickets["id"];
			$xfv_concepto = $coltickets["resumen"];
			$sqlfv = $mysqli->query("insert into ".$prefixsql."fv_lineas (idfv, cod, concepto, unid, precio, dto, importe, orden) values ('".$ultimoidfv."', '".$xfv_cod."', '".$xfv_concepto."', '0', '0', '0', '0', '".$ordenlinea."')");
			
			$sqlfvticket = $mysqli->query("update ".$prefixsql."it_tickets set idfv = '".$ultimoidfv."' where id = '".$coltickets["id"]."' ");			
			
			$cnssql_partes = $mysqli->query("select * from ".$prefixsql."partes where idticket = '".$coltickets["id"]."' ");	
			while($colpartes = mysqli_fetch_array($cnssql_partes))
			{
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
				echo '<td width="30">&nbsp;</td>';
				echo '<td width="150">&nbsp;</td>';
				echo '<td>'.$colpartes["codigo"].'</td>';
				echo '</tr>';
				
				$ordenlinea = $ordenlinea +1;
				$xfv_cod = "";
				$xfv_concepto = $colpartes["codigo"];
				$sqlfv = $mysqli->query("insert into ".$prefixsql."fv_lineas (idfv, cod, concepto, unid, precio, dto, importe, orden) values ('".$ultimoidfv."', '".$xfv_cod."', '".$xfv_concepto."', '0', '0', '0', '0', '".$ordenlinea."')");
				
			}
			
			
		}
		
		
		
	}

	
}


//Una factura por cada ticket
if($fhoptprocesofacturar == "2")
{
	$cnssql_tickets= $mysqli->query("select * from ".$prefixsql."it_tickets where ".$sql_idsvalores." ");	
	while($coltickets = mysqli_fetch_array($cnssql_tickets))
	{
		echo '<p>Ticket '.$coltickets["id"].' - Tercero'.$coltickets["id"].'</p>';
	}
}


?>
</table>
</div>