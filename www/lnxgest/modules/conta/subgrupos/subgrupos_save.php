<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$fhidejercicio = $_POST["hidejercicio"];
$fhaccion = $_POST["haccion"];

$fhidgrupo = $_POST["hidgrupo"];
$ftxtcodgrupo = $_POST["txtcodgrupo"];
$ftxtgrupo = addslashes($_POST["txtgrupo"]);

if($fhaccion == "new")
{    
    $sqlconta = $mysqli->query("insert into ".$prefixsql."conta_subgrupos (idserie, idempresa, subgrupo, descripcion) values('".$fhidejercicio."', '".$idempresa."', '".$ftxtcodgrupo."', '".$ftxtgrupo."')");
}

if($fhaccion == "update")
{    
    $sqlconta = $mysqli->query("update ".$prefixsql."conta_subgrupos set subgrupo = '".$ftxtcodgrupo."', descripcion = '".$ftxtgrupo."' where id = '".$fhidgrupo."'");
}

$url_atras = "index.php?module=conta&section=subgrupos&idejercicio=".$fhidejercicio;
header( "refresh:2;url=".$url_atras );
echo '<div align="center">
<table width="300" class="msgaviso">
<tr><td class="maintitle">mensaje:</td></tr>
<tr><td>Cambios efectuados con éxito</td></tr>
<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
</table></div>';

?>

