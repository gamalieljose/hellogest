<?php
$idservicio = $_POST["hidservicio"];
$haccion = $_POST["haccion"];

$ftxtservicio = $_POST["txtservicio"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_tipos (tipo) VALUES ('".$ftxtservicio."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_tipos set tipo = '".$ftxtservicio."' where id = '".$idservicio."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."ita_tipos where id = '".$idservicio."'");
}

$urlatras = "index.php?module=lnxit&section=activos&ss=tipos";
header("Location: ".$urlatras);

?>