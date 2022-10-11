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
			 document.getElementById("cbprovincias").value = xidprov;
					

			 }

		});
	} 
}
</script>

<?php
//obtener pais defecto
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."paises limit 1");
$row = mysqli_fetch_assoc($buscapais);
	
$dbidpais = $row["id"];

?>


<form name="form1" method="POST" action ="index.php?module=core&section=empresas&action=save">
<input type="hidden" name="haccion" value="new"/>
<div class="row">
  <div class="col maintitle">
	<?php echo LABEL_NEWEMPRESA; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  
  </div>
  <div class="col" align="left">
	<input type="checkbox" name="chkactivo" value="1" checked=""/> <?php echo LABEL_EMPRESAACTIVA; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_RAZONSOCIAL; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtrazonsocial" maxlength="50" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_NOMCOMERCIAL; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtnomcomercial" maxlength="50" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_NIF; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtnif" maxlength="15" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" maxlength="20" required="" type="text" style="width: 100%;">
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

<div class="row">
  <div class="col-sm-2" align="left">
    Registro Mercantil
  </div>
  <div class="col" align="left">
    <input name="txtrm" id="txtrm" maxlength="250" type="text" value="" style="width: 100%;" />
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Datos responsable
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Responsable
  </div>
  <div class="col" align="left">
    <input name="txtresponsable" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    NIF Responsable
  </div>
  <div class="col" align="left">
    <input name="txtresponsablenif" maxlength="15" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Configuraciones
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Contabilidad
  </div>
  <div class="col" align="left">
    <label><input type="checkbox" name="chkcontabilidad" value="1" > Habilitar contabilidad</label>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=empresas"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>

</form>