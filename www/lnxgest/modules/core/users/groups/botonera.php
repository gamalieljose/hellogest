<?php
$idgrupo = $_GET["id"];
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."groups where id = '".$idgrupo."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dspdisplay = $row["grupo"];

echo '<p>';
if ($_GET["section"] == 'groups' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?module=core&section=groups&action=edit&id='.$idgrupo.'" class="'.$pintaboton.'">Permisos del grupo</a> ';

if ($_GET["section"] == 'gusers' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=gusers&id='.$idgrupo.'" class="'.$pintaboton.'">Usuarios en este grupo</a> ';

echo '<a href="index.php?module=core&section=groups&action=del&id='.$_GET["id"].'" class="btncancel">Eliminar grupo</a>';

echo '</p>';

echo '<p>Editando Grupo: <b>'.$dspdisplay.'</b></p>';
?>