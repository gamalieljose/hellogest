<?php
$ftxtdocumentocompra = $_POST["txtdocumentocompra"];
$ftxtdescripcion = $_POST["txtdescripcion"];
$ftxtprecio = $_POST["txtprecio"];
$ficheroidcategoria = $_POST["lstcategoriafichero"];
$ficheropublico = $_POST["lstpublico"];
$flstseries = $_POST["lstseries"];
$flsttercero = $_POST["lsttercero"];
$flststatus = $_POST["lststatus"];
$ffactura = $_POST["txtfecha"];
	$fano = substr($ffactura, 6, 4);  
	$fmes = substr($ffactura, 3, 2);  
	$fdia = substr($ffactura, 0, 2);  

	$ffactura = $fano.'-'.$fmes.'-'.$fdia;
$fvencimiento = $_POST["txtfechavencimiento"];
	$fano = substr($fvencimiento, 6, 4);  
	$fmes = substr($fvencimiento, 3, 2);  
	$fdia = substr($fvencimiento, 0, 2);  

	$fvencimiento = $fano.'-'.$fmes.'-'.$fdia;
$flstusuario = $_POST["lstusuario"];

$flst_cp = $_POST["lst_cp"]; //condiciones pago 
$flst_dp = $_POST["lst_dp"]; //Documento pago



$timpuestos = $_POST["txtimpuesto"];



if($_POST["haccion"] == "newexpress")
{
// Creacion de la factura ----------------------
	$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."series where id = '".$flstseries."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$textoserie = $row["serie"];
	
	//obtenemos el ultimo numero de factura de esa serie
	
	$ConsultaMySql= $mysqli->query("select max(codigoint) as ultimoid from ".$prefixsql.$lnxinvoice." where idserie = '".$flstseries."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$ultimocontador = $row["ultimoid"];
	
	$codfcint = $ultimocontador + 1; //este es el codigo interno segun la serie de facturas
	
	$codigofc = $textoserie."/".$codfcint; //FC2019/1
	

	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql."fc (idserie, codigoint, codigo, idtercero, estado, fecha, vencimiento, idusuario, pagado, editfv, factura, pc_cp, pc_dp) values ('".$flstseries."', '".$codfcint."', '".$codigofc."', '".$flsttercero."', '".$flststatus."', '".$ffactura."', '".$fvencimiento."', '".$flstusuario."', '0', '0', '".$ftxtdocumentocompra."', '".$flst_cp."', '".$flst_dp."') ");
	
	$ConsultaMySql= $mysqli->query("select max(id) as ultimoid from ".$prefixsql.$lnxinvoice." ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idfacturagenerada = $row["ultimoid"];
	
	
		$idtemp = '0';
	foreach($timpuestos as $impimpuesto){
		$valor = $impimpuesto;
			
		$var = $_POST['hidimpuesto'][$idtemp];
				
			$idimpuesto = $var;
			$valorimpuesto = $valor;
			
			$ConsultaMySql = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_tax (".$campomasterid.", idimpuesto, valor) values ('".$idfacturagenerada."', '".$idimpuesto."', '".$valorimpuesto."') ");
			
			//insertamos los impuestos a la bbdd
			
		$idtemp = $idtemp +1;
			
	}
	
	//Ahora que ya hemos asigando los impuestos y valores a la factura, vamos a generar la linea de la factura
	
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_lineas (".$campomasterid.", cod, concepto, unid, precio, dto, importe, orden, exclufactu) values ('".$idfacturagenerada."', '', '".$ftxtdescripcion."', '1', '".$ftxtprecio."', '0', '".$ftxtprecio."', '1', '0') ");
	
	$ConsultaMySql= $mysqli->query("select max(id) as ultimoid from ".$prefixsql.$lnxinvoice."_lineas ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idlineafactura = $row["ultimoid"];

		
	$cnssql= $mysqli->query("select * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$idfacturagenerada."'");	
	while($col = mysqli_fetch_array($cnssql))
	{
		$importelinea = ($ftxtprecio / 100 ) * $col["valor"];
		
		$ConsultaMySql = $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_lineas_tax (".$campomasterid.", ".$campomasterid."linea, idtax, valor, importe) values ('".$idfacturagenerada."', '".$idlineafactura."', '".$col["idimpuesto"]."', '".$col["valor"]."', '".$importelinea."') ");
	}

	
	
	if($_FILES["fileficherito"]["size"] > 0)
	{
		//Subida de fichero de compras ------------------------------
		// Ruta archivos $lnxrutaficheros /lnxgest/files/
		$dirano = "Y".date('Y');
		$dirmes = "M".date('m');
		$fechasubida = date("Y-m-d H:i:s");

		$extension = end(explode(".", $_FILES['fileficherito']['name']));

		$extension = strtolower($extension);

		$rutafichero = $lnxrutaficheros.$extension;

		$rutafichero = $lnxrutaficheros.$dirano;

		if (file_exists($rutafichero))
		{
			//si existe la carpeta de la serie no hace nada
		}else
		{
			//como NO existe la carpeta de las serie se crea la carpeta correspondiente
			
			$oldmask = umask(0);
			//mkdir($rutafichero, 7777, true);
			mkdir($rutafichero, 0777);
			umask($oldmask);
		}

		$rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;

		if (file_exists($rutafichero))
		{
			//si existe la carpeta de la serie no hace nada
		}else
		{
			//como NO existe la carpeta de las serie se crea la carpeta correspondiente
			
			$oldmask = umask(0);
			//mkdir($rutafichero, 7777, true);
			mkdir($rutafichero, 0777);
			umask($oldmask);
		}

		$dirsubida = $dirano."/".$dirmes;

		$fichero_nombre = $_FILES['fileficherito']['name'];
		$ficherotm = $_FILES['fileficherito']['type'];

		$descripcion_fichero = $codigofc;

		$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza, dirfichero, fsubido, iduser) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$descripcion_fichero."', '".$ficherotm."', '0', '".$dirsubida."', '".$fechasubida."', '".$_COOKIE["lnxuserid"]."')");

		$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
		$row = mysqli_fetch_assoc($sqlficheros);
		$dbcontador = $row["contador"];

		$fichero_nombrefin = $dbcontador.".".$extension;

		$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

		move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);




		$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) VALUES ('".$dbcontador."', '".$lnxinvoice."', '".$idfacturagenerada."', '0', '0', '".$descripcion_fichero."', '".$ficheropublico."', '".$ficheroidcategoria."')");

	}

		
	$msg_resulotado = "Factura de compra generada correctamente";
}
else
{
	$msg_resulotado = "Se ha producido un error";
}



$url_atras = "index.php?module=".$lnxinvoice;



header( "Location: ".$url_atras );

	
	
                
?>

