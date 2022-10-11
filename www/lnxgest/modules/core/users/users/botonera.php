<?php
$iduser = $_GET["id"];
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$iduser."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dspdisplay = $row["display"];

echo '<p>';
if ($_GET["section"] == 'users' && $_GET["action"] == 'edit' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=users&action=edit&id='.$iduser.'" class="'.$pintaboton.'">Usuario</a> ';

if ($_GET["section"] == 'rrhh' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=rrhh&id='.$iduser.'" class="'.$pintaboton.'">RR HH</a> ';

if ($_GET["section"] == 'correo' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=correo&id='.$iduser.'" class="'.$pintaboton.'">Correo</a> ';

if ($_GET["section"] == 'ugroups' && $_GET["action"] == '' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=ugroups&id='.$iduser.'" class="'.$pintaboton.'">Grupos</a> ';

if ($_GET["section"] == 'permisosespecificos' && $_GET["action"] == '' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=permisosespecificos&id='.$iduser.'" class="'.$pintaboton.'">Permisos especificos</a> ';

if ($_GET["section"] == 'users_printers' && $_GET["action"] == '' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=users_printers&id='.$iduser.'" class="'.$pintaboton.'">Impresoras</a> ';

if ($_GET["section"] == 'utiendas' && $_GET["action"] == '' ) {$pintaboton = "botoneraactiva";}else{$pintaboton = "btnedit";}
	echo '<a href="index.php?&module=core&section=utiendas&id='.$iduser.'" class="'.$pintaboton.'">tiendas</a> ';

	if ($_GET["section"] == 'users' && $_GET["action"] == 'del' ) {$pintaboton = "btnsubmit";}else{$pintaboton = "btnenlacecancel";}
	echo '<a href="index.php?&module=core&section=users&action=del&id='.$iduser.'" class="'.$pintaboton.'">Eliminar</a> ';

	
echo '</p>';

echo '<p>Editando usuario: <b>'.$dspdisplay.'</b></p>';
?>