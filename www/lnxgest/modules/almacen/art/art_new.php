<script type="text/javascript">
function calculartotal() {

  var elementos = document.getElementsByName("txttax[]");
  var valorbase = document.getElementById("txtprecio").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txttax[]")
	{
		valorimpuesto = (elementos[i].value / 100) * valorbase;
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  resultado = parseFloat(valorbase) + parseFloat(total);
  resultado = parseFloat(resultado).toFixed(2);

	document.getElementById("txtpreciototal").value = resultado;
 
}


function calcularbi() {
	
var elementos = document.getElementsByName("txttax[]");
var valortotal = document.getElementById("txtpreciototal").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txttax[]")
	{
		valorimpuesto = (elementos[i].value / 100);
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  
  resultado = parseFloat(valortotal) / ( 1 + parseFloat(total) ) ;
  resultado = parseFloat(resultado).toFixed(2);
	document.getElementById("txtprecio").value = resultado;
 
}
</script>
<script type="text/javascript">


function muestrainfo(idayuda)
{

	var xidtooltip = "idayuda" + idayuda;

	document.getElementById(xidtooltip).style.display = 'inline';

}

function ocultainfo(idayuda)
{
	var xidtooltip = "idayuda" + idayuda;
	
	
	document.getElementById(xidtooltip).style.display='none';

}

</script>

<form name="form1" method="POST" action="index.php?module=almacen&section=articulos&action=save" >
<input type="hidden" name="haccion" value="new"/>

<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" name="chkactivo" value="1" checked=""/> Activo 
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Codigo
  </div>
  <div class="col" align="left">
	<?php
	//Por defecto par no dejar el campo codventa vacio, lo que haremos será buscar el ultimo ID y le sumamos uno para que nos de un codigo que no este repetido
	
	$sqlarticulo = $mysqli->query("select max(id) as contador from ".$prefixsql."productos ");
	$row = mysqli_fetch_assoc($sqlarticulo);
	$dbmaxid = $row["contador"];
	$dbmaxid = $dbmaxid +1;
  
    echo '<input type="text" maxlength="10" value="'.$dbmaxid.'" name="txtcod" required="" class="campoencoger">';
	?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Codigo barras
  </div>
  <div class="col" align="left">

<?php
echo '<input type="text" maxlength="50" value="" name="txtbarcode" class="campoencoger" >';
	?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Concepto
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="" name="txtconcepto" required="" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Precio Venta
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="0" name="txtprecio" id="txtprecio" required="" onblur="javascript:calculartotal()" style="width: 100%; max-width: 200px; text-align: right;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Impuestos <img src="img/info.gif" onmouseover="muestrainfo(25);" onmousemove="muestrainfo(25);" onmouseout="ocultainfo(25);"/>
  </div>
  <div class="col" align="left">
  <div id="idayuda25" style="display: none; background-color: #F7FE2E;">

	Si el impuesto es 0, cuando se añada se pondrá como valor 0 en el impuesto, pero si el campo es nulo, no se tendrá en cuenta el impuesto

</div>
  <table>
<?php
		$ssql = "SELECT * from ".$prefixsql."impuestos";
		$ConsultaMySql= $mysqli->query($ssql);

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<tr><td>';
			echo $columna["impuesto"];
			echo '</td><td><input type="number" name="txttax[]" id="txttax[]" value="'.$columna["valor"].'" onblur="javascript:calculartotal()" style="width: 80px;" />
			<input type="hidden" value="'.$columna["id"].'" name="hidimpuesto[]"/>
			</td></tr>';
		}
?>
</table>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Precio Total
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="10" value="0" name="txtpreciototal" id="txtpreciototal" onblur="javascript:calcularbi()" required="" style="width: 100%; max-width: 200px; text-align: right;">
  </div>
</div>



<div class="row">
  <div class="col maintitle" align="left">
    Caracteristicas del producto
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Fabricante
  </div>
  <div class="col" align="left">
    <select name="lstfabricante" style="width: 100%;">
		<option value="0" selected="">- Sin especificar -</option>
		<?php
		$ssql = "SELECT * from ".$prefixsql."fabricantes order by fabricante";
		$ConsultaMySql= $mysqli->query($ssql);

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<option value="'.$columna["id"].'" >'.$columna["fabricante"].'</option>';
		}
		?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Tipo de producto
  </div>
  <div class="col" align="left">
    <select name="lsttipoarticulo" style="width: 100%;">
		<option value="0" selected="">- Sin especificar -</option>
		<?php
		$ssql = "SELECT * from ".$prefixsql."productos_tipo order by tipo asc";
		$ConsultaMySql= $mysqli->query($ssql);

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<option value="'.$columna["id"].'" >'.$columna["tipo"].'</option>';
		}
		?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <input type="text" maxlength="50" value="" name="txtnotas" style="width: 100%;">
  </div>
</div>



<div class="row">
  <div class="col maintitle" align="left">
    Transporte
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Dimensiones y peso
  </div>
  <div class="col-sm-2" align="left">
	Peso (kg) </br>
    <input type="text" value="0" name="txtpeso" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Profundidad (cm)</br>
    <input type="text" value="0" name="txtprofundidad" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Ancho (cm) </br>
    <input type="text" value="0" name="txtancho" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Alto (cm) </br>
    <input type="text" value="0" name="txtalto" style="width: 100%"/>
  </div>
  
</div>



<div class="row">
  <div class="col maintitle" align="left">
    Gestión de stock
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" name="chkstock" value="1" /> Habilitar stock para este articulo
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Stock actual
  </div>
  <div class="col" align="left">
    <input type="number" value="0" name="txtstock" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Almacen
  </div>
  <div class="col" align="left">
    <select name="lstalmacen" style="width: 100%;">
	<?php
	$ssql = "SELECT * from ".$prefixsql."almacenes order by almacen";
	$ConsultaMySql= $mysqli->query($ssql);

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["dft"] == '1'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["almacen"].'</option>';
	}
	?>
	</select>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=almacen&section=articulos">Cancelar</a>

</div>


</form>

<p>&nbsp;</p>
<p>&nbsp;</p>
