<?php
$ftxtbuscar = addslashes($_POST["txtbuscar"]);

$flstordenar = $_POST["lstordenar"];
$flstorden = $_POST["lstorden"];
$flstestado = $_POST["lstestado"];
$flstasignado = $_POST["lstasignado"];
$flstcola = $_POST["lstcola"];
$flstcategoria = $_POST["lstcategoria"];

echo '<p>';
echo '<form name="form1" action="index.php?module=lnxit&section=tickets&subsection=goto" method="post">';
echo '<a class="btnedit" href="index.php?module=lnxit&section=tickets&action=new">Nuevo ticket</a> ';
echo ' - <input type="number" name="txtidticket" style="width:80px;"/> <input type="submit" value="Ir a ticket" class="btnedit" />';

echo ' <a class="btnedit" href="index.php?module=lnxit&section=buscaseg">Buscar en seguimientos</a> ';


echo '</form>';
echo '</p>';
?>



<!-- Busqueda de tickets -->

<form name="form1" action="index.php?module=lnxit&section=tickets&subsection=list" method="post">

<?php


if ($_POST["hbusca"] == 'si')
{
    if($flstasignado > "0")
    {
        $sql_tecnicoasignado = " and idasignado = '".$flstasignado."' ";
    }
    else
    {
        $sql_tecnicoasignado = "";
    }
/*
    * todos --> Muestra todos indeferentemenet
    todoabierto --> Cualquier estado abierto
    0 --> Cerrado
    1 --> Abierto
    2 --> En proceso
    3 --> Pendiente de terceros
    4 --> Solucionado
    */
    if($flstestado == "todos"){$sql_estado = "";}
    if($flstestado == "todoabierto"){$sql_estado = " and idestado > '0' ";}
    if($flstestado == "0"){$sql_estado = " and idestado = '0' ";}
    if($flstestado == "1"){$sql_estado = " and idestado = '1' ";}
    if($flstestado == "2"){$sql_estado = " and idestado = '2' ";}
    if($flstestado == "3"){$sql_estado = " and idestado = '3' ";}
    if($flstestado == "4"){$sql_estado = " and idestado = '4' ";}
    
    if ($flstcola > 0)
    {
        $sql_cola = " and idcola = '".$flstcola."' ";
    }
    else
    {
        $sql_cola = "";
    }
    
    if ($flstcategoria > 0)
    {
        $sql_categoria = " and idcategoria = '".$flstcategoria."' ";
    }
    else
    {
        $sql_categoria = "";
    }
    
    
    $cnssql = "SELECT * FROM ".$prefixsql."it_tickets where (resumen like '".$ftxtbuscar."%' or problema like '".$ftxtbuscar."%' or solucion like '".$ftxtbuscar."%') ".$sql_tecnicoasignado." ".$sql_estado." ".$sql_cola." ".$sql_categoria." order by ".$flstordenar." ".$flstorden;
    
}
else
{
// Cuando carga al inicio muestra todos los tickets de cualquier tipo abierto (abierto, pendiente, solucionado etc...
    
$cnssql = "SELECT * FROM ".$prefixsql."it_tickets where idestado > '0' order by id desc";
    $fflstordenar = "id";
    $flstorden = "desc";
    
    $flstestado = "todoabierto";
    $flstasignado = '0';
    $flstcola = '0';
}
	

?>

<input type="hidden" name="hbusca" value="si">



<div class="tblbuscar">
    <div class="row">
        <div class="col" align="left">
            Buscar </br>
            <input type="text" value="<?php echo $ftxtbuscar; ?>" name="txtbuscar" style="width: 100%;" />
        </div>
        <div class="col-sm-2" align="left" >
            Ordenar por: </br>
            <select name="lstordenar" style="width: 100%;">
