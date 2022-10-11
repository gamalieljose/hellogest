<?php



echo '<output>'. PHP_EOL;

if($lnx_module == "core" && $_POST["lnx_cmd"] == "modules")
{
	echo '<modules>'. PHP_EOL;

	//Muestra el listado de usuarios ID, usernamename y display
	$cnssql= $mysqli->query("select * from ".$prefixsql."modulos order by display");	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		
		echo '   <module>'. PHP_EOL;
		echo '      <moduleid>'.$col["idmod"].'</moduleid>'. PHP_EOL;
		echo '      <moduledisplay>'.$col["display"].'</moduledisplay>'. PHP_EOL;
		echo '   </module>'. PHP_EOL;
		
	}

	echo '</modules>'. PHP_EOL;

echo '</output>'. PHP_EOL;
	
	
	
}
	
	


?>