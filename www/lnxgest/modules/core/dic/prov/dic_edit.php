<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbprovincia = $row['provincia'];
$dbidpais = $row['idpais'];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=prov&action=del&id='.$iddic.'">Eliminar</a></p>';


?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=prov&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>


<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbprovincia.'" name="txtprovincia" required="" class="campoencoger">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="lstpais" class="campoencoger">
	<?php

	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");


	while($columna = mysqli_fetch_array($ConsultaMySql))
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