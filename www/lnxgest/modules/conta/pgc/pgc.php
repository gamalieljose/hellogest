<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_cfpc where opcion = 'numdigitos' and idempresa = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbnumdigitos = $rowaux["valor"];
?>
<div class="row">
    <div class="col maintitle">
        Plan General Contable
    </div>
</div>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
    <th>Grupo</th>
    <th>Subcuenta</th>
    <th>Descripción</th>
    <th>Cuenta</th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."conta_master where idempresa = '".$idempresa."' order by grupo, subcuenta");	
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

    
    

            $digitosgrupo = strlen($col["grupo"]);
            $digitosid = strlen($col["subcuenta"]);
            $digitostotal = $digitosgrupo + $digitosid;
            $cerosanadir = $dbnumdigitos - $digitostotal;

            $i = 0;
            $textoceros = "";
            do {
                $i = $i + 1;
                $textoceros = $textoceros."0";
            } 
            while ($i < $cerosanadir);
            
            $codigocuenta = $col["grupo"].$textoceros.$col["subcuenta"];
            
    
        echo '<td>'.$col["grupo"].'</td>';
        echo '<td>'.$col["subcuenta"].'</td>';
        echo '<td>'.$col["descripcion"].'</td>';
        echo '<td>'.$codigocuenta.'</td>';
    echo '</tr>';
}
?>
</table>
</div>


