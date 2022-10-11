<script src="core/com/js_terceros_all.js"></script>
<?php
$idtercero = $_POST["lsttercero"];

?>

<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=informes&action=inf1" >
<div class="row">
   <div class="col maintitle">
	Informe listado activos
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
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$idtercero."'");
		
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
   <div class="col-sm-2">
	Ootras opciones
   </div>
   <div class="col">
<?php
if($_POST["chkcaracteristicas"] == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="checkbox" value="1" name="chkcaracteristicas" '.$seleccionado.'/> Mostrar caracterisiticas</label>';
?>
   </div>
</div>


<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Procesar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=informes">Cancelar</a>
</div>
</form>
<div style="display: block; overflow-x: auto;">
<table style="width: 100%;" >
<tr class="maintitle">
	<th>ID</th>
	<th>Codigo</th>
	<th>Activo</th>
	<th>Asignado</th>
	<th>Tipo</th>
	<th>Caducidad</th>
	<th>Estado</th>
<?php
if($_POST["chkcaracteristicas"] == '1')
{

echo '<th>Caracteristica</th>';
echo '<th>Valor 1</th>';
echo '<th>Valor 2</th>';

}
?>
</tr>

<?php
if($_POST["lsttercero"] != "")
{

$cnssql= $mysqli->query("select * from ".$prefixsql."ita_activos where idtercero = '".$idtercero."' ");	
while($col = mysqli_fetch_array($cnssql))
{
	$lbl_id = $col["id"];
	$lbl_codigo = $col["codigo"];
	$lbl_activo = $col["nombre"];
	$lbl_caducidad = $col["fcaducidad"];
	
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_tipos where id = '".$col["idtipo"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tipo = $rowaux["tipo"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_asigando = $rowaux["nombre"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_estados where id = '".$col["estado"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_estado = $rowaux["estado"];
	
	

	if ($lbl_caducidad == "0000-00-00"){$lbl_caducidad = "";}
	
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
	
	echo '<td>'.$lbl_id.'</td>';
	echo '<td>'.$lbl_codigo.'</td>';
	echo '<td>'.$lbl_activo.'</td>';
	echo '<td>'.$lbl_asigando.'</td>';
	echo '<td>'.$lbl_tipo.'</td>';
	echo '<td>'.$lbl_caducidad.'</td>';
	echo '<td>'.$lbl_estado.'</td>';

	if($_POST["chkcaracteristicas"] == '1')
	{
 	   echo '<td colspan="3"></td>';
	}

	echo '</tr>';

	if($_POST["chkcaracteristicas"] == '1')
	{

	   $cnssqlfeatures= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$lbl_id."'");
	   while($colf = mysqli_fetch_array($cnssqlfeatures))
	   {

		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td colspan="7"> </td>';
		echo '<td>'.$colf["opcion"].'</td>';
		echo '<td>'.$colf["valor"].'</td>';
		echo '<td>'.$colf["valor2"].'</td>';
 		echo '</tr>';
	   }
	}

	
	
    
}


}
?>
</table>
</div>
