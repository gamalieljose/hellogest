<?php

?>

<p><a href="index.php?module=biblio&section=prestamos&action=new" class="btnedit">Nuevo prestamo</a></p>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th width="150">Fecha prestado</th>
<th>Usuario</th>
<th width="150">Codigo</th>
<th>Libro</th>
<th width="80"> </th>
</tr>



<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."biblio_prestamos where fechain = '0000-00-00' order by fechaout");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_libros where id = '".$col["idlibro"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_libro = $rowaux["libro"];
    $lbl_libro_codigo = $rowaux["codigo"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$col["idusuario"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_usuario = $rowaux["nombre"];


    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    
    echo '<td><a href="index.php?module=biblio&section=prestamos&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["fechaout"].'</td>';
    echo '<td>'.$lbl_usuario.'</td>';
    echo '<td>'.$lbl_libro_codigo.'</td>';
    echo '<td>'.$lbl_libro.'</td>';
    echo '<td><a href="index.php?module=biblio&section=prestamos&action=entrega&id='.$col["id"].'" class="btnedit">Devolver</a></td>';
    echo '</tr>';
    
}


?>


</table>
</div>