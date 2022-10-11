<?php
$idtercero = $_GET["idtercero"]; //idterecro
$hidregistro = $_GET["hidregistro"]; //idregistro


$ftxtnombre = addslashes($_POST["txtnombre"]);
$ftxtcargo = addslashes($_POST["txtcargo"]);
$ftxttel = addslashes($_POST["txttel"]);
$ftxtemail = addslashes($_POST["txtemail"]);
$fhaccion = $_POST["haccion"];
$fhdbeditcontacto = $_POST["hdbeditcontacto"];
$flstidioma = $_POST["lstidioma"];


$ftxtlabeltel2 = addslashes($_POST["txtlabeltel2"]);
$ftxttel2 = addslashes($_POST["txttel2"]);
$ftxtlabeltel3 = addslashes($_POST["txtlabeltel3"]);
$ftxttel3 = addslashes($_POST["txttel3"]);


$flstdircontacto = $_POST["lstdircontacto"];

// modulo lnxpublic activado
	$fsltactivo = "0"; //$_POST["sltactivo"];
	$ftxtcontrasena = ""; //$_POST["txtcontrasena"];

// Campos personalizados
$fdi_tipo = $_POST["di_tipo"];
$fdi_label = $_POST["di_label"];
$fdi_valor = $_POST["di_valor"];

$fchkactivo = $_POST["chkactivo"];
	if($fchkactivo == ""){$fchkactivo = "0";}


if ($fhaccion == 'new')
{
	
	$contactos= $mysqli->query("insert into ".$prefixsql."terceroscontactos (idtercero, nombre, cargo, tel, email, ididioma, iddir, lbltel2, tel2, lbltel3, tel3, activo, lnxpublic, usuariopublic, contrasena ) values ('".$idtercero."', '".$ftxtnombre."', '".$ftxtcargo."', '".$ftxttel."', '".$ftxtemail."', '".$flstidioma."', '".$flstdircontacto."', '".$ftxtlabeltel2."', '".$ftxttel2."', '".$ftxtlabeltel3."', '".$ftxttel3."', '".$fchkactivo."', '0', '', '')");	
		
	//generacion automatica del usuario
	$ConsultaMySql= $mysqli->query("SELECT max(id) as idcontacto from ".$prefixsql."terceroscontactos ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idmaxcontacto = $row['idcontacto'];
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$idmaxcontacto."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	
	$usuariolnx = $row["idtercero"].'-'.$idmaxcontacto;
	$contactos= $mysqli->query("update ".$prefixsql."terceroscontactos set usuariopublic = '".$usuariolnx."' where id = '".$idmaxcontacto."'");


	//lnx_terceroscontacxtra
	$idcamposperso = -1;
	foreach($fdi_tipo as $nidcampo)
	{
		$idcamposperso = $idcamposperso +1;

		if($nidcampo == "TEXTO")
		{
			$cpdb_tipocampo = '1';
			if($fdi_label[$idcamposperso] == "" && $fdi_valor[$idcamposperso] == "")
			{
				$guardacampos = "NO";
			}
			else 
			{
				$guardacampos = "YES";
			}
		}
		if($nidcampo == "SINO")
		{
			$cpdb_tipocampo = '2';
		
			if($fdi_label[$idcamposperso] == "")
			{
				$guardacampos = "NO";
			}
			else 
			{
				$guardacampos = "YES";
			}
		
		}
		if($guardacampos == "YES")
		{
			$lbl_fdi_label = addslashes($fdi_label[$idcamposperso]);
			$lbl_fdi_valor = addslashes($fdi_valor[$idcamposperso]);
						
			$sqlcamposperso = $mysqli->query("insert into ".$prefixsql."terceroscontacxtra (idtercero, idcontacto, tipocampo, labelcampo, valorcampo ) values ('".$idtercero."', '".$idmaxcontacto."', '".$cpdb_tipocampo."', '".$lbl_fdi_label."', '".$lbl_fdi_valor."') ");
		}

	}



}
if ($fhaccion == 'update')
{
	
	$contactos= $mysqli->query("update ".$prefixsql."terceroscontactos set idtercero = '".$idtercero."', nombre = '".$ftxtnombre."', cargo = '".$ftxtcargo."', tel = '".$ftxttel."', email = '".$ftxtemail."', ididioma = '".$flstidioma."', lnxpublic = '".$fsltactivo."', contrasena = '".$ftxtcontrasena."', iddir = '".$flstdircontacto."', lbltel2 = '".$ftxtlabeltel2."', tel2 = '".$ftxttel2."', lbltel3 = '".$ftxtlabeltel3."', tel3 = '".$ftxttel3."', activo = '".$fchkactivo."' where id = '".$fhdbeditcontacto."'");

	//lnx_terceroscontacxtra
	$sqlcamposperso = $mysqli->query("delete from ".$prefixsql."terceroscontacxtra where idcontacto = '".$fhdbeditcontacto."'");
	$idcamposperso = -1;
	foreach($fdi_tipo as $nidcampo)
	{
		$idcamposperso = $idcamposperso +1;

		if($nidcampo == "TEXTO")
		{
			$cpdb_tipocampo = '1';
			if($fdi_label[$idcamposperso] == "" && $fdi_valor[$idcamposperso] == "")
			{
				$guardacampos = "NO";
			}
			else 
			{
				$guardacampos = "YES";
			}
		}
		if($nidcampo == "SINO")
		{
			$cpdb_tipocampo = '2';
		
			if($fdi_label[$idcamposperso] == "")
			{
				$guardacampos = "NO";
			}
			else 
			{
				$guardacampos = "YES";
			}
		
		}
		if($guardacampos == "YES")
		{
			$lbl_fdi_label = addslashes($fdi_label[$idcamposperso]);
			$lbl_fdi_valor = addslashes($fdi_valor[$idcamposperso]);
						
			$sqlcamposperso = $mysqli->query("insert into ".$prefixsql."terceroscontacxtra (idtercero, idcontacto, tipocampo, labelcampo, valorcampo ) values ('".$idtercero."', '".$fhdbeditcontacto."', '".$cpdb_tipocampo."', '".$lbl_fdi_label."', '".$lbl_fdi_valor."') ");
		}

	}
	
}

if ($fhaccion == 'delete')
{
	
	$fhidcontacto = $_POST["hidcontacto"]; //id contacto
	$sqlcontacto = $mysqli->query("delete from ".$prefixsql."terceroscontactos where id = '".$fhidcontacto."'");
	$sqlcontacto = $mysqli->query("delete from ".$prefixsql."terceroscontacxtra where idcontacto = '".$fhidcontacto."'");
	

}

$url_atras = "index.php?module=terceros&section=contactos&idtercero=".$idtercero;

if(isset($_POST["btnguardar"])) 
{
	$url_atras = "index.php?module=terceros&section=contactos&idtercero=".$idtercero;
	
}
if(isset($_POST["btnaplicar"])) 
{
	$url_atras = "index.php?module=terceros&section=contactos&action=edit&idtercero=".$idtercero."&id=".$fhdbeditcontacto."&upd=ate";
	                
	//$url_atras = "index.php?module=terceros&section=contactos&idtercero=".$idtercero."&upd=ate";
}



header( "Location: ".$url_atras );





?>
