<?php
echo '<p>';
echo '<a class="btnedit" href="index.php?module=biblio&section=libros&action=new">Nuevo libro</a> ';
echo '</p>';

$flstbuscarcampo = $_POST["lstbuscarcampo"];
$ftxtbuscar = $_POST["txtbuscar"];
$flstorden = $_POST["lstorden"];
$flstordenar = $_POST["lstordenar"];
$flstautores = $_POST["lstautores"];
$flstcategorias = $_POST["lstcategorias"];
$flstidiomas = $_POST["lstidiomas"];
$fchkprestamocurso = $_POST["chkprestamocurso"];
$fchknoprestar = $_POST["chknoprestar"];
?>
<form id="formbuscar" name="formbuscar" method="post" action="index.php?module=biblio&section=libros">
<table width="100%">
  <tr class="tblbuscar">
<td align="center">
Campo: 
<?php
	echo '<select name="lstbuscarcampo">';
	if ($flstbuscarcampo == '' || $flstbuscarcampo == 'libro'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="libro" '.$selecionado.'>Titulo</option>';
	if ($flstbuscarcampo == 'codigo'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="codigo" '.$selecionado.'>Codigo</option>';
	if ($flstbuscarcampo == 'id'){$selecionado = " SELECTED";}else{$selecionado = "";}	
		echo '<option value="id" '.$selecionado.'>ID</option>';
	echo '</select>';
	
echo '<input type="text" name="txtbuscar" value="'.$ftxtbuscar.'">';

echo ' ordenar: ';
	echo '<select name="lstorden">';
	if ($flstorden == '' || $flstorden == 'libro'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="libro" '.$selecionado.'>Titulo</option>';
	if ($flstorden == 'codigo'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="codigo" '.$selecionado.'>Codigo</option>';
	if ($flstorden == 'id'){$selecionado = " SELECTED";}else{$selecionado = "";}	
		echo '<option value="id" '.$selecionado.'>ID</option>';
	if ($flstorden == 'idautor'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="idautor" '.$selecionado.'>Autor</option>';
	if ($flstorden == 'idcategoria'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="idcategoria" '.$selecionado.'>Categoria</option>';
	if ($flstorden == 'ididioma'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="ididioma" '.$selecionado.'>Idioma</option>';
	
	echo '</select>';
	
		
	echo '<select name="lstordenar">';
	if ($flstordenar == '' || $flstordenar == 'ASC'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="ASC" '.$selecionado.'>Ascendiente</option>';
	if ($flstordenar == 'DESC'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="DESC" '.$selecionado.'>Descendiente</option>';
	echo '</select>';
?>
<input type="submit" value="Buscar" class="btnsubmit"/>
</td>
<tr class="tblbuscar">
<td align="center">
Autor: 
<?php
echo '<select name="lstautores">';
if ($flstautores == '' || $flstautores == '0'){$selecionado = ' SELECTED';}
echo '<option value="0" '.$selecionado.'>- SIN especificar-</option>';
$cnssqlaux = "SELECT * FROM ".$sqlpfxbiblio."autores order by autor";
$cnsmysqlaux= $mysqli->query($cnssqlaux);
while($rowaux = mysqli_fetch_array($cnsmysqlaux))
{
	if ($flstautores == $rowaux["id"]){$selecionado = ' SELECTED';}else{$selecionado = '';}
	echo '<option value="'.$rowaux["id"].'" '.$selecionado.'>'.$rowaux["autor"].'</option>';
}

echo '</select>';
?>

Categoria: 
<?php
echo '<select name="lstcategorias">';
if ($flstcategorias == '' || $flstcategorias == '0'){$selecionado = ' SELECTED';}
echo '<option value="0" '.$selecionado.'>- SIN especificar-</option>';
$cnssqlaux = "SELECT * FROM ".$sqlpfxbiblio."categorias order by categoria";
$cnsmysqlaux= $mysqli->query($cnssqlaux);
while($rowaux = mysqli_fetch_array($cnsmysqlaux))
{
	if ($flstcategorias == $rowaux["id"]){$selecionado = ' SELECTED';}else{$selecionado = '';}
	echo '<option value="'.$rowaux["id"].'" '.$selecionado.'>'.$rowaux["categoria"].'</option>';
}

echo '</select>';
?>

Idioma: 
<?php
echo '<select name="lstidiomas">';

if ($flstidiomas == '' || $flstidiomas == '0'){$selecionado = ' SELECTED';}
echo '<option value="0" '.$selecionado.'>- SIN especificar-</option>';
$cnssqlaux = "SELECT * FROM ".$prefixsql."dic_idiomas order by idioma";
$cnsmysqlaux= $mysqli->query($cnssqlaux);
while($rowaux = mysqli_fetch_array($cnsmysqlaux))
{
	if ($flstidiomas == $rowaux["id"]){$selecionado = ' SELECTED';}else{$selecionado = '';}
	echo '<option value="'.$rowaux["id"].'" '.$selecionado.'>'.$rowaux["idioma"].'</option>';
}

echo '</select>';
?>
</br>
<?php
if ($fchkprestamocurso == '1'){$selecionado = ' checked';}else{$selecionado = '';}
echo '<input type="checkbox" value="1" name="chkprestamocurso" '.$selecionado.'/> Prestamo en curso ';
if ($fchknoprestar == '1'){$selecionado = ' checked';}else{$selecionado = '';}
echo '<input type="checkbox" value="1" name="chknoprestar" '.$selecionado.'/> Prohibido su prestamo ';
?>
</td>
  </tr>
</table>
</form>

<p></p>
<table>
  <tr>
<td>Leyenda:</td>
    <td bgcolor="#FF9900" >Prestamo en curso </td>
    <td bgcolor="#FF8080" >Prohibido el prestamo</td>
  </tr>
</table>
<p></p>
<?php
//$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."biblio_libros order by id desc");

//ESPECIFICA AUTOR
if($flstautores <> 0){$especifica_autor = " and idautor = '".$flstautores."'";}else{$especifica_autor = "";}

//ESPECIFICA CATEGORIA
if($flstcategorias <> 0){$especifica_categoria = " and idcategoria = '".$flstcategorias."'";}else{$especifica_categoria = "";}

//ESPECIFICA IDIOMA
if($flstidiomas <> 0){$especifica_idioma = " and ididioma = '".$flstidiomas."'";}else{$especifica_idioma = "";}

//PRESTAMO EN CURSO
if ($fchkprestamocurso == '1'){$especifica_prestamocurso = " and idprestamo > '0'";}else{$especifica_prestamocurso = "";}

//PROHIBIDO EL PRESTAMO
if ($fchknoprestar == '1'){$especifica_noprestar = " and prestar = '0'";}else{$especifica_noprestar = " ";}

$sentenciaSQL = "SELECT * FROM ".$sqlpfxbiblio."libros where ".$flstbuscarcampo." like '".$ftxtbuscar."%' ".$especifica_autor." ".$especifica_categoria." ".$especifica_idioma." ".$especifica_prestamocurso." ".$especifica_noprestar." order by ".$flstorden." ".$flstordenar;

$ConsultaMySql= $mysqli->query($sentenciaSQL);

$totalregistros = $ConsultaMySql->num_rows;

?>
<form action="index.php?module=biblio&section=libros&action=docprint" method="post" name="formprint">
<?php echo '<input type="hidden" name="hsql" value="'.$sentenciaSQL.'">'; ?>
<p><input class="btnsubmit" type="submit" name="btnimprimir" value="Imprimir listado"></p>
</form>

<p></p>
<p>Total registros: <?php echo $totalregistros; ?></p>
<p></p>
<table width="100%">
<tr class="maintitle">
<td width="50"></td>
<td width="50">ID</td>
<td width="100">Codigo</td>
<td>libro</td>
<td>Autor</td>
<td>Idioma</td>
<td>Categoria</td>
</tr>

<?php


$ConsultaMySql= $mysqli->query($sentenciaSQL);
$color = '1';
while($cloud = mysqli_fetch_array($ConsultaMySql))
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
	echo '<td width="50"><a class="btnedit" href="index.php?module=biblio&section=libros&action=edit&idlibro='.$cloud["id"].'">Editar</a></td>';
	
$colorprestar = "";
if ($cloud["prestar"] == '0'){$colorprestar = ' bgcolor="#FF8080"';}
if ($cloud["idprestamo"] > '0'){$colorprestar = ' bgcolor="#FF9900"';}
	


	
	echo '<td '.$colorprestar.'>'.$cloud["id"].'</td>';
	echo '<td>'.$cloud["codigo"].'</td>';
		
	echo '<td>'.$cloud["libro"].'</td>';
	
	if($cloud["idautor"] == '0'){$dbauxautor = "";}
	else
	{
	$sqlaux= $mysqli->query("select * from ".$sqlpfxbiblio."autores where id = '".$cloud["idautor"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbauxautor = $rowaux['autor'];
	}
	
	if($cloud["ididioma"] == '0'){$dbauxidioma = "";}
	else
	{
	$sqlaux= $mysqli->query("select * from ".$prefixsql."dic_idiomas where id = '".$cloud["ididioma"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbauxidioma = $rowaux['idioma'];
	}
	
	if($cloud["idcategoria"] == '0'){$dbauxcategoria = "";}
	else
	{
	$sqlaux= $mysqli->query("select * from ".$sqlpfxbiblio."categorias where id = '".$cloud["idcategoria"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbauxcategoria = $rowaux['categoria'];
	}
	
	echo '<td>'.$dbauxautor.'</td>';
	echo '<td>'.$dbauxidioma.'</td>';
	echo '<td>'.$dbauxcategoria.'</td>';

	
	echo '</tr>';
	
	
}
?>

</table>

