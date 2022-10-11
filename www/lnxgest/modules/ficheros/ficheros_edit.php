<?php
$idfichero = $_GET["id"];

$cnssql = $mysqli->query("SELECT * from ".$prefixsql."ficheros_keyword where idfichero = '".$idfichero."' ");
$row = mysqli_fetch_assoc($cnssql);
$dbpalabrasclaves = $row["palabrasclave"];

$auxsumas = $mysqli->query("SELECT * from ".$prefixsql."ficheros where id = '".$idfichero."' ");
$auxrow = mysqli_fetch_assoc($auxsumas);
$dbdescripcion = $auxrow["descripcion"];

$dbidfichero = $auxrow["id"];
$dbfichero = $auxrow["fichero"];
$dbnombre = $auxrow["nombre"];
$dbdescripcion = $auxrow["descripcion"];
$dbextension = $auxrow["extension"];
$dbdirfichero = $auxrow["dirfichero"];
$dbfsubido = $auxrow["fsubido"];
$dbiduser = $auxrow["iduser"];

$xtemp = strlen($dbextension) +1;
$xtempnombre = strlen($dbnombre) - $xtemp;

$xnombre = substr($dbnombre, 0, $xtempnombre);

//if ($_GET["section"] == "contactos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<p>';
echo '<a href="#" class="btn_tab_sel">Fichero</a>';
//echo '<a href="#" class="btn_tab">Permisos</a>';
echo '<a href="index.php?module=ficheros&section=del&id='.$idfichero.'" class="btn_tab_del">Eliminar archivo</a>';
echo '</p>';
?>


<form name="form1" action ="index.php?module=ficheros&section=save" method="POST">
<?php

echo '<input type="hidden" name="hidfichero" value="'.$idfichero.'"/>';
?>
<input type="hidden" name="haccion" value="update"/>
<div class="row">
<div class="col-sm-2">
	<?php echo '<b>'.$dbidfichero.'</b>'; ?>
</div>
<div class="col">
	<?php echo $dbfichero; ?>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Archivo
</div>
<div class="col">
	<div class="campoencoger">
	<input type="text" name="txtnombrefichero" value="<?php echo $xnombre; ?>" required="" maxlength="200" style="width: calc(100% - 60px);" />
	<input type="text" name="lblextension" value="<?php echo $dbextension; ?>" readonly="" style="width: 50px;" />
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Descripción
</div>
<div class="col">
	<?php echo '<input type="text" name="txtfichero" value="'.$dbdescripcion.'" required="" style="width: 100%;"/>'; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Propietario
</div>
<div class="col">
	<select name="lstpropietario" style="width: 100%"/>
<?php
if($col["id"] == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin Asignar-</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."users order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $dbiduser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>'; 
}

?>
	</select>
</div>
</div>


<div class="row">
<div class="col-sm-2">
	Directorio
</div>
<div class="col">
	<?php echo $dbdirfichero; ?>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Subido
</div>
<div class="col">
	<?php echo $dbfsubido; ?>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Descargar
</div>
<div class="col">
	<?php echo '<a class="btnedit"  target="_blank" href="modules/ficheros/download.php?id='.$idfichero.'">Descargar Fichero</a>'; ?>
</div>
</div>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th>ID</th>
<th>Modulo</th>
<th>L0</th>
<th>L1</th>
<th>L2</th>
<th>Display</th>
<th>Publico</th>
<th>Categoria</th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."ficheros_loc where idfichero = '".$dbidfichero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    
    

	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";


	echo '<td>'.$col["id"].'</td>';
	echo '<td>'.$col["module"].'</td>';
	echo '<td>'.$col["idlinea0"].'</td>';
	echo '<td>'.$col["idlinea1"].'</td>';
	echo '<td>'.$col["idlinea2"].'</td>';
	echo '<td>'.$col["display"].'</td>';
	echo '<td>'.$col["publico"].'</td>';
	echo '<td>'.$col["idcat"].'</td>';
	echo '</tr>';

}

?>
</table>
</div>

<p></p>










<div class="row">
<div class="col maintitle">
	Permisos
</div>
</div>

<div class="row">
   <div class="col-sm">
<b>Usuarios autorizados</b></br>
<table width="100%">
<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."users order by display";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
{
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
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."ficheros_perm where idfichero = '".$_GET["id"]."' and iduser = '".$cat["id"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontador = $rowaux['contador'];
	
	if($dbcontador > '0'){$marcado = ' checked=""';}else{$marcado = '';}
		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><input type="checkbox" name="chkusuario[]" value="'.$cat["id"].'" '.$marcado.'> '.$cat["display"].'</td>
	<tr>';
	
}
?>
</table>
</div>
<div class="col-sm">
<b>Grupos autorizados </b></br>

<table width="100%">
<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."groups order by grupo";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
{
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
	
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."ficheros_perm where idfichero = '".$_GET["id"]."' and idgroup = '".$cat["id"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontador = $rowaux['contador'];
	
	if($dbcontador > '0'){$marcado = ' checked=""';}else{$marcado = '';}

		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><input type="checkbox" name="chkgrupo[]" value="'.$cat["id"].'" '.$marcado.'> '.$cat["grupo"].'</td>
	<tr>';
	
}
?>
</table>
</div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=ficheros">Cancelar</a>

</div>


<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_config");
while($row = mysqli_fetch_array($ConsultaMySql))
{
    if($row["opcion"] == "KW_MINCAR"){$minchr = $row["valor"];}
    if($row["opcion"] == "KW_MAXCAR"){$maxchr = $row["valor"];}
    if($row["opcion"] == "KW_MINREP"){$vecesrepiteparaok = $row["valor"];}
}
?>


<div class="row">
	<div class="col maintitle">
	Contenido de palabras clave del documento
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		Indexación
	</div>
	<div class="col">
	<label><input type="checkbox" name="chkindexa" value="auto"> Indexa automaticamente con los siguientes valores:</label></br>
		<input type="number" value="<?php echo $minchr; ?>" name="txtminchr" style="width: 70px;" /> Mínimo caracteres a procesar</br>
		<input type="number" value="<?php echo $maxchr; ?>" name="txtmaxchr" style="width: 70px;" /> Maximo caracteres a procesar</br>
		<input type="number" value="<?php echo $vecesrepiteparaok; ?>" name="txtrepite" style="width: 70px;"/> Minimo veces se repite una palabra para ser considerada clave</br>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Contenido de indexación
	</div>
	<div class="col">
	<textarea name="txtclaves" maxlength="65500" style="width:100%;"><?php echo $dbpalabrasclaves; ?></textarea>
	</div>
</div>

</form>


