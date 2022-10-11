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
		echo '<input type="text" maxlength="50" value="Correción de stock '.$xfecha.'" name="txtconcepto" class="campoencoger"/>';
	?>
  </div>
</div>

<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
	<td>Almacen</td>
	<td>Stock actual</td>
	<td>Nuevo stock</td>
</tr>
<?php
	$ssql = "SELECT * from ".$prefixsql."almacenes order by almacen";
	$ConsultaMySql= $mysqli->query($ssql);

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
		echo '<td><input type="hidden" name="hidwh['.$columna["id"].']" value="'.$columna["id"].'" />'.$columna["almacen"].'</td>';
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_wh where idproducto = '".$idproducto."' and idwh = '".$columna["id"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbstock = $rowaux["stock"];
		if($dbstock == ''){$dbstock = "0";}
		
		echo '<td>'.$dbstock.'</td>';
		echo '<td><input type="number" name="txtstock['.$columna["id"].']" value="'.$dbstock.'" /></td></tr>';
		
	}
?>
</table>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=almacen&section=stock&id='.$_GET["id"].'">Cancelar</a>'; ?>

</div>


</form>