<?php
        if($flstordenar == "id"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="id" '.$seleccionado.'>Ticket</option>';
        if($flstordenar == "resumen"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="resumen" '.$seleccionado.'>Resumen</option>';
?>
            </select>
        </div>
        <div class="col-sm-2" align="left">
            Orden </br>
            <select name="lstorden" style="width: 100%;">
<?php
        if($flstorden == "asc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="asc" '.$seleccionado.'>Ascendente</option>';
        if($flstorden == "desc"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="desc" '.$seleccionado.'>Descendente</option>';
?>
            </select>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm" align="left">
            Tecnico Asignado </br>
            <select name="lstasignado" style="width: 100%;" />
<?php
if($flstasignado == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="0" '.$seleccionado.'>-Sin asignar-</option>';

$cnsusers= $mysqli->query("SELECT * from ".$prefixsql."users order by display");
while($col = mysqli_fetch_array($cnsusers))
{
if($col["id"] == $_COOKIE["lnxuserid"]){$usuarioactual = ' style="background-color: #81c5ef;"';}else{$usuarioactual = '';}
if($col["id"] == $flstasignado){$seleccionado = ' selected=""';}else{$seleccionado = '';}

    echo '<option value="'.$col["id"].'" '.$usuarioactual.' '.$seleccionado.' >'.$col["display"].'</option>';
}
?>
            </select>
        </div>
        <div class="col-sm" align="left">
            Estado </br>
            <select name="lstestado" style="width: 100%;" />
<?php
    if($flstestado == "todos"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="todos" '.$seleccionado.'>Cualquier estado</option>';
    if($flstestado == "todoabierto"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="todoabierto" '.$seleccionado.'>Cualquier estado abierto</option>';
            
    if($flstestado == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="0" '.$seleccionado.'>Cerrado</option>';
    if($flstestado == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="1" '.$seleccionado.'>Abierto</option>';
    if($flstestado == "2"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="2" '.$seleccionado.'>En proceso</option>';
    if($flstestado == "3"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="3" '.$seleccionado.'>Pendiente de terceros</option>';
    if($flstestado == "4"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="4" '.$seleccionado.'>Solucionado</option>';
?>                        
            </select>
        </div>
        <div class="col-sm" align="left">
            Cola </br>
            <select name="lstcola" style="width: 100%;" />
<?php
if($flstcola == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="0" '.$seleccionado.'>Todas las colas</option>';

$cnsusers= $mysqli->query("SELECT * from ".$prefixsql."it_colas order by cola");
while($col = mysqli_fetch_array($cnsusers))
{
    //Si la cola la puede ver el usuario, entonce muestrala
    if($flstcola == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["cola"].'</option>';   
}
?>
            </select>
        </div>
        <div class="col-sm" align="left">
            Categoria </br>
            <select name="lstcategoria" style="width: 100%;" />
<?php

if($flstcategoria == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="0" '.$seleccionado.'>Todas las categorias</option>';

$cnsusers= $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");
while($col = mysqli_fetch_array($cnsusers))
{
    if($flstcategoria == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["categoria"].'</option>';
}
?>
            </select>
        </div>
    </div>
    
</div>
<div align="center" class="rectangulobtnsguardar">
    <input type="submit" class="btnsubmit" name="btnbuscar" value="Buscar" > 
</div>

</form>
<!-- FIN Busqueda de toickets -->

<p></p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<td width="40" > </td>
<td width="50">Creado</td>

<th width="16"> </th>
<th width="75">Tipo</th>
<th> </th>
<th>Resumen</th>
<th>Asignado</th>
<th>Tercero / Afectado</th>
<th>Categoria</th>
<th>Estado</th>
<th width="40">Facturado</th>
</tr>



<?php
//Por defecto:
//$cnssql = "SELECT * FROM ".$prefixsql."it_tickets order by id desc";

	$ConsultaMySql= $mysqli->query($cnssql);
	$color = '1';
	while($ticket = mysqli_fetch_array($ConsultaMySql))
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
		
		$cnssqlidtipo= $mysqli->query("select * from ".$prefixsql."it_tipos where id = '".$ticket["idtipo"]."'");
		$row = mysqli_fetch_assoc($cnssqlidtipo);
		$tipoticket = $row['tipo'];

        if($ticket["tremoto"] <> "")
        {
            $tipoticket = $tipoticket.'</br><i>'.$ticket["tremoto"].'</i>';
        }

		
		if ($ticket["idasignado"] == '0')
		{
            if($ticket["idcola"] > 0)
            {
                $sqlaux = $mysqli->query("select * from ".$prefixsql."it_colas where id = '".$ticket["idcola"]."' "); 
                $rowaux = mysqli_fetch_assoc($sqlaux);
                $lbl_cola = $rowaux["cola"];
                $asignado = '<i alt="Cola asignada" title="Cola asignada">'.$lbl_cola.'</i>';
            }
            else 
            {
                $asignado = "-sin asignar-";    
            }
			
		}
		else
		{
            if($ticket["idcola"] > 0)
            {
                $sqlaux = $mysqli->query("select * from ".$prefixsql."it_colas where id = '".$ticket["idcola"]."' "); 
                $rowaux = mysqli_fetch_assoc($sqlaux);
                $lbl_cola = $rowaux["cola"];
                $lbl_cola = '</br><i alt="Cola asignada" title="Cola asignada">'.$lbl_cola.'</i>';
            }
            else 
            {
                $lbl_cola = '';                
            }
			$cnsasignado= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$ticket["idasignado"]."'");
			$rowasignado = mysqli_fetch_assoc($cnsasignado);
			$asignado = $rowasignado['display'].$lbl_cola;
		}
		
		
		
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td >
		<a class="btnedit" style="font-size: 14px;" href="index.php?module=lnxit&section=tickets&action=edit&id='.$ticket["id"].'">'.$ticket["id"].'</a></td>';
		
		$fechasolo = substr($ticket["fcreacion"], 0, 10); 
		$xfecha = explode("-", $fechasolo);
                
                $fechasolo = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];
                
		echo '<td>'.$fechasolo.'</td>';
		
		echo '<td>';
		if ($ticket["idmant"] > '0')
		{
			$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."it_mant where id = '".$ticket["idmant"]."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$dbmantref = $rowaux['ref'];
			echo '<img src="img/maintenance.png" title="Mantenimiento '.$ticket["idmant"].' - '.$dbmantref.'" alt="Mantenimiento '.$ticket["idmant"].' - '.$dbmantref.'" height="16" width="16" />';
		}
		else
		{
			echo ' ';
		}
		echo '</td>';
		
		
		
		
		
		echo '<td>'.$tipoticket.'</td>';
		if ($ticket["idprioridad"] == '1') {$colorprioridad = 'bgcolor="#FF0000"';}
		if ($ticket["idprioridad"] == '2') {$colorprioridad = '';}
		if ($ticket["idprioridad"] == '3') {$colorprioridad = 'bgcolor="#0000FF"';}
		
		echo '<td '.$colorprioridad.'>&nbsp;</td>';
		
		
		
		
		echo '<td>'.$ticket["resumen"].'</td>
		<td>'.$asignado.'</td>';
		
		
		
		if($ticket["idafectado"] > 0)
		{
			$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where id = '".$ticket["idafectado"]."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$lblafectado = "</br>- <i>".$rowaux["nombre"]."</i>";
		}
		else
		{
			$lblafectado = "";
		}
		
		$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$ticket["idtercero"]."'");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbtercero = $rowaux['razonsocial'];
		
		
		echo '<td>'.$dbtercero.$lblafectado.'</td>';
			$cnscat = $mysqli->query("select id, categoria from ".$prefixsql."it_categorias where id = '".$ticket["idcategoria"]."'");
			$rowcat = mysqli_fetch_assoc($cnscat);
			$nombrecat = $rowcat['categoria'];
		echo '<td>'.$nombrecat.'</td>';
		
		if ($ticket["idestado"] == '0'){$estado = "Cerrado";}
		if ($ticket["idestado"] == '1'){$estado = "Abierto";}
		if ($ticket["idestado"] == '2'){$estado = "En proceso";}
		if ($ticket["idestado"] == '3'){$estado = "Pendiente de terceros";}
		if ($ticket["idestado"] == '4'){$estado = "Solucionado";}
		
		echo '<td>'.$estado.'</td>';
		
		
		if ($ticket["idfv"] > '0'){$sfacturado = '<img src="img/yes.png"/>';}else{$sfacturado = '<img src="img/no.png"/>';}
		echo '<td align="center">'.$sfacturado.'</td>';
		echo '<tr>';
		
	}
?>

</table>
</div>
<p></p>
<div align="center">
<table>
<tr><td bgcolor="#FF0000">&nbsp;</td><td>Prioridad Alta</td></tr>
<tr><td>&nbsp;</td><td>Prioridad Normal</td></tr>
<tr><td bgcolor="#0000FF">&nbsp;</td><td>Prioridad Baja</td></tr>
</table>
</div>
