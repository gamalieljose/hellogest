<?php

$idfv = $_GET["id"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$codigopedido = $row['codigo'];
	
echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=validarf&action=save" method="post">';

echo '<input type="hidden" name="hidfv" value="'.$idfv.'">';

echo '<div align="center">
	<table width="400" class="msgaviso">
	<tr><td colspan="2" class="maintitle">Elija donde copiar este documento</td></tr>
	
	<tr><td colspan="2" align="center"><b>'.$codigopedido.'</b></td></tr>';
	
	
	if($lnxinvoice == "ov" || $lnxinvoice == "pv" || $lnxinvoice == "av" || $lnxinvoice == "fv" || $lnxinvoice == "fvr"){$cv = "v";}
	if($lnxinvoice == "oc" || $lnxinvoice == "pc" || $lnxinvoice == "ac" || $lnxinvoice == "fc" || $lnxinvoice == "fcr"){$cv = "c";}
	
	echo '<tr class="listacolor2"><td><input type="radio" value="o'.$cv.'" name="optconvert" checked=""/> Copiar a presupuesto </td>';
	echo '<td>';
	echo '<select name="lsto">';
	
	$tiposerie = "O";
	
	echo '<optgroup label="Venta">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '2' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "v"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}
		echo '<optgroup label="Compra">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '1' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "c"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}

	
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	
	echo '<tr class="listacolor1"><td><input type="radio" value="p'.$cv.'" name="optconvert" /> Copiar a pedido </td>';
	echo '<td>';
	echo '<select name="lstp">';
	$tiposerie = "P";
	
	echo '<optgroup label="Venta">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '2' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "v"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}
		echo '<optgroup label="Compra">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '1' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "c"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}

	
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	
	echo '<tr class="listacolor2"><td><input type="radio" value="a'.$cv.'" name="optconvert" /> Copiar a albaran </td>';
	echo '<td>';
	echo '<select name="lsta">';
	
	$tiposerie = "A";
	
	echo '<optgroup label="Venta">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '2' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "v"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}
		echo '<optgroup label="Compra">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '1' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "c"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}

	
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	
	echo '<tr class="listacolor1"><td><input type="radio" value="f'.$cv.'" name="optconvert" /> Copiar a Factura </td>';
	echo '<td>';
	echo '<select name="lstf">';
	
	$tiposerie = "F";
	
	echo '<optgroup label="Venta">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '2' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "v"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}
		echo '<optgroup label="Compra">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '1' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "c"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}

	
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	
	echo '<tr class="listacolor2"><td><input type="radio" value="r'.$cv.'" name="optconvert" /> Copiar a Factura rectificativa </td>';
	echo '<td>';
	echo '<select name="lstfr">';
	
	$tiposerie = "FR";
	
	echo '<optgroup label="Venta">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '2' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "v"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}
		echo '<optgroup label="Compra">';
		$Cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = '".$tiposerie."' and cv = '1' and activo = '1' order by serie" );
		while($colaux = mysqli_fetch_array($Cnsaux))
		{
			if ($colaux["dft"] == "1")
			{
				if ($cv == "c"){$defecto = ' selected=""';}else{$defecto = '';}
				$colorfondo = ' class="listacolor2"';
			}
			else
			{
				$defecto = '';
				$colorfondo = '';
			}
			if ($colaux["activo"] == "1") {$serieactiva = '';}else{$serieactiva = ' disabled=""';}
			
			echo '<option value="'.$colaux["id"].'" '.$defecto.' '.$serieactiva.''.$colorfondo.'>'.$colaux["serie"].'</option>';
		}

	
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	echo '<tr><td colspan="2">el documento se copiará a la serie indicada</td></tr>';
	
	echo '<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center">
	<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-copy fa-lg"></i> Copiar</button> 
	<a href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$idfv.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
	</td></tr>
	</table></div>';

	echo '</form>';
?>