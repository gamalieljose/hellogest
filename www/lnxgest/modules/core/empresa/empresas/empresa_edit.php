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
$idempresa = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."'");
$rowaux = mysqli_fetch_assoc($sqlaux);

$dbactivo = $rowaux["activo"];
$dbrazonsocial = $rowaux["razonsocial"];
$dbnomcomercial = $rowaux["nomcomercial"];
$dbnif = $rowaux["nif"];
$dbidpais = $rowaux["idpais"];
$dbidprov = $rowaux["idprov"];
$dbcp = $rowaux["cp"];
$dbpobla = $rowaux["pobla"];
$dbdir = $rowaux["dir"];
$dbtel = $rowaux["tel"];
$dbemail = $rowaux["email"];

$dbresponsable = $rowaux["responsable"];
$dbnifresponsable = $rowaux["nifresponsable"];

$dbcontabilidad = $rowaux["contabilidad"];

$dbrm = $rowaux["regmer"];

?>

<p><?php echo '<a href="index.php?module=core&section=empresas&action=del&id='.$idempresa.'" class="btnenlacecancel" >'.LABEL_BTN_DEL.'</a>'; ?></p>

<form name="form1" method="POST" action ="index.php?module=core&section=empresas&action=save">
<input type="hidden" name="haccion" value="update"/>
<?php echo '<input type="hidden" name="hidempresa" value="'.$idempresa.'."/>'; ?>
<div class="row">
  <div class="col maintitle">
	<?php echo LABEL_EDITEMPRESA; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  
  </div>
  <div class="col" align="left">
  <?php
  if($dbactivo == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
  echo '<input type="checkbox" name="chkactivo" value="1" '.$seleccionado.'/> '.LABEL_EMPRESAACTIVA;
  ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_RAZONSOCIAL; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtrazonsocial" value="<?php echo $dbrazonsocial; ?>" maxlength="50" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_NOMCOMERCIAL; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtnomcomercial" value="<?php echo $dbnomcomercial; ?>" maxlength="50" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
  <?php echo LABEL_NIF; ?>
  </div>
  <div class="col" align="left">
	<input type="text" name="txtnif" value="<?php echo $dbnif; ?>" maxlength="15" required="" style="width: 100%;"/>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" value="<?php echo $dbtel; ?>" maxlength="20" required="" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" value="<?php echo $dbemail; ?>" maxlength="100" type="text" style="width: 100%;">
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
		
		if($dbidprov == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["provincia"].'</option>';
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
    <input name="txtdir" value="<?php echo $dbdir; ?>" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtcp" id="txtcp" value="<?php echo $dbcp; ?>" maxlength="10" type="text" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input name="txtpobla" id="txtpobla" value="<?php echo $dbpobla; ?>" maxlength="50" type="text" style="width: 100%;">
  </div>
  
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Registro Mercantil
  </div>
  <div class="col" align="left">
    <input name="txtrm" id="txtrm" maxlength="250" type="text" value="<?php echo $dbrm; ?>" style="width: 100%;" />
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
    <input name="txtresponsable" value="<?php echo $dbresponsable; ?>" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    NIF Responsable
  </div>
  <div class="col" align="left">
    <input name="txtresponsablenif" value="<?php echo $dbnifresponsable; ?>" maxlength="15" type="text" style="width: 100%;">
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
<?php
if($dbcontabilidad == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="checkbox" name="chkcontabilidad" value="1" '.$seleccionado.'> Habilitar contabilidad</label>';
?>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=empresas"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>

</form>