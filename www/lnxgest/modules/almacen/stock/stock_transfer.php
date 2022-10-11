<?php
include("modules/almacen/art/botonera.php");
$idproducto = $_GET["id"];
?>

<form name="form1" method="POST" action="index.php?module=almacen&section=stockfix&action=save" >
<?php echo '<input type="hidden" name="hidproducto" value="'.$idproducto.'"/>'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    Concepto
  </div>
  <div class="col" align="left">
    <?php
		$xfecha = date("d-m-Y");
		echo '<input type="text" required="" value="Transferencia de stock '.$xfecha.'" name="txtconcepto" class="campoencoger"/>';
	?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Almacen de origen
  </div>
  <div class="col" align="left">
	<select name="lstdestino" class="campoencoger">
	<?php	
		$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."almacenes order by almacen");

		while($colaux = mysqli_fetch_array($cnsaux))
		{
			if($columna["dft"] == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["almacen"].'</option>';
		}
	?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Cantidad a transferir
  </div>
  <div class="col" align="left">
	<input type="number" value="0" name="txtstock" required="" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Almacen de destino
  </div>
  <div class="col" align="left">
	<select name="lstdestino" style="width: 100%;">
	<?php	
		$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."almacenes order by almacen");
		while($colaux = mysqli_fetch_array($cnsaux))
		{
			if($columna["dft"] == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["almacen"].'</option>';
		}
	?>
	</select>
  </div>
</div>

<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td>Almacen</td>
	<td>Stock</td>
</tr>
<?php	
$cnswh = $mysqli->query("SELECT * from ".$prefixsql."almacenes order by almacen");
while($colwh = mysqli_fetch_array($cnswh))
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
	echo '<td>'.$colwh["almacen"].'</td>';
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$idproducto."' and idwh = '".$colwh["id"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbstock = $rowaux["stock"];
	if($dbstock == ''){$dbstock = "0";}
	echo '<td>'.$dbstock.'</td>';
	
	echo '</tr>';
		
}
?>
</table>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=almacen&section=stock&id='.$_GET["id"].'">Cancelar</a>'; ?>

</div>


</form>
