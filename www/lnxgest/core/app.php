<?php
$lnxgestversion = "20210516";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="core/js/funciones.js"></script>
  
  <script src="core/js/jquery.js"></script>
  <script src="core/js/jquery-ui.js"></script>


  
<style>
.bordeintermitente2 {
  animation: blink 1.5s infinite;
  background-color: 2px solid transparent;
  transition: background-color 0.75s;
}

@keyframes blink {
  50% {
    background-color: #F7FE2E;
  }
}
</style>
  
  <?php
require("core/cfpc.php");
require("core/chekpermisos.php");
require("core/funciones_user.php");




if ($_GET["module"] <> '')
{
	//Carga pack idioma
	include_once("modules/".$_GET["module"]."/lang/".$_COOKIE["lnxuserlang"].".php");
	//obtener el idscreen
	include("modules/".$_GET["module"]."/screens.php");
	

}

if ($_GET["core"] == "screen")
{
include("core/screen.php");
}

if( $displaytitle == '')
{
	$tituloapp = "LNXGEST ERP";
}
else
{
	$tituloapp = $displaytitle." - LNXGEST ERP";
}

?>
  
  
  <title><?php echo $tituloapp; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="core/bs/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="core/font-awesome/css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="core/font-awesome/css/brands.css" rel="stylesheet" type="text/css">
  <link href="core/font-awesome/css/solid.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="core/css/sb-admin.css" rel="stylesheet">
  <link href="core/css/custom.css" rel="stylesheet">
</head>
<?php
if ($_COOKIE["lnxshowmenu"] == "ocultar"){$chke_showmenu = 'sidenav-toggled';}else{$chke_showmenu = '';}

echo '<body class="fixed-nav sticky-footer bg-dark '.$chke_showmenu.'" id="page-top">';

if($_COOKIE["lnxrecoverymode"] == "ON"){ include("core/recoverymode.php"); }

        $sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $permitido_login = $rowaux["valor"];

        if($permitido_login == "NO")
        {
            echo '<p align="center"><i style="color: red;" class="hidephonview fa fa-times-circle fa-lg"></i> <b style="color: red;">User login is disabled</b></p>';
        }


?>



  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img class="logolnxgest" src="img/lnxgestlogo.png" /></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<span class="titulo-screen"><?php echo $displaytitle; ?></span>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <?php include("core/menu.php"); ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" style="background-color: #6b6b6b;" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
	  
	  <?php
			
			$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."printjobs "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$colaprintjojbs = $rowaux["contador"];
			
			//Calcular llamadas
			$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."crm_phonecalls where (idasignado = '0' or idasignado = '".$_COOKIE["lnxuserid"]."') and idestado >= '1'"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$db_contador_llamadas = $rowaux["contador"];
			
			$totalavisos = $colaprintjojbs + $db_contador_llamadas;
			if($totalavisos > 0){$campanaalerta = 'bordeintermitente2 ';}else{$campanaalerta = '';}
?>
	  
	  
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo '<i class="'.$campanaalerta.'fa fa-fw fa-bell" style="color: #6b6b6b;"></i>'; ?>
            <span class="d-lg-none" style="color: #6b6b6b;">Notificaciones
              <span class="badge badge-pill badge-warning bordeintermitente2"><?php echo $colaprintjojbs; ?> Notificaciones</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
			

            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Notificaciones</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?module=userpanel&section=spool">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Cola de impresion</strong>
              </span>
              
              <div class="dropdown-message small"><?php echo $colaprintjojbs; ?> documentos en cola de impresion.</div>
            </a>
			
			<a class="dropdown-item" href="index.php?module=crm&section=phonecalls">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Llamadas</strong>
              </span>
              
              <div class="dropdown-message small"><?php echo $db_contador_llamadas; ?> Llamadas pendientes</div>
            </a>
			
            
			<!-- 
			
			<div class="dropdown-divider"></div>
			
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
			-->
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2" id="frmnumscreen" name="frmnumscreen" method="post" action="index.php?core=screen">
            <div class="input-group">
<?php
$cnsscreenvalue = addslashes("index.php?".$_SERVER["QUERY_STRING"]);
$sqlscreen = $mysqli->query("select * from ".$prefixsql."screens where url = '".$cnsscreenvalue."' order by id asc limit 1"); 
$rowscreen = mysqli_fetch_assoc($sqlscreen);
$numscreen = $rowscreen["screen"];
?>
              <input class="form-control" name="txtscreen" type="text" value="<?php echo $numscreen; ?>" id="txtscreen" size="8" maxlength="10" autocomplete="off" style="width: 100px;">
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
		
		<?php
			
			//Muestra nombre display usuario
			
			$sqluser = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");

			$camposuser = mysqli_fetch_assoc($sqluser);
			$diplayuser = $camposuser['display'];
			
			
	
	
			?>
		
		
        <li class="nav-item">
          <a class="nav-link muestranombreusuario" style="color: #6b6b6b;" href="index.php?module=userpanel">
            <i class="fa fa-fw fa-sign-out"></i><?php echo $diplayuser; ?></a>
        </li>
      </ul>
    </div>
  </nav>
  

  
  
  <div class="content-wrapper colorfondo">
    <div class="container-fluid">
      
		<span class="titulo-screen_movil"><?php echo $displaytitle; ?></span>
	

<?php
	if ($_GET["error"] == "si")
	{
	
	echo '<p><b>NO EXISTE EL MENU SOLICITADO</b></p>';
		
	}
	else
	{
	//carga el menu del modulo si es necesario
		if ($_GET["module"] <> '')
		{
			include("modules/".$_GET["module"]."/main.php");

			echo '<p>&nbsp;</p><p>&nbsp;</p>';
		}
	else

		{
			include("modules/userpanel/principal/view.php");

			echo '<p>&nbsp;</p><p>&nbsp;</p>';
		}
			
			
	
	}
	
	?>		  
		  
		  
		  

		  
		  
		  
		  
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer" style="height: 30px; line-height: 25px; position:fixed;">
      
        <div align="center" valign="top">
          <small>LNXGEST ERP Version <?php echo $lnxgestversion; ?></small>
        </div>
     
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <!-- Bootstrap core JavaScript-->
    
    <script src="core/bs/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="core/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="core/js/sb-admin.js"></script>
	
	
  </div>
</body>

</html>
