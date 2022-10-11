<?php
if ($_POST["chkokcliente"] == '1'){if($_POST["chkcliente"] == '1'){$bcodcli = "and codcli > '0' ";}else{$bcodcli = "and codcli = '0' ";};}else{$bcodcli = "";}
if ($_POST["chkokpro"] == '1'){if($_POST["chkproveedor"] == '1'){$bcodpro = "and codpro > '0' ";}else{$bcodpro = "and codpro = '0' ";};}else{$bcodpro = "";}

if($_POST["txtrazonsocial"] == ''){$brazonsocial = "";}else{$brazonsocial = " and razonsocial like '".$_POST["txtrazonsocial"]."%'";}
if($_POST["txtnomcomercial"] == ''){$bnomcomercial = "";}else{$bnomcomercial = " and nomcomercial like '".$_POST["txtnomcomercial"]."%'";}

if($_POST["txtpobla"] == ''){$bpobla = "";}else{$bpobla = " and pobla like '".$_POST["txtpobla"]."%'";}
if($_POST["txtorigen"] == ''){$borigen = "";}else{$borigen = " and origen like '".$_POST["txtorigen"]."%'";}
if($_POST["txtnotas"] == ''){$bnotas = "";}else{$bnotas = " and notas like '".$_POST["txtnotas"]."%'";}
	
if($_POST["chktel"] == '1'){$btel = "and tel > '0' ";}else{$btel = "";};
if($_POST["chkemail"] == '1'){$bemail = "and email != '' ";}else{$bemail = "";};


$fsltexportacion = $_POST["sltexportacion"];

if ($fsltexportacion == 'csv')
{
	$ficheroexportado = "terceros.csv";
}
if ($fsltexportacion == 'html')
{
	$ficheroexportado = "terceros.htm";
}


$file = fopen("modules/terceros/files/".$ficheroexportado, "w");



$cnssql = "SELECT * from ".$prefixsql."terceros where id > '0' ".$bcodcli." ".$bcodpro." ".$brazonsocial." ".$bnomcomercial." ".$bpobla." ".$borigen." ".$bnotas." ".$btel." ".$bemail." order by id";
$ConsultaMySql= $mysqli->query($cnssql);

if ($fsltexportacion == 'csv')
{
	fwrite($file, "id, ,codcli, codpro, razonsocial, nomcomercial, nif, tel, activo, dir, cp, pobla, provincia, pais, codclipro, fechaalta, ncuenta, notas, origen, email " . PHP_EOL);
}

if ($fsltexportacion == 'html')
{
	fwrite($file, "<html>" . PHP_EOL);
	fwrite($file, "<header>" . PHP_EOL);
	fwrite($file, "<title>Exportacion terceros</title>" . PHP_EOL);
	fwrite($file, "</header>" . PHP_EOL);
	fwrite($file, "<body>" . PHP_EOL);
	
	fwrite($file, '<table width="100%">' . PHP_EOL);
	
	fwrite($file, '<tr bgcolor="#D8D8D8"><td>id</td><td>codcli</td><td> codpro</td><td> razonsocial</td><td> nomcomercial</td><td> nif</td><td> tel</td><td> activo</td><td> dir</td><td> cp</td><td> pobla</td><td>Provincia</td><td> idpais</td><td> codclipro</td><td> fechaalta</td><td> ncuenta</td><td> notas</td><td> origen</td><td> email</td></tr>' . PHP_EOL);
	
}


while($terceros = mysqli_fetch_array($ConsultaMySql))
{
	
	$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."provincias where id = '".$terceros["idprov"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	
	$dbprovincia = $rowaux["provincia"];
	
	$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."paises where id = '".$terceros["idpais"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	
	$dbpais = $rowaux["pais"];
	
	
	
	
	if ($fsltexportacion == 'csv')
	{
		fwrite($file, $terceros["id"].", ".$terceros["codcli"].", ".$terceros["codpro"].", ".$terceros["razonsocial"].", ".$terceros["nomcomercial"].", ".$terceros["nif"].", ".$terceros["tel"].", ".$terceros["activo"].", ".$terceros["dir"].", ".$terceros["cp"].", ".$terceros["pobla"].", ".$dbprovincia.", ".$dbpais.", ".$terceros["codclipro"].", ".$terceros["fechaalta"].", ".$terceros["ncuenta"].", ".$terceros["notas"].", ".$terceros["origen"].", ".$terceros["email"]." " . PHP_EOL);
	}
	if ($fsltexportacion == 'html')
	{
		fwrite($file, "<tr><td>".$terceros["id"]."</td><td>".$terceros["codcli"]."</td><td>".$terceros["codpro"]."</td><td>".$terceros["razonsocial"]."</td><td>".$terceros["nomcomercial"]."</td><td>".$terceros["nif"]."</td><td>".$terceros["tel"]."</td><td>".$terceros["activo"]."</td><td>".$terceros["dir"]."</td><td>".$terceros["cp"]."</td><td>".$terceros["pobla"]."</td><td>".$dbprovincia."</td><td>".$dbpais."</td><td>".$terceros["codclipro"]."</td><td>".$terceros["fechaalta"]."</td><td>".$terceros["ncuenta"]."</td><td>".$terceros["notas"]."</td><td>".$terceros["origen"]."</td><td>".$terceros["email"]."</td></tr>" . PHP_EOL);
	}
}


if ($fsltexportacion == 'html')
{	
	fwrite($file, "</table>" . PHP_EOL);
	fwrite($file, "</body>" . PHP_EOL);
	fwrite($file, "</html>" . PHP_EOL);
}



fclose($file); //cerramos el fichero de texto

?>




<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">Exportacion fichero google:</td></tr>
	<tr><td>El archivo ha sido generado con éxito</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Formato: <?php echo $fsltexportacion; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<?php echo '<a href="modules/terceros/files/'.$ficheroexportado.'" target="_blank" class="btnedit">Descargar fichero</a>'; ?>
	</td></tr>
</table></div>