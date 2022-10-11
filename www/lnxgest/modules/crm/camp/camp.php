<p><a href="index.php?module=crm&section=camp&action=new" class="btnedit">Nueva campaña</a></p>

<table width="100%">
    <tr class="maintitle">
        <th width="80"></th>
        <th>Campaña</th>
    </tr>
    
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."crm_camp");	
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
    echo '<td><a href="index.php?module=crm&section=camp&action=edit&idcamp='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["camp"].'</td>';
    echo '</tr>';
}




?>
</table>
    

