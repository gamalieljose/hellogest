
<?php 
$fchkbloqueo = $_POST["chkbloqueo"];


foreach($fchkbloqueo as $idjob){
			
	$idcontrol = base64_decode($idjob);

	$campos = explode("-", $idcontrol);
	
	$cnssqlborra = $mysqli->query("delete from ".$prefixsql."bloqueos where iduser = '".$campos[0]."' and tabla = '".$campos[1]."' and idregistro = '".$campos[2]."' ");
				
}
	
    






header("Location: index.php?module=userpanel&section=regblock");
?>
