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

<form name="formulario1" id="formulario1" action="index.php?module=crm&section=phonecalls&action=save" method="POST">
<input type="hidden" name="haccion" value="new"/>
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
	<option value="0">-Selecciona tercero-</option>
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
	<option value="0">-Selecciona tercero-</option>
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
		if ($_COOKIE["lnxuserid"] == $columna["id"])
		{echo '<option value="'.$columna["id"].'" selected="">'.$columna["display"].'</option>';}
		else
		{echo '<option value="'.$columna["id"].'">'.$columna["display"].'</option>';}
		
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
  <input type="text" name="txttel1" id="txttel1" onfocus="obtener_tel_tercero()" style="width: 100%;"/>
  </div>
  <div class="col-sm-2" align="left">
  <input type="text" name="txttel2" id="txttel2" onfocus="obtener_tel_tercero_contacto()" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Estado
  </div>
  <div class="col" align="left">
    <select name="lstestado" style="width: 100%;">
	<option value="1">Abierto</option>
	
	<option value="2">En proceso</option>
	<option value="3">Pendiente de terceros</option>
	<option value="4">Solucionado</option>
	<option value="0">Cerrado</option>
	</select>
  </div>
  
  <div class="col-sm-2" align="left">
    Prioridad
  </div>
  <div class="col" align="left">
    <select name="lstprioridad" style="width: 100%;">
	<option value="1">Alta</option>
	<option value="2" selected="">Normal</option>
	<option value="3">Baja</option>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nota
  </div>
  <div class="col" align="left">
  <textarea name="txtnota" style="width: 100%;"></textarea>
  </div>

<div align="center" class="rectangulobtnsguardar">

    <input type="submit" class="btnsubmit" name="btnbuscar" value="Guardar" />
	
	<a href="index.php?module=crm&section=phonecalls" class="btncancel">Cancelar</a>

</div>

</form>