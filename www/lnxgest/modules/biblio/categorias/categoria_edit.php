<?php
$idcategoria = $_GET["idcategoria"];


$sqlautor= $mysqli->query("select * from ".$sqlpfxbiblio."categorias where id = '".$idcategoria."'");
$row = mysqli_fetch_assoc($sqlautor);
$dbcategoria = $row['categoria'];

echo '<a class="btnenlacecancel" href="index.php?module=biblio&section=categorias&action=del&idcategoria='.$idcategoria.'">Eliminar</a>';
?>
<form name="form1" method="post" action="index.php?module=biblio&section=categorias&action=save">
<input name="haccion" type="hidden" value="update">
<input name="hidcategoria" type="hidden" value="<?php echo $idcategoria; ?>">

<div class="row">
	<div class="col-sm-2">
		Nombre categoria
	</div>
	<div class="col">
		<input type="text" name="txtcategoria" value="<?php echo $dbcategoria; ?>" maxlength="50" required="" class="campoencoger">
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=biblio&section=categorias" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>
</form>
