<?php
$ftxtbuscar = addslashes($_POST["txtbuscar"]);
?>
<style>
.cssfeaturesbox{
	border: 2px solid #6678b1;
		
	position:fixed;
	top: 330px; 
	width: 100%;
	max-width: 600px; 
	margin-top: -200px; 
	margin-left: 200px; 
	height:auto; 
	background:#FFF; 
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
    padding-right: 5px;
	z-index: 1;
	
}
@media screen and (max-width: 550px) {
    .cssfeaturesbox{
		
	max-width: Calc(100% - 20px); 
	margin-top: -200px; 
	margin-left: 20px;
  	margin-right: 100px;
	background:#CCC; 
	padding-top: 10px;
	z-index: 1;
	}
	
	
}
</style>
<script type="text/javascript">
function cierrafeaturesbox() 
{
	document.getElementById('div_featuresbox').style.display = 'none';

	document.getElementById(document.getElementById('feat_linea').value).style.backgroundColor = '';
}

function muestrafeaturesbox(feature, valor1, valor2, valor3, valor4, idlinea) 
{
	var lineaold = document.getElementById('feat_linea').value;
	var tablalinea = 'idlinea_' + idlinea;

	document.getElementById('div_featuresbox').style.display = 'inline';
	document.getElementById('feat_caracteristica').value = feature;
	document.getElementById('feat_valor1').value = valor1;
	document.getElementById('feat_valor2').value = valor2;
	document.getElementById('feat_valor3').value = valor3;
	document.getElementById('feat_valor4').value = valor4;

	document.getElementById('feat_linea').value = tablalinea;

	document.getElementById(tablalinea).style.backgroundColor = '#DBA901';
	document.getElementById(lineaold).style.backgroundColor = '';
	
}

</script>

<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=activosfea&srch=features" >

<input type="hidden" value="idlinea_0" name="feat_linea" id="feat_linea" />

<div id="div_featuresbox" class="cssfeaturesbox" style="display: none;">
<div class="row" >
		<div class="col" align="left">
			<b>Caracteristica y valores</b>
		</div>
		<div class="col" align="right">
			<a href="javascript:cierrafeaturesbox();" class="btnenlacecancel" alt="cerrar ventana" title="cerrar ventana"><i class="hidephonview fa fa-window-close fa-lg"></i></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Caracteristica
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="feat_caracteristica" id="feat_caracteristica" style="width: 100%;" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Valor
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="feat_valor1" id="feat_valor1" style="width: 100%;" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Valor 2
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="feat_valor2" id="feat_valor2" style="width: 100%;" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Valor 3
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="feat_valor3" id="feat_valor3" style="width: 100%;" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Valor 4
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="feat_valor4" id="feat_valor4" style="width: 100%;" />
		</div>
	</div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Texto a buscar
    </div>
    <div class="col" align="left">
		<input type="text" value="<?php echo $ftxtbuscar; ?>" name="txtbuscar" style="width: 100%;" />
    </div>
</div>
<input type="hidden" name="hcontrol" value="control" />

<div align="center" class="rectangulobtnsguardar">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button>
</div>

</form>


<table  width="100%" >
<tr class="maintitle">
<th width="80"> </th>
<th>Nombre</th>
<th>Tercero</th>
<th>Tipo</th>
<th>Caracteristica</th>
<th width="80"> </th>
</tr>
<?php

if($_POST["hcontrol"] == "control")
{
	$ssqllistado = "select * from ".$prefixsql."ita_caracteristicas where opcion like '%".$ftxtbuscar."%' or valor like '%".$ftxtbuscar."%' or valor2 like '%".$ftxtbuscar."%' or valor3 like '%".$ftxtbuscar."%' or valor4 like '%".$ftxtbuscar."%' ";	
}
else 
{
	$ssqllistado = "";
}

$idlinea = 0;

$cnssql= $mysqli->query($ssqllistado);	
while($col = mysqli_fetch_array($cnssql))
{
	$idlinea = $idlinea + 1;
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$col["idactivo"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_nombreactivo = $rowaux["nombre"];
	$idtercero = $rowaux["idtercero"];
	$idtipo = $rowaux["idtipo"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_tipos where id = '".$idtipo."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tipo = $rowaux["tipo"];
	
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$idtercero."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_razonsocial = $rowaux["razonsocial"];

	
	
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
	

echo "<tr id=\"idlinea_".$idlinea."\" class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["idactivo"].'" class="btnedit" >Editar</a></td>';
echo '<td>'.$lbl_nombreactivo.'</td>'; 
echo '<td>'.$lbl_razonsocial.'</td>'; 
echo '<td>'.$lbl_tipo.'</td>'; 
echo '<td>'.$col["opcion"].'</td>'; 
echo "<td align=\"right\"><a class=\"btnedit\" href=\"javascript:muestrafeaturesbox('".addslashes($col["opcion"])."', '".addslashes($col["valor"])."', '".addslashes($col["valor2"])."', '".addslashes($col["valor3"])."', '".addslashes($col["valor4"])."', '".$idlinea."');\">Detalles</a></td>";
echo '</tr>';

    
}


?>



</table>