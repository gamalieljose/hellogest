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

shell_exec("rm ".$lnxrutaficherostemp."usr -R");

shell_exec("mkdir ".$lnxrutaficherostemp."usr -m 777");

shell_exec("mkdir ".$lnxrutaficherostemp."usr/0 -m 777");

$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."users order by username");
while($col = mysqli_fetch_array($ConsultaMySql))
{
	shell_exec("mkdir ".$lnxrutaficherostemp."usr/".$col["username"]." -m 777");
	echo '<p>Directorio <b>'.$lnxrutaficherostemp.'usr/'.$col["username"].'</b> Creado</p>';


	shell_exec("mkdir ".$lnxrutaficherostemp."usr/".$col["id"]." -m 777");

}

echo '<p>Fin limpieza directorios</p>';

?>