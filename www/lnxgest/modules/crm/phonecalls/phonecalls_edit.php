<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_phonecalls where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbfecha = $rowaux["fecha"];
$dbidcreado = $rowaux["idcreado"];
$dbidasignado = $rowaux["idasignado"];
$dbidtercero = $rowaux["idtercero"];
$dbidcontacto = $rowaux["idcontacto"];
$dbnota = $rowaux["nota"];
$dbtelefono = $rowaux["telefono"];
$dbtelefono2 = $rowaux["telefono2"];
$dbidestado = $rowaux["idestado"];
$dbidprioridad = $rowaux["idprioridad"];



?>

<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script language="javascript">
function obtener_tel_tercero() {

var widtercero = document.getElementById("lsttercero").value;

if (document.getElementById('txttel1').value == '')
{
		$.ajax({

		type   : 'POST',
		url     : "modules/terceros/ajax/ajx_datos_tercero.php",
		data    : {idtercero : widtercero},

		success : function (resultado) {

		// response = respuesta del servidor.
	   response = JSON.parse(resultado);

		
		document.getElementById('txttel1').value = response["telefono"];	
			   
		}

	});

		if (document.getElementById('txttel2').value == '')
		{
			obtener_tel_tercero_contacto();
		}
	}
}


function obtener_tel_tercero_contacto() {

var widcontacto = document.getElementById("lstcontacto").value;

if (document.getElementById('txttel2').value == '')
{

    $.ajax({

    type   : 'POST',
    url     : "modules/terceros/ajax/ajx_datos_tercero_contacto.php",
    data    : {idcontacto : widcontacto},

    success : function (resultado) {

    // response = respuesta del servidor.
   response = JSON.parse(resultado);

    
    document.getElementById('txttel2').value = response["telefono"];	
           
    }

	});

}

}

</script>
<script language="javascript">
$(document).ready(function(){
   $("#lstterceros").change(function () {
           $("#lstterceros option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/lnxit/tickets/ajx_contactos.php", { elegido: elegido }, function(data){
            $("#lstcontacto").html(data);
            });            
        });
   }) 
});
</script>

<script language="javascript">
function mostrar() {
	div = document.getElementById("div_buscatercero");
	div.style.display = "";
	document.getElementById("txttercero").focus();
}

function mostrarcontactos() {
	div = document.getElementById("div_buscacontacto");
	div.style.display = "";
	document.getElementById("txtcontacto").focus();
}

$(document).ready(function(){
   $("#txttercero").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txttercero").value;

	$.post("core/com/ajx_terceros_all.php", { elegido: elegido }, function(data){

	$("#lsttercero").html(data);

	 cargacontactos();
	
	});
		
});
   
  
$("#txtcontacto").keyup(function () {
           
	elegido=$(this).val();
	var nombrecontacto = document.getElementById("txtcontacto").value;
	var idtercero = document.getElementById("lsttercero").value;
	
	$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { nombrecontacto: nombrecontacto, idtercero: idtercero }, function(data){

	$("#lstcontacto").html(data);
	});            
      
   })
});

</script>
<script language="javascript">
$(document).ready(function(){
   $("#lsttercero").change(function () {
           $("#lsttercero option:selected").each(function () {
            idtercero=$(this).val();
            
            $.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
                       
        }); 
   })
});


function cargacontactos() {
	var idtercero = document.getElementById("lsttercero").value;
	
$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
	
}

</script>
<?php
echo '<p><a href="index.php?module=crm&section=phonecalls&action=del&id='.$idregistro.'" class="btnenlacecancel">Eliminar</a></p>';
?>
<form name="formulario1" id="formulario1" action="index.php?module=crm&section=phonecalls&action=save" method="POST">
<input type="hidden" name="haccion" value="update"/>
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
	
<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'" >'.$col["razonsocial"].'</option>';
    
}

?>
	
</select>

</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
		
<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">
	
<?php
if($dbidcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Selecciona tercero-</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$dbidtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
	if($dbidcontacto == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["nombre"].'</option>';
    
}

?>
</select>

</div>
    </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Asignado
  </div>
  <div class="col" align="left">
    <select name="lstasignado" class="campoencoger">
	<option value="0">-Sin asignar-</option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users where activo = '1' order by display");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["id"] == $dbidasignado){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		{echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["display"].'</option>';}
		
		
	}
	?>
	</select>
  </div>
</div>



<div class="row">
  <div class="col-sm-2" align="left">
    Telefonos
  </div>
  <div class="col-sm-2" align="left">
  <input type="text" name="txttel1" id="txttel1" value="<?php echo $dbtelefono; ?>" onfocus="obtener_tel_tercero()" style="width: 100%;"/>
  </div>
  <div class="col-sm-2" align="left">
  <input type="text" name="txttel2" id="txttel2" value="<?php echo $dbtelefono2; ?>" onfocus="obtener_tel_tercero_contacto()" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Estado
  </div>
  <div class="col" align="left">
    <select name="lstestado" style="width: 100%;">
<?php
if($dbidestado == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="1" '.$seleccionado.'>Abierto</option>';
if($dbidestado == '2'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="2" '.$seleccionado.'>En proceso</option>';
if($dbidestado == '3'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="3" '.$seleccionado.'>Pendiente de terceros</option>';
if($dbidestado == '4'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="4" '.$seleccionado.'>Solucionado</option>';
if($dbidestado == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>Cerrado</option>';
?>
	</select>
  </div>
  
  <div class="col-sm-2" align="left">
    Prioridad
  </div>
  <div class="col" align="left">
    <select name="lstprioridad" style="width: 100%;">
<?php
if($dbidprioridad == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="1" '.$seleccionado.'>Alta</option>';
if($dbidprioridad == '2'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="2" '.$seleccionado.'>Normal</option>';
if($dbidprioridad == '3'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="3" '.$seleccionado.'>Baja</option>';
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nota
  </div>
  <div class="col" align="left">
  <textarea name="txtnota" style="width: 100%;"><?php echo $dbnota; ?></textarea>
  </div>

<div align="center" class="rectangulobtnsguardar">

    <input type="submit" class="btnsubmit" name="btnbuscar" value="Guardar" />
	
	<a href="index.php?module=crm&section=phonecalls" class="btncancel">Cancelar</a>

</div>

</form>