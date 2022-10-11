<script src="core/com/js_terceros_all.js"></script>

<script>
function llamargalleta(idtercero) {

	document.cookie = "lnxit_idtercero=" + idtercero; 

}

</script>



<p><a href="index.php?module=lnxit&section=activos&ss=activo&action=new" class="btnedit">Nuevo Activo</a>
<a href="index.php?module=lnxit&section=activos&ss=import&action=aips" class="btnedit">Importar Advaced IP Scanner</a> 
<a href="index.php?module=lnxit&section=activos" class="btn_tab_sel">Activos</a>
<a href="index.php?module=lnxit&section=activosrc" class="btn_tab">Remote control</a>
<a href="index.php?module=lnxit&section=activosfea" class="btn_tab">Busqueda avanzada</a>


</p>



<?php

$flsttercero = $_POST["lsttercero"];

if($flsttercero == 0 || $flsttercero == "")
{
	 $flsttercero = $_COOKIE["lnxit_idtercero"];

}


echo '<body onload="llamargalleta('.$flsttercero.')"> ';




	$flsttipo = $_POST["lsttipo"];
	$flstestado = $_POST["lstestado"];
	$ftxtnombre = $_POST["txtnombre"];
	$flstordenarcampo = $_POST["lstordenarcampo"];
	$flstordenar = $_POST["lstordenar"];
	$ftxtcodigo = $_POST["txtcodigo"];

	$fchktercero = $_POST["chktercero"];

?>

<form name="form1" action="index.php?module=lnxit&section=activos" method="post">
<div class="tblbuscar" >
<div class="row">
  <div class="col-sm-2">
    Buscar
  </div>
  <div class="col-sm" align="left">
  Nombre </br>
<?php echo '<input type="text" value="'.$ftxtnombre.'" name="txtnombre" style="width: 100%;" />'; ?>
  </div>
  <div class="col-sm" align="left">
  Codigo </br>
<?php echo '<input type="text" value="'.$ftxtcodigo.'" name="txtcodigo" style="width: 100%;" />'; ?>
  </div>
  
</div>

<div class="row">
    <div class="col-sm-2" align="left">
<label>
<?php
if($fchktercero == '1'){$seleccionado = ' checked=""';}
else
{
if($_POST["lsttercero"] > 0 )
   {
	$seleccionado = ' checked=""';
   }
   else
   {
	$seleccionado = '';
   }
}
echo '<input type="checkbox" value="1" name="chktercero" '.$seleccionado.'/> ';
?>
        Tercero 
