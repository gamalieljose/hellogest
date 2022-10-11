<?php

$fhidtercero = $_POST["hidtercero"]; //ID Tercero

$fvaraccion = $_POST["haccion"];  //new = nuevo
								//update 0 actuliza
								//delete = elimina
								
								
$fchkactivo = $_POST["chkactivo"];
$ftxtfecha = $_POST["txtfecha"];
$ftxtrazonsocial = $_POST["txtrazonsocial"];
$ftxtnomcomercial = $_POST["txtnomcomercial"];
$ftxtnif = $_POST["txtnif"];
$ftxttel = $_POST["txttel"];
$fsltcli = $_POST["sltcli"];
$fsltpro = $_POST["sltpro"];
$fcbpais = $_POST["cbpais"];
$fcbprovincias = $_POST["cbprovincias"];
$ftxtdir = $_POST["txtdir"];
$ftxtcp = $_POST["txtcp"];
$ftxtpobla = addslashes($_POST["txtpobla"]);
$fcbtarifa = $_POST["cbtarifa"];
$ftxtcodclipro = $_POST["txtcodclipro"];
$ftxtncuenta = $_POST["txtncuenta"];
$ftxtnotas = $_POST["txtnotas"];
$ftxtorigen = $_POST["txtorigen"];
$ftxtemail = $_POST["txtemail"];
$ftxtnotaimp = $_POST["txtnotaimp"];
$flstcomercial = $_POST["lstcomercial"];

$fchkcopycontact = $_POST["chkcopycontact"];

$flsttipotercero = $_POST["lsttipotercero"];

$flstactividad = $_POST["lstactividad"];

$flstclifp = $_POST["lstclifp"];
$flstclidp = $_POST["lstclidp"];
$flstprofp = $_POST["lstprofp"];
$flstprodp = $_POST["lstprodp"];

$flstzona = $_POST["lstzona"];

$fano = substr($ftxtfecha, 6, 4);  
$fmes = substr($ftxtfecha, 3, 2);  
$fdia = substr($ftxtfecha, 0, 2);  

$ftxtfecha = $fano.'-'.$fmes.'-'.$fdia;

