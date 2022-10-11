<script>
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

<?php
$idarticulo = $_GET["id"];

$tbl_bloquear = $prefixsql."productos";
if(lnx_check_bloqueo($tbl_bloquear, $idarticulo, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
  $LNXERP_bloqueado = "YES";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
  $LNXERP_bloqueado = "NO";
}
?>
<script type="text/javascript">
$(document).ready(function() {

    lnxbloquea(); //Ejecutamos script nada más abrir el registro

    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $idarticulo; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {         
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {         
          document.getElementById('boxbloqueo').style.display = "none"; 
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>


<?php
$sqlarticulo = $mysqli->query("select * from ".$prefixsql."productos where id = '".$idarticulo."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbactivo = $row["activo"];
$dbcodventa = $row["codventa"];
$dbconcepto = $row["concepto"];
$dbprecio = $row["precio"];
$dbpreciotax = $row["preciotax"];
$dbbarcode = $row["barcode"];
$dbnotas = $row["notas"];

$dbpeso = $row["peso"];
$dbprofundidad  = $row["profundidad"];
$dbancho = $row["ancho"];
$dbalto = $row["alto"];


$dbstock_ctrl = $row["stock_ctrl"];
$dbid_fabricante = $row["id_fabricante"];
$dbid_tipoarticulo = $row["id_tipoarticulo"];

$sqlarticulo = $mysqli->query("select sum(stock) as stockactual from ".$prefixsql."productos_wh where idproducto = '".$idarticulo."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbstockactual = $row["stockactual"];

include("modules/almacen/art/botonera.php");

if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%; ba">
Cambios aplicados con éxito
</div>';
}
?>
<p> </p>
<?php
if($LNXERP_bloqueado == "NO")
{
echo '<form name="form1" method="POST" action="index.php?module=almacen&section=articulos&action=save" >';
}
?>
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidarticulo" value="'.$idarticulo.'"/>'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <?php
	if($dbactivo == "1"){$checkactivo = 'checked=""';}else{$checkactivo = '';}
		echo '<input type="checkbox" value="1" name="chkactivo" '.$checkactivo.'/> Activo';
	?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Codigo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="10" value="'.$dbcodventa.'" name="txtcod" required="" class="campoencoger">'; ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Codigo barras
  </div>
  <div class="col" align="left">

<?php
echo '<input type="text" maxlength="50" value="'.$dbbarcode.'" name="txtbarcode" style="width: 100%;">';
	?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Concepto
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbconcepto.'" name="txtconcepto" required="" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Precio Venta
  </div>
  <div class="col" align="left">
  <input type="text" maxlength="50" value="<?php echo $dbprecio; ?>" name="txtprecio" id="txtprecio" required="" onblur="javascript:calculartotal()" style="width: 100%; max-width: 200px; text-align: right;">
    
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
			$sqlaux = $mysqli->query("select * from ".$prefixsql."productos_tax where idproducto = '".$idarticulo."' and idtax = '".$columna["id"]."'");
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbvalorimpuestoproduc = $rowaux["valor"];
			
			
			
			echo '<tr><td>'.$columna["impuesto"].'</td><td><input type="number" name="txttax[]" id="txttax[]" value="'.$dbvalorimpuestoproduc.'" onblur="javascript:calculartotal()" style="width: 80px;" />
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
    <input type="text" maxlength="10" value="<?php echo $dbpreciotax; ?>" name="txtpreciototal" id="txtpreciototal" onblur="javascript:calcularbi()" required="" style="width: 100%; max-width: 200px; text-align: right;">
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
		<?php
		if($dbid_fabricante == "0"){$defecto = 'selected=""';}else{$defecto = '';}
		echo '<option value="0" '.$defecto.'>- Sin especificar -</option>';
		
		$ssql = "SELECT * from ".$prefixsql."fabricantes order by fabricante";
		$ConsultaMySql= $mysqli->query($ssql);

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			if($dbid_fabricante == $columna["id"]){$defecto = 'selected=""';}else{$defecto = '';}
			echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["fabricante"].'</option>';
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
		<?php
		if($dbid_tipoarticulo == "0"){$defecto = 'selected=""';}else{$defecto = '';}
		echo '<option value="0" '.$defecto.'>- Sin especificar -</option>';
		
		$ssql = "SELECT * from ".$prefixsql."productos_tipo order by tipo asc";
		$ConsultaMySql= $mysqli->query($ssql);

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			if($dbid_tipoarticulo == $columna["id"]){$defecto = 'selected=""';}else{$defecto = '';}
			echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["tipo"].'</option>';
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
    <input type="text" maxlength="50" value="<?php echo $dbnotas; ?>" name="txtnotas" style="width: 100%;">
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
    <input type="text" value="<?php echo $dbpeso; ?>" name="txtpeso" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Profundidad (cm)</br>
    <input type="text" value="<?php echo $dbprofundidad; ?>" name="txtprofundidad" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Ancho (cm) </br>
    <input type="text" value="<?php echo $dbancho; ?>" name="txtancho" style="width: 100%"/>
  </div>
  <div class="col-sm-2" align="left">
	Alto (cm) </br>
    <input type="text" value="<?php echo $dbalto; ?>" name="txtalto" style="width: 100%"/>
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
	<?php
	if($dbstock_ctrl == "1"){$checkactivo = ' checked=""';}else{$checkactivo = '';}
		echo '<input type="checkbox" value="1" name="chkstock" '.$checkactivo.'/> ';
	?>
	Habilitar stock para este articulo
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Stock actual
  </div>
  <div class="col" align="left">
    <?php echo $dbstockactual; ?>
  </div>
</div>



<div align="center" class="rectangulobtnsguardar">
<?php
if($LNXERP_bloqueado == "NO")
{
echo '<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> ';
}
?>
<a class="btncancel" href="index.php?module=almacen&section=articulos">Cancelar</a>

</div>


</form>



<p>&nbsp;</p>
<p>&nbsp;</p>