</label>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
            if($colter["id"] == $flsttercero){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';

?>

    </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Activo
  </div>
  <div class="col-sm" align="left">
Tipo de activo </br>
<select name="lsttipo" style="width: 100%;">

<?php
if ($flsttipo == "0" || $flsttipo == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" selected="">-Sin especificar-</option>';

$cnssql = "SELECT * FROM ".$prefixsql."ita_tipos order by tipo";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if ($flsttipo == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["tipo"].'</option>';
}

?>
</select> 
  </div>
    <div class="col-sm" align="left">
Estado del activo </br>
<select name="lstestado" style="width: 100%;">
<?php
if ($flstestado == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';
	
$cnssql = "SELECT * FROM ".$prefixsql."ita_estados order by estado";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if ($flstestado == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["estado"].'</option>';
}
?>
?>
</select> 
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Ordenar por
  </div>
  <div class="col" align="left">
<select name="lstordenarcampo">
<?php
if($flstordenarcampo == ""){$flstordenarcampo == "id";}

if ($flstordenarcampo == "id"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="id" '.$seleccionado.'>ID</option>';
if ($flstordenarcampo == "codigo"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="codigo" '.$seleccionado.'>Codigo</option>';
if ($flstordenarcampo == "idtercero" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="idtercero" '.$seleccionado.'>Tercero</option>';
if ($flstordenarcampo == "idtipo" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="idtipo" '.$seleccionado.'>Tipo</option>';
if ($flstordenarcampo == "nombre" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="nombre" '.$seleccionado.'>Nombre</option>';
if ($flstordenarcampo == "estado" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="estado" '.$seleccionado.'>Estado</option>';
if ($flstordenarcampo == "fcaducidad" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="fcaducidad" '.$seleccionado.'>Vencimiento</option>';


?>
</select>
<select name="lstordenar">
<?php
if ($flstordenar == "Asc" || $flstordenar == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="Asc" '.$seleccionado.'>Ascendente</option>';
if ($flstordenar == "Desc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="Desc" '.$seleccionado.'>Descendente</option>';



?>
	
	
</select>
  </div>
</div>
<div align="center">
<input type="hidden" value="ok" name="hbusca"/>
<input type="submit" value="Buscar" class="btnsubmit" />
</div>
</div>









<p>&nbsp;</p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<td width="60"> </td>
<td width="60">ID</td>
<td>Codigo</td>
<td>Tercero</td>
<td>Tipo</td>
<td>Nombre</td>

<td>Estado</td>
<td>Vencimiento</td>
<td>Tickets</td>
<td>Asignado</td>
</tr>


<?php
//terceros
if ($flsttercero > 0 && $fchktercero == '1' ){$cnsterceros = " and idtercero = '".$flsttercero."' ";}else{$cnsterceros = "";}

//Tipo de activo
if ($flsttipo > 0){$cnstipoactivo = " and idtipo = '".$flsttipo."' ";}else{$cnstipoactivo = "";}

//Estado de activo
if ($flstestado > 0){$cnsestado = " and estado = '".$flstestado."' ";}else{$cnsestado = "";}

if ($flstordenarcampo == "fcaducidad" )
	{$cnsvencimiento = " and fcaducidad > '0000-00-00' ";}else{$cnsvencimiento = "";}

$cnssql = "SELECT * FROM ".$prefixsql."ita_activos where nombre like '%".$ftxtnombre."%' and codigo like '".$ftxtcodigo."%' ".$cnsterceros.$cnstipoactivo.$cnsestado.$cnsvencimiento;
$ConsultaMySql= $mysqli->query($cnssql);
$totalregistros = $ConsultaMySql->num_rows;

$limite_reg = 50;

if ($totalregistros > $limite_reg)
{
	$paginar = "si";
	$pagina = $_POST["hpag"];
	if ($pagina == '' || $pagina == '0' || $pagina == '1')
	{
		$pagrs = "0";
		$pagina = "1";
	}
	
	if($_POST["btnpag"] == "siguiente")
	{
		$pagina = $pagina +1;
		
	}
	if($_POST["btnpag"] == "anterior")
	{
		$pagina = $pagina -1;
		
	}
	
	$pagrs = ($pagina -1)* $limite_reg;
	
	$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where nombre like '".$ftxtnombre."%' and codigo like '".$ftxtcodigo."%' ".$cnsterceros.$cnstipoactivo.$cnsestado.$cnsvencimiento." order by ".$flstordenarcampo." ".$flstordenar." limit ".$pagrs.", ".$limite_reg);
	$totalregactual = $ConsultaMySql->num_rows;
}

while($col = mysqli_fetch_array($ConsultaMySql))
{
	$cnssqlaux = "SELECT * FROM ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."'";
	$cnsaux= $mysqli->query($cnssqlaux);
	$row = mysqli_fetch_assoc($cnsaux);
	$lbl_contacto = $row["nombre"];
	
	
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
	echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td>'.$col["id"].'</td>';
	echo '<td>'.$col["codigo"].'</td>';
	
	$cnssqlaux = "SELECT id, razonsocial FROM ".$prefixsql."terceros where id = '".$col["idtercero"]."'";
	$cnsaux= $mysqli->query($cnssqlaux);
	$row = mysqli_fetch_assoc($cnsaux);
	$dbrazonsocial = $row["razonsocial"];
	
	
	$cnsaux= $mysqli->query("SELECT * FROM ".$prefixsql."ita_estados where id = '".$col["estado"]."'");
	$row = mysqli_fetch_assoc($cnsaux);
	
	if ($col["estado"] == '0'){$estado = "";}else{$estado = $row["estado"];}
	
	echo '<td>'.$dbrazonsocial.'</td>';
	$cnssqlaux = "SELECT * FROM ".$prefixsql."ita_tipos where id = '".$col["idtipo"]."' ";
	$cnsaux= $mysqli->query($cnssqlaux);
	$row = mysqli_fetch_assoc($cnsaux);
	$dbtipo = $row["tipo"];
	
	echo '<td>'.$dbtipo.'</td>';
	echo '<td>'.$col["nombre"].'</td>';
	
	

		
	
	echo '<td>'.$estado.'</td>';
	
	if($col["fcaducidad"] == "0000-00-00")
	{$fechavencimiento = "";}
else
{
	$fano = substr($col["fcaducidad"], 0, 4);  
	$fmes = substr($col["fcaducidad"], 5, 2);  
	$fdia = substr($col["fcaducidad"], 8, 2);  

	$fechavencimiento = $fdia."/".$fmes."/".$fano;
}
	
	echo '<td>'.$fechavencimiento.'</td>';
	
		$cnsusuario = $mysqli->query("SELECT count(idactivo) as contador FROM ".$prefixsql."ita_tickets WHERE idactivo = '".$col["id"]."' ");
		$row = mysqli_fetch_assoc($cnsusuario);
		$contador = $row['contador'];
		
		echo '<td>'.$contador.'</td>';
	
	echo '<td>'.$lbl_contacto.'</td>';
	echo '</tr>';
}
?>

</table>
</div>




<?php
echo '<input type="hidden" value="'.$pagina.'" name="hpag" />';
//$pag_siguiente = $pagina +1;
//$pag_anterior = $pagina -1;

echo '<div align="center">';
if ($pagina > '1')
{
//echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&pag='.$pag_anterior.'">Anterior</a> - ';
echo '<input class="btnsubmit" type="submit" value="anterior" name="btnpag" /> ';
}
if ($totalregistros > $limite_reg && $totalregistros > $pagina * $limite_reg)
{
//echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&pag='.$pag_siguiente.'">Siguiente</a>';

echo ' <input class="btnsubmit" type="submit" value="siguiente" name="btnpag" />';
}
if ($pagina == ''){$pagina = '1';}
echo '<p>Pagina '.$pagina.'</p>';
echo '<p>Registros encontrados '.$totalregistros.'</p>';
echo '</div>';
?>
</form>
