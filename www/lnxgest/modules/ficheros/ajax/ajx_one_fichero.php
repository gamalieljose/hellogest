<?php
if($_COOKIE["lnxuserid"] > '0')
{
    require("../../../core/cfpc.php");

    
    $rs_listado = "";

$flstbuscarpor = $_POST["buscarpor"];
$ftxtbuscar = addslashes($_POST["textobuscar"]);
$flstcampoordenar = $_POST["srhcampo"];
$flstorden = $_POST["srhorden"];

    if($flstbuscarpor == 'A')
    {
        $cnssql = "SELECT * from ".$prefixsql."ficheros where nombre like '".$ftxtbuscar."%' or descripcion like '".$ftxtbuscar."%' order by ".$flstcampoordenar." ".$flstorden;	
    }
    if($flstbuscarpor == 'B')
    {
        $cnssql = "SELECT ".$prefixsql."ficheros_keyword.idfichero as id, ".$prefixsql."ficheros.nombre, ".$prefixsql."ficheros.extension, ".$prefixsql."ficheros.descripcion, ".$prefixsql."ficheros.iduser, ".$prefixsql."ficheros.fsubido, ".$prefixsql."ficheros.dirfichero FROM ".$prefixsql."ficheros_keyword INNER JOIN ".$prefixsql."ficheros on (".$prefixsql."ficheros_keyword.idfichero = ".$prefixsql."ficheros.id) where ".$prefixsql."ficheros_keyword.palabrasclave like '%".$ftxtbuscar."%' order by ".$prefixsql."ficheros.".$flstcampoordenar." ".$flstorden;	
    }

    $rs_listado = '<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Fichero</td>
<td>extension</td>
<td>Descripcion</td>
<td>Subido</td>
<td width="80"> </td>
</tr>';

    $cnssql = $mysqli->query($cnssql);		    	
    while($col = mysqli_fetch_array($cnssql))
    {

        if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    $lineatr = "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";


        $rs_listado = $rs_listado.$lineatr.'<td align="center"><input type="radio" name="optidficheroone" value="'.$col["id"].'" </td>
<td>'.$col["nombre"].'</td>
<td>'.$col["extension"].'</td>
<td>'.$col["descripcion"].'</td>
<td>'.$col["fsubido"].'</td>
<td align="right"><a class="btnedit_verde"  href="modules/ficheros/download.php?id='.$col["id"].'">Download</a></td></tr>';

    }


    $ary_ficheros = array("rsf" => $rs_listado);
    
    echo json_encode($ary_ficheros);

}

?>