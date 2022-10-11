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
<script type="text/javascript">
function calculacp() {

var wpobla = document.getElementById("txtpobla").value;
	if (wpobla == '') 
	{

	   var wcp = document.getElementById("txtcp").value;
	   var wpais = document.getElementById("cbpais").value;

	   $.ajax({

			 type   : 'POST',
			 url     : "modules/terceros/ajax/ajx_cp.php",
			 data    : {cp : wcp, idpais : wpais},
							 
			 success : function (resultado) {

			 // response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var xpobla = response["poblacion"];
			var xidprov = response["idprov"];
						
			 
			 document.getElementById("txtpobla").value = xpobla;
			 if(xidprov > 0)
			 {
			 document.getElementById("cbprovincias").value = xidprov;
			 }
					

			 }

		});
	} 
}
</script>
<?php
//obtener pais defecto

//si solo existe una empresa, obtener el idpais de ahi, sino seleccionar el primer pais existente en la tabla paises
$sqlempresas = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."empresas where activo = '1'");
$row = mysqli_fetch_assoc($sqlempresas);
$cuentaempresas = $row["contador"];

if($cuentaempresas == '1')
{
  $sqlempresas = $mysqli->query("SELECT * FROM ".$prefixsql."empresas where activo = '1' limit 1");
  $row = mysqli_fetch_assoc($sqlempresas);
  $dbidpais = $row["idpais"];
}
else 
{
  $sqlempresas = $mysqli->query("SELECT * FROM ".$prefixsql."paises limit 1");
  $row = mysqli_fetch_assoc($sqlempresas);
  $dbidpais = $row["id"];
}

?>
<form id="form1" name="form1" method="post" action="index.php?module=core&section=etiendas&action=save">
<input type="hidden" name="haccion" value="new">

<div class="row">
  <div class="col maintitle">
	Nueva tienda
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Empresa
  </div>
  <div class="col" align="left">
	<select name="lstempresa" class="campoencoger">
<?php
$cnsseries = $mysqli->query("select * From ".$prefixsql."empresas order by razonsocial");
while($colter = mysqli_fetch_array($cnsseries))
	{
		echo '<option value="'.$colter["id"].'">'.$colter["razonsocial"].'</option>'; 
	}
?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Tienda
  </div>
  <div class="col" align="left">
  <input name="txttienda" value="" type="text" required="" maxlength="50" class="campoencoger">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" maxlength="20" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" maxlength="100" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
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
    <select name="cbprovincias" id="cbprovincias" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
		echo '<option value="'.$col["id"].'">'.$col["provincia"].'</option>';
	}
	?>
	</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Direccion
  </div>
  <div class="col" align="left">
    <input name="txtdir" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtcp" id="txtcp" maxlength="10" type="text" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input name="txtpobla" id="txtpobla" maxlength="50" type="text" style="width: 100%;">
  </div>
  
</div>


<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=etiendas"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>


</form>
