<?php
$respuestarecoverymode = "";


if($rcvymd_arryvariables["module"] == "lnxit")
{ 
	if($rcvymd_arryvariables["section"] == "infopass" && $rcvymd_arryvariables["action"] == "edit" && $rcvymd_arryvariables["id"] > 0)
	{ 
		$rcvymd_fichero = $lnxrecoverymode_files."it_infopass_".$rcvymd_arryvariables["id"].".xml";
		
		//exportamos la ficha del infopass
        $sqlaux = $mysqli->query("select * from ".$prefixsql."it_infopass where id = '".$rcvymd_arryvariables["id"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbusuario = $rowaux["usuario"];
		$dbpassword = $rowaux["password"];
		$dbemail = $rowaux["email"];
		$dbdonde = $rowaux["donde"];
		$dbnotas = $rowaux["notas"];
		$dbidtercero = $rowaux["idtercero"];
		$dburlweb = $rowaux["urlweb"];


        $file = fopen($rcvymd_fichero, "w");

        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
        fwrite($file, "<lnxgest>". PHP_EOL);
        fwrite($file, "   <module>lnxit</module>". PHP_EOL);
        fwrite($file, "   <tipoxml>INFOPASS</tipoxml>". PHP_EOL);
        fwrite($file, "   <infopass>". PHP_EOL);
        fwrite($file, "      <id>".$rcvymd_arryvariables["id"]."</id>". PHP_EOL);
        fwrite($file, "      <usuario>".$dbusuario."</usuario>". PHP_EOL);
		fwrite($file, "      <password>".$dbpassword."</password>". PHP_EOL);
		fwrite($file, "      <email>".$dbemail."</email>". PHP_EOL);
		fwrite($file, "      <donde>".$dbdonde."</donde>". PHP_EOL);
		fwrite($file, "      <notas>".$dbnotas."</notas>". PHP_EOL);
		fwrite($file, "      <idtercero>".$dbidtercero."</idtercero>". PHP_EOL);
		fwrite($file, "      <urlweb>".$dburlweb."</urlweb>". PHP_EOL);
		fwrite($file, "   </infopass>". PHP_EOL);
		fwrite($file, "   <infopass_perm>". PHP_EOL);
		//Permisos de infopass
		$cnssqlaux2 = $mysqli->query("select * from ".$prefixsql."it_infopass_perm where idinfopass = '".$rcvymd_arryvariables["id"]."' ");	
		while($colaux = mysqli_fetch_array($cnssqlaux2))
		{
			
			fwrite($file, "      <permiso>". PHP_EOL);
			fwrite($file, "         <idusuario>".$colaux["idusuario"]."</idusuario>". PHP_EOL);
			fwrite($file, "         <idgrupo>".$colaux["idgrupo"]."</idgrupo>". PHP_EOL);
			fwrite($file, "      </permiso>". PHP_EOL);
		}
		fwrite($file, "   </infopass_perm>". PHP_EOL);
        fwrite($file, "</lnxgest>". PHP_EOL);

        fclose($file);

        $respuestarecoverymode = "Infopass [".$rcvymd_arryvariables["id"]."][".$dbdonde."] exportado correctamente";
	}

}
?>