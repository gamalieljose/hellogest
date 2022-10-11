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
echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=etiendas&action=delete&id='.$_GET["id"].'">Eliminar</a></p>';

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtienda = $row["tienda"];
$dbidempresa = $row["idempresa"];

$dbtel = $row["tel"];
$dbemail = $row["email"];
$dbidpais = $row["idpais"];
$dbidprov = $row["idprov"];
$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];


?>

<form id="form1" name="form1" method="post" action="index.php?module=core&section=etiendas&action=save">
<input type="hidden" name="haccion" value="update">

<?php echo '<input type="hidden" name="hidtienda" value="'.$_GET["id"].'">'; ?>
<div class="row">
  <div class="col maintitle">
	Editando tienda
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
		if($colter["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
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
  <input name="txttienda" value="<?php echo $dbtienda; ?>" type="text" required="" maxlength="50" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" value="<?php echo $dbtel; ?>" maxlength="20" type="text" style="width: 100%;">
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

<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=etiendas"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>
</form>

<div class="row">
  <div class="col maintitle">
	Cajas
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Nueva Caja / Terminal
  </div>
  <div class="col" align="left">
  <form id="frmaddterminal" name="frmaddterminal" method="post" action="index.php?module=core&section=etiendas&action=saveterm">
<input type="hidden" name="haccion" value="new">

<?php echo '<input type="hidden" name="hidtienda" value="'.$_GET["id"].'">'; ?>
  <input name="txtterminal" value="<?php echo $dbcaja; ?>" type="text" required="" maxlength="10" style="width: Calc(100% - 100px);">
  <input type="submit" class="btnedit_verde" value="Agregar" />
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Almacen asociado
  </div>
  <div class="col" align="left">
	<select name="lstalmacen" style="width: 100%;">
<?php
$cnsseries = $mysqli->query("select * From ".$prefixsql."almacenes order by almacen");
while($colter = mysqli_fetch_array($cnsseries))
	{
		if($colter["dft"] == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["almacen"].'</option>'; 
	}
?>
	</select>
  </div>
</div>
</form>
<p>&nbsp;</p>

<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Caja / Terminal</td>
<td>Almacen asociado</td>
<td width="80"> </td>
</tr>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."pos_terminales where idtienda = '".$_GET["id"]."' order by descripcion");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a href="index.php?module=core&section=etiendas&action=editterm&id='.$columna["id"].'" class="btnedit" >Editar</a></td>';
	echo '<td>'.$columna["descripcion"].'</td>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."almacenes where id = '".$columna["idalmacen"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbnomalmacen = $rowaux["almacen"];
	
	
	echo '<td>'.$dbnomalmacen.'</td>';
	echo '<td><a href="index.php?module=core&section=etiendas&action=delterm&id='.$columna["id"].'" class="btnenlacecancel" >Eliminar</a></td>';
	echo '</tr>';
}
?>



</table>