if ($fvaraccion == "new")
{
	// Cuando se crea el nuevo tercero, inmediatamente hay que ir a editarlo
	// de esta forma se podran rellenar todos los campos necesarios
	// como por ejemplo nuevos contactos etc.
	
	//Comprobación de campos
	if ($ftxtnomcomercial == ''){$ftxtnomcomercial = $ftxtrazonsocial; }  //Nombre comercial si es vacio lo igualamos a la razon social
	
	$codcliente = "0";
	$codproveedor = "0";

	
	$tercero = $mysqli->query("insert into ".$prefixsql."terceros 
	(razonsocial, nomcomercial, nif, tel, activo, codcli, codpro, dir, cp, pobla, idprov, idpais, idtarifa, codclipro, fechaalta, ncuenta, notas, origen, email, notaimp, idcomercial, idtipotercero, idactividad, clifp, clidp, profp, prodp, idzona) 
	values 
	('".$ftxtrazonsocial."', '".$ftxtnomcomercial."', '".$ftxtnif."', '".$ftxttel."', '".$fchkactivo."', '".$codcliente."', '".$codproveedor."', '".$ftxtdir."', '".$ftxtcp."', '".$ftxtpobla."', '".$fcbprovincias."', '".$fcbpais."', '".$fcbtarifa."', '".$ftxtcodclipro."', '".$ftxtfecha."', '".$ftxtncuenta."', '".$ftxtnotas."', '".$ftxtorigen."', '".$ftxtemail."', '".$ftxtnotaimp."', '".$flstcomercial."', '".$flsttipotercero."', '".$flstactividad."', '".$flstclifp."', '".$flstclidp."', '".$flstprofp."', '".$flstprodp."', '".$flstzona."')");

	$buscaultimoidtercero = $mysqli->query("SELECT max( id ) AS codigo FROM ".$prefixsql."terceros");
	$rowuid = mysqli_fetch_assoc($buscaultimoidtercero);
	$ultimoid = $rowuid["codigo"];
	
	if($fchkcopycontact == '1')
	{
		//Copiamos y creamos un contacto
		
		$contactos= $mysqli->query("insert into ".$prefixsql."terceroscontactos (idtercero, nombre, tel, email, ididioma, cargo, lnxpublic, usuariopublic, contrasena, iddir, lbltel2, tel2, lbltel3, tel3, activo) values ('".$ultimoid."', '".$ftxtrazonsocial."', '".$ftxttel."', '".$ftxtemail."', '0', '', '0', '', '', '0', '', '', '', '', '1')");

		//generacion automatica del usuario
		$ConsultaMySql= $mysqli->query("SELECT max(id) as idcontacto from ".$prefixsql."terceroscontactos ");
		$row = mysqli_fetch_assoc($ConsultaMySql);
		$idmaxcontacto = $row['idcontacto'];
				
		$usuariolnx = $ultimoid.'-'.$idmaxcontacto;
		$contactos= $mysqli->query("update ".$prefixsql."terceroscontactos set usuariopublic = '".$usuariolnx."' where id = '".$idmaxcontacto."'");

	}

	
	
}

if ($fvaraccion == "update")
{
	
	
	$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$fhidtercero."'");
	$row = mysqli_fetch_assoc($buscatercero);
	
	$codcliactual = $row["codcli"];
	$codproactual = $row["codpro"];
		
	//Comprobación de campos
	if ($ftxtnomcomercial == ''){$ftxtnomcomercial = $ftxtrazonsocial; }  //Nombre comercial si es vacio lo igualamos a la razon social
	
	
	//HACER UPDATE
	
	$tercero = $mysqli->query("update ".$prefixsql."terceros set 
	razonsocial = '".$ftxtrazonsocial."', 
	nomcomercial = '".$ftxtnomcomercial."', 
	nif = '".$ftxtnif."', 
	tel = '".$ftxttel."', 
	activo = '".$fchkactivo."',  
	dir = '".$ftxtdir."', 
	cp = '".$ftxtcp."', 
	pobla = '".$ftxtpobla."', 
	idprov = '".$fcbprovincias."', 
	idpais = '".$fcbpais."', 
	idtarifa = '".$fcbtarifa."', 
	codclipro = '".$ftxtcodclipro."', 
	fechaalta = '".$ftxtfecha."', 
	ncuenta = '".$ftxtncuenta."',
	notas = '".$ftxtnotas."',
	origen = '".$ftxtorigen."', 
	email = '".$ftxtemail."',
	notaimp = '".$ftxtnotaimp."',
	idcomercial = '".$flstcomercial."',
	idtipotercero = '".$flsttipotercero."', 
	idactividad = '".$flstactividad."', 
	clifp = '".$flstclifp."', 
	clidp = '".$flstclidp."', 
	profp = '".$flstprofp."', 
	prodp  = '".$flstprodp."', 
	idzona = '".$flstzona."' 
	where id = '".$fhidtercero."'");
	
}

if ($fvaraccion == "delete")
{
	$url_atras = "index.php?module=terceros&section=terceros&action=del&idtercero=".$fhidtercero;
	if ($_POST["chkborrartercero"] == "1")
	{
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."terceros where id = '".$fhidtercero."'");
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."terceroscontactos where idtercero = '".$fhidtercero."'");
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."tercerosdir where idtercero = '".$fhidtercero."'");
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."terceroscontacxtra where idtercero = '".$fhidtercero."'");

		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercero = '".$fhidtercero."'");
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."terceros_vinc where idtercerob = '".$fhidtercero."'");
		
		$cnssqlborra = $mysqli->query("delete from ".$prefixsql."sync_terceros where lnx_id = '".$fhidtercero."'");

		$url_atras = "index.php?module=terceros&section=terceros";
	}
	
	
}


//Ingresa poblacion si no existe

$cnspobla = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."poblaciones where cp = '".$ftxtcp."' and idprov = '".$fcbprovincias."' and idpais = '".$fcbpais."'");
$row = mysqli_fetch_assoc($cnspobla);

if ($row["contador"] == '0')
{
	//Solo si no encuentra el registro, este lo inserta
	$cnspobla = $mysqli->query("insert into ".$prefixsql."poblaciones (cp, poblacion, idprov, idpais) values('".$ftxtcp."', '".$ftxtpobla."', '".$fcbprovincias."', '".$fcbpais."')");
}


//Fin ingresa poblacion

if ($fvaraccion == "update")
{
	if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?module=terceros&section=terceros";
		header( "Location: ".$url_atras );
		

	}
	if(isset($_POST["btnaplicar"])) 
	{
		
		$url_atras = "index.php?module=terceros&section=terceros&action=edit&idtercero=".$fhidtercero."&upd=ate";
		header( "Location: ".$url_atras );
	}
	
}
if ($fvaraccion == "new")
{
header( "Location: index.php?module=terceros&section=terceros&action=edit&idtercero=".$ultimoid );


}

if ($fvaraccion == "delete")
{
	header( "Location: ".$url_atras );
	
}


?>