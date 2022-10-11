
<?php
$flstcampo = $_POST["lstcampo"];
$ftxtvalor = $_POST["txtvalor"];
?>

<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=buscar">
<div class="row maintitle">
	<div class="col" align="left">
		Buscar contactos
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
	<select name="lstcampo" style="width: 100%;">
<?php
if ($flstcampo == "1"){$defecto = "selected";}else{$defecto = "";}
	echo '<option value="1" '.$defecto.'>Nombre</option>';
if ($flstcampo == "2"){$defecto = "selected";}else{$defecto = "";}
	echo '<option value="2" '.$defecto.'>Telefono</option>';
if ($flstcampo == "3"){$defecto = "selected";}else{$defecto = "";}
	echo '<option value="3" '.$defecto.'>e-mail</option>';
?>
	</select>
	</div>
	<div class="col" align="left">
<?php 
	echo '<input type="text" name="txtvalor" value="'.$ftxtvalor.'" class="campoencoger"/>'; 
?>
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnenviar" value="Buscar" type="submit"> 

</div>

</form>

<?php
if ($ftxtvalor <> '')
{
?>
<table width="100%" s>
<tr class="maintitle">
	<th width="30"> </th>
	<th >Nombre</th>
	<th width="30"> </th>
	<th width="30"> </th>
	
</tr>
<?php
//resultado de la busqueda

if ($flstcampo == "1")
{
	$sqlcampotercero = "where razonsocial like '%".$ftxtvalor."%' or nomcomercial like '%".$ftxtvalor."%'";
	$sqlcampocontacto = "where nombre like '".$ftxtvalor."%' ";
}
if ($flstcampo == "2")
{
	$sqlcampotercero = "where tel like '".$ftxtvalor."%' ";
	$sqlcampocontacto = "where tel like '".$ftxtvalor."%' or tel2 like '".$ftxtvalor."%' or tel3 like '".$ftxtvalor."%'";
	
}
if ($flstcampo == "3")
{
	$sqlcampotercero = "where email like '".$ftxtvalor."%'";
	$sqlcampocontacto = "where email like '".$ftxtvalor."%'";
	
}

$ssqlterceros = "SELECT id as idtercero, '0' as idcontacto, razonsocial, nomcomercial as nombre, tel, email FROM ".$prefixsql."terceros ".$sqlcampotercero."
union ALL
select idtercero, id as idcontacto, '' as razonsocial, nombre as nomcomercial, tel, email from ".$prefixsql."terceroscontactos ".$sqlcampocontacto."
order by nombre";


$sqlterceros= $mysqli->query($ssqlterceros);
	while($coltercero = mysqli_fetch_array($sqlterceros))
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
	
		if($coltercero["razonsocial"] == '')
		{
			$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$coltercero["idtercero"]."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$lbl_razonsocial = $rowaux["razonsocial"];
			
		}
		else
		{
			$lbl_razonsocial = $coltercero["razonsocial"];
		}
	
		if($coltercero["idcontacto"] == '0')
		{
			$lbl_nombre = $coltercero["nombre"];
		}
		else
		{
			$lbl_nombre = '<a href="index.php?module=terceros&section=contactos&action=edit&idtercero='.$coltercero["idtercero"].'&id='.$coltercero["idcontacto"].'" >'.$coltercero["nombre"].'</a>';
		}
		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		
	
	
	if($coltercero["idcontacto"] == '0')
	{
		echo '<td><a href="index.php?module=terceros&section=buscar&action=verficha&idtercero='.$coltercero["idtercero"].'" <i style="font-size: 40px;" class="fa fa-fw fa-user"></i></td>';	
	}
	else
	{	
		echo '<td><a href="index.php?module=terceros&section=buscar&action=vercontacto&idcontacto='.$coltercero["idcontacto"].'" <i style="font-size: 40px;" class="fa fa-fw fa-user"></i></td>';
	}
	echo '<td><b>'.$lbl_nombre.'</b> </br>'.$lbl_razonsocial.'</td>';
	
	if($coltercero["email"] <> '')
	{
		$icono_email = '<a href="mailto:'.$coltercero["email"].'"<i style="font-size: 40px;" class="fa fa-fw fa-envelope"></i></a>';
	}
	
	
	echo '<td>'.$icono_email.'</td>';
	echo '<td><a href="tel:'.$coltercero["tel"].'"<i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a></td>';
	echo '</tr>';
	
	
	
	}

	echo '</table>';
}

?>



