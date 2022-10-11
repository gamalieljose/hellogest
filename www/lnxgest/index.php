<!DOCTYPE html>
<noscript>
        <h1>Comprobando si javascript está habilitado</h1>
        <div class="deshabilitado">
            <img src="images/error.png" alt="Javascript deshabilitado" />
            Javascript está deshabilitado en su navegador web.<br />
            Por favor, para ver correctamente este sitio,<br />
            <b><i>habilite javascript</i></b>.<br />
            <br />
            Para ver las instrucciones para habilitar javascript<br />
            en su navegador, haga click 
            <a href="http://www.enable-javascript.com/es/" 
            target="_blank">aquí</a>.
        </div>
    </noscript>

<?php
ob_start();
session_start();

//ini_set('display_errors','on');

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent){

$aceptar_navegador = 'NO';

if(strpos($user_agent, 'Firefox') !== FALSE)
{
   $aceptar_navegador = 'OK';
}
if(strpos($user_agent, 'Chrome') !== FALSE)
{
   $aceptar_navegador = 'OK';
}	
 
return $aceptar_navegador;

}


$navegador = getBrowser($user_agent);

if ($navegador == "NO")
{
    //No se acepta y obliga a descargarlo
    include("core/firefox.php");
}
else
{    
    //Se acepta el navegador
    require_once("core/cfpc.php"); 
    //Linea 72

    if ($_GET["control"] == 'login' || $_GET["control"] == 'logoff' )
    {
        echo '<head>
    <title>LNXGEST</TITLE>
    <link rel="StyleSheet" href="img/main.css" media="all" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="core/bs/css/bootstrap.min.css">
    </head>';
            include("core/control_login.php");
    }
    if ($_GET["pass"] == 'no')
    {

        echo '<p align="center">Username or passwors are incorrect</p>';
      
    }

// control seguridad con session
//require_once("core/cfpc.php"); 
$uidcontador = 0;

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_uid where iduser = '".$_COOKIE["lnxuserid"]."' ");	
while($col = mysqli_fetch_array($sqlaux))
{
    if ($_SESSION["lnxuid"] == $col["uidsession"])
	{
		$uidcontador = $uidcontador +1;
	}
    
}

if ($uidcontador > 0)
{
    $db_uidsession = $_SESSION["lnxuid"];   
}
else
{
    $db_uidsession = "0";
}

if($_COOKIE["lnxuserid"] > "0" && $_COOKIE["lnxlastuidsession"] <> "")
{    
    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."users_uid where iduser = '".$_COOKIE["lnxuserid"]."' and uidsession = '".$_COOKIE["lnxlastuidsession"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbsesionexistente = $rowaux["contador"];
    
    if($dbsesionexistente == "1")
    {
        session_start();
        session_id($_COOKIE["lnxlastuidsession"]);
        $db_uidsession = session_id();
        $_SESSION["lnxuid"] = $db_uidsession;
    }

}

if($_SESSION["lnxuid"] == $db_uidsession && $_COOKIE["lnxuserid"] > 0)
	{
            include("core/app.php");	
    }
	else
	{
        echo '<head>
		<title>LNXGEST</TITLE>
		<link rel="StyleSheet" href="img/main.css" media="all" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="core/bs/css/bootstrap.min.css">
		</head>';
            include("core/login.php");
    }
	
// Fin control

}

ob_end_flush();

?>
