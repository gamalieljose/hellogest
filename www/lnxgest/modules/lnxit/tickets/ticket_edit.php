<?php
//Cargamos los valores que hay en la base de datos

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tickets where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidtipo = $row['idtipo'];
$dbresumen = $row['resumen'];
$dbidasignado = $row['idasignado'];
$dbidestado = $row['idestado'];
$dbproblema = $row['problema'];
$dbsolucion = $row['solucion'];
$dbtremoto = $row['tremoto'];

$dbidcontacto = $row["idafectado"];
$dbidcategoria = $row["idcategoria"];
$dbidprioridad = $row["idprioridad"];

$dbfcreacion = $row["fcreacion"];
$dbfmodificacion = $row["fmodificacion"];
$dbfcierre = $row["fcierre"];
$dbidfv = $row["idfv"];
$dbidcola = $row["idcola"];



$dbidtercero = $row["idtercero"];
?>
<script src="scripts/jquery/jquery-2.1.1.js"></script>

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


function eliminadivupdate() {

	setTimeout(function(){ document.getElementById("divupdate").style.display = "none"; }, 4000);
	
}



function botonsave(botonpulsado) {

	document.getElementById("hboton").value = botonpulsado
	
	
}


$(document).ready(function(){

	eliminadivupdate();

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
   $("#lstcola").change(function () {
           $("#lstcola option:selected").each(function () {
            idcola=$(this).val();
			<?php echo "iduseractual='".$dbidasignado."';"; ?>
            
            $.post("modules/lnxit/ajax/ajx_colas_usuarios.php", { idcola: idcola , iduseractual: iduseractual}, function(data){
            $("#lstasignado").html(data);
            });
                       
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
include("modules/lnxit/tickets/tabs.php");


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbteltercero = $row['tel'];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$dbidafectado."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtelafectado = $row['tel'];


$dbidmant = $row["idmant"];
if ($dbidmant > '0'){$coloractivo = "#5882FA";}else{$coloractivo = "#FFFFFF";}

if ($dbfcierre == '0000-00-00 00:00:00'){$dbfcierre ='';}

if($_GET["upd"] == "ate")
{
	echo '<div id="divupdate" class="animated fadeOut" align="center" style="width:100%; ba">
Cambios aplicados con éxito
</div>';
}


?>


<form name="form1" action="index.php?module=lnxit&section=tickets&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">'; ?>
<input type="hidden" name="hboton" id="hboton" value="" />
<div class="row">
  <div class="col-sm-2">
    Ticket
  </div>
  <div class="col" align="left">
    <?php echo '<b>'.$_GET["id"].'</b>'; ?>
  </div>  
</div>
<div class="row">
  <div class="col-sm-2">
    Ticket remoto
  </div>
  <div class="col" align="left">
    <input type="text" name="ticketremoto" maxlength="50" class="campoencoger" value="<?php echo $dbtremoto; ?>" />
  </div>
</div>
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
		if ($columna["id"] == $dbidtipo)
		{
			echo '<option value="'.$columna["id"].'" selected="">'.$columna["tipo"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["tipo"].'</option>';
		}
		
		
	}
	?>

		
	</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    Creado
  </div>
  <div class="col" align="left">
    <?php echo $dbfcreacion; ?>
  </div>  
</div>
<div class="row">
  <div class="col-sm-2">
    Modificado
  </div>
  <div class="col" align="left">
    <?php echo $dbfmodificacion; ?>
  </div>  
</div>
<div class="row">
  <div class="col-sm-2">
    Cerrado
  </div>
  <div class="col" align="left">
    <?php echo $dbfcierre; ?>
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
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
		
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
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$dbidtercero."' order by nombre");
        if($dbidcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>- sin asignar -</option>'; 
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
                    if($dbidcontacto == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["nombre"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Asignado
  </div>
  <div class="col" align="left">
    <select name="lstasignado" id="lstasignado" title="Los usuarios marcados en color azul, son los que pertenecen a la cola seleccionada" alt="Los usuarios marcados en color azul, son los que pertenecen a la cola seleccionada" style="width: 100%;">

	<?php
	if ($dbidasignado == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="0" '.$seleccionado.'>-Sin asignar-</option>';
	
		

	$ConsultaMySql= $mysqli->query("SELECT id, display from ".$prefixsql."users where activo = '1' or id = '".$dbidasignado."'  order by display");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($dbidasignado == $columna["id"])
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
    <select name="lstcola" id="lstcola" title="Los usuarios marcados en color azul, son los que pertenecen a la cola seleccionada" alt="Los usuarios marcados en color azul, son los que pertenecen a la cola seleccionada" style="width: 100%;">
<?php
if($dbidcola == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>- sin asignacion de cola-</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."it_colas order by cola");	
while($col = mysqli_fetch_array($cnssql))
{
    if($dbidcola == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["cola"].'</option>';
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
	
	<?php
	if ($dbidestado == '1'){echo '<option value="1" selected="">Abierto</option>';}else{echo '<option value="1" >Abierto</option>';}

	if ($dbidestado == '2'){echo '<option value="2" selected="">En proceso</option>';}else{echo '<option value="2" >En proceso</option>';}
	if ($dbidestado == '3'){echo '<option value="3" selected="">Pendiente de terceros</option>';}else{echo '<option value="3" >Pendiente de terceros</option>';}
	if ($dbidestado == '4'){echo '<option value="4" selected="">Solucionado</option>';}else{echo '<option value="4" >Solucionado</option>';}

	if ($dbidestado == '0'){echo '<option value="0" selected="">Cerrado</option>';}else{echo '<option value="0" >Cerrado</option>';}


		

	?>
		
	</select>
  </div>
  
  <div class="col-sm-2" align="left">
    Prioridad
  </div>
  <div class="col" align="left">
    <select name="lstprioridad" style="width: 100%;">
	<?php
	if ($dbidprioridad == '1') {echo '<option value="1" selected="">Alta</option>';} else {echo '<option value="1">Alta</option>';}
	if ($dbidprioridad == '2') {echo '<option value="2" selected="">Normal</option>';} else {echo '<option value="2">Normal</option>';}
	if ($dbidprioridad == '3') {echo '<option value="3" selected="">Baja</option>';} else {echo '<option value="3">Baja</option>';}
	?>
	</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Categoria
  </div>
  <div class="col" align="left">
    <select name="lstcategoria" style="width: 100%;">
	<?php
	if($dbidcategoria == '0')
	{
		echo '<option value="0" selected="">-Sin categoria-</option>';
	}
	else
	{
		echo '<option value="0">-Sin categoria-</option>';
	}

	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if($dbidcategoria == $columna["id"])
		{
			echo '<option value="'.$columna["id"].'" selected="">'.$columna["categoria"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["categoria"].'</option>';
		}
		
	}
	?>
	</select>
  </div>
  
  <div class="col-sm-2" align="left">
    Mantenimiento
  </div>
  <div class="col" align="left">
    <select name="lstmantenimiento" style="width: 100%;">
		<?php
		if ($dbidmant == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>-sin mantenimiento-</option>';

		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_mant order by ref");

		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			if ($dbidmant == $columna["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["ref"].'</option>';
				
		}
		?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-6" align="left">
    
  </div>
  
  <div class="col-sm-2" align="left">
    Tiempos
  </div>
  <div class="col" align="left">
    <?php
		$ConsultaMySql= $mysqli->query("SELECT sum(HOUR(tiempo)) as hora, sum(MINUTE(tiempo)) as minutos from ".$prefixsql."it_seguimiento where idticket = '".$_GET["id"]."' ");
		$row = mysqli_fetch_assoc($ConsultaMySql);

		$horas = $row["hora"];
		$min = $row["minutos"];
		$minutos = $min%60;
		$h=0;
		$h=(int)($min/60);
		$horas+=$h;

		//echo "TOTAL: ".$horas."h ".$minutos."m";
		$totaltiempodedicado = $horas." h ".$minutos." m";
		echo 'Total: '.$totaltiempodedicado.' / <b>Computado:</b> ';



		$ConsultaMySql= $mysqli->query("SELECT sum(HOUR(tiempo)) as hora, sum(MINUTE(tiempo)) as minutos from ".$prefixsql."it_seguimiento where idticket = '".$_GET["id"]."' and computa = '1'");
		$row = mysqli_fetch_assoc($ConsultaMySql);

		$horas = $row["hora"];
		$min = $row["minutos"];
		$minutos = $min%60;
		$h=0;
		$h=(int)($min/60);
		$horas+=$h;

		//echo "TOTAL: ".$horas."h ".$minutos."m";
		$totaltiempodedicado = $horas." h ".$minutos." m";
		echo '<b>'.$totaltiempodedicado.'</b>';

		?>
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
	<?php echo '<input type="text" name="txtresumen" required="" value="'.$dbresumen.'" maxlength="50" style="width: 100%;">'; ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Problema
  </div>
  <div class="col" align="left">
	<textarea rows="4" name="txtproblema" class="mceEditor" maxlength="250" style="width: 100%;"><?php echo $dbproblema; ?></textarea>
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
	<textarea rows="4" name="txtsolucion" class="mceEditor" maxlength="250" style="width: 100%;"><?php echo $dbsolucion; ?></textarea>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<button type="submit" class="btnsubmit" name="btnaceptar" value="btnaceptar" onclick="botonsave('aceptar')"> <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<button type="submit" class="btnapply" name="btnaplicar" value="btnaplicar" onclick="botonsave('aplicar')"> <i class="hidephonview fa fa-check-circle fa-lg"></i> Aplicar</button> 
<a href="index.php?module=lnxit&section=tickets&subsection=list" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>

</div>



</form>

<?php
include("modules/lnxit/seguimiento/seguimiento.php");
?>