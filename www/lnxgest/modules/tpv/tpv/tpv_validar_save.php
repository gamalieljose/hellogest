<?php
$idtpv = $_POST["hidtpv"];
$fhaccion = $_POST["haccion"];
$flstformapago = $_POST["lstformapago"];
$ftxtpagado = $_POST["txtpagado"];


$sqlaux = $mysqli->query("select sum(importe) as contador from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$tpv_bi = $rowaux["contador"];


$url_atras = "index.php?module=tpv&section=tpv&action=view&id=".$idtpv;

if($fhaccion == "new" )
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbidserie = $rowaux["idserie"];
        $dbidterminal = $rowaux["idterminal"];
        $dbiduser = $rowaux["iduser"];
        $dbidtienda = $rowaux["idtienda"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$db_lblserie = $rowaux["serie"];
	
	$sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."tpv where idserie = '".$dbidserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ultimocodigo = $rowaux["contador"];
	
	$ultimocodigo = $ultimocodigo +1;
	$db_lblserie = $db_lblserie."/".$ultimocodigo;
	
		 
	 
	 /* 
	estado 0,1, 2
	0 - Ticket ya cerrado
	1 - Abierto / en uso
	
	*/
	
	$fechahoy = date("Y-m-d h:m:s");

        if($ftxtpagado > '0')
        {
            $sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_pagos (idtienda, iduser, idterminal, idserie, idtpv, tipo, fecha, idfpago, importe) values('".$dbidtienda."', '".$dbiduser."', '".$dbidterminal."', '".$dbidserie."', '".$idtpv."', 'TCKT', '".$fechahoy."', '".$flstformapago."', '".$ftxtpagado."')");
        }
	$sqltpv = $mysqli->query("update ".$prefixsql."tpv set codigoint = '".$ultimocodigo."', codigo = '".$db_lblserie."', estado = '0', fecha = '".$fechahoy."' where id = '".$idtpv."'");


        $sqltpv = $mysqli->query("delete from ".$prefixsql."tpv_campos where idtpv = '".$idtpv."' ");
        
	while ($post = each($_POST))
	{
	$variablepost = $post[0];
	$variablevalor = $post[1];
	$var_temp = explode("_", $variablepost);
		if($var_temp[0] == "fdb")
		{
			$sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_campos (idtpv, campo, valor) values('".$idtpv."', '".$var_temp[1]."', '".$variablevalor."')");
		}
	}
	
	
	$url_atras = "index.php?module=tpv";
}

if($fhaccion == "onlyprint" )
{
    //Si solo es impresión del ticket
    //Lo ideal es establecer el edittpv como 0 (dejar de modificar)
    $fchkdejareditar = $_POST["chkdejareditar"];
    
    if($fchkdejareditar == 'cerrar')
    {
        $sqltpv = $mysqli->query("update ".$prefixsql."tpv set edittpv = '0' where id = '".$idtpv."'");
    }
    
    $sqltpv = $mysqli->query("delete from ".$prefixsql."tpv_campos where idtpv = '".$idtpv."' ");
        
	while ($post = each($_POST))
	{
	$variablepost = $post[0];
	$variablevalor = $post[1];
	$var_temp = explode("_", $variablepost);
		if($var_temp[0] == "fdb")
		{
			$sqltpv = $mysqli->query("insert into ".$prefixsql."tpv_campos (idtpv, campo, valor) values('".$idtpv."', '".$var_temp[1]."', '".$variablevalor."')");
		}
	}
    
}

if($_POST["chkprint"] == "1")
{    
    $idimpresora = $_POST["lstprinters"];
    $docprinttemplate = $_POST["lstdocprint"];
    
    include("modules/tpv/docprint/".$docprinttemplate);
    
    if($_POST["chkadicionales"] == "1")
    {
        include("modules/tpv/docprint/tck_condiciones.php");
    }
}

header( "refresh:2;url=".$url_atras );
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';
?>

