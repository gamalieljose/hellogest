<?php
if($_COOKIE["lnxuserid"] > 0)
{
require("cfpc.php");

$datosrecoverymode = base64_decode($_POST["varrecoverymode"]);

$variables = explode("&", $datosrecoverymode);

$rcvymd_arryvariables = array();

foreach ($variables as $mivariable)
{
    $opcionvalor = explode("=", $mivariable);

    $rcvymd_arryvariables[$opcionvalor[0]] = $opcionvalor[1];

    //$rcvymd_arryvariables["module"];
}

$recoverymodule = "../modules/".$rcvymd_arryvariables["module"]."/recovery/recovery.php";
include($recoverymodule);

/*
if($rcvymd_arryvariables["module"] == "terceros")
{ 
    if ($rcvymd_arryvariables["action"] == "edit" && $rcvymd_arryvariables["section"] == "terceros" && $rcvymd_arryvariables["idtercero"] > 0)
    {
        $rcvymd_fichero = $lnxrecoverymode_files."tercero_".$rcvymd_arryvariables["idtercero"].".xml";

        //exportamos la ficha del tercero
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$rcvymd_arryvariables["idtercero"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbrazonsocial = $rowaux["razonsocial"];
		$dbnomcomercial = $rowaux["nomcomercial"];
		$dbnif = $rowaux["nif"];
		$dbtel = $rowaux["tel"];
		$dbactivo = $rowaux["activo"];
		$dbcodcli = $rowaux["codcli"];
		$dbcodpro = $rowaux["codpro"];
		$dbdir = $rowaux["dir"];
		$dbcp = $rowaux["cp"];
		$dbpobla = $rowaux["pobla"];
		$dbidprov = $rowaux["idprov"];
		$dbidpais = $rowaux["idpais"];
		$dbidtarifa = $rowaux["idtarifa"];
		$dbcodclipro = $rowaux["codclipro"];
		$dbfechaalta = $rowaux["fechaalta"];
		$dbncuenta = $rowaux["ncuenta"];
		$dbnotas = $rowaux["notas"];
		$dborigen = $rowaux["origen"];
		$dbemail = $rowaux["email"];
		$dbnotaimp = $rowaux["notaimp"];
		$dbidcomercial = $rowaux["idcomercial"];
		$dbidtipotercero = $rowaux["idtipotercero"];
		$dbidactividad = $rowaux["idactividad"];




        $file = fopen($rcvymd_fichero, "w");

        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
        fwrite($file, "<lnxgest>". PHP_EOL);
        fwrite($file, "   <tipoxml>TERCERO</tipoxml>". PHP_EOL);
        fwrite($file, "   <tercero>". PHP_EOL);
        fwrite($file, "      <id>".$rcvymd_arryvariables["idtercero"]."</id>". PHP_EOL);
        fwrite($file, "      <razonsocial>".$dbrazonsocial."</razonsocial>". PHP_EOL);
		fwrite($file, "      <nomcomercial>".$dbnomcomercial."</nomcomercial>". PHP_EOL);
		fwrite($file, "      <nif>".$dbnif."</nif>". PHP_EOL);
		fwrite($file, "      <activo>".$dbactivo."</activo>". PHP_EOL);
		fwrite($file, "      <codcli>".$dbcodcli."</codcli>". PHP_EOL);
		fwrite($file, "      <codpro>".$dbcodpro."</codpro>". PHP_EOL);
		fwrite($file, "      <dir>".$dbdir."</dir>". PHP_EOL);
		fwrite($file, "      <cp>".$dbcp."</cp>". PHP_EOL);
		fwrite($file, "      <pobla>".$dbpobla."</pobla>". PHP_EOL);
		fwrite($file, "      <idprov>".$dvidprov."</idprov>". PHP_EOL);
		fwrite($file, "      <idpais>".$dbidpais."</idpais>". PHP_EOL);
		fwrite($file, "      <idtarifa>".$dbidtarifa."</idtarifa>". PHP_EOL);
		fwrite($file, "      <codclipro>".$dbcodclipro."</codclipro>". PHP_EOL);
		fwrite($file, "      <fechaalta>".$dbfechaalta."</fechaalta>". PHP_EOL);
		fwrite($file, "      <ncuenta>".$dbncuenta."</ncuenta>". PHP_EOL);
		fwrite($file, "      <notas>".$dbnotas."</notas>". PHP_EOL);
		fwrite($file, "      <origen>".$dborigen."</origen>". PHP_EOL);
		fwrite($file, "      <email>".$dbemail."</email>". PHP_EOL);
		fwrite($file, "      <notaimp>".$dbnotaimp."</notaimp>". PHP_EOL);
		fwrite($file, "      <idcomercial>".$dbidcomercial."</idcomercial>". PHP_EOL);
		fwrite($file, "      <idtipotercero>".$dbidtipotercero."</idtipotercero>". PHP_EOL);
		fwrite($file, "      <idactividad>".$dbidactividad."</idactividad>". PHP_EOL);
        fwrite($file, "   </tercero>". PHP_EOL);
        fwrite($file, "</lnxgest>". PHP_EOL);

        fclose($file);

        $respuestarecoverymode = "Tercero [".$rcvymd_arryvariables["idtercero"]."][".$lblrazonsocial."] exportado correctamente";
	}
	
	//Exportar toda la lista de contactos
	if($rcvymd_arryvariables["section"] == "contactos" && $rcvymd_arryvariables["action"] == "" && $rcvymd_arryvariables["id"] == "" && $rcvymd_arryvariables["idtercero"] > "0")
	{
		$rcvymd_fichero = $lnxrecoverymode_files."tercero_".$rcvymd_arryvariables["idtercero"]."_contactos.xml";
		$file = fopen($rcvymd_fichero, "w");

        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
        fwrite($file, "<lnxgest>". PHP_EOL);
        fwrite($file, "   <tipoxml>TERCERO_CONTACTOS</tipoxml>". PHP_EOL);
		fwrite($file, "   <contactos>". PHP_EOL);

		$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$rcvymd_arryvariables["idtercero"]."'");	
		while($col = mysqli_fetch_array($cnssql))
		{
			fwrite($file, "      <contacto>". PHP_EOL);
			fwrite($file, "         <id>".$col["id"]."</id>". PHP_EOL);
			fwrite($file, "         <idtercero>".$col["idtercero"]."</idtercero>". PHP_EOL);
			fwrite($file, "         <nombre>".$col["nombre"]."</nombre>". PHP_EOL);
			fwrite($file, "         <tel>".$col["tel"]."</tel>". PHP_EOL);
			fwrite($file, "         <email>".$col["email"]."</email>". PHP_EOL);
			fwrite($file, "         <ididioma>".$col["ididioma"]."</ididioma>". PHP_EOL);
			fwrite($file, "         <cargo>".$col["cargo"]."</cargo>". PHP_EOL);
			fwrite($file, "         <lnxpublic>".$col["lnxpublic"]."</lnxpublic>". PHP_EOL);
			fwrite($file, "         <usuariopublic>".$col["usuariopublic"]."</usuariopublic>". PHP_EOL);
			fwrite($file, "         <contrasena>".$col["contrasena"]."</contrasena>". PHP_EOL);
			fwrite($file, "         <iddir>".$col["iddir"]."</iddir>". PHP_EOL);
			fwrite($file, "         <lbltel2>".$col["lbltel2"]."</lbltel2>". PHP_EOL);
			fwrite($file, "         <tel2>".$col["tel2"]."</tel2>". PHP_EOL);
			fwrite($file, "         <lbltel3>".$col["lbltel3"]."</lbltel3>". PHP_EOL);
			fwrite($file, "         <tel3>".$col["tel3"]."</tel3>". PHP_EOL);
			fwrite($file, "         <activo>".$col["activo"]."</activo>". PHP_EOL);
			fwrite($file, "            <camposextra>". PHP_EOL);
			$cnssqlcampos = $mysqli->query("select * from ".$prefixsql."terceroscontacxtra where idtercero = '".$rcvymd_arryvariables["idtercero"]."' and idcontacto = '".$col["id"]."'");	
			while($colcampos = mysqli_fetch_array($cnssqlcampos))
			{
				fwrite($file, "            <campoextra>". PHP_EOL);
				fwrite($file, "               <idtercero>".$colcampos["idtercero"]."</idtercero>". PHP_EOL);
				fwrite($file, "               <idcontacto>".$colcampos["idcontacto"]."</idcontacto>". PHP_EOL);
				fwrite($file, "               <tipocampo>".$colcampos["tipocampo"]."</tipocampo>". PHP_EOL);
				fwrite($file, "               <labelcampo>".$colcampos["labelcampo"]."</labelcampo>". PHP_EOL);
				fwrite($file, "               <valorcampo>".$colcampos["valorcampo"]."</valorcampo>". PHP_EOL);
				fwrite($file, "            </campoextra>". PHP_EOL);
			}
			fwrite($file, "            </camposextra>". PHP_EOL);
			fwrite($file, "      </contacto>". PHP_EOL);	
		}
		
		fwrite($file, "   </contactos>". PHP_EOL);
		fwrite($file, "</lnxgest>". PHP_EOL);

		$respuestarecoverymode = "Se ha exportado el listado de contactos";
	}


}
if($rcvymd_arryvariables["module"] == "lnxit")
{ 
	if($rcvymd_arryvariables["section"] == "infopass" && $rcvymd_arryvariables["action"] == "edit" && $rcvymd_arryvariables["id"] > 0)
	{ 
		$rcvymd_fichero = $lnxrecoverymode_files."it_infopass_".$rcvymd_arryvariables["id"].".xml";
		
		//exportamos la ficha del infopass
        $sqlaux = $mysqli->query("select * from ".$prefixsql."it_infopass where id = '".$rcvymd_arryvariables["id"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbusuario = $rowaux["usuario"];
		$dbpassword = $rowaux["password"];
		$dbemail = $rowaux["email"];
		$dbdonde = $rowaux["donde"];
		$dbnotas = $rowaux["notas"];
		$dbidtercero = $rowaux["idtercero"];
		$dburlweb = $rowaux["urlweb"];


        $file = fopen($rcvymd_fichero, "w");

        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
        fwrite($file, "<lnxgest>". PHP_EOL);
        fwrite($file, "   <tipoxml>INFOPASS</tipoxml>". PHP_EOL);
        fwrite($file, "   <infopass>". PHP_EOL);
        fwrite($file, "      <id>".$rcvymd_arryvariables["id"]."</id>". PHP_EOL);
        fwrite($file, "      <usuario>".$dbusuario."</usuario>". PHP_EOL);
		fwrite($file, "      <password>".$dbpassword."</password>". PHP_EOL);
		fwrite($file, "      <email>".$dbemail."</email>". PHP_EOL);
		fwrite($file, "      <donde>".$dbdonde."</donde>". PHP_EOL);
		fwrite($file, "      <notas>".$dbnotas."</notas>". PHP_EOL);
		fwrite($file, "      <idtercero>".$dbidtercero."</idtercero>". PHP_EOL);
		fwrite($file, "      <urlweb>".$dburlweb."</urlweb>". PHP_EOL);
		fwrite($file, "   </infopass>". PHP_EOL);
		fwrite($file, "   <infopass_perm>". PHP_EOL);
		//Permisos de infopass
		$cnssqlaux2 = $mysqli->query("select * from ".$prefixsql."it_infopass_perm where idinfopass = '".$rcvymd_arryvariables["id"]."' ");	
		while($colaux = mysqli_fetch_array($cnssqlaux2))
		{
			
			fwrite($file, "      <permiso>". PHP_EOL);
			fwrite($file, "         <idusuario>".$colaux["idusuario"]."</idusuario>". PHP_EOL);
			fwrite($file, "         <idgrupo>".$colaux["idgrupo"]."</idgrupo>". PHP_EOL);
			fwrite($file, "      </permiso>". PHP_EOL);
		}
		fwrite($file, "   </infopass_perm>". PHP_EOL);
        fwrite($file, "</lnxgest>". PHP_EOL);

        fclose($file);

        $respuestarecoverymode = "Infopass [".$rcvymd_arryvariables["id"]."][".$dbdonde."] exportado correctamente";
	}

}

*/

if($respuestarecoverymode == "")
{
    $lbl_recoverymoders = "No se puede hacer un backup/snapshot en esta ventana";
}
else
{
    $lbl_recoverymoders = $respuestarecoverymode;
}

$data = array(
    "recoverymoders" => $lbl_recoverymoders
);
 
echo json_encode($data);

}
?>