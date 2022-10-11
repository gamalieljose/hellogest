<?php

	$idtipocuenta = $_GET["id"];
	
	$sqltipobanco= $mysqli->query("select * from ".$prefixsql."bancostipo where id = '".$idtipocuenta."'");
	$row = mysqli_fetch_assoc($sqltipobanco);
	$dbtipo = $row["tipo"];
	


echo '<p><a class="btnenlacecancel" href="index.php?module=bancos&section=tiposcuenta&action=del&id='.$idtipocuenta.'">Eliminar</a></p>';

echo '<form name="form1" action="index.php?module=bancos&section=tiposcuenta&action=save&id='.$idtipocuenta.'" method="post">';
?>
<input type="hidden" name="haccion" value="update">
<input type="hidden" name="hidtipocuenta" value="<?php echo $idtipocuenta; ?>">

<div class="row">
	<div class="col-sm-2" align="left">
	Tipo Cuenta
	</div>
	<div class="col" align="left">
	<input type="text" name="txttipocuenta" value="<?php echo $dbtipo; ?>" required="" class="campoencoger">
	</div>
</div>



<div align="center" class="rectangulobtnsguardar">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=bancos&section=tiposcuenta" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>
</form>


