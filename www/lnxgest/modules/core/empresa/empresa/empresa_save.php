<?php
//obtenemos el nombre del campo y el valor con
// $nombre_campo y $valor

foreach($_POST as $nombre_campo => $valor)
{ 
	if ($nombre_campo != "btnsave")
	{	
		//ejecutamos sentencia update
		$empresasql= $mysqli->query("UPDATE lnx_empresa SET valor = '".$valor."' WHERE campo = '".$nombre_campo."' ");
    }
 } 

 
 header( "refresh:2;url=index.php?&module=empresa&section=empresa" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">Mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?&module=empresa&section=empresa">Aceptar</a></td></tr>
	</table></div>';



?>