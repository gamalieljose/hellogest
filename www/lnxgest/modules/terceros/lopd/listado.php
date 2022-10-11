<?php

?>

<p>
    <a href="index.php?module=terceros&section=lopd&action=new" class="btnedit" >Nueva plantilla</a>
    
    <a href="index.php?module=terceros&section=lopdcampos" class="btnedit" >Campos Personalizados</a>

</p>

<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Empresa</td>
	<td>Categoria</td>
	<td>Nombre documento</td>
	<td width="100"> </td>
</tr>
<?php
$cnslopd = $mysqli->query("SELECT * from ".$prefixsql."lopd ");

while($col = mysqli_fetch_array($cnslopd))
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
	
	if ($col["idempresa"] > '0')
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' ");
		$row = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial = $row["razonsocial"];
	}
	else
	{
		$dbrazonsocial = "";
	}
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."dic_lopd where id = '".$col["idcatlopd"]."' ");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbcatlopd = $row["lopdcat"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'lopd' and idlinea0 = '".$col["id"]."' ");
	$row = mysqli_fetch_assoc($sqlaux);
	$fichero_id = $row["idfichero"];
	
	
	echo '<td><a href="index.php?module=terceros&section=lopd&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
	echo '<td>'.$dbrazonsocial.'</td>';
	echo '<td>'.$dbcatlopd.'</td>';
	echo '<td>'.$col["nomdoc"].'</td>';
	// echo '<td><a href="#" class="btnedit">Descargar</a></td>';
	
	echo '<td><a class="btnedit" href="modules/ficheros/download.php?id='.$fichero_id.'">Download</a></td>';
	echo '</tr>';
}

?>
</table>

<p>&nbsp;</p>

<table width="100%">
    <tr class="maintitle"><td colspan=2">Codigos para generar las plantillas</td></tr>
    <tr class="maintitle"><td colspan=2">Codigos genéricos</td></tr>
    <tr>
        <td>[[FECHA_HOY]]</td>
        <td>Escribe la fecha actual</td>
    </tr>
    <tr class="maintitle"><td colspan=2">Codigos cliente</td></tr>
        <tr><td>[[CLI_FALTA]]<td>Fecha alta tercero</td></tr>
        <tr><td>[[CLI_RAZONSOCIAL]]<td>Razon social</td></tr>
        <tr><td>[[CLI_NIF]]<td>NIF</td></tr>
        <tr><td>[[CLI_TEL]]<td>Telefono</td></tr>
        <tr><td>[[CLI_DIR]]<td>dirección</td></tr>
        <tr><td>[[CLI_CP]]<td>Código postal</td></tr>
        <tr><td>[[CLI_POBLA]]<td>población</td></tr>
        <tr><td>[[CLI_CODCLI]]<td>codigo de cliente</td></tr>
        <tr><td>[[CLI_PROV]]<td>Provincia</td></tr>
        <tr><td>[[CLI_PAIS]]<td>Pais</td></tr>
        <tr><td>[[CLI_REPRESENTANTE]]<td>Nombre del representante</td></tr>
        <tr><td>[[CLI_REPRESENTANTENIF]]<td>NIF del representante</td></tr>
    <tr class="maintitle"><td colspan=2">Codigos empresa</td></tr>
        <tr><td>[[EMPRESA_RAZONSOCIAL]]<td>Razon social empresa</td></tr>
        <tr><td>[[EMPRESA_NIF]]<td>NIF empresa</td></tr>
        <tr><td>[[EMPRESA_DIR]]<td>direccion</td></tr>
        <tr><td>[[EMPRESA_CP]]<td>Código postal</td></tr>
        <tr><td>[[EMPRESA_POBLA]]<td>Población</td></tr>
        <tr><td>[[EMPRESA_PROV]]<td>Provincia</td></tr>
        <tr><td>[[EMPRESA_PAIS]]<td>Pais</td></tr>
        <tr><td>[[EMPRESA_TEL]]<td>Telefono</td></tr>
        <tr><td>[[EMPRESA_EMAIL]]<td>email</td></tr>
        <tr><td>[[EMPRESA_REPRESENTANTE]]<td>nombre del representante de la empresa</td></tr>
        <tr><td>[[EMPRESA_NIFREPRESENTANTE]]<td>NIF o DNI del representante</td></tr>
</table>