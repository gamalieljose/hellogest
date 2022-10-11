<?php

?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=prov&action=save" method="post">
<input type="hidden" name="haccion" value="new">



<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="" name="txtprovincia" required="" class="campoencoger">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="lstpais" class="campoencoger">
	<?php

	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresa where campo = 'tbl_pais'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbidpais = $row['valor'];

	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");

	

	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["id"] == $dbidpais)
		{echo '<option value="'.$columna["id"].'" selected>'.$columna["pais"].'</option>';}
		else
		{echo '<option value="'.$columna["id"].'">'.$columna["pais"].'</option>';}
		
	}
	?>
	</select>

  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=prov">Cancelar</a>

</div>




</form>