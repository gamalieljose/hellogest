<?php
$flstempresas = $_POST["lstempresas"];
$flsttipos = $_POST["lsttipos"];
$flstordenar = $_POST["lstordenar"];

if ($flstordenar == ''){$flstordenar = 'serie';}
if ($flstempresas == ''){$flstempresas = '0';}
if ($flsttipos == ''){$flsttipos = '0';}
?>



<form name="frmbuscarserie" method="POST" action="index.php?module=core&section=series" >

<div class="tblbuscar">
	<div class="campoencoger">
		<div class="row">
			<div class="col-sm">
			Empresa </br>
			<select name="lstempresas" style="width: 100%;">

			<?php

			if($flstempresas == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="0" '.$seleccionado.'>Todas las empresas</option>';
			$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
			while($columna = mysqli_fetch_array($ConsultaMySql))
			{
				if($flstempresas == $columna["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
			}

			?>
			</select>	
			</div>
			<div class="col-sm">
			Tipo documento </br>
			<select name="lsttipos" style="width: 100%;">
	
			<?php
			if($flsttipos == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>Todas los tipos</option>';

			$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_docseries order by docserie");
			while($columna = mysqli_fetch_array($ConsultaMySql))
			{
				
				if($flsttipos == $columna["valor"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="'.$columna["valor"].'" '.$seleccionado.'>'.$columna["docserie"].'</option>';
			}

			?>
				</select>
			</div>
			<div class="col-sm">
			Ordenar </br>
			<select name="lstordenar" style="width: 100%;">
	
			<?php
			if($flstordenar == 'idempresa'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="idempresa" '.$seleccionado.'>Empresa</option>';
			if($flstordenar == 'tipo'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="tipo" '.$seleccionado.'>Tipo Serie</option>';
			if($flstordenar == 'serie'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="serie" '.$seleccionado.'>Nombre serie</option>';
			if($flstordenar == 'cv'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="cv" '.$seleccionado.'>Compra / Venta</option>';
			if($flstordenar == 'nota'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
				echo '<option value="nota" '.$seleccionado.'>Nota</option>';
			?>
				
				
				
				</select>

			</div>
		</div>
	</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button>
</div>

</form>


<p><a class="btnedit" href="index.php?module=core&section=series&action=new">Nueva serie</a></p>

<div style="display: block; overflow-x: auto;">
<table width="100%">

<tr class="maintitle">
<td width="80"></td>
<td>Empresa</td>
<td>Tipo</td>
<td>C / V</td>
<td>Serie</td>
<td>dft</td>
<td>Activo</td>
<td>Nota</td>
</tr>
<?php

if ($flstempresas == '0')
{
	$flstempresas = " where idempresa >= '0' ";
}
else
{
	$flstempresas = " where idempresa = '".$flstempresas."' ";
}

if($flsttipos == '0')
{
	$flsttipos = "";
}
else
{
	$flsttipos = " and tipo = '".$flsttipos."' ";
}

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series ".$flstempresas."  ".$flsttipos."  order by ".$flstordenar);

while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if ($columna["cv"] == '1'){$dbcv = 'Compra';}
	if ($columna["cv"] == '2'){$dbcv = 'Venta';}
	
	
	$cnsmysqltipo= $mysqli->query("SELECT * from ".$prefixsql."dic_docseries where valor = '".$columna["tipo"]."'");
	$row = mysqli_fetch_assoc($cnsmysqltipo);
	$dbtipo = $row['docserie'];
	
	$dbidempresa = $columna["idempresa"];
	$dbserie = $columna["serie"];
	$dbactivo = $columna["activo"];
	$dbdft = $columna["dft"];
        
        if($dbactivo == '1')
        {
            $dbactivo = '<img src="img/yes.png" />';
        }
        else
        {
            $dbactivo = '<img src="img/no.png" />';
        }
        
        
        if($dbdft == '1')
        {
            $dbdft = '<img src="img/yes.png" />';
        }
        else
        {
            $dbdft = '';
        }
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$dbidempresa."'");
	$row = mysqli_fetch_assoc($cnsaux);
	$dbempresa = $row['razonsocial'];
	
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	echo '<td><a class="btnedit" href="index.php?&module=core&section=series&action=edit&id='.$columna["id"].'">editar</a></td>
	<td>'.$dbempresa.'</td>
	<td>'.$dbtipo.'</td>
	<td>'.$dbcv.'</td>
	<td>'.$dbserie.'</td>
	<td>'.$dbdft.'</td>
	<td>'.$dbactivo.'</td>
	<td>'.$columna["nota"].'</td></tr>';

}



?>
</table>
</div>