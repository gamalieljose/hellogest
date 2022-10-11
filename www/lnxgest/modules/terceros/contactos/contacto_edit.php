<?php
$dbeditcontacto = $_GET["id"];

$cnssql= $mysqli->query("select count(*) as contador from ".$prefixsql."terceroscontacxtra where idcontacto = '".$dbeditcontacto."'");	
$row = mysqli_fetch_assoc($cnssql);
$dbcampospersomax = $row["contador"];

?>

<script languague="javascript">

var iddivcp = '<?php echo $dbcampospersomax;?>';
iddivcp = iddivcp -1;

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
$dbeditcontacto = $_GET["id"];
$dbeditextra = $_GET["editextra"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$dbeditcontacto."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbnombre = $row['nombre'];
$dbcargo = $row['cargo'];
$dbtel = $row['tel'];
$dbemail = $row['email'];
$dbididioma = $row['ididioma'];
$dbiddir = $row['iddir'];
$dblnxpublic = $row['lnxpublic'];
$dbusuariopublic = $row['usuariopublic'];
$dbcontrasena = $row['contrasena'];

$dblbltel2 = $row['lbltel2'];
$dbtel2 = $row['tel2'];
$dblbltel3 = $row['lbltel3'];
$dbtel3 = $row['tel3'];

$dbactivo = $row["activo"];

  	 	

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresa where campo = 'lnxpublic'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbelnxpublic = $row["valor"];

$id = $_GET["id"]; //idterecro
$hidregistro = $_GET["hidregistro"]; //idregistro
$htabla = $_GET["htabla"]; //tabla



echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=contactos&action=save&idtercero='.$idtercero.'">'; 
	
	if($_GET["upd"] == "ate")
	{
	echo '<div class="animated fadeOut" align="center" style="width:100%; ba">
	Cambios aplicados con éxito
	</div>';
	}

?>
<div class="row">
  <div class="col maintitle" align="left">
    Editando contacto
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
<?php
  if ($dbactivo == '1'){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	echo '<label><input type="checkbox" value="1" name="chkactivo" '.$seleccionado.'> Activo</label>';
?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Nombre
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbnombre.'" name="txtnombre" required="" class="campoencoger">'; ?>
	
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Cargo
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="30" value="'.$dbcargo.'" name="txtcargo" style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="20" value="'.$dbtel.'" name="txttel" style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    <input type="text" value="<?php echo $dblbltel2; ?>" maxlength="20" placeholder="Telefono 2" name="txtlabeltel2" style="width: 100%; background-color: #e1dfdf"" />
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbtel2; ?>" maxlength="20" name="txttel2" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    <input type="text" value="<?php echo $dblbltel3; ?>" maxlength="20" placeholder="Telefono 3" name="txtlabeltel3" style="width: 100%; background-color: #e1dfdf"" />
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbtel3; ?>" maxlength="20" name="txttel3" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="50" value="'.$dbemail.'" name="txtemail" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Ref. Direccion
  </div>
  <div class="col" align="left">
	<select name="lstdircontacto" style="width: 100%;">
		<?php 
		if ($dbiddir == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}

		echo '<option value="0" '.$seleccionado.'>-sin especificar-</option>';

		$sqldir = $mysqli->query("SELECT * from ".$prefixsql."tercerosdir where idtercero = '".$idtercero."' order by referencia");
		while($col = mysqli_fetch_array($sqldir))
		{
			if ($dbiddir == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["referencia"].'</option>';
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
		<?php
		if ($dbididioma == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="0" '.$seleccionado.'>-sin especificar-</option>';

		$sqldic = $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas order by idioma");
		while($col = mysqli_fetch_array($sqldic))
		{
			if ($dbididioma == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["idioma"].'</option>';
		}
		?>
		</select>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">
<?php
if(lnx_check_perm(2007) > '0') //Tiene permisos para editar
{
	echo '<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> ';
	echo '<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> ';
}

echo ' <a href="index.php?module=terceros&section=contactos&idtercero='.$idtercero.'" class="btncancel">Cancelar</a>'; ?>

</div>
<?php



		echo '<input type="hidden" name="haccion" value="update">';
		echo '<input type="hidden" name="hdbeditcontacto" value="'.$dbeditcontacto.'">';
		echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">';
		
		
$dbelnxpublic = "no";
if ($dbelnxpublic == "yes" )
{
	
	
	//LNXPUBLIC
	echo '<div align="center">';
	echo '<table class="msgaviso">';
	echo '<tr class="maintitle"><td colspan="2">Acceso LNXgest Public</td></tr>';
	echo '<tr>
		<td>Permitir acceso</td>
		<td>';
			
			echo '<select name="sltactivo">';
			if($dblnxpublic == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
				echo '<option value="0" >NO</option>';
			if($dblnxpublic == '1'){$seleccionado = 'selected=""';}else{$seleccionado = '';}			
				echo '<option value="1" '.$seleccionado.'>SI</option>';
			echo '</select>';
			
			
		echo '</td>
		</tr>';
	echo '<tr>
		<td>login</td>
		<td>'.$dbusuariopublic.'</td>
		</tr>';
	echo '<tr>
		<td>Password</td>
		<td><input type="password" value="'.$dbcontrasena.'" name="txtcontrasena"></td>
		</tr>';
	echo '<tr class="maintitle"><td colspan="2">Permisos</td></tr>';
	echo '<tr><td colspan="2"><input type="checkbox" name="chkp1" value="1"> - Acceso a facturas de venta</td></tr>';
	echo '<tr><td colspan="2"><input type="checkbox" name="chkp2" value="1"> - Acceso a presupuestos de venta</td></tr>';
	echo '</table>';
	echo '</div>';
}


?>

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
<?php
$dbcp_iddiv = -1;
$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontacxtra where idcontacto = '".$dbeditcontacto."'");	
while($col = mysqli_fetch_array($cnssql))
{
	
			
	if($col["tipocampo"] == '1')
	{
		$dbcp_iddiv = $dbcp_iddiv +1;
		//Campos tipo texto
		echo '<div id="divcp_'.$dbcp_iddiv.'" class="row">
		<div class="col-sm-2">
		<input type="hidden" value="TEXTO" name="di_tipo[]"/> <input name="di_label[]" type="text" maxlength="50" placeholder="Nombre campo" value="'.$col["labelcampo"].'" style="width: 100%; background-color: #e1dfdf"/> 
		</div> 
		<div class="col"> 
		<input name="di_valor[]" type="text" value="'.$col["valorcampo"].'" maxlength="50" style="width: 100%;"/> 
		</div> 
		<div class="col-sm-1">
		<a href="#" onclick="borracampoextra('.$dbcp_iddiv.');" maxlength="50" class="btnenlacecancel">Borrar</a>
		</div>
		</div>';
	}
	if($col["tipocampo"] == '2')
	{
		if($col["valorcampo"] == "YES"){$seleccionado = 'checked=""';}else{$seleccionado = '';}
		$dbcp_iddiv = $dbcp_iddiv +1;
		//Campos tipo SI/NO
		echo '<div id="divcp_'.$dbcp_iddiv.'" class="row"> 
		<div class="col-sm-2">
		<input type="hidden" value="SINO" name="di_tipo[]"/> 
		</div> 
		<div class="col" align="right">
		<input name="di_valor[]" type="checkbox" value="YES" '.$seleccionado.'/> 
		<input name="di_label[]" type="text" value="'.$col["labelcampo"].'" maxlength="50" placeholder="Nombre campo" style="width: Calc(100% - 25px);"/> 
		</div> 
		<div class="col-sm-1">
		<a href="#" onclick="borracampoextra('.$dbcp_iddiv.');" class="btnenlacecancel">Borrar</a>
		</div>
		</div>';
	}
}
?>
</div>


</form>




