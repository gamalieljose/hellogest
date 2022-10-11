<?php

?>

					   
<form name="form1" action="index.php?module=lnxit&section=colas&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="new">

<div class="row">
    <div class="col-sm-2" align="left">
        Nombre de la cola
    </div>
    <div class="col" align="left">
		<input type="text" maxlength="50" required="" value="" name="txtcola" class="campoencoger" />
    </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Usuarios
  </div>
  <div class="col" align="left">
<?php

$cnssql = "SELECT * FROM ".$prefixsql."users where activo = '1' order by display";
$ConsultaMySql= $mysqli->query($cnssql);

while($cat = mysqli_fetch_array($ConsultaMySql))
{

		
	echo '<label><input type="checkbox" name="chkusuario[]" value="'.$cat["id"].'" /> '.$cat["display"].'</label></br>';
	
}
?>
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=colas">Cancelar</a>
</div>

</form>
