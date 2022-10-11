<?php

echo '<output>'. PHP_EOL;

if($_POST["lnx_cmd"] == "showtercerosall")
{
	$sql_terceros = "select * from ".$prefixsql."terceros order by razonsocial";
}

if($_POST["lnx_cmd"] == "tercerosallsearch")
{
	$vbbusqueda = addslashes($_POST["lnx_search"]);

	$sql_terceros = "select * from ".$prefixsql."terceros where razonsocial like '%".$vbbusqueda."%' or nomcomercial like '%".$vbbusqueda."%' order by razonsocial";
}
	//Muestra el listado de terceros
	$cnssql= $mysqli->query($sql_terceros);	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		echo '<tercero>'. PHP_EOL;
		echo '   <id>'.$col["id"].'</id>'. PHP_EOL;
		echo '   <codcli>'.$col["codcli"].'</codcli>'. PHP_EOL;
		echo '   <codpro>'.$col["codpro"].'</codpro>'. PHP_EOL;
		echo '   <razonsocial>'.$col["razonsocial"].'</razonsocial>'. PHP_EOL;
		echo '   <nomcomercial>'.$col["nomcomercial"].'</nomcomercial>'. PHP_EOL;
		echo '   <nif>'.$col["nif"].'</nif>'. PHP_EOL;
		echo '   <tel>'.$col["tel"].'</tel>'. PHP_EOL;
		echo '</tercero>'. PHP_EOL;
		
	}



echo '</output>'. PHP_EOL;
	

?>