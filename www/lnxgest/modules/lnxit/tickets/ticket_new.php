<script src="scripts/jquery/jquery-2.1.1.js"></script>

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

$(document).ready(function(){
   $("#lstcola").change(function () {
           $("#lstcola option:selected").each(function () {
            idcola=$(this).val();
			<?php echo "iduseractual='".$_COOKIE["lnxuserid"]."';"; ?>
            
            $.post("modules/lnxit/ajax/ajx_colas_usuarios.php", { idcola: idcola , iduseractual: iduseractual}, function(data){
            $("#lstasignado").html(data);
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

						   
<form name="form1" action="index.php?module=lnxit&section=tickets&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col-sm-2">
    Tipo Ticket
  </div>
  <div class="col" align="left">
    <select name="lsttipoticket" class="campoencoger">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tipos where activo = '1'");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$columna["id"].'">'.$columna["tipo"].'</option>';
	}
	?>

		
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Ticket remoto
  </div>
  <div class="col" align="left">
    <input type="text" name="ticketremoto" maxlength="50" class="campoencoger" />
  </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php

if($flsttercero == 0 || $flsttercero == "") 
{
 $flsttercero = $_COOKIE["lnxit_idtercero"];
}

//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">';
        echo '<option value="">Seleccione un tercero</option>';
	echo '</select>';
?>

    </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Asignado
  </div>
  <div class="col" align="left">
    <select name="lstasignado" id="lstasignado" style="width: 100%;">
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
  
  <div class="col-sm-2" align="left">
    Cola
  </div>
  <div class="col" align="left">
    <select name="lstcola" id="lstcola" style="width: 100%;">
		<option value="0">- sin asignacion de cola-</option>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."it_colas order by cola");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'">'.$col["cola"].'</option>';
}
?>
	</select>
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
    Categoria
  </div>
  <div class="col" align="left">
    <select name="lstcategoria" style="width: 100%;">
	<option value="0">-Sin categoria-</option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<option value="'.$columna["id"].'">'.$columna["categoria"].'</option>';
		
	}
	?>
	</select>
  </div>
  
  <div class="col-sm-2" align="left">
    Mantenimiento
  </div>
  <div class="col" align="left">
    <select name="lstmantenimiento" style="width: 100%;">
		<option value="0">-sin mantenimiento-</option>
		<?php
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_mant order by ref");

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			
			echo '<option value="'.$columna["id"].'">'.$columna["ref"].'</option>';
				
			
		}
		?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col maintitle" align="left">
    Problema
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Resumen
  </div>
  <div class="col" align="left">
	<input type="text" name="txtresumen" required="" maxlength="50" style="width: 100%;">
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Problema
  </div>
  <div class="col" align="left">
	<textarea rows="4" name="txtproblema" class="mceEditor" maxlength="250" style="width: 100%;"></textarea>
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Solucion
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Solucion
  </div>
  <div class="col" align="left">
	<textarea rows="4" name="txtsolucion" class="mceEditor" maxlength="250" style="width: 100%;"></textarea>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">
	<input type="submit" class="btnsubmit" name="btnguardar" value="Guardar" > 

	<a class="btncancel" href="index.php?module=lnxit&section=tickets&subsection=list">Cancelar</a>
</div>


</form>
