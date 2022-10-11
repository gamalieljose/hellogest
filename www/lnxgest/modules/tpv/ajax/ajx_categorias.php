<?php

if($_COOKIE["lnxuserid"] > '0')
{
require("../../../core/cfpc.php");


$data = array();

if($_POST["idcategoria"] == '0')
{   
    $cnsseries = $mysqli->query("SELECT * FROM ".$prefixsql."productos_tipo order by tipo ");    
}
else
{   
    $cnsseries = $mysqli->query("SELECT * FROM ".$prefixsql."productos_tipo where id = '".$_POST["idcategoria"]."' order by tipo");
    
    $prtlinea = '<a href="javascript:muestracat(0);"><div class="contenedor_categorias">Todas las categorias</div></a>';
    array_push($data, $prtlinea);	
}



while($col = mysqli_fetch_array($cnsseries))
{
	$prtlinea = '<a href="javascript:muestracat('.$col["id"].');"><div class="contenedor_categorias">'.$col["tipo"].'</div></a>';
	array_push($data, $prtlinea);	
}

    echo json_encode($data);
}
?>