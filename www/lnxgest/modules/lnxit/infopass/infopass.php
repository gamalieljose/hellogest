<script src="core/com/js_terceros_all.js"></script>
<?php
$flsttercero = $_POST["lsttercero"];
if ($flsttercero == "" )
{
	$flsttercero = $_COOKIE["lnxit_idtercero"];
}
else
{
	setcookie("lnxit_idtercero", $flsttercero);
}
?>
<div class="tblbuscar" width="100%">
    
<form name="form1" action="index.php?module=lnxit&section=infopass&action=goto" method="post" autocomplete="off">


<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <?php echo '<input type="number" name="txtididinfopass" style="width:80px;"/> '; ?>
        <input type="submit" value="Ir a ID infopass" class="btnedit" />
    </div>
</div>
</form>
<form name="form2" action="index.php?module=lnxit&section=infopass" method="post" autocomplete="off">    
<div class="row">
    <div class="col-sm-2" align="left">
        Buscar
    </div>
    <div class="col" align="left">
        <?php echo '<input type="text" name="txtbuscar" value="'.$_POST["txtbuscar"].'" style="width: 100%;"/>'; ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Ordenar
    </div>
    <div class="col" align="left">
        <select name="lstorden">
<?php
if($_POST["lstorden"] == "id"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="id" '.$seleccionado.'>ID</option>';
if($_POST["lstorden"] == "donde"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="donde" '.$seleccionado.'>Donde</option>';
if($_POST["lstorden"] == "idtercero"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="idtercero" '.$seleccionado.'>Tercero</option>';
?>
</select>
<select name="lstordenad">
<?php
if($_POST["lstordenad"] == "asc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="asc" '.$seleccionado.'>Ascendente</option>';
if($_POST["lstordenad"] == "desc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="desc" '.$seleccionado.'>Descendente</option>';
?>
</select>
    </div>
</div>


    
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
	<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php
if($flsttercero == "0" ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$$seleccionado.'>-sin especificar-</option>';

	//seleciona cliente	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
            if($colter["id"] == $flsttercero ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
    
    
    
    
    
</div>
    
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Buscar" type="submit"> 

</div>
</form>
    
<p><a href="index.php?module=lnxit&section=infopass&action=new" class="btnedit" >Nueva contraseña</a></p>
<?php



$cnssql = "SELECT count(*) as contador FROM ".$prefixsql."it_infopass";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcontador = $row["contador"];

echo '<p>Registrados '.$dbcontador.' contraseñas</p>';

?>
<table width="100%">
<tr class="maintitle">
	<td> </td>
	<td width="80">ID</td>
	<td>donde</td>
	<td>Tercero</td>
</tr>
<?php

if($_POST["lsttercero"] > '0'){$buscacli = " and idtercero = '".$_POST["lsttercero"]."'";}else{$buscacli = "";}

$cnssql = "SELECT * FROM ".$prefixsql."it_infopass where (donde like '%".$_POST["txtbuscar"]."%' or notas like '%".$_POST["txtbuscar"]."%' or usuario like '%".$_POST["txtbuscar"]."%' or urlweb like '%".$_POST["txtbuscar"]."%') ".$buscacli." order by ".$_POST["lstorden"]." ".$_POST["lstordenad"];

	$ConsultaMySql= $mysqli->query($cnssql);
	$color = '1';
	while($infopass = mysqli_fetch_array($ConsultaMySql))
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
		echo '<td width="50"><a class="btnedit" href="index.php?module=lnxit&section=infopass&action=edit&id='.$infopass["id"].'">Editar</a></td>';
		
		if($infopass["urlweb"] <> "")
		{
			$btn_weburl = ' <a href="'.$infopass["urlweb"].'" target="_blank" ><img src="img/mundo.jpg" /></a>';
		}
		else 
		{
			$btn_weburl = '';
		}
		
		echo '<td>'.$infopass["id"].$btn_weburl.'</td>';
		echo '<td>'.$infopass["donde"].'</td>';
		
		$cnssqlaux = "SELECT id, razonsocial FROM ".$prefixsql."terceros where id = '".$infopass["idtercero"]."'";
		$cnsaux= $mysqli->query($cnssqlaux);
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbrazonsocial = $rowaux["razonsocial"];
		
		echo '<td>'.$dbrazonsocial.'</td>';
		echo '<tr>';
		
	}
?>

</table>


<p>&nbsp;</p>
<p>&nbsp;</p>
