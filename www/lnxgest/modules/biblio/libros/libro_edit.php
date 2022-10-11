<?php
$idlibro = $_GET["idlibro"];


$sqllibro= $mysqli->query("select * from ".$sqlpfxbiblio."libros where id = '".$idlibro."'");
$row = mysqli_fetch_assoc($sqllibro);
$dblibro = $row['libro'];

$dbidautor = $row['idautor'];
$dbididioma = $row['ididioma'];
$dbidcategoria = $row['idcategoria'];
$dbisbn = $row['isbn'];
$dbcodigo = $row['codigo'];
$dbprestar = $row['prestar'];
$dbnotas = $row['notas'];

echo '<p>';
echo '<a class="btnenlacecancel" href="index.php?module=biblio&section=libros&action=del&idlibro='.$idlibro.'">Eliminar</a>';
echo '</p>';
?>
<form name="form1" method="post" action="index.php?module=biblio&section=libros&action=save">
<input name="haccion" type="hidden" value="update" />
<input name="hidlibro" type="hidden" value="<?php echo $idlibro; ?>" />

<div class="row">
	<div class="col-sm-2">
		Titulo
	</div>
	<div class="col">
		<input type="text" name="txtlibro" value="<?php echo $dblibro; ?>" maxlength="50" required="" class="campoencoger">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		codigo
	</div>
	<div class="col">
		<input type="text" name="txtcodigo" value="<?php echo $dbcodigo; ?>" maxlength="20" class="campoencoger">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		ISBN
	</div>
	<div class="col">
		<input type="text" name="txtisbn" value="<?php echo $dbisbn; ?>" maxlength="50" class="campoencoger"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Autor
	</div>
	<div class="col">
	  <select name="lstautores" style="width: 100%;">
  <?php
  if ($dbidautor == '0'){$selecionado = 'selected=""';}else{$selecionado = '';}
	echo '<option value="0" '.$selecionado.'>--Seleccione un autor--</option>';
  
    $cnssql = "SELECT * FROM ".$sqlpfxbiblio."autores order by autor";
	$ConsultaMySql= $mysqli->query($cnssql);
	while($cnsaux = mysqli_fetch_array($ConsultaMySql))
	{
		if ($dbidautor == $cnsaux["id"]){$selecionado = 'selected=""';}else{$selecionado = '';}
		echo '<option value="'.$cnsaux["id"].'" '.$selecionado.'>'.$cnsaux["autor"].'</option>';
	}
  ?>
  </select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Idioma
	</div>
	<div class="col">
	  <select name="lstidiomas" style="width: 100%;">
  <?php
  if ($dbididioma == '0'){$selecionado = 'selected=""';}else{$selecionado = '';}
	echo '<option value="0" '.$selecionado.'>--Seleccione un idioma--</option>';
	
  
    $cnssql = "SELECT * FROM ".$prefixsql."dic_idiomas order by idioma";
	$ConsultaMySql= $mysqli->query($cnssql);
	while($cnsaux = mysqli_fetch_array($ConsultaMySql))
	{
		if ($dbididioma == $cnsaux["id"]){$selecionado = 'selected=""';}else{$selecionado = '';}
		echo '<option value="'.$cnsaux["id"].'" '.$selecionado.'>'.$cnsaux["idioma"].'</option>';
	}
  ?>
  </select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Categoria
	</div>
	<div class="col">
	  <select name="lstcategorias" style="width: 100%;">
  <?php
  if ($dbidcategoria == '0'){$selecionado = 'selected=""';}else{$selecionado = '';}
	echo '<option value="0" '.$selecionado.'>--Seleccione una categoria--</option>';
	
  
    $cnssql = "SELECT * FROM ".$sqlpfxbiblio."categorias order by categoria";
	$ConsultaMySql= $mysqli->query($cnssql);
	while($cnsaux = mysqli_fetch_array($ConsultaMySql))
	{
		if ($dbidcategoria == $cnsaux["id"]){$selecionado = 'selected=""';}else{$selecionado = '';}
		echo '<option value="'.$cnsaux["id"].'" '.$selecionado.'>'.$cnsaux["categoria"].'</option>';
	}
  ?>
  </select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		
	</div>
	<div class="col">
 <?php
  if ($dbprestar == '1'){$marcado = 'checked=""';}else{$marcado = '';}
  echo '<label><input name="chkprestar" type="checkbox" value="1" '.$marcado.'> Disponible para prestamo </label>';

  ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Notas
	</div>
	<div class="col">
<textarea name="txtnotas" style="width: 100%;" cols="50" rows="5" id="txtnotas"><?php echo $dbnotas; ?></textarea>
	</div>
</div>


<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=biblio&section=libros" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>


</form>

<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<th>Prestado</th>
<th>Persona</th>
<th>Entregado</th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."biblio_prestamos where idlibro = '".$idlibro."'");	
while($col = mysqli_fetch_array($cnssql))
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idusuario"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_nombreusuario = $rowaux["nombre"];

	
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	echo '<td>'.$col["fechaout"].'</td>';
	echo '<td>'.$lbl_nombreusuario.'</td>';
	echo '<td>'.$col["fechain"].'</td>';
	echo '</tr>';
    
}

?>

</table>
</div>