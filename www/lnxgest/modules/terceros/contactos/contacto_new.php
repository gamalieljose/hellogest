<script languague="javascript">

var iddivcp = 0;

function newcampo_texto() 
{
	iddivcp = iddivcp +1;
	var div = document.createElement('div');
	 
	div.innerHTML = '<div id="divcp_' + iddivcp + '" class="row"><div class="col-sm-2"><input type="hidden" value="TEXTO" name="di_tipo[]"/> <input name="di_label[]" type="text" maxlength="50" placeholder="Nombre campo" style="width: 100%; background-color: #e1dfdf""/> </div> <div class="col"> <input name="di_valor[]" type="text" maxlength="50" style="width: 100%;"/> </div><div class="col-sm-1"><a href="#" onclick="borracampoextra(' + iddivcp + ');" class="btnenlacecancel">Borrar</a></div></div>';
	document.getElementById('div_camposextra').appendChild(div);document.getElementById('div_camposextra').appendChild(div);
}

function newcampo_sino() 
{
	iddivcp = iddivcp +1;
	var div = document.createElement('div');

	div.innerHTML = '<div id="divcp_' + iddivcp + '" class="row"><div class="col-sm-2"><input type="hidden" value="SINO" name="di_tipo[]"/> </div> <div class="col" align="right"><input name="di_valor[]" type="checkbox" value="YES"/> <input name="di_label[]" type="text" maxlength="50" placeholder="Nombre campo" style="width: Calc(100% - 25px);"/> </div> <div class="col-sm-1"><a href="#" onclick="borracampoextra(' + iddivcp + ');" class="btnenlacecancel">Borrar</a></div></div>';
	document.getElementById('div_camposextra').appendChild(div);document.getElementById('div_camposextra').appendChild(div);
}

function borracampoextra(idcampoextra) 
{
	
	var divborrar = 'divcp_' + idcampoextra;
	
	let node = document.getElementById(divborrar);
	if (node.parentNode) {
	node.parentNode.removeChild(node);
	}

}

</script>

<?php

include("modules/terceros/botones.php");

$idtercero = $_GET["idtercero"];

$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

echo '<p>Tercero: <b>'.$lbl_tercero.'</b></p>';

echo '<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="index.php?module=terceros&section=contactos&action=save&idtercero='.$idtercero.'">';

?>


<div class="row">
  <div class="col maintitle" align="left">
    Nuevo contacto
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <label><input type="checkbox" value="1" name="chkactivo" checked=""> Activo</label>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Nombre
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="50" name="txtnombre" required="" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Cargo
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="30" name="txtcargo" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="20" name="txttel" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    <input type="text" maxlength="20" name="txtlabeltel2" placeholder="Telefono 2" style="width: 100%; background-color: #e1dfdf" />
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="20" name="txttel2" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    <input type="text" maxlength="20" name="txtlabeltel3" placeholder="Telefono 3" style="width: 100%; background-color: #e1dfdf"" />
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="20" name="txttel3" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input type="text" value="" maxlength="50" name="txtemail" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Ref. Direccion
  </div>
  <div class="col" align="left">
	<select name="lstdircontacto" style="width: 100%;">
		<option value="0" selected="">-sin especificar-</option>
		<?php
		$sqldir = $mysqli->query("SELECT * from ".$prefixsql."tercerosdir where idtercero = '".$idtercero."' order by referencia");
		while($col = mysqli_fetch_array($sqldir))
		{
			echo '<option value="'.$col["id"].'">'.$col["referencia"].'</option>';
		}
		?>
		</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Idioma
  </div>
  <div class="col" align="left">
	<select name="lstidioma" style="width: 100%;">
		<option value="0" selected="">-sin especificar-</option>
		<?php
		$sqldic = $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas order by idioma");
		while($col = mysqli_fetch_array($sqldic))
		{
			echo '<option value="'.$col["id"].'">'.$col["idioma"].'</option>';
		}
		?>
		</select>
  </div>
</div>

<div class="row">
<div class="col maintitle">
Campos personalizados
</div>
</div>
<div class="row">
<div class="col">
<a href="#" onclick="newcampo_texto();" class="btnedit">Agregar campo texto</a> <a href="#" onclick="newcampo_sino();" class="btnedit">Agregar campo SI/NO</a>
</div>
</div>

<div id="div_camposextra">
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo ' <a href="index.php?module=terceros&section=contactos&idtercero='.$_GET["idtercero"].'" class="btncancel">Cancelar</a>'; ?>

</div>

	
	
	<input type="hidden" name="haccion" value="new">
	<input type="hidden" name="hidtercero" value="'.$idtercero.'">
	


</form>

