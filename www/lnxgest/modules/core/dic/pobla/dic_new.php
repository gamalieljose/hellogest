<script src="scripts/jquery/jquery-2.1.1.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#cbpais").change(function () {
           $("#cbpais option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/terceros/ajax/ajx_pais-prov.php", { elegido: elegido }, function(data){
            $("#cbprovincias").html(data);
            });            
        });
   })
});
</script>

<?php
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($buscapais);
		
$dbidpais = $row["idpais"];
?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=pobla&action=save" method="post">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" class="campoencoger">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["pais"].'</option>';
	}
	?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <select name="cbprovincias" id="cbprovincias" class="campoencoger">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidprov == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["provincia"].'</option>';
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtcp" required="" maxlength="10" type="text" value="" class="campoencoger">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtpobla" required="" maxlength="50" type="text" value="'.$dbpoblacion.'" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=pobla">Cancelar</a>

</div>


</form>