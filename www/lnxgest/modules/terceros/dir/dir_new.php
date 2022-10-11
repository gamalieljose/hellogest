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
					//document.getElementById("txtpobla").value = resultado;

			 }

		});
	} 
}
</script>
<?php

include("modules/terceros/botones.php");
echo '<p></p>';
$idtercero = $_GET["idtercero"];

echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=dir&action=save&idtercero='.$idtercero.'">';

?>


<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" checked="checked" name="chkactivo" value="1" /> Activo
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Referencia
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtreferencia" required="" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Direccion
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtdir" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
  <?php
//obtener pais y provincia por defecto del usuario
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."userstiendas WHERE iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1'");
$row = mysqli_fetch_assoc($buscapais);
$dbidtiendauser = $row["idtienda"];

$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."tiendas WHERE id = '".$dbidtiendauser."' ");
$row = mysqli_fetch_assoc($buscapais);
$dbidpais = $row["idpais"];
$dbidprov = $row["idprov"];
		
	?>
  
  
  
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"] ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
    
    if($dbidprov == $col["id"] ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
    <input type="text" value="" name="txtcp" id="txtcp" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtpobla" id="txtpobla" style="width: 100%;">
  </div>
</div>



<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txttel" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <textarea name="txtnotas"></textarea style="width: 100%; height: 300px ">
  </div>
</div>

  



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo ' <a href="index.php?module=terceros&section=dir&idtercero='.$idtercero.'" class="btncancel" >Cancelar</a>'; ?>

</div>


	<input type="hidden" name="haccion" value="new">
	<?php echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">'; ?>

</form>

