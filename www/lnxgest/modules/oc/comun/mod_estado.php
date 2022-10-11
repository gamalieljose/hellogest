<?php
$hiddoc = $_POST["hiddoc"];
$lststatus = $_POST["lststatus"];

$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set estado = '".$lststatus."' where id = '".$hiddoc."'");

header("Location: index.php?module=".$lnxinvoice."&section=main&action=view&id=".$hiddoc);

?>