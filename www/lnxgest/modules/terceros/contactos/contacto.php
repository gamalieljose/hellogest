<?php
include("modules/terceros/botones.php");


$idtercero = $_GET["idtercero"];

$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

?>
<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=terceros&section=contactos&action=new&idtercero='.$idtercero.'">Nuevo contacto</a> ';
echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&action=print&docprint=tercontact&idtercero='.$idtercero.'">Imprimir</a> ';
echo 'Tercero: <b>'.$lbl_tercero.'</b>';
echo '</p>';

	
echo '<form name="frmbuscacontacto" method="POST" action="index.php?module=terceros&section=contactos&idtercero='.$idtercero.'" >';

$flstcampo = $_POST["lstcampo"];
$ftxtbuscar = addslashes($_POST["txtbuscar"]);
$flstordenar = $_POST["lstordenar"];
$flstorden = $_POST["lstorden"];
$flstdireccion = $_POST["lstdireccion"];

?>
<div class="tblbuscar">

<div class="row">
	<div class="col maintitle" align="left">
		Buscar contactos
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<select name="lstcampo" style="width: 100%;"/>
<?php
if($flstcampo == "nombre" || $flstcampo == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="nombre" '.$seleccionado.'>Nombre</option>';
if($flstcampo == "cargo" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="cargo" '.$seleccionado.'>Cargo</option>';
if($flstcampo == "tel" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="tel" '.$seleccionado.'>Telefono</option>';
if($flstcampo == "email" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="email" '.$seleccionado.'>e-mail</option>';
?>
		</select>
	</div>
	<div class="col" align="left">

		<input type="text" name="txtbuscar" value="<?php echo $ftxtbuscar; ?>" style="width: 100%;"/>

	</div>
	<div class="col-sm-2" align="right">
		<input class="btnsubmit" name="btnbuscar" value="Buscar" type="submit"> 
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Direccion: 
	</div>
	<div class="col" align="left">
		<select name="lstdireccion" style="width: 100%;"/>
<?php

if($flstdireccion == "0" || $flstdireccion == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';
			
$sqldirecciones = $mysqli->query("select * from ".$prefixsql."tercerosdir where idtercero = '".$idtercero."' order by referencia");

while($col = mysqli_fetch_array($sqldirecciones))
{
	if($flstdireccion == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["referencia"].'</option>';
}
?>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Ordenar: 
	</div>
	<div class="col" align="left">
		<select name="lstordenar" />
<?php
if($flstordenar == "nombre" || $flstordenar == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="nombre" '.$seleccionado.'>Nombre</option>';
if($flstordenar == "cargo" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="cargo" '.$seleccionado.'>Cargo</option>';
if($flstordenar == "tel" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="tel" '.$seleccionado.'>Telefono</option>';
if($flstordenar == "email" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="email" '.$seleccionado.'>e-mail</option>';
?>
		</select>
		<select name="lstorden" />
<?php

if($flstorden == "asc" || $flstorden == ""){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="asc" '.$seleccionado.'>Ascendente</option>';
if($flstorden == "desc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="desc" '.$seleccionado.'>Descendente</option>';
?>
		</select>

	</div>
	
</div>

</div>



</form>


<table width="100%">
	<tr class="maintitle">
	<td> </td>
	<td width="17"> </td>
	<td>Nombre</td>
	<td>Cargo</td>
	<td>Telefono(s)</td>
	<td>e-mail</td>
	<td>Ref. Dir.</td>
	<td>idioma</td>
	<td></td>
</tr>
<?php
if($_POST["lstcampo"] == "")
{
	$ssqlrs = "SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."' order by nombre";
}
else
{

	if($flstdireccion > '0')
	{
		$sql_dir = " and iddir = '".$flstdireccion."' ";
	}
	else
	{
		$sql_dir = "";
	}
	
		if($flstcampo == "tel")
	{
		$ssqlrs = "SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."' and (tel like '".$ftxtbuscar."%' or tel2 like '".$ftxtbuscar."%' or tel3 like '".$ftxtbuscar."%') ".$sql_dir." order by ".$flstordenar." ".$flstorden;	
	}
	else
	{
		$ssqlrs = "SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."' and ".$flstcampo." like '%".$ftxtbuscar."%' ".$sql_dir." order by ".$flstordenar." ".$flstorden;
	}
}

	$sqlcontactos = $mysqli->query($ssqlrs);

	while($col = mysqli_fetch_array($sqlcontactos))
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
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		
		
		echo '<td width="60"><a class="btnedit" href="index.php?module=terceros&section=contactos&action=edit&idtercero='.$idtercero.'&id='.$col["id"].'">Editar</a></td>';
		
		if ($col["lnxpublic"] == "1"){$lnxpublicicon = '<img src="img/mundo.jpg" alt="con acceso publico" />';}else{$lnxpublicicon = '';}
		
		if($col["activo"] == "1"){$img_activo = "img/yes.png";}else{$img_activo = "img/no.png";}
		
		echo '<td>'.$lnxpublicicon.'</td>
		<td><img src="'.$img_activo.'" /> '.$col["nombre"].'</td>
		<td>'.$col["cargo"].'</td>
		<td>';

		if($col["tel"] <> ""){$saltolinea = '</br>';}else{$saltolinea = '';}

		echo '<a href="tel:'.$col["tel"].'" >'.$col["tel"].'</a> '.$saltolinea;
		
		if($col["tel2"] <> "")
		{
			if($col["lbltel2"] <> ""){$lbl_eti_tel2 = '('.$col["lbltel2"].')';}else{$lbl_eti_tel2 = '';}
			echo '<a href="tel:'.$col["tel2"].'" alt="'.$col["lbltel2"].'" title="'.$col["lbltel2"].'" >'.$col["tel2"].'</a>'.$lbl_eti_tel2.'</br>'; 
		}
		if($col["tel3"] <> "")
		{
			if($col["lbltel3"] <> ""){$lbl_eti_tel3 = '('.$col["lbltel3"].')';}else{$lbl_eti_tel3 = '';}
			echo '<a href="tel:'.$col["tel3"].'" alt="'.$col["lbltel3"].'" title="'.$col["lbltel3"].'" >'.$col["tel3"].'</a>'.$lbl_eti_tel3.'</br>'; 
		}
		
		
		
		echo '</td>';
		echo '<td>';
		if($col["email"] <> '')
		{
		echo '<a href="mailto:'.$col["email"].'"<i class="fa fa-fw fa-envelope"></i></a>';
		}		
		echo '</td>';
		
		if ($col["iddir"] > '0')
		{
			$cnsaux = $mysqli->query("SELECT id, referencia from ".$prefixsql."tercerosdir where id = '".$col["iddir"]."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$dbreferencia = $rowaux["referencia"];
		}
		else
		{
			$dbreferencia = "";
		}
		echo '<td>'.$dbreferencia.'</td>';
		
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas where id = '".$col["ididioma"]."'");
		$rowaux = mysqli_fetch_assoc($ConsultaMySql);
		$dbidioma = $rowaux['idioma'];
		
		echo '<td>'.$dbidioma.'</td>';
		echo '<td width="60">';
			echo '<a class="btnenlacecancel" href="index.php?module=terceros&section=contactos&action=del&idtercero='.$idtercero.'&id='.$col["id"].'">Borrar</a>';
		echo '</td>';
	echo '</tr>';
	 
	}
	echo '</table>';


?>


