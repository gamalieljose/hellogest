<?php
if (($_GET["section"] == 'nominas' || $_GET["section"] == '') && $_GET["action"] == ''){$displaytitle = "Gestión nóminas";}

if ($_GET["section"] == 'nominas' && $_GET["action"] == 'new'){$displaytitle = "Nueva - Gestión nóminas";}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'edit'){$displaytitle = "Editando - Gestión nóminas";}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'del'){$displaytitle = "Eliminar - Gestión nóminas";}


?>
