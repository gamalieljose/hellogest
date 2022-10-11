<?php
$iddocumento = $_GET["iddoc"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."viajes where id = '".$iddocumento."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodigo = $rowaux["codigo"];
$dbcodigoint = $rowaux["codigoint"];
$dbidserie = $rowaux["idserie"];
$dbfecha = $rowaux["fecha"];
    $xtemp = explode(" ", $dbfecha);
    $xtemp2 = explode("-", $xtemp[0]);
    $xfecha = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp[1];
$dbfecha_vuelta = $rowaux["fechavuelta"];
    $xtemp = explode(" ", $dbfecha_vuelta);
    $xtemp2 = explode("-", $xtemp[0]);
    $xfechavuelta = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp[1];
$dbeditav = $rowaux["editv"];
$dbiduser = $rowaux["iduser"];
$dbdescripcion = $rowaux["descripcion"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_serie = $rowaux["serie"];

$sqlaux = $mysqli->query("select id, display from ".$prefixsql."users where id = '".$dbiduser."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_usuario = $rowaux["display"];





$tbl_bloquear = $prefixsql."viajes";
if(lnx_check_bloqueo($tbl_bloquear, $iddocumento, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
  $LNXERP_bloqueado = "YES";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
  $LNXERP_bloqueado = "NO";
}
?>
<script type="text/javascript">
$(document).ready(function() {

    lnxbloquea(); //Ejecutamos script nada más abrir el registro

    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $iddocumento; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {         
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {         
          document.getElementById('boxbloqueo').style.display = "none"; 
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>
<script language="javascript">
function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>
<script language="javascript">

function muestra_tab_dd() 
{
	document.getElementById('tab_dd').style.display = 'inline';
	document.getElementById('tab_op').style.display = 'none';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab_sel';
	document.getElementById('btn_tab_op').className = 'btn_tab';
}
function muestra_tab_op() 
{
	document.getElementById('tab_dd').style.display = 'none';
	document.getElementById('tab_op').style.display = 'inline';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab';
	document.getElementById('btn_tab_op').className = 'btn_tab_sel';
}
</script>


<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>

<div class="grupotabs">
<a href="javascript:muestra_tab_dd()" id="btn_tab_dd" class="btn_tab_sel"/>Datos Documento</a>
<a href="javascript:muestra_tab_op()" id="btn_tab_op" class="btn_tab"/>Operaciones</a>
</div>
<div style=" min-height: 60px;">
<div id="tab_dd">
    <div class="row">
    <div class="col-sm-2">
        Serie
    </div>
    <div class="col-sm-2">
        <?php echo $lbl_serie; ?>
    </div>
    <div class="col-sm-2">
        Fecha Ida
    </div>
    <div class="col">
        <?php echo $xfecha; ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
        Documento
    </div>
    <div class="col-sm-2">
        <b><?php echo $dbcodigo; ?></b>
    </div>
    
    <div class="col-sm-2">
        Fecha Vuelta
    </div>
    <div class="col">
        <?php echo $xfechavuelta; ?>
    </div>
    </div>

    <div class="row">
     <div class="col-sm-2">
        Usuario
    </div>
    <div class="col-sm-2">
        <b><?php echo $lbl_usuario; ?></b>
    </div>
    <div class="col-sm-2">
        Descripción
    </div>
    <div class="col">
        <?php echo $dbdescripcion; ?>
    </div>
    </div>

</div>



<div id="tab_op" style="display: none;">
<div class="row">
    <div class="col-sm-2">
        Documento
    </div>
    <div class="col">
    <?php
      if($dbcodigoint == 0 && $LNXERP_bloqueado == "NO")
      {
        //if(lnx_check_perm(20204) > 0)
        //{
        echo '<a id="btn_validarav" href="index.php?module=gastos&section=viajes&action=validar&iddoc='.$iddocumento.'" class="btnedit_verde">Valida viaje</a> ';
        //}
      }
      ?>
      </br></br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
        Datos Viaje
    </div>
    <div class="col">
    <?php
    if($dbcodigoint == 0 && $LNXERP_bloqueado == "NO")
      {
        //if(lnx_check_perm(20202) > 0)
        //{
            echo '<a href="index.php?module=gastos&section=viajes&action=edit&iddoc='.$iddocumento.'" class="btnedit">Cambiar datos</a>';
        //}
      }
      ?> 
        </div>
    </div>
</div>
</div>
</div>

<p></p>
<?php

if($dbcodigoint == 0 || $dbeditav == 1)
{
    //if(lnx_check_perm(20202) > 0)
    //{
        echo '<p>
        <a title="Nuevo registro tipo nota" href="index.php?module=gastos&section=viajes&action=linenew&iddoc='.$iddocumento.'&tipoevento=nota" class="btnedit"><i class="fas fa-sticky-note"></i> Nota</a> 
        <a title="Nuevo registro tipo viaje" href="index.php?module=gastos&section=viajes&action=linenew&iddoc='.$iddocumento.'&tipoevento=viaje" class="btnedit"><i class="fas fa-plane"></i> Viaje</a> 
        <a title="Nuevo registro tipo alojamiento" href="index.php?module=gastos&section=viajes&action=linenew&iddoc='.$iddocumento.'&tipoevento=hotel" class="btnedit"><i class="fas fa-bed"></i> Alojamiento</a> 
        
        </p>';
    //}
}


if ($dbeditav > 0)
{
	echo '<table width="100%">';
	echo '<tr><td bgcolor="#FFFF00">Viaje ya validado - Guarde los cambios antes de emitir otro albaran</td></tr>';
	echo '<table>';
}

?>

<table width="100%" >
<tr class="maintitle">
<?php
if($dbcodigoint == 0 || $dbeditav == 1)
{
    //if(lnx_check_perm(20202) > 0)
    //{
        echo '<th width="70"></th>';
    //}
}
?>
<th width="20"></th>
<th width="140">Salida</th>
<th width="140">Llegada</th>
<th>Descripcion</th>
<th>Reserva</th>
<th>Asiento</th>
<th width="100">Fichero</th>
<?php

if($dbcodigoint == 0 || $dbeditav == 1 )
{
    //if(lnx_check_perm(20202) > 0)
    //{
    echo '<th width="50"></th>';
    //}
}


?>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."viajes_lineas where idviaje = '".$iddocumento."' order by fechasalida asc");	
while($col = mysqli_fetch_array($cnssql))
{

    $xtemp = explode(" ", $col["fechasalida"]);
    $xtemp2 = explode("-", $xtemp[0]);
    $xtemp3 = explode(":", $xtemp[1]);
    $lbl_fechasalida = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp3[0].";".$xtemp3[1];

    if($col["fechallegada"] == "0000-00-00 00:00:00")
    {
        $lbl_fechallegada = "";
    }
    else
    {
        $xtemp = explode(" ", $col["fechallegada"]);
        $xtemp2 = explode("-", $xtemp[0]);
        $xtemp3 = explode(":", $xtemp[1]);
        $lbl_fechallegada = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0]." ".$xtemp3[0].";".$xtemp3[1];
    }

    $icono = '';
    if($col["tipo"] == "NOTA")
    {
        $icono = '<i class="fas fa-sticky-note" title="Nota" alt="Nota"></i>';
    }
    if($col["tipo"] == "VIAJE")
    {
        $icono = '<i class="fas fa-plane" title="Viaje" alt="Viaje"></i>';
    }
    
    if($col["tipo"] == "HOTEL")
    {
        $icono = '<i class="fas fa-bed" title="Alojamiento" alt="Alojamiento"></i>';
    }

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=gastos&section=viajes&action=lineedit&iddoc='.$iddocumento.'&tipoevento=nota&idlinea='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$icono.'</td>';
    echo '<td>'.$lbl_fechasalida.'</br>&nbsp; &nbsp; '.$col["origen"].'</td>';
    echo '<td>'.$lbl_fechallegada.'</br>&nbsp; &nbsp; '.$col["destino"].'</td>';
    echo '<td>'.$col["descripcion"].'</td>';
    echo '<td>'.$col["reserva"].'</td>';
    echo '<td>'.$col["asiento"].'</td>';
    echo '<td>';
    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'viajes' and idlinea0 = '".$iddocumento."' and idlinea1 ='".$col["id"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $fichero_idfichero = $rowaux["idfichero"];

    if($fichero_idfichero > 0)
    {
        echo '<a href="modules/ficheros/download.php?id='.$fichero_idfichero.'" target="_blank" class="btnedit">Descargar</a>';
    }
    echo '</td>';
    if($dbcodigoint == 0 || $dbeditav == 1 )
{
    //if(lnx_check_perm(20202) > 0)
    //{
    echo '<td align="right"><a href="index.php?module=gastos&section=viajes&action=linedel&iddoc='.$iddocumento.'&idlinea='.$col["id"].'" class="btnenlacecancel" >Borrar</a></td>';
    //}
}
    echo '</tr>';
}
 

?>
</table>
