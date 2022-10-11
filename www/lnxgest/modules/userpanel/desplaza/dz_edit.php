<link rel="stylesheet" href="scripts/jquery/jquery-ui.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script src="core/com/js_terceros_all.js"></script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃ³ximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃ±o',
  dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','SÃ¡bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfecha_value").val(dateText);
		}
	});


});
  </script>
<?php
$idviaje = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."viajes where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidflota = $row["idflota"];
$dbfecha = $row["fecha"];
$dbidtercero = $row["idtercero"];
$dbiduser = $row["iduser"];
$dbkms = $row["kms"];
$dbdesplazamiento = $row["desplazamiento"];

$fano = substr($dbfecha, 0, 4);
$fmes = substr($dbfecha, 5, 2);
$fdia = substr($dbfecha, 8, 2);

$dbfecha = $fdia."/".$fmes."/".$fano;
?>

<p>
<a href="index.php?module=userpanel&section=dz&action=del&id=<?php echo $idviaje; ?>" class="btnenlacecancel" >Eliminar</a>
</p>
<form name="form1" action="index.php?module=userpanel&section=dz&action=save" method="post">

<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidviaje" value="<?php echo $idviaje; ?>" />

<div class="row">
   <div class="col-sm-2">
        Fecha
   </div>
   <div class="col">
<?php
echo '<input type="text" name="dpkfecha" id="dpkfecha" required="" value="'.$dbfecha.'">';
?>


   </div>
</div>



<div class="row">
   <div class="col-sm-2">
        Usuario
   </div>
   <div class="col">
<select name="lstuser" class="campoencoger">
<?php
$cnsaux= $mysqli->query("SELECT id, display FROM ".$prefixsql."users order by display");

while($row = mysqli_fetch_array($cnsaux))
{
        if($_COOKIE["lnxuserid"] == $row["id"] ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$row["id"].'" '.$seleccionado.'>'.$row["display"].'</option>';
}
?>
</select>


   </div>
</div>



<div class="row">
   <div class="col-sm-2">
        Desplazamiento
   </div>
   <div class="col">
<?php
echo '<input type="text" name="txtdesplazamiento"  required="" value="'.$dbdesplazamiento.'" style="width: 100%;">';
?>

   </div>
</div>


<div class="row">
   <div class="col-sm-2">
<?php
if($dbidtercero > '0')
{
	$seleccionado = ' checked=""';
}
else
{
 	$seleccionado = '';
}


        echo '<label><input type="checkbox" value="1" name="chktercero" '.$seleccionado.'/> Tercero asociado</label>';

?>
   </div>
   <div class="col">
	<div id="div_buscatercero" style="display:none;">
	<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/> 
	</div>

	<div>
	<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>

		<?php
		echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 33px);">';

		$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");

				while($colter = mysqli_fetch_array($cnsterceros))
				{
						echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>';
				}
				echo '</select>';
		?>



	</div>
   </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Vehiculo
    </div>
    <div class="col" align="left">
<select name="lstflota" style="width: 100%;">
<?php
$cnsaux= $mysqli->query("SELECT * FROM ".$prefixsql."flota order by vehiculo");

while($row = mysqli_fetch_array($cnsaux))
{
	if($row["id"] == $dbidflota){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$row["id"].'" '.$seleccionado.' >'.$row["vehiculo"].'</option>';
}
?>
</select>

    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        KMS
    </div>
    <div class="col" align="left">
	<input type="number" value="<?php echo $dbkms; ?>" name="txtkms" />
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit">

<a class="btncancel" href="index.php?module=userpanel&section=dz">Cancelar</a>

</div>


</form>
