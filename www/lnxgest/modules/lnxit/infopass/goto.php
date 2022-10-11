<?php
$idinfopass = $_POST["txtididinfopass"];

$ConsultaMySql= $mysqli->query("SELECT COUNT(*) as contador from ".$prefixsql."it_infopass where id = '".$idinfopass."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcontador = $row['contador'];

if ($dbcontador == '1')
{
	
	header("Location: index.php?module=lnxit&section=infopass&action=edit&id=".$idinfopass);
?>
<script type="text/javascript">

<?php
echo 'location.href = "index.php?module=lnxit&section=infopass&action=edit&id='.$idinfopass.'";';
?>


</script>
<?php

	
}
else
{
$urlatras = "index.php?module=lnxit&section=infopass";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td><img src="img/exclamation.png" />No existe el ticket solicitado</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}
?>
