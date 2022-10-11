<script language="javascript">
$(document).ready(function(){
   $("#txttercero").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txttercero").value;

	$.post("core/com/ajx_terceros_all.php", { elegido: elegido }, function(data){

	$("#lsttercero").html(data);

	cargaactivos();

	});            
      
   })



$("#txtbuscaactivo").keyup(function () {

	elegido=$(this).val();
	var elegido = document.getElementById("txtbuscaactivo").value;

	var idtercero = document.getElementById("lsttercero").value;

	$.post("modules/lnxit/ajax/ajx_terceros_activos.php", { nombreactivo: elegido, idtercero: idtercero }, function(dataactivo){

	$("#sltactivoobjeto").html(dataactivo);
	});            
		
	})

});

function cargaactivos() {
	var idtercero = document.getElementById("lsttercero").value;
	
$.post("modules/lnxit/ajax/ajx_terceros_activos.php", { idtercero: idtercero }, function(data){
            $("#sltactivoobjeto").html(data);
            });
	
}

function mostrar() {
            div = document.getElementById("div_buscatercero");
            div.style.display = "";
            document.getElementById("txttercero").focus();
        }
</script>
<?php
include("modules/lnxit/tickets/tabs.php");


//obtenemos el idtercero asociado a la incidencia
$cnsaux = $mysqli->query("select * from ".$prefixsql."it_tickets where id = '".$_GET["id"]."' ");
$row = mysqli_fetch_assoc($cnsaux);
$idtercero = $row["idtercero"];


?>

<p>Listado de activos</p>

<p> 
<?php echo '<form name="form1" action="index.php?module=lnxit&section=ticketactivos&id='.$_GET["id"].'&action=save" method="post" autocomplete="off">'; ?>
<input type="hidden" name="haccion" value="new">
<?php echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">'; ?>

<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$idtercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{                  
			echo '<option value="'.$colter["id"].'" selected="">'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>

<div class="row">
	<div class="col-sm-2">
		Activo
	</div>
	<div class="col">
	<input type="text" name="txtbuscaactivo" id="txtbuscaactivo" value="" placeholder="Busca el activo del tercero seleccionado" style="width: 100%;" /> </br>
		<select name="sltactivoobjeto" id="sltactivoobjeto" style="width: 100%;">
		<?php

$ConsultaMySql = $mysqli->query("select * from ".$prefixsql."ita_activos where idtercero = '".$idtercero."' ");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$columna["id"].'">'.$columna["nombre"].'</option>	';
}
?>
		</select>
	</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Agregar activo</button> 

</div>


</form>

</p>

<p> </p>

<table width="100%">
<tr class="maintitle">
	<td width="40"> </td>
	<td>Activo</td>
	<td>Tercero</td>
	<td width="40"> </td>
</tr>

<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."ita_tickets where idticket = '".$_GET["id"]."' ");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$cnsusuario= $mysqli->query("select id, nombre, idtercero from ".$prefixsql."ita_activos where id = '".$columna["idactivo"]."' ");
	$row = mysqli_fetch_assoc($cnsusuario);
	$displaynombre = $row['nombre'];
	$idtercero = $row['idtercero'];
	
	$cnsusuario= $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercero."' ");
	$row = mysqli_fetch_assoc($cnsusuario);
	$displaytercero = $row['razonsocial'];
	
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
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$columna["idactivo"].'" class="btnedit">Editar</a></td>
	
	
	
		<td>'.$displaynombre.'</td>
		<td>'.$displaytercero.'</td>
		
		<td align="right" valign="top"><a class="btnenlacecancel" href="index.php?module=lnxit&section=ticketactivos&id='.$_GET["id"].'&action=del&idline='.$columna["id"].'">Borrar</a></td>
	</tr>';
}

?>

</table>


