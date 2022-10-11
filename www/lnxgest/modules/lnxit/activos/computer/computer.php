<?php
include("modules/lnxit/activos/tabs.php");
$idactivo = $_GET["id"];


$cnssql= $mysqli->query("select max(valor4) as contador from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'MAPUNIT'");	
$row = mysqli_fetch_assoc($cnssql);
$dbmapeoidmax = $row["contador"];
    if($dbmapeoidmax == ''){$dbmapeoidmax = 0;}
$cnssql= $mysqli->query("select max(valor4) as contador from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'NETCARD'");	
$row = mysqli_fetch_assoc($cnssql);
$dbtarjetasidmax = $row["contador"];
    if($dbtarjetasidmax == ''){$dbtarjetasidmax = 0;}

$cnssqlips= $mysqli->query("select count(*) as maxip from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'NETCARD_IP' ");	
$row = mysqli_fetch_assoc($cnssqlips);
$dbipsmax = $row["maxip"];



?>

<script languague="javascript">

var iddivmapeo = <?php echo $dbmapeoidmax;?>;

function mapeonew() 
{
	iddivmapeo = iddivmapeo +1;
	var div = document.createElement('div');
	 
	div.innerHTML = '<div id="divmapeo_' + iddivmapeo + '">'
    + '<input type="hidden" name="txtnetmap_id[' + iddivmapeo + ']" value="' + iddivmapeo + '" /> '
    + '<div class="row">'
    + '<div class="col">'
    + '    Unidad / Origen montaje </br>'
    + '    <input type="text" name="txtnetmap_unidad[' + iddivmapeo + ']" value="" style="width: 100%;" />'
    + '</div>'
    + '<div class="col">'
    + '    Ruta de mapeo / Punto de montaje</br>'
    + '    <input type="text" name="txtnetmap_map[' + iddivmapeo + ']" value="" style="width: 100%;" />'
    + '</div>'
    + '<div class="col">'
    + '    Usuario </br>'
    + '    <input type="text" name="txtnetmap_user[' + iddivmapeo + ']" value="" style="width: 100%;" /> '
    + '</div>'
    + '<div class="col-1" align="right">'
    + '    <a href="#" onclick="mapeodel(' + iddivmapeo + ');" class="btnenlacecancel">Borrar</a>'
    + '</div>'
    + '</div>'
    + '</div>';




	document.getElementById('div_mapeos').appendChild(div);document.getElementById('div_mapeos').appendChild(div);
}

function mapeodel(idmapeodelete) 
{
	
	var divborrar = 'divmapeo_' + idmapeodelete;
	
	let node = document.getElementById(divborrar);
	if (node.parentNode) {
	node.parentNode.removeChild(node);
	}

}






var iddivtarjeta = <?php echo $dbtarjetasidmax;?>;

function tarjetanew() 
{
	iddivtarjeta = iddivtarjeta +1;
	var div = document.createElement('div');
	 
	div.innerHTML = 
      '<div id="divtarjeta_' + iddivtarjeta + '">'
    + '  <div class="row maintitle">'
    + '    <div class="col">'
    + '       <input type="hidden" name="hidtarjeta[' + iddivtarjeta + ']" value="' + iddivtarjeta + '" />'
    + '      <i class="fas fa-network-wired"></i> <input type="text" name="txtnetname[' + iddivtarjeta + ']" value="" placeholder="Escriba el nombre del dispositivo" style="width: Calc(100% - 30px); background-color: #e1dfdf;"/>  '
    + '    </div>'
    + '    <div class="col-1" align="right">'
    + '      <a href="javascript:tarjetadel(' + iddivtarjeta + ')" class="btnenlacecancel" >Borrar</a>'
    + '    </div>'
    + '  </div>'
    + '    <div class="row">'
    + '      <div class="col-sm-2">'
    + '        DHCP'
    + '      </div>'
    + '      <div class="col">'
    + '        <label><input type="checkbox" name="txtnetdhcp[' + iddivtarjeta + ']" value="Sí" /> Habilitado </label>'
    + '      </div>' 
    + '    </div>'
    + '    <div class="row">'
    + '      <div class="col-sm-2">'
    + '         MAC Address'
    + '      </div>'
    + '      <div class="col">'
    + '         <input type="text" name="txtnetmac[' + iddivtarjeta + ']" value="" style="width: 100%;"/>'
    + '      </div>'
    + '    </div>'
    + '    <div class="row">'
    + '      <div class="col-sm-2">'
    + '         <a href="javascript:tarjetaipnew(' + iddivtarjeta + ')" class="btnedit"><i class="fas fa-plus-square"></i> Agregar IP</a>'
    + '      </div>'
    + '      <div class="col">'
    + '         <div id="div_dirip_' + iddivtarjeta + '"></div> '
    + '      </div>'
    + '    </div>'
    + '</div>';

	document.getElementById('div_divtarjetas').appendChild(div);document.getElementById('div_divtarjetas').appendChild(div);
}



