<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_cfpc where opcion = 'numdigitos' and idempresa = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbnumdigitos = $rowaux["valor"];
?>

<?php

$variableprint = $_POST["lstbuscarcampo"].";".$_POST["txtbuscar"].";".$_POST["lstorden"].";".$_POST["lstordenar"];

if($variableprint == ";;;"){$variableprint = "1;;1;ASC";}
$variableprint = base64_encode($variableprint);


?>

<?php
$flstbuscarcampo = $_POST["lstbuscarcampo"];
$ftxtbuscar = addslashes($_POST["txtbuscar"]);
$ftxtbuscar = str_replace("\'", "''", $ftxtbuscar);



$flstorden = $_POST["lstorden"];
$flstordenar = $_POST["lstordenar"];


?>

<form id="formbuscar" name="formbuscar" method="post" action="index.php?module=conta&section=terceros">
<table width="100%">
<tr class="tblbuscar"><td align="center">Campo: 
<?php
	echo '<select name="lstbuscarcampo">';
	if ($flstbuscarcampo == '' || $flstbuscarcampo == '1'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="1" '.$selecionado.'>Razon social</option>';
	if ($flstbuscarcampo == '2'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="2" '.$selecionado.'>Nombre comercial</option>';
	if ($flstbuscarcampo == '3'){$selecionado = " SELECTED";}else{$selecionado = "";}	
		echo '<option value="3" '.$selecionado.'>NIF</option>';
	if ($flstbuscarcampo == '4'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="4" '.$selecionado.'>Poblacion</option>';
	if ($flstbuscarcampo == '5'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="5" '.$selecionado.'>Telefono</option>';
	if ($flstbuscarcampo == '6'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="6" '.$selecionado.'>Direccion</option>';
	if ($flstbuscarcampo == '7'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="7" '.$selecionado.'>Notas</option>';
	if ($flstbuscarcampo == '8'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="8" '.$selecionado.'>Origen</option>';
	echo '</select>';
            $xftxtbuscar = $_POST["txtbuscar"];
	echo '<input type="text" name="txtbuscar" value="'.$xftxtbuscar.'">';
	echo ' ordenar: ';
	echo '<select name="lstorden">';
	if ($flstorden == '' || $flstorden == '1'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="1" '.$selecionado.'>Razon social</option>';
	if ($flstorden == '2'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="2" '.$selecionado.'>Nombre comercial</option>';
	if ($flstorden == '3'){$selecionado = " SELECTED";}else{$selecionado = "";}	
		echo '<option value="3" '.$selecionado.'>NIF</option>';
	if ($flstorden == '4'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="4" '.$selecionado.'>Poblacion</option>';
	if ($flstorden == '5'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="5" '.$selecionado.'>Telefono</option>';
	if ($flstorden == '6'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="6" '.$selecionado.'>Cod Cliente</option>';
	if ($flstorden == '7'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="7" '.$selecionado.'>Cod Proveedor</option>';
	if ($flstorden == '8'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="8" '.$selecionado.'>ID</option>';
	if ($flstorden == '9'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="9" '.$selecionado.'>Fecha Alta</option>';
	echo '</select>';
	
		
	echo '<select name="lstordenar">';
	if ($flstordenar == '' || $flstordenar == 'ASC'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="ASC" '.$selecionado.'>Ascendiente</option>';
	if ($flstordenar == 'DESC'){$selecionado = " SELECTED";}else{$selecionado = "";}
		echo '<option value="DESC" '.$selecionado.'>Descendiente</option>';
	echo '</select>';
	
	?>

<input class="btnedit_verde" name="btnnuevousuario" value="Buscar" type="submit"> 
</td></tr>
</table>


<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="40"> </th>
<th width="100">Cliente</th>
<th width="100">Proveedor</th>
<th>Razon social</th>
<th>nombre Comercial</th>
<th>Poblacion</th>
<th>Telefono</th>
<th>NIF</th>
<th width="40">Cliente</th>
<th width="40">Proveedor</th>
</tr>

<?php
if($_GET["unlock"] <> '' && $_GET["t"] <> '')
{
	
	$unlock_idreg = $_GET["unlock"];
	$unlock_tabla = $prefixsql."terceros";
	include ("core/unlock.php");
	
	echo '<p>'.$unlock_tabla.'</p>';
}


if ($flstbuscarcampo == '' || $flstbuscarcampo == '1'){$flstbuscarcampo = "razonsocial";}
if ($flstbuscarcampo == '2'){$flstbuscarcampo = "nomcomercial";}
if ($flstbuscarcampo == '3'){$flstbuscarcampo = "nif";}
if ($flstbuscarcampo == '4'){$flstbuscarcampo = "pobla";}
if ($flstbuscarcampo == '5'){$flstbuscarcampo = "tel";}
if ($flstbuscarcampo == '6'){$flstbuscarcampo = "dir";}
if ($flstbuscarcampo == '7'){$flstbuscarcampo = "notas";}
if ($flstbuscarcampo == '8'){$flstbuscarcampo = "origen";}

if ($flstorden == '' || $flstorden == '1'){$flstorden = "razonsocial";}
if ($flstorden == '2'){$flstorden = "nomcomercial";}
if ($flstorden == '3'){$flstorden = "nif";}
if ($flstorden == '4'){$flstorden = "pobla";}
if ($flstorden == '5'){$flstorden = "tel";}
if ($flstorden == '6'){$flstorden = "codcli";}
if ($flstorden == '7'){$flstorden = "codpro";}
if ($flstorden == '8'){$flstorden = "id";}
if ($flstorden == '9'){$flstorden = "fechaalta";}



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros where (codcli > 0 or codpro > 0) and ".$flstbuscarcampo." like '".$ftxtbuscar."%' order by ".$flstorden." ".$flstordenar);
$totalregistros = $ConsultaMySql->num_rows;

$limite_reg = 25;

if ($totalregistros > $limite_reg)
{
	$paginar = "si";
	$pagina = $_POST["hpag"];
	if ($pagina == '' || $pagina == '0' || $pagina == '1')
	{
		$pagrs = "0";
		$pagina = "1";
	}
	
	if($_POST["btnpag"] == "siguiente")
	{
		$pagina = $pagina +1;
		
	}
	if($_POST["btnpag"] == "anterior")
	{
		$pagina = $pagina -1;
		
	}
	
	$pagrs = ($pagina -1)* $limite_reg;
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros where (codcli > 0 or codpro > 0) and ".$flstbuscarcampo." like '".$ftxtbuscar."%' order by ".$flstorden." ".$flstordenar." limit ".$pagrs.", ".$limite_reg);
	$totalregactual = $ConsultaMySql->num_rows;
}

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
	echo '<td><a class="btnedit" href="index.php?module=conta&section=terceros&action=edit&idtercero='.$columna["id"].'">Editar</a></td>';

        $sqlaux = $mysqli->query("select * from ".$prefixsql."conta_master where idempresa = '".$idempresa."' and modulo = 'terceros-cli' and idreg = '".$columna["id"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $existecli = $sqlaux->num_rows;
        $cli_grp = $rowaux["grupo"];
        $cli_sub = $rowaux["subcuenta"];

            $digitosgrupo = strlen($cli_grp);
            $digitosid = strlen($cli_sub);
            $digitostotal = $digitosgrupo + $digitosid;
            $cerosanadir = $dbnumdigitos - $digitostotal;

            $i = 0;
            $textoceros = "";
            do {
                $i = $i + 1;
                $textoceros = $textoceros."0";
            } 
            while ($i < $cerosanadir);
            if($existecli == 0)
            {
                $codigocontacli = "";
            }
            else
            {
                $codigocontacli = $cli_grp.$textoceros.$cli_sub;
            }
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."conta_master where idempresa = '".$idempresa."' and modulo = 'terceros-pro' and idreg = '".$columna["id"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $existepro = $sqlaux->num_rows;
        $pro_grp = $rowaux["grupo"];
        $pro_sub = $rowaux["subcuenta"];

            $digitosgrupo = strlen($pro_grp);
            $digitosid = strlen($pro_sub);
            $digitostotal = $digitosgrupo + $digitosid;
            $cerosanadir = $dbnumdigitos - $digitostotal;

            $i = 0;
            $textoceros = "";
            do {
                $i = $i + 1;
                $textoceros = $textoceros."0";
            } 
            while ($i < $cerosanadir);
            if($existepro == 0)
            {
                $codigocontapro = "";
            }
            else
            {
                $codigocontapro = $pro_grp.$textoceros.$pro_sub;
            }
            
        echo '<td>'.$codigocontacli.'</td>';
        echo '<td>'.$codigocontapro.'</td>';

	echo '<td>'.$columna["razonsocial"].'</td>
	<td>'.$columna["nomcomercial"].'</td>
	<td>'.$columna["pobla"].'</td>
	<td><a href="tel:'.$columna["tel"].'">'.$columna["tel"].'</a></td>
	<td>'.$columna["nif"].'</td>';
	
        echo '<td align="center">'.$columna["codcli"].'</td>';
        echo '<td align="center">'.$columna["codpro"].'</td>';
	echo '</tr>'; 
}
?>

</table>
</div>
<?php
echo '<input type="hidden" value="'.$pagina.'" name="hpag" />';

//$pag_siguiente = $pagina +1;
//$pag_anterior = $pagina -1;

echo '<div align="center">';
if ($pagina > '1')
{
//echo '<a class="btnedit" href="index.php?module=conta&section=terceros&pag='.$pag_anterior.'">Anterior</a> - ';
echo '<input class="btnedit_verde" type="submit" value="anterior" name="btnpag" /> ';
}
if ($totalregistros > $limite_reg && $totalregistros > $pagina * $limite_reg)
{
//echo '<a class="btnedit" href="index.php?module=conta&section=terceros&pag='.$pag_siguiente.'">Siguiente</a>';

echo ' <input class="btnedit_verde" type="submit" value="siguiente" name="btnpag" />';
}
if ($pagina == ''){$pagina = '1';}
echo '<p>Pagina '.$pagina.'</p>';
echo '<p>Registros encontrados '.$totalregistros.'</p>';
echo '</div>';

echo '</form>';


?>
