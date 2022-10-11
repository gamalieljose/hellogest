
<header>
<meta name="viewport" content="width=device-width, user-scalable=no">
<?php
header('Content-Type: text/html; charset=utf-8');

if($_COOKIE["lnxuserid"] > "0")
{
	
	
}
else
{
	header( "refresh:2;url=../index.php" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Acceso denegado';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="../index.php">Aceptar</a>';
	
	
	
	echo '</td></tr>
	</table></div>';	

}
?>


</header>
<body>

<?php
if($_COOKIE["lnxuserid"] > "0")
{
	if($_GET["section"] == ''){include("../modules/partes/ws/ws.php");}
	if($_GET["section"] == 'new'){include("../modules/partes/ws/ws_new.php");}
	if($_GET["section"] == 'save'){include("../modules/partes/ws/ws_save.php");}
	
	if($_GET["section"] == 'list'){include("../modules/partes/ws/ws_list.php");}
}
?>

</body>