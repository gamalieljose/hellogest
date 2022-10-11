<?php
$idlibro = $_POST["hidlibro"];
$ftxtlibro = addslashes($_POST["txtlibro"]);
$haccion = $_POST["haccion"];


$flstautores = $_POST["lstautores"];
$flstidiomas = $_POST["lstidiomas"];
$flstcategorias = $_POST["lstcategorias"];
$ftxtisbn = addslashes($_POST["txtisbn"]);
$ftxtcodigo = addslashes($_POST["txtcodigo"]);
$fchkprestar = $_POST["chkprestar"];
if($fchkprestar == ""){$fchkprestar = "0";}
$ftxtnotas = addslashes($_POST["txtnotas"]);


if ($haccion == 'new')
{
	$sqltercero = $mysqli->query("insert into ".$sqlpfxbiblio."libros (libro, idautor, ididioma, idcategoria, isbn, codigo, prestar, notas, idprestamo) VALUES ('".$ftxtlibro."', '".$flstautores."', '".$flstidiomas."', '".$flstcategorias."', '".$ftxtisbn."', '".$ftxtcodigo."', '".$fchkprestar."', '".$ftxtnotas."', '0')");
}
if ($haccion == 'update')
{
	$sqltercero = $mysqli->query("update ".$sqlpfxbiblio."libros set libro = '".$ftxtlibro."', idautor = '".$flstautores."', ididioma = '".$flstidiomas."', idcategoria = '".$flstcategorias."', isbn = '".$ftxtisbn."', codigo = '".$ftxtcodigo."', prestar = '".$fchkprestar."', notas = '".$ftxtnotas."' where id = '".$idlibro."'");
}
if ($haccion == 'delete')
{
	$sqltercero = $mysqli->query("delete from ".$sqlpfxbiblio."libros where id = '".$idlibro."'");
}
$urlatras = "index.php?module=biblio&section=libros";
header( "Location: ".$urlatras );



?>