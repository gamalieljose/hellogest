<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");

echo '<select>';
$cnsprov = $mysqli->query("SELECT ".$prefixsql."userstiendas.id, ".$prefixsql."userstiendas.iduser, ".$prefixsql."userstiendas.idtienda, ".$prefixsql."tiendas.idempresa FROM ".$prefixsql."userstiendas, ".$prefixsql."tiendas WHERE ".$prefixsql."userstiendas.idtienda=".$prefixsql."tiendas.id and ".$prefixsql."tiendas.idempresa = '".$_POST["elegido"]."' and ".$prefixsql."userstiendas.iduser ='".$_COOKIE["lnxuserid"]."'");
$existe = $cnsprov->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen Tiendas</option>';}
    else
{echo '<option value="0">Todas las tienda</option>';}

while($col = mysqli_fetch_array($cnsprov))
{

    $sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$col["idtienda"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_tienda = $rowaux["tienda"];
	echo '<option value="'.$col["idtienda"].'" >'.$lbl_tienda.'</option>';
	
}

echo '</select>';
}
?>