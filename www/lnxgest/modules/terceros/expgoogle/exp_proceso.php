<?php

$file = fopen("modules/terceros/files/google.csv", "w");

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros ");

//fwrite($file, "nombre; direccion; cp; poblacion; provincia; telefono; codcli; codpro" . PHP_EOL);
fwrite($file, "Name,Given Name,Additional Name,Family Name,Yomi Name,Given Name Yomi,Additional Name Yomi,Family Name Yomi,Name Prefix,Name Suffix,Initials,Nickname,Short Name,Maiden Name,Birthday,Gender,Location,Billing Information,Directory Server,Mileage,Occupation,Hobby,Sensitivity,Priority,Subject,Notes,Group Membership,E-mail 1 - Type,E-mail 1 - Value,Phone 1 - Type,Phone 1 - Value,Address 1 - Type,Address 1 - Formatted,Address 1 - Street,Address 1 - City,Address 1 - PO Box,Address 1 - Region,Address 1 - Postal Code,Address 1 - Country,Address 1 - Extended Address,Custom Field 1 - Type,Custom Field 1 - Value,Custom Field 2 - Type,Custom Field 2 - Value" . PHP_EOL);

while($terceros = mysqli_fetch_array($ConsultaMySql))
{
	$cnsprov= $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$terceros["idprov"]."'");
	$row = mysqli_fetch_assoc($cnsprov);
	$nomprovincia = $row["provincia"];

	$imprimelinea = $terceros["nomcomercial"].",,,,,,,,,,,,,,,,".$terceros["pobla"].",,,,,,,,,,,,,Trabajo,".$terceros["tel"].",Trabajo,,".$terceros["tel"].",".$terceros["pobla"].",,".$nomprovincia.",".$terceros["cp"].",España,,codcli,".$terceros["codcli"].",codpro,".$terceros["codpro"];	
	//$imprimelinea = $terceros["nomcomercial"].'; '.$terceros["dir"].'; '.$terceros["cp"].'; '.$terceros["pobla"].'; '.$nomprovincia.'; '.$terceros["tel"].'; '.$terceros["codcli"].'; '.$terceros["codpro"];
	fwrite($file, $imprimelinea . PHP_EOL);

	$cnscontactos= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where (tel <> '' or email <> '') and idtercero = '".$terceros["id"]."'");
	
	while($tercon = mysqli_fetch_array($cnscontactos))
	{
		//$imprimelinea = $tercon["nombre"].'('.$terceros["nomcomercial"].'); '.$terceros["dir"].'; '.$terceros["cp"].'; '.$terceros["pobla"].'; '.$nomprovincia.'; '.$tercon["tel"].'; '.$terceros["codcli"].'; '.$terceros["codpro"];	
		$imprimelinea = $tercon["nombre"].' ('.$terceros["nomcomercial"]."),,,,,,,,,,,,,,,,".$terceros["pobla"].",,,,,,,,,,,Trabajo,".$terceros["email"].",Trabajo,".$terceros["tel"].",Trabajo,,".$tercon["tel"].",".$terceros["pobla"].",,".$nomprovincia.",".$terceros["cp"].",España,,codcli,".$terceros["codcli"].",codpro,".$terceros["codpro"];	
		fwrite($file, $imprimelinea . PHP_EOL);
	}
	
}

fclose($file); //cerramos el fichero de texto



?>

<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">Exportacion fichero google:</td></tr>
	<tr><td>El archivo ha sido generado con éxito</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<a href="modules/terceros/files/google.csv" target="_blank" class="btnedit">Descargar fichero</a></td></tr>
</table></div>