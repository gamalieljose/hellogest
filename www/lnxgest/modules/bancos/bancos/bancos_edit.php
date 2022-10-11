<?php

	$idbanco = $_GET["idbanco"];
	
	$sqltipobanco= $mysqli->query("select * from ".$prefixsql."bancos where id = '".$idbanco."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$nombrebanco = $row['banco'];
	


echo '<p><a class="btnenlacecancel" href="index.php?module=bancos&section=bancos&action=del&idbanco='.$idbanco.'">Eliminar</a></p>';

echo '<form name="form1" action="index.php?module=bancos&section=bancos&action=save&idbanco='.$idbanco.'" method="post">';
?>
<input type="hidden" name="haccion" value="update">

<div class="row">
	<div class="col" align="left">
	Editando Banco
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
	Banco
	</div>
	<div class="col" align="left">
	<input type="text" name="txtbanco" value="<?php echo $nombrebanco; ?>" required="" class="campoencoger">
	</div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=bancos&section=bancos">Cancelar</a>

</div>
</form>

