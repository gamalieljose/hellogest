<?php
if($_COOKIE["lnxuserid"] > '0')
{
require("../core/cfpc.php");

$ajx_docprint = $_POST["iddocprint"];
$ajx_idempresa = $_POST["idempresa"];
$ajx_module = $_POST["module"];


//obtenemos el id del modulo
$sqlaux = $mysqli->query("select * from ".$prefixsql."modulos where directorio = '".$ajx_module."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidmodulo = $rowaux["idmod"];



echo '<select>';

$cnssql = $mysqli->query("select * from ".$prefixsql."docprint where idmod = '".$dbidmodulo."' and idempresa = '".$ajx_idempresa."'");	
$existe = $cnssql->num_rows;
if($existe > 0)
{
    while($col = mysqli_fetch_array($cnssql))
    {
        echo '<option value="'.$col["id"].'">'.$col["descripcion"].'</option>'; 
    }
}
else 
{
    echo '<option value="0" >La empresa indicada no tiene informes configurados</option>';
}

echo '</select>';


}
?>

