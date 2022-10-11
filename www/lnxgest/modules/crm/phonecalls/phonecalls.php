<?php
$ftxtbuscar = $_POST["txtbuscar"];
$fsql_txtbuscar = addslashes($ftxtbuscar);
$flstasignado = $_POST["lstasignado"];
$flstestado = $_POST["lstestado"];
$fchknoasignados = $_POST["chknoasignados"];


if($flstasignado == ''){$flstasignado = $_COOKIE["lnxuserid"];}
if($flstestado == ''){$flstestado = '1';}

if($_POST["hcontrol"] == 'control')
{
	if($fchknoasignados == ''){$fchknoasignados = '0';}
}
else
{
	if($fchknoasignados == ''){$fchknoasignados = '1';}
}
?>
<form name="frmbuscar" method="POST" action="index.php?module=crm&section=phonecalls" >
<input type="hidden" value="control" name="hcontrol" />
<div class="row">	
	<div class="col-sm-2">
	Busqueda
	</div>
	<div class="col">
	<input type="text" name="txtbuscar" value="<?php echo $ftxtbuscar; ?>" class="campoencoger"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	Asignado
	</div>
	<div class="col">
	<select name="lstasignado" class="campoencoger">
<?php
if($flstasignado == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}

echo '<option value="0" '.$seleccionado.'>Todos</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($flstasignado == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}

?>
	</select> </br>
<?php
if($fchknoasignados == '1'){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	echo '<label><input type="checkbox" value="1" name="chknoasignados" '.$seleccionado.'/> Mostrar sin asignar </label>';
?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	Estado
	</div>
	<div class="col">
	<select name="lstestado" class="campoencoger">
<?php 
if($flstestado == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="1" '.$seleccionado.'>Abierto</option>';
if($flstestado == '2'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="2" '.$seleccionado.'>En proceso</option>';
if($flstestado == '3'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="3" '.$seleccionado.'>Pendiente de terceros</option>';
if($flstestado == '4'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="4" '.$seleccionado.'>Solucionado</option>';
if($flstestado == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>Cerrado</option>';
?>
	</select>
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <input type="submit" class="btnsubmit" name="btnbuscar" value="Buscar" />

</div>

</form>

<p>&nbsp;</p>
<p><a href="index.php?module=crm&section=phonecalls&action=new" class="btnedit">Nueva llamada</a> </p>

<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th>Fecha</th>
<th>Tercero</th>
<th>Telefono</th>
<th>Asignado</th>
<th>Estado</th>
</tr>
<?php

if($flstasignado == '0'){$sql_asignado = '';}else{$sql_asignado = "and idasignado = '".$flstasignado."' ";}

if($fchknoasignados == '0' && $flstasignado > 0)
{
	$sql_asignados = "and idasignado = '".$flstasignado."'"; 
}
//$flstasignado == '0' muestra todos
if($fchknoasignados == '1' && $flstasignado > 0)
{
		//Muestra los del usuario especificado y los NO asignados
	$sql_asignados = "and idasignado = '0' or idasignado = '".$flstasignado."'"; 
}

if($flstestado == '1')
{
	$sql_estado = "and idestado >= '1'";
}
if($flstestado <> '1')
{
	$sql_estado = "and idestado = '".$flstestado."'";
}



$cnssql= $mysqli->query("select * from ".$prefixsql."crm_phonecalls where (nota like '%".$fsql_txtbuscar."%' or telefono like '%".$fsql_txtbuscar."%' or telefono2 like '%".$fsql_txtbuscar."%') ".$sql_asignados." ".$sql_estado." order by fecha desc");	


while($col = mysqli_fetch_array($cnssql))
{

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_contacto = $rowaux["nombre"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$col["idasignado"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_asignado = $rowaux["display"];

if($col["idestado"] == '0'){$lbl_estado = "Cerrado";}
if($col["idestado"] == '1'){$lbl_estado = "Abierto";}
if($col["idestado"] == '2'){$lbl_estado = "En proceso";}
if($col["idestado"] == '3'){$lbl_estado = "Pendiente de terceros";}
if($col["idestado"] == '4'){$lbl_estado = "Solucionado";}

if($col["idprioridad"] == '1'){$lbl_prioridad = '<i style="color: #FF0000;" class="fas fa-exclamation"></i>';}
if($col["idprioridad"] == '2'){$lbl_prioridad = '';}
if($col["idprioridad"] == '3'){$lbl_prioridad = '<i style="color: #4169E1;" class="fas fa-long-arrow-alt-down"></i>';}


    
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><a href="index.php?module=crm&section=phonecalls&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
echo '<td>'.$col["fecha"].'</td>';
echo '<td>'.$lbl_tercero.' - '.$lbl_contacto.'</td>';
echo '<td>'.$col["telefono"].' / '.$col["telefono2"].'</td>';
echo '<td>'.$lbl_asignado.'</td>';
echo '<td>'.$lbl_prioridad.' '.$lbl_estado.'</td>';
echo '</tr>';    
}

?>
</table>
</div>