<?php 
echo '<p>';
echo '<a class="btnedit" href="index.php?module=almacen&section=articulos&action=new">'.LABEL_BTN_NUEVOPRODUCTO.'</a> ';
echo '<a class="btnedit" href="index.php?module=almacen&section=articulos&action=stock">'.LABEL_BTN_MOSTRARSTOCKPRO.'</a> ';
echo '</p>';

?>
<p>&nbsp;</p>
<form name="fbuscar" method="POST" action="index.php?module=almacen&section=articulos">
<?php
$ftxtbuscar = $_POST["txtbuscar"];
$flstcampo = $_POST["lstcampo"];
$flstordenar = $_POST["lstordenar"];
$flstorden = $_POST["lstorden"];

if($flstcampo == ''){$flstcampo = 'concepto';}
if($flstordenar == ''){$flstordenar = 'concepto';}
if($flstorden == ''){$flstorden = 'asc';}

?>
<table width="100%" class="tblbuscar">
<tr><td align="center">
<?php echo LABEL_CAMPO; ?>
<select name="lstcampo">
<?php
if($flstcampo == "codventa"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="codventa" '.$seleccionado.'>'.LABEL_LST_CODIGO.'</option>';
if($flstcampo == "concepto"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="concepto" '.$seleccionado.'>'.LABEL_LST_CONCEPTO.'</option>';
?>
</select>
<?php 
echo '<input type="text" name="txtbuscar" value="'.$ftxtbuscar.'"/> ';

?>

<?php echo LABEL_ORDENARPOR; ?>
<select name="lstordenar">

<?php
if ($flstordenar == "codventa"){$defecto = 'selected=""';}else{$defecto = '';}
	echo '<option value="codventa" '.$defecto.'>'.LABEL_LST_CODVENTA.'</option>';
if ($flstordenar == "concepto" || $flstordenar == ""){$defecto = 'selected=""';}else{$defecto = '';}
	echo '<option value="concepto" '.$defecto.'>'.LABEL_LST_CONCEPTO.'</option>';
if ($flstordenar == "precio"){$defecto = 'selected=""';}else{$defecto = '';}
	echo '<option value="precio" '.$defecto.'>'.LABEL_LST_PRECIO.'</option>';

?>
</select>
<select name="lstorden">
<?php
if ($flstorden == "asc" || $flstordenar == ""){$defecto = 'selected=""';}else{$defecto = '';}
	echo '<option value="asc" '.$defecto.'>'.LABEL_ASC.'</option>';
if ($flstorden == "desc"){$defecto = 'selected=""';}else{$defecto = '';}
	echo '<option value="desc" '.$defecto.'>'.LABEL_DESC.'</option>';
?>
</select>
<?php echo '<input type="submit" class="btnsubmit" value="'.LABEL_BTN_BUSCAR.'"/>'; ?>

</td></tr>
</table>



<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td><?php echo LABEL_LST_CODVENTA; ?></td>
	<td><?php echo LABEL_LST_CONCEPTO; ?></td>
	<td><?php echo LABEL_FABRICANTE; ?></td>
	<td><?php echo LABEL_TIPOARTICULO; ?></td>
	<td><?php echo LABEL_LST_PRECIO; ?></td>
	<td>Gestion Stock</td>
        <td width="16"></td>
</tr>


<?php
if ($fchkstock == "1")
{
	if($flststock == "igual"){$optstock = "=";}
	if($flststock == "mayor"){$optstock = ">=";}
	if($flststock == "menor"){$optstock = "<=";}
	$sqlstock ="and stock_actual ".$optstock." '".$ftxtstock."' ";
}
else
{
	$sqlstock = "";
}



$ssql = "SELECT * from ".$prefixsql."productos where ".$flstcampo." like '".$ftxtbuscar."%' ".$sqlstock." order by ".$flstordenar." ".$flstorden;
$ConsultaMySql= $mysqli->query($ssql);
$totalregistros = $ConsultaMySql->num_rows;

$limite_reg = 25;

if ($totalregistros > $limite_reg)
{
	$paginar = "si";
	$pagina = $_POST["hpag"];
	if ($pagina == '' || $pagina == '0' || $pagina == '1')
	{
		$pagrs = "0";
		$pagina = "1";
	}
	
	if($_POST["btnpag"] == "siguiente")
	{
		$pagina = $pagina +1;
		
	}
	if($_POST["btnpag"] == "anterior")
	{
		$pagina = $pagina -1;
		
	}
	
	$pagrs = ($pagina -1)* $limite_reg;
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."productos where ".$flstcampo." like '".$ftxtbuscar."%' ".$sqlstock." order by ".$flstordenar." ".$flstorden." limit ".$pagrs.", ".$limite_reg);
	$totalregactual = $ConsultaMySql->num_rows;
}

while($columna = mysqli_fetch_array($ConsultaMySql))
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
	echo '<td><a class="btnedit" href="index.php?module=almacen&section=articulos&action=edit&id='.$columna["id"].'">'.LABEL_BTN_EDIT.'</a></td>';
	echo '<td>'.$columna["codventa"].'</td>';
	echo '<td>'.$columna["concepto"].'</td>';
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."fabricantes where id = '".$columna["id_fabricante"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbfabricante = $rowaux["fabricante"];
	$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_tipo where id = '".$columna["id_tipoarticulo"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbtipo = $rowaux["tipo"];
	
	echo '<td>'.$dbfabricante.'</td>';
	echo '<td>'.$dbtipo.'</td>';
	
	echo '<td>'.$columna["precio"].'</td>';
	
	if($columna["stock_ctrl"] == "1"){$img_vinculastock = '<img src="img/yes.png"/>';}
	if($columna["stock_ctrl"] == "0"){$img_vinculastock = '<img src="img/no.png"/>';}
	
	echo '<td>'.$img_vinculastock.'</td>';
        
        if($columna["barcode"] <> '')
        {
            $imgbarcode = '<img src="img/barcode.png" width="16" height="16" alt="Codigo de barras: '.$columna["barcode"].'" title="Codigo de barras: '.$columna["barcode"].'"/>';
        }
        else
        {
            $imgbarcode = '';
        }
        
        echo '<td width="16">'.$imgbarcode.'</td>';
	echo '</tr>'; 
}
?>

</table>

<?php
echo '<input type="hidden" value="'.$pagina.'" name="hpag" />';

//$pag_siguiente = $pagina +1;
//$pag_anterior = $pagina -1;

echo '<div align="center">';
if ($pagina > '1')
{
//echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&pag='.$pag_anterior.'">Anterior</a> - ';
echo '<input class="btnsubmit" type="submit" value="anterior" name="btnpag" /> ';
}
if ($totalregistros > $limite_reg && $totalregistros > $pagina * $limite_reg)
{
//echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&pag='.$pag_siguiente.'">Siguiente</a>';

echo ' <input class="btnsubmit" type="submit" value="siguiente" name="btnpag" />';
}
if ($pagina == ''){$pagina = '1';}
echo '<p>Pagina '.$pagina.'</p>';
echo '<p>Registros encontrados '.$totalregistros.'</p>';
echo '</div>';
?>

</form>