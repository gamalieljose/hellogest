
<form name="form1" action ="index.php?module=ficheros&section=save" enctype="multipart/form-data" method="POST">
<input type="hidden" name="haccion" value="new"/>
<div class="row">
<div class="col maintitle">
	Subir Fichero
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Fichero
</div>
<div class="col">
	<input type="file" name="fileficherito" required=""/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Descripción
</div>
<div class="col">
	<input type="text" name="txtfichero" required="" style="width: 100%"/>
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Propietario
</div>
<div class="col">
	<select name="lstpropietario" style="width: 100%"/>
	<option value="0">-Sin Asignar-</option>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>'; 
}

?>
	</select>
</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=ficheros" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>


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
$cnssql = "SELECT * FROM ".$prefixsql."users where activo = '1' order by display";
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
	<textarea name="txtclaves" maxlength="65500" style="width:100%;"></textarea>
	</div>
</div>
</form>

