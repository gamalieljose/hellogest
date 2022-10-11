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
$flsttercero = $_POST["lsttercero"];
$flstcontacto = $_POST["lstcontacto"];

$flsttipoactivo = $_POST["lsttipoactivo"];
	if($flsttipoactivo == ''){$flsttipoactivo = '0';}
$ftxtbuscar = addslashes($_POST["txtbuscar"]);

?>

<p>

<a href="index.php?module=lnxit&section=activos" class="btn_tab">Activos</a>
<a href="index.php?module=lnxit&section=activosrc" class="btn_tab_sel">Remote control</a>
<a href="index.php?module=lnxit&section=activosfea" class="btn_tab">Busqueda avanzada</a>

</p>

<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=activosrc" >
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
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$flsttercero."' order by nombre");
        if($flstcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>- sin asignar -</option>'; 
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
                    if($flstcontacto == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["nombre"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
    
    
    


<div class="row">
    <div class="col-sm-2" align="left">
        Buscar
    </div>
    <div class="col-sm-2" align="left">
        <select name="lstcampo" style="width: 100%;">
<?php
if($_POST["lstcampo"] == 'nombre'){$selecionado = ' selected=""';}else{$selecionado = '';}
	echo '<option value="nombre" '.$selecionado.'>Nombre</option>';
if($_POST["lstcampo"] == 'codigo'){$selecionado = ' selected=""';}else{$selecionado = '';}
	echo '<option value="codigo" '.$selecionado.'>codigo</option>';
if($_POST["lstcampo"] == 'id'){$selecionado = ' selected=""';}else{$selecionado = '';}
	echo '<option value="id" '.$selecionado.'>ID</option>';
?>
		</select>
    </div>
    <div class="col" align="left">
	
        <input type="text" value="<?php echo $_POST["txtbuscar"]; ?>" name="txtbuscar" class="campoencoger" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tipo
    </div>
    <div class="col" align="left">
	
	<select name="lsttipoactivo" style="width: 100%;">
	
<?php
if($flsttipoactivo == '0'){$selecionado = ' selected=""';}else{$selecionado = '';}
echo '<option value="0" '.$selecionado.'>- sin especificar -</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."ita_tipos order by tipo");	
while($col = mysqli_fetch_array($cnssql))
{
	if($flsttipoactivo == $col["id"]){$selecionado = ' selected=""';}else{$selecionado = '';}
    echo '<option value="'.$col["id"].'" '.$selecionado.'>'.$col["tipo"].'</option>';
    
}


?>
	</select>
	
	
    </div>

</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Buscar" type="submit"> 

</div>

</form>


<table  width="100%" >
<tr class="maintitle">
<td> </td>
<td>ID</td>
<td>codigo</td>
<td>Nombre</td>
<td>Asignado</td>
<td>Tipo</td>
<td>Estado</td>
<td>Ubicacion</td>
<td align="center">Conectar</td>
</tr>
<?php
if($flsttipoactivo > 0)
{
	$sql_tipoactivo = " and idtipo = '".$flsttipoactivo."' ";
}
else
{
	$sql_tipoactivo = "";
}

if ($flstcontacto > '0')
{    
    $sql_contacto = " and idcontacto = '".$flstcontacto."' ";
}
else
{    
    $sql_contacto = "";
}

$ssqllistado = "select * from ".$prefixsql."ita_activos where ".$_POST["lstcampo"]." like '".$ftxtbuscar."%' and idtercero = '".$flsttercero."' ".$sql_tipoactivo.$sql_contacto;


$cnssql= $mysqli->query($ssqllistado);	
while($col = mysqli_fetch_array($cnssql))
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_tipos where id ='".$col["idtipo"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tipo = $rowaux["tipo"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_estados where id ='".$col["estado"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_estado = $rowaux["estado"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_estados where id ='".$col["estado"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_estado = $rowaux["estado"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id ='".$col["idcontacto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_asignado = $rowaux["nombre"];
	
	$lbl_location = '';
	$remote_rdp = "0";
	$remote_vnc = "0";
	$remote_web = "0";
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo ='".$col["id"]."' "); 
	while($colfeatures = mysqli_fetch_array($sqlaux))
	{
		if ($colfeatures["opcion"] == "LOCATION" ) {$lbl_location = $colfeatures["valor"];}
		
		if ($colfeatures["opcion"] == "REMOTE_RDP" && $colfeatures["valor"] == "ON") {$remote_rdp = "1";}
		if ($colfeatures["opcion"] == "REMOTE_VNC" && $colfeatures["valor"] == "ON") {$remote_vnc = "1";}
		if ($colfeatures["opcion"] == "REMOTE_WEB" && $colfeatures["valor"] == "ON") {$remote_web = "1";}
	}

	
	
	
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

echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["id"].'" class="btnedit" >Editar</a></td>';
echo '<td>'.$col["id"].'</td>';
echo '<td>'.$col["codigo"].'</td>';
echo '<td>'.$col["nombre"].'</td>';
echo '<td>'.$lbl_asignado.'</td>';
echo '<td>'.$lbl_tipo.'</td>';
echo '<td>'.$lbl_estado.'</td>';
echo '<td>'.$lbl_location.'</td>';
echo '<td align="center">';


	
echo '<a href="modules/lnxit/activosrc/downcli.php?idactivo='.$col["id"].'" class="btnedit_verde">Conectar</a>';

	


echo '</td>';
echo '</tr>';
    
}


?>



</table>