function tarjetadel(idtarjetadelete) 
{
	
	var divborrar = 'divtarjeta_' + idtarjetadelete;
	
	let node = document.getElementById(divborrar);
	if (node.parentNode) {
	node.parentNode.removeChild(node);
	}

}

var idiptarjeta = <?php echo $dbipsmax;?>;


function tarjetaipnew(dividtarjeta) 
{
    var nomdividtarjeta = 'div_dirip_' + dividtarjeta;
	idiptarjeta = idiptarjeta +1;
	var div = document.createElement('div');
	 
	div.innerHTML = '<div id="tarjetaipid_' + idiptarjeta + '">'
    +   '<input type="text" value="" name="txtiptarjeta[' + idiptarjeta + ']" /> <a href="javascript:tarjetaipdel(' + idiptarjeta + ')" alt="Quitar IP" title="Quitar IP" class="btnenlacecancel"><i class="fas fa-trash-alt"></i> </a></br>'
    +   '<input type="hidden" name="hidtarjetaasoc[' + idiptarjeta + ']" value="'+ dividtarjeta +'" />'
    +   '</div>';

    document.getElementById(nomdividtarjeta).appendChild(div);document.getElementById(nomdividtarjeta).appendChild(div);
}

function tarjetaipdel(idip) 
{
	
	var divborrar = 'tarjetaipid_' + idip;
	
	let node = document.getElementById(divborrar);
	if (node.parentNode) {
	node.parentNode.removeChild(node);
	}

}

</script>




<table width="100%">
<tr class="maintitle">
<th>Resumen del equipo</th>
</tr>
</table>
<p>
<?php
echo '<a href="index.php?module=lnxit&section=activos&ss=computer&id='.$idactivo.'" class="btn_tab_sel"><i class="hidephonview fa fa-save fa-lg"></i> Resumen</a> ';

echo '<a href="index.php?module=lnxit&section=activos&ss=computer&action=nfo&id='.$idactivo.'" class="btn_tab"><i class="hidephonview fa fa-upload fa-lg"></i> Importar NFO</a>';
?>
</p>

<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."'");	
while($col = mysqli_fetch_array($cnssql))
{
    if($col["opcion"] == 'COMPUTER_NAME'){$db_COMPUTER_NAME = $col["valor"];}
    if($col["opcion"] == 'COMPUTER_MODEL'){$db_COMPUTER_MODEL = $col["valor"];}
    if($col["opcion"] == 'COMPUTER_OS'){$db_COMPUTER_OS = $col["valor"]; $db_COMPUTER_OSV = $col["valor2"];}
    if($col["opcion"] == 'COMPUTER_MOTHERBOARD'){$db_COMPUTER_MBF = $col["valor"]; $db_COMPUTER_MBM = $col["valor2"];}
    if($col["opcion"] == 'COMPUTER_CPU'){$db_COMPUTER_CPU = $col["valor"];}
    if($col["opcion"] == 'COMPUTER_RAM'){$db_COMPUTER_RAM = $col["valor"];} 
    if($col["opcion"] == 'COMPUTER_USER'){$db_COMPUTER_USER = $col["valor"];} 
    
}

echo '<form name="frmactivonfo" method="POST" action="index.php?module=lnxit&section=activos&ss=computer&id='.$idactivo.'&action=save" >';
?>
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar cambios</button> 
</div>

<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidactivo" value="<?php echo $idactivo; ?>" />
<div class="row">
    <div class="col maintitle">
    <i class="fas fa-desktop"></i> Equipo
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        Sistema Operativo
    </div>
    <div class="col">
        <input type="text" name="txtpc_os" value="<?php echo $db_COMPUTER_OS; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Versión S.O.
    </div>
    <div class="col">
        <input type="text" name="txtpc_osv" value="<?php echo $db_COMPUTER_OSV; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Nombre equipo
    </div>
    <div class="col">
        <input type="text" name="txtpc_cn" value="<?php echo $db_COMPUTER_NAME; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Fabricante P.B.
    </div>
    <div class="col">
        <input type="text" name="txtpc_mbf" value="<?php echo $db_COMPUTER_MBF; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Modelo P.B.
    </div>
    <div class="col">
        <input type="text" name="txtpc_mbm" value="<?php echo $db_COMPUTER_MBM; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Modelo equipo
    </div>
    <div class="col">
        <input type="text" name="txtpc_model" value="<?php echo $db_COMPUTER_MODEL; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Procesador
    </div>
    <div class="col">
        <input type="text" name="txtpc_procesador" value="<?php echo $db_COMPUTER_CPU; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Usuario
    </div>
    <div class="col">
        <input type="text" name="txtpc_user" value="<?php echo $db_COMPUTER_USER; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Memoria instalada
    </div>
    <div class="col">
        <input type="text" name="txtpc_memoria"value="<?php echo $db_COMPUTER_RAM; ?>" style="width: 100%;" />
    </div>
</div>
<div class="row">
    <div class="col maintitle">
    <a href="#" onclick="mapeonew();" class="btnedit">Agregar mapeo</a>
    <i class="fab fa-windows"></i> Unidades de red / <i class="fab fa-linux"></i> Punto de montaje
    </div>
</div>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'MAPUNIT'");	
while($col = mysqli_fetch_array($cnssql))
{
    $idunidad = $col["valor4"];

    echo '<div id="divmapeo_'.$idunidad.'">';
    echo '<input type="hidden" name="txtnetmap_id['.$idunidad.']" value="'.$idunidad.'" /> ';
    echo '<div class="row">';
    echo '<div class="col">';
    echo '    Unidad / Origen montaje </br>';
    echo '    <input type="text" name="txtnetmap_unidad['.$idunidad.']" value="'.$col["valor"].'" style="width: 100%;" />';
    echo '</div>';
    echo '<div class="col">';
    echo '    Ruta de mapeo / Punto de montaje</br>';
    echo '    <input type="text" name="txtnetmap_map['.$idunidad.']" value="'.$col["valor2"].'" style="width: 100%;" />';
    echo '</div>';
    echo '<div class="col">';
    echo '    Usuario </br>';
    echo '    <input type="text" name="txtnetmap_user['.$idunidad.']" value="'.$col["valor3"].'" style="width: 100%;" /> ';
    echo '</div>';
    echo '<div class="col-1" align="right">';
    echo '    <a href="#" onclick="mapeodel('.$idunidad.');" class="btnenlacecancel">Borrar</a>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
  
    
}
?>
<div id="div_mapeos"></div>

<div class="row">
    <div class="col maintitle">
    <a href="javascript:tarjetanew();" class="btnedit">Agregar tarjeta</a> Tarjetas de red
    </div>
</div>
<?php
$idiptarjeta = 0;


$cnssql= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'NETCARD'");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and valor4 = '".$col["valor4"]."' and opcion = 'NETCARD_DHCP'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbdhcp = $rowaux["valor"];

    if($dbdhcp == 'Sí'){$seleccionado_dhcp = 'checked=""';}else{$seleccionado_dhcp = '';}

    echo '<div id="divtarjeta_'.$col["valor4"].'" >';
echo '<div class="row maintitle">
<div class="col">
<i class="fas fa-network-wired"></i> <input type="hidden" name="hidtarjeta['.$col["valor4"].']" value="'.$col["valor4"].'" /> <input type="text" name="txtnetname['.$col["valor4"].']" value="'.$col["valor"].'" placeholder="Escriba el nombre del dispositivo" style="width: Calc(100% - 30px); background-color: #e1dfdf;"/>
</div>
<div class="col-1" align="right">
    <a href="javascript:tarjetadel('.$col["valor4"].');" class="btnenlacecancel" >Borrar</a>
</div>
</div>';

echo '<div class="row">
<div class="col-sm-2">DHCP</div>';
echo '<div class="col"><label><input type="checkbox" name="txtnetdhcp['.$col["valor4"].']" value="Sí" '.$seleccionado_dhcp.'/> Habilitado </label></div>
</div>';
echo '<div class="row">
<div class="col-sm-2">MAC Address</div>
<div class="col"><input type="text" name="txtnetmac['.$col["valor4"].']" value="'.$col["valor2"].'" style="width: 100%;"/></div>
</div>';

echo '<div class="row">
<div class="col-sm-2"><a href="javascript:tarjetaipnew('.$col["valor4"].')" class="btnedit"><i class="fas fa-plus-square"></i> Agregar IP</a></div>
    <div class="col">';

    
    $cnssqlips= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."' and opcion = 'NETCARD_IP' and valor4 = '".$col["valor4"]."'");	
    while($colip = mysqli_fetch_array($cnssqlips))
    {
        $idiptarjeta = $idiptarjeta +1;
        echo '<div id="tarjetaipid_'.$idiptarjeta.'">';
        echo '<input type="text" value="'.$colip["valor"].'" name="txtiptarjeta['.$idiptarjeta.']" /> <a href="javascript:tarjetaipdel('.$idiptarjeta.')" alt="Quitar IP" title="Quitar IP" class="btnenlacecancel"><i class="fas fa-trash-alt"></i> </a></br>';
        echo '<input type="hidden" name="hidtarjetaasoc['.$idiptarjeta.']" value="'.$col["valor4"].'" /> ';
        echo '</div>';
        
    }
    
    

echo '      <div id="div_dirip_'.$col["valor4"].'"></div>
    </div> 
</div>';

echo '</div>';
}
?>

<div id="div_divtarjetas"></div>

</form>


