<?php
$idautor = $_GET["idautor"];


$sqlautor= $mysqli->query("select * from ".$sqlpfxbiblio."autores where id = '".$idautor."'");
$row = mysqli_fetch_assoc($sqlautor);
$dbautor = $row['autor'];

echo '<a class="btnenlacecancel" href="index.php?module=biblio&section=autores&action=del&idautor='.$idautor.'">Eliminar</a>';
?>
<form name="form1" method="post" action="index.php?module=biblio&section=autores&action=save">
<input name="haccion" type="hidden" value="update">
<input name="hidautor" type="hidden" value="<?php echo $idautor; ?>">

<div class="row">
	<div class="col-sm-2">
		Nombre
	</div>
	<div class="col">
		<input type="text" name="txtautor" maxlength="50" value="<?php echo $dbautor; ?>" required="" class="campoencoger">
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=biblio&section=autores" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>
</form>
