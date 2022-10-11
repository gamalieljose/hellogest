<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 
<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            empresa=$(this).val();
            
            $.post("modules/balance/ajax/ajx_empresa-serie_fv.php", { idempresa: empresa }, function(data){
            $("#lstfv").html(data);
            });            
            
        });
   })
});
</script>

<?php
//Obtenemos la empresa por defecto del usuario según la tienda asignada por defecto
                
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"];

?>


<form name="form1" action="index.php?module=lnxit&section=factu&paso=1" method="POST" />

<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
        <select id="lstempresas" name="lstempresas" class="campoencoger">
    <?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
		if($columna["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
    }
    ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Serie
    </div>
    <div class="col" align="left">
        <select id="lstfv" name="lstfv" class="campoencoger">
    <?php
    $cnsseries = $mysqli->query("SELECT * from ".$prefixsql."series where idempresa = '".$dbidempresa."' and tipo = 'F' and cv = '2' order by serie ");
    while($columna = mysqli_fetch_array($cnsseries))
    {
		if($columna["dft"] == '1'){$seleccionado = ' selected=""'; $seriedft = $columna["id"]; }else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["serie"].'</option>';
    }
    ?>
        </select>
    </div>
</div>



<div class="row">
    <div class="col-sm-2" align="left">
        Opciones
    </div>
    <div class="col" align="left">
		<label><input type="radio" value="1" name="optprocesofacturar" checked=""/> Factura por Cliente </label> </br>
		<label><input type="radio" value="2" name="optprocesofacturar" /> Factura por Ticket </label>
	</div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="AUTO Facturar" type="submit"> 

<a href="index.php?module=lnxit" class="btncancel">Cancelar</a>
</div>



<p></p>
<table width="100%">
<tr class="maintitle">
<td width="40" > </td>
<td>Facturar</td>
<td>Cierre</td>
<td width="16"> </td>
<td width="75">Tipo</td>
<td> </td>
<td>Resumen</td>
<td>Asignado</td>
<td>Tercero</td>
<td>Partes de trabajo</td>
</tr>



<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."it_tickets where idestado = '0' and idfv = '0' order by fcierre desc";

	$ConsultaMySql= $mysqli->query($cnssql);
	$color = '1';
	while($ticket = mysqli_fetch_array($ConsultaMySql))
	{
		$cnssqlidtipo= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$ticket["idtercero"]."'");
		$row = mysqli_fetch_assoc($cnssqlidtipo);
		$dbrazonsocial = $row['razonsocial'];
		$tercero_codcli = $row['codcli'];
		
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

		
		if ($ticket["idasignado"] == '0')
		{
			$asignado = "-sin asignar-";
		}
		else
		{
			$cnsasignado= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$ticket["idasignado"]."'");
			$rowasignado = mysqli_fetch_assoc($cnsasignado);
			$asignado = $rowasignado['display'];
		}
		
		
		
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td >
		<a class="btnedit" href="index.php?module=lnxit&section=tickets&action=edit&id='.$ticket["id"].'">'.$ticket["id"].'</a></td>';
		echo '<td>';
		
		if($tercero_codcli > 0)
		{
			echo '<select name="optfacturar['.$ticket["id"].']">
			<option value="0" selected="">Omitir</option>
			<option value="1" >Facturar</option>
			<option value="-1" >NO Facturar</option>
			</select>';
		
			echo '<input type="hidden" value="'.$ticket["id"].'" name="chkfacturar[]"/>';
		}
		echo '</td>';
		$fechasolo = substr($ticket["fcierre"], 0, 10); 
		
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
		
		if ($ticket["fmodificacion"] == '0000-00-00 00:00:00'){$dbfmod = '';}else{$dbfmod = $ticket["fmodificacion"];}
		
		
		
		
		echo '<td>'.$dbrazonsocial.'</td>';
		
		$partes = "";
		$sqlaux = "SELECT * FROM ".$prefixsql."partes where idticket = '".$ticket["id"]."' ";
		$cnsaux= $mysqli->query($sqlaux);
		while($colaux = mysqli_fetch_array($cnsaux))
		{
			$partes = $partes." ".$colaux["codigo"];
		}
		
		echo '<td>'.$partes.'</td>';
		
		echo '<tr>';
		
	}
?>

</table>
</form>
<p></p>
