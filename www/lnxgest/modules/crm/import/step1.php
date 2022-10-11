<?php
$fechahoy = date("d/m/Y");

//obtener pais y provincia por defecto del usuario
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."userstiendas WHERE iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1'");
$row = mysqli_fetch_assoc($buscapais);
$dbidtiendauser = $row["idtienda"];

$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."tiendas WHERE id = '".$dbidtiendauser."' ");
$row = mysqli_fetch_assoc($buscapais);
$dbidpais = $row["idpais"];
$dbidprov = $row["idprov"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];


if($dbidpais == '' || $dbidpais == '0')
{
  //sino se encuentra, obtendremos el pais del usuario
  $buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."users WHERE id = '".$_COOKIE["lnxuserid"]."' ");
  $row = mysqli_fetch_assoc($buscapais);
  $dbidpais = $row["idpais"];
  $dbidprov = $row["idprov"];
  if($dbcp == ''){$dbcp = $row["cp"];}
  if($dbpobla == ''){$dbpobla = $row["pobla"];}
  
}



if ($_FILES["fileimporta"]["size"] > 0)
{

    $fichero_nombre = $_FILES['fileimporta']['name'];
    $rutafichero = $lnxrutaficherostemp."usr/".$_COOKIE["lnxuserid"]."/".$fichero_nombre;
    move_uploaded_file($_FILES['fileimporta']['tmp_name'], $rutafichero);
    
    $ficherosubido = "YES";
}
else
{
    $urlatras = "index.php?module=crm&section=import";

header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Error en la subida del fichero</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}


if($ficherosubido == "YES")
{

    //echo '<p>'.$rutafichero.'</p>';
    if($_POST["chkutf8"] == "YES")
    {
        echo '<p><i>UTF8 encode ACTIVADO</i></p>';
    }

    $fp = fopen($rutafichero,"r");
    //Leemos linea por linea el contenido del archivo
$nlinea = 0;
    while ($linea = fgets($fp,1024))
    {
        if ($nlinea == 0)
        {
            if($_POST["chkutf8"] == "YES")
            {
                $camposlinea = utf8_encode($linea);
            }
            else
            {
                $camposlinea = $linea;
            }
            
        }

       $nlinea = $nlinea +1;
    }    

    $camposcsv = explode(";", $camposlinea);

?>
<p>Los campos marcados en rojo son obligatorios</p>

<form name="frmregistro" method="POST" action="index.php?module=crm&section=import&action=step2" >

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Previsualizar</button> 
<a href="index.php?module=crm&section=import" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="hrutafichero" value="<?php echo $rutafichero; ?>" />
<?php
$utf8check = $_POST["chkutf8"];
if($_POST["chkutf8"] == "YES"){$utf8check = 'YES';}else{$utf8check = 'NO';}
echo '<input type="hidden" name="chkutf8" value="'.$utf8check.'" />';
?>


<table width="100%">
<tr class="maintitle">
<th>Campo LNXGEST ERP</th>
<th width="10">&nbsp;</th>
<th>Columna fichero</th>
<th>Valor por defecto</th>
</tr>

<tr><td>razonsocial</td><td bgcolor="#F78181"></td>
<td>
<select name="crazonsocial" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Campo obligatorio</td>
</tr>

<tr><td>nomcomercial</td><td></td>
<td>
<select name="cnomcomercial" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Si el campo esta vacio se usará como referencia la razon social</td>
</tr>

<tr><td>nif</td><td></td>
<td>
<select name="cnif" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto 0</td>
</tr>

<tr><td>tel</td><td></td>
<td>
<select name="ctel" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>activo</td><td></td>
<td>
<select name="cactivo" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto Activo 1</td>
</tr>

<tr><td>codcli</td><td></td>
<td>
<select name="ccodcli" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Si es diferente de 0 o vacio se autoigenerará el codigo de cliente que corresponda</td>
</tr>

<tr><td>codpro</td><td></td>
<td>
<select name="ccodpro" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Si es diferente de 0 o vacio se autoigenerará el codigo de proveedor que corresponda</td>
</tr>

<tr><td>dir</td><td></td>
<td>
<select name="cdir" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>cp</td><td></td>
<td>
<select name="ccp" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>pobla</td><td></td>
<td>
<select name="cpobla" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>

<td>Valor por defecto vacío</td>
</tr>

<tr><td>idprov</td><td></td>
<td>
<select name="cidprov" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>
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
</td>
</tr>

<tr><td>idpais</td><td></td>
<td>
<select name="cidpais" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>
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
</td>
</tr>

<tr><td>codclipro</td><td></td>
<td>
<select name="ccodclipro" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>fechaalta</td><td></td>
<td>
<select name="cfechaalta" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto <?php echo $fechahoy; ?></td>
</tr>

<tr><td>ncuenta</td><td></td>
<td>
<select name="cncuenta" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>notas</td><td></td>
<td>
<select name="cnotas" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>origen</td><td></td>
<td>
<select name="corigen" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td><input type="text" name="txtorigen" maxlength="20" value="" placeholder="Valor por defecto vacio" style="width: 100%;"/></td>
</tr>

<tr><td>email</td><td></td>
<td>
<select name="cemail" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>notaimp</td><td></td>
<td>
<select name="cnotaimp" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>Valor por defecto vacío</td>
</tr>

<tr><td>idcomercial</td><td></td>
<td>
<select name="cidcomercial" style="width: 100%" >
<option value="-1">-Sin asignar-</option>
<?php
foreach ($camposcsv as $clave => $valor) {
    echo '<option value="'.$clave.'">'.$valor.'</option>';
}
?>
</select>
</td>
<td>
<select name="cbidcomercial" id="cbidcomercial" style="width: 100%;">
<option value="-1">Se asignará por el login del usuario y si no encuentra el valor será sin asignar</option>
<option value="0">-sin asignar-</option>
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' order by display");
	while($col = mysqli_fetch_array($cnsaux))
	{
		echo '<option value="'.$col["id"].'" >'.$col["display"].'</option>';
	}
	?>
	</select>
</td>
</tr>
</table>
</form>

<p>Vista rápida del archivo</p>

<table width="100%">
<?php


$fp = fopen($rutafichero,"r");
//Leemos linea por linea el contenido del archivo
$nlinea = 0;
while ($linea = fgets($fp,1024))
{
    if($nlinea > 10){goto FinLineas;}
    if ($nlinea == 0)
    {
        echo '<tr class="maintitle">';
    }
    else
    {
        echo '<tr>';
    }

    if($_POST["chkutf8"] == "YES")
    {
        $camposlinea = utf8_encode($linea);
    }
    else
    {
        $camposlinea = $linea;
    }
    $camposcsv = explode(";", $camposlinea);
    
    foreach ($camposcsv as $clave => $valor) 
    {
        echo '<td>'.$valor.'</td>';
    }
    echo '</tr>';


   $nlinea = $nlinea +1;
}    

FinLineas:

echo '</table>';

}
?>