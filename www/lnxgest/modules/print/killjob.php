<?php
$documento = $_GET["killjob"];


$impresorasql= $mysqli->query("delete from ".$prefixsql."printjobs where printfile  = '".$documento."'");


unlink($lnxprintspool.$documento);

//header("Content-type: text/xml"); 

//echo'<lnxgest>';


while($columna = mysqli_fetch_array($impresorasql))
{
    echo '<printjob>';
	
	echo '<job>'.$documento.'</job>';
	echo '<estado>ELIMINADO</estado>';
	echo '</printjob>';

}

	
	
//echo '</lnxgest>';
?>