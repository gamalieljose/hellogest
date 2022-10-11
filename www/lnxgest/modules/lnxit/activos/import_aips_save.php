<?php
$flsttercero = $_POST["lsttercero"];

$ficheroxml = $lnxrutaficherostemp."usr/".$_COOKIE["lnxuserid"]."/fichero.xml";
move_uploaded_file($_FILES['fileficherito']['tmp_name'], $ficheroxml);


$xml = simplexml_load_file($ficheroxml);

?>

<div align="center">
<table style="width: Calc(100% - 20px);"  class="msgaviso">
<tr><td class="maintitle">Importación Advanced IP Scanner</td></tr>
<tr><td align="center">Importación realizada</td></tr>
<tr><td align="center">
 <a href="index.php?module=lnxit&section=activos" class="btnsubmit"><i class="hidephonview fa fa-window-close fa-lg"></i> Cerrar</a>
</td></tr>
</table>
</div>

<table width="100%">
<tr class="maintitle">
<td width="80"></td>
<td>Nombre</td>
<td>IP</td>
<td>mac</td>
<td>os_version</td>
<td>manufacturer</td>
<td>user</td>
</tr>
<?php
foreach($xml->row as $nodoregistro) 
{
    $atributos = $nodoregistro->attributes();

    $procesar = "YES";

    $reg_nombre = substr($atributos["name"], 0, 50);
    $reg_ip = substr($atributos["ip"], 0, 50);
    $reg_mac = substr($atributos["mac"], 0, 50);
    $reg_os_version = substr($atributos["os_version"], 0, 50);
    $reg_manufacturer = addslashes(substr($atributos["manufacturer"], 0, 50));
    $reg_user = addslashes(substr($atributos["user"], 0, 50));

    if($reg_nombre == ""){$reg_nombre = $reg_ip;}

    if($reg_mac == "00:00:00:00:00:00"){$procesar = "NO";}

    if($procesar == "YES")
    {
        //Ahora buscaremos si existe
        $cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where opcion = 'NETCARD' and valor2 = '".$reg_mac."' ");
        $row = mysqli_fetch_assoc($cnssql);
        $idcaractivo = $row["id"];
        $idactivo = $row["idactivo"];
        $idtarjetared = $row["valor4"];

        if($idcaractivo > 0)
        {
            //eliminamos las IPs anteriores y volcamos la nueva
            $cnssql = $mysqli->query("delete FROM ".$prefixsql."ita_caracteristicas where opcion = 'NETCARD_IP' and valor4 = '".$idtarjetared."' and idactivo = '".$idactivo."'");

            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$idactivo."', 'NETCARD_IP', '".$reg_ip."', '', '', '".$idtarjetared."', '')");

            //ahora verificamos si el resto de caracteristicas estan completas:
            $sqlregistro = $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where opcion = 'COMPUTER_NAME' and idactivo = '".$idactivo."' ");
            $rowcar = mysqli_fetch_assoc($sqlregistro);
            $existe = $sqlregistro->num_rows;

            if($existe == 0)
            {
                //no existe, pues crea el registro
                $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$idactivo."', 'COMPUTER_NAME', '".$reg_nombre."', '', '', '', '')");
            }
            if($existe == 1)
            {
                //Existe el registro, entonces modificalo
                if($rowcar["valor"] == "")
                {
                    //si esta vacio, entonces rellenamos el campo con el valor que toca
                    $sqlregistro = $mysqli->query("update ".$prefixsql."ita_caracteristicas set valor2 = '".$reg_nombre."' where id = '".$rowcar["id"]."'");
                }
            }


            //ahora verificamos si el resto de caracteristicas estan completas:
            $sqlregistro = $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where opcion = 'COMPUTER_OS' and idactivo = '".$idactivo."' ");
            $rowcar = mysqli_fetch_assoc($sqlregistro);
            $existe = $sqlregistro->num_rows;

            if($existe == 0)
            {
                //no existe, pues crea el registro
                $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$idactivo."', 'COMPUTER_OS', '".$reg_os_version."', '', '', '', '')");
            }
            if($existe == 1)
            {
                //Existe el registro, entonces modificalo
                if($rowcar["valor"] == "")
                {
                    //si esta vacio, entonces rellenamos el campo con el valor que toca
                    $sqlregistro = $mysqli->query("update ".$prefixsql."ita_caracteristicas set valor2 = '".$reg_os_version."' where id = '".$rowcar["id"]."'");
                }
            }


            //ahora verificamos si el resto de caracteristicas estan completas:
            $sqlregistro = $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where opcion = 'COMPUTER_MOTHERBOARD' and idactivo = '".$idactivo."' ");
            $rowcar = mysqli_fetch_assoc($sqlregistro);
            $existe = $sqlregistro->num_rows;

            if($existe == 0)
            {
                //no existe, pues crea el registro
                $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$idactivo."', 'COMPUTER_MOTHERBOARD', '".$reg_manufacturer."', '', '', '', '')");
            }
            if($existe == 1)
            {
                //Existe el registro, entonces modificalo
                if($rowcar["valor"] == "")
                {
                    //si esta vacio, entonces rellenamos el campo con el valor que toca
                    $sqlregistro = $mysqli->query("update ".$prefixsql."ita_caracteristicas set valor2 = '".$reg_manufacturer."' where id = '".$rowcar["id"]."'");
                }
            }
        
            $dbidmaximo = $idactivo;
        }
        else
        {
            $fechahoy = date("Y-m-d");

            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_activos (idtercero, idcontacto, idtipo, codigo, nombre, estado, plantilla, falta, fcaducidad, avisar, faviso, notas, tratarcomo) VALUES ('".$flsttercero."', '0', '0', '', '".$reg_nombre."', '0', '', '".$fechahoy."', '0000-00-00', '0', '0000-00-00', '', '2' )");

            $cnssql= $mysqli->query("SELECT max(id) as contador FROM ".$prefixsql."ita_activos");
            $row = mysqli_fetch_assoc($cnssql);
            $dbidmaximo = $row["contador"];

            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'COMPUTER_NAME', '".$reg_nombre."', '', '', '', '')");
            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'COMPUTER_OS', '".$reg_os_version."', '', '', '', '')");
            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'COMPUTER_MOTHERBOARD', '".$reg_manufacturer."', '', '', '', '')");
            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'COMPUTER_USER', '".$reg_user."', '', '', '', '')");
            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'NETCARD', 'Tarjeta de red', '".$reg_mac."', '', '0', '')");
            $sqlregistro = $mysqli->query("insert into ".$prefixsql."ita_caracteristicas (idactivo, opcion, valor, valor2, valor3, valor4, color) VALUES ('".$dbidmaximo."', 'NETCARD_IP', '".$reg_ip."', '', '', '0', '')");
                
        }
	
        if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
        echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
        echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$dbidmaximo.'" class="btnedit">Editar</td>';
        echo '<td>'.$reg_nombre.'</td>';
        echo '<td>'.$reg_ip.'</td>';
        echo '<td>'.$reg_mac.'</td>';
        echo '<td>'.$reg_os_version.'</td>';
        echo '<td>'.stripslashes($reg_manufacturer).'</td>';
        echo '<td>'.stripslashes($reg_user).'</td>';
        echo '</tr>';

    }
       
}
?>
