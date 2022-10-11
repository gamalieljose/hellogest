<script src="core/com/js_terceros_all.js"></script>
<?php
$flsttercero = $_POST["lsttercero"];
if ($flsttercero == "" || $flsttercero == 0)
{
	$flsttercero = $_COOKIE["lnxit_idtercero"];
}
else
{
	setcookie("lnxit_idtercero", $flsttercero);
}
?>

					   
<form name="form1" action="index.php?module=lnxit&section=infopass&action=save" method="post">


<input type="hidden" name="haccion" value="new">
<div class="row">
   <div class="col maintitle">
	NUEVO - Datos infopass
   </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{                  
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">

  <div class="col-sm-2" align="left">
    usuario
  </div>
  <div class="col" align="left">

<input type="text" maxlength="50" name="txtusuario" required="" class="campoencoger">

  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Password
  </div>
  <div class="col" align="left">
	<input type="text" maxlength="50" name="txtpassword" required="" style="width: 100%;" />
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail aosciado
  </div>
  <div class="col" align="left">
        <input type="text" maxlength="50" name="txtemail" style="width: 100%;" />
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Donde
  </div>
  <div class="col" align="left">
        <input type="text" maxlength="50" name="txtdonde" style="width: 100%;" />
  </div>
 </div> 
<div class="row">
<div class="col-sm-2" align="left">
  URL web
</div>
<div class="col" align="left">

<input type="text" maxlength="255" name="txturlweb" placeholder="http:// Ruta acceso web" style="width: 100%;" />

</div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
        <textarea maxlength="50" name="txtnotas" style="width: 100%;" ></textarea> 
  </div>
</div>
<div class="row">
   <div class="col maintitle">
	Permisos de acceso
   </div>   
</div>



<div class="row">
   <div class="col-sm" align="left">
<b>Usuarios autorizados </b></br>

<table width="100%">
<?php

$cnssql = "SELECT * FROM ".$prefixsql."users order by display";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
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
	
	if($cat["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	
	echo '<td><input type="checkbox" name="chkusuario" value="'.$cat["id"].'" '.$seleccionado.'> '.$cat["display"].'</td>
	<tr>';
	
}
?>
</table>

</div>
<div class="col-sm" align="left">

<b>Grupos autorizados</b></br>


<table width="100%">
<?php

$cnssql = "SELECT * FROM ".$prefixsql."groups order by grupo";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
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
	echo '<td><input type="checkbox" name="chkgrupo" value="'.$cat["id"].'"> '.$cat["grupo"].'</td>
	<tr>';
	
}
?>
</table>

</div>




<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=infopass">Cancelar</a>
</div>

</form>
