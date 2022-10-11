<?php

?>
<form name="form1" method="post" action="index.php?module=biblio&section=libros&action=save">
<input name="haccion" type="hidden" value="new">

<div class="row">
	<div class="col-sm-2">
		Titulo
	</div>
	<div class="col">
		<input type="text" name="txtlibro" maxlength="50" required="" class="campoencoger">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		codigo
	</div>
	<div class="col">
		<input type="text" name="txtcodigo" maxlength="20" class="campoencoger">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		ISBN
	</div>
	<div class="col">
		<input type="text" name="txtisbn" maxlength="50" class="campoencoger"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Autor
	</div>
	<div class="col">
	  <select name="lstautores" style="width: 100%;">
		<option value="0" selected="">--Seleccione un autor--</option>
	  <?php
		$cnssql = "SELECT * FROM ".$sqlpfxbiblio."autores order by autor";
		$ConsultaMySql= $mysqli->query($cnssql);
		while($cnsaux = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<option value="'.$cnsaux["id"].'" >'.$cnsaux["autor"].'</option>';
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
		<option value="0" selected="">--Seleccione un idioma--</option>
	  <?php
		$cnssql = "SELECT * FROM ".$prefixsql."dic_idiomas order by idioma";
		$ConsultaMySql= $mysqli->query($cnssql);
		while($cnsaux = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<option value="'.$cnsaux["id"].'" >'.$cnsaux["idioma"].'</option>';
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
		<option value="0" selected="">--Seleccione una categoria--</option>
	  <?php
		$cnssql = "SELECT * FROM ".$sqlpfxbiblio."categorias order by categoria";
		$ConsultaMySql= $mysqli->query($cnssql);
		while($cnsaux = mysqli_fetch_array($ConsultaMySql))
		{
			echo '<option value="'.$cnsaux["id"].'" >'.$cnsaux["categoria"].'</option>';
		}
	  ?>
	  </select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		
	</div>
	<div class="col">
  <label><input name="chkprestar" type="checkbox" value="1" checked> Disponible para prestamo </label>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Notas
	</div>
	<div class="col">
<textarea name="txtnotas" style="width: 100%;" cols="50" rows="5" id="txtnotas"></textarea>
	</div>
</div>


<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=biblio&section=libros" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>




</form>
