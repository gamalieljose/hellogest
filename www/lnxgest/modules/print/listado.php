<?php
$impresora = $_GET["printer"];


$impresorasql= $mysqli->query("SELECT * from ".$prefixsql."impresoras where nombre  = '".$impresora."'");
$row = mysqli_fetch_assoc($impresorasql);
$idprinter = $row['id'];


$impresorasql= $mysqli->query("SELECT * from ".$prefixsql."printjobs where idprinter  = '".$idprinter."'");

//header("Content-type: text/xml"); 

//echo'<lnxgest>';


while($columna = mysqli_fetch_array($impresorasql))
{
    echo '<printjob>'. PHP_EOL ;
	echo '<jobid>'.$columna["id"].'</jobid>'. PHP_EOL ;
	echo '<printername>'.$impresora.'</printername>'. PHP_EOL ;
	echo '<jobfile>'.$columna["printfile"].'</jobfile>'. PHP_EOL ;
	echo '</printjob>'. PHP_EOL ;

}

	
	
//echo '</lnxgest>';
?>