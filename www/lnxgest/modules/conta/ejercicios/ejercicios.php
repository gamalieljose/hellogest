<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
?>

<p><a href="index.php?module=conta&section=ejercicios&action=new" class="btnedit" >Nuevo ejercicio</a></p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
    <tr class="maintitle">
        <th width="80"> </th>
        <th>Codigo</th>
        <th>Descripción</th>
        <th>F. Inicio</th>
        <th>F. Fin</th>
        <th>Estado</th>
    </tr>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."conta_ejercicios where idempresa = '".$idempresa."'");	
while($col = mysqli_fetch_array($cnssql))
{
    
    if ($color == '1')
    {
            $color = '2';
            $pintacolor = "listacolor2";
    }
    else
    {
            $color = '1';
            $pintacolor = "listacolor1";
    }


    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

    echo '<td><a href="index.php?module=conta&section=ejercicios&action=edit&idejercicio='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["codigo"].'</td>';
    echo '<td>'.$col["descripcion"].'</td>';
    echo '<td>'.$col["finicio"].'</td>';
    echo '<td>'.$col["ffin"].'</td>';
    echo '<td>'.$col["idestado"].'</td>';
    echo '</tr>';
    
}

?>
</table>
</div>
