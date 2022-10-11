<?php
$diractual = dirname(__FILE__);

$directorios = explode("/", $diractual);

$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
}

$hastadir = $iddir - 2;
$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
		if($iddir <= $hastadir)
		{
			$nuevodirectorio = $nuevodirectorio.$directorios[$iddir].'/';

		}
}

$dircfpc = $nuevodirectorio."core/cfpc.php";
require($dircfpc);

$ficherohtmltemp = $lnxrutaficherostemp."usr/0/lnxg2suitecrm.xml";

$file = fopen($ficherohtmltemp, "w");

    fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
    fwrite($file, "<lnxgest>". PHP_EOL);
    fwrite($file, "   <terceros>". PHP_EOL);

    $cnssql= $mysqli->query("select * from ".$prefixsql."terceros");	
    while($col = mysqli_fetch_array($cnssql))
    {
        $idtercero = $col["id"];
		
        fwrite($file, "      <tercero>". PHP_EOL);
        fwrite($file, "         <id>".$col["id"]."</id>". PHP_EOL);
        fwrite($file, "         <razonsocial>".$col["razonsocial"]."</razonsocial>". PHP_EOL);
        fwrite($file, "         <nomcomercial>".$col["nomcomercial"]."</nomcomercial>". PHP_EOL);
		fwrite($file, "         <fechaalta>".$col["fechaalta"]." 00:00:00</fechaalta>". PHP_EOL);
		fwrite($file, "         <contactos>". PHP_EOL);
		
		$cnssqlcontactos = $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."'");	
		while($colcontacto = mysqli_fetch_array($cnssqlcontactos))
		{
		
			fwrite($file, "            <contacto>". PHP_EOL);
			fwrite($file, "               <idcontacto>".$colcontacto["id"]."</idcontacto>". PHP_EOL);
			fwrite($file, "               <nombre>".$colcontacto["nombre"]."</nombre>". PHP_EOL);
			fwrite($file, "               <tel>".$colcontacto["tel"]."</tel>". PHP_EOL);
			fwrite($file, "               <email>".$colcontacto["email"]."</email>". PHP_EOL);
			fwrite($file, "            </contacto>". PHP_EOL);
		}
		
		
		fwrite($file, "         </contactos>". PHP_EOL);
        fwrite($file, "      </tercero>". PHP_EOL);   
    }

    
	fwrite($file, "   </terceros>". PHP_EOL);
	fwrite($file, "</lnxgest>". PHP_EOL);


	fclose($file);
?>