<?php

$idregistro = $_GET["id"];


$sqltipobanco= $mysqli->query("select * from ".$prefixsql."hr_nom where id = '".$idregistro."'");
$row = mysqli_fetch_assoc($sqltipobanco);
$dbtipo = $row["tipo"];
$dbfecha = $row["fecha"];
$dbidempresa = $row["idempresa"];
$dbiduser = $row["iduser"];
$dbdescripcion = $row["descripcion"];


if($dbtipo == "1")
{
   $lbl_tipo = "Interno";
   $sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$dbidempresa."'");
   $row = mysqli_fetch_assoc($sqlaux);
   $lbl_empresa = $row["razonsocial"];

   $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$dbiduser."'");
   $row = mysqli_fetch_assoc($sqlaux);
   $lbl_empleado = $row["display"];


}

if($dbtipo == "2")
{
   $lbl_tipo = "Externo";
   $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidempresa."'");
   $row = mysqli_fetch_assoc($sqlaux);
   $lbl_empresa = $row["razonsocial"];

   $sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$dbiduser."'");
   $row = mysqli_fetch_assoc($sqlaux);
   $lbl_empleado = $row["nombre"];

}

$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."ficheros_loc where module = 'hr_nom' and idlinea0 = '".$idregistro."'");
$row = mysqli_fetch_assoc($sqlaux);
$ficheros_contador = $row["contador"];

$tbl_bloquear = $prefixsql."hr_nom";
if(lnx_check_bloqueo($tbl_bloquear, $idregistro, $_COOKIE["lnxuserid"]) > 0)
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
      var bloquea_idregistro = "<?php echo $idregistro; ?>";

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
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>
<?php
if($LNXERP_bloqueado == "NO")
{
echo '<form name="form1" action="index.php?module=hr&section=nominas&action=save" method="post" >';
}
?>


<input type="hidden" name="haccion" value="delete">
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>">

<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr><td colspan="2" align="center">
<p>Recuerde que va a eliminar definitivamente este registro y su fichero adjunto.</p>
<p><b>Esta cambio NO es reversible</b></p>
</td></tr>

<tr><td>Tipo</td><td><?php echo $lbl_tipo; ?></td></tr>
<tr><td>Fecha</td><td><?php echo $dbfecha; ?></td></tr>
<tr><td>Empresa</td><td><?php echo $lbl_empresa; ?></td></tr>
<tr><td>Empleado</td><td><?php echo $lbl_empleado; ?></td></tr>
<tr><td>Descripción</td><td><?php echo $dbdescripcion; ?></td></tr>
<?php
if($ficheros_contador > 0)
{
echo '<tr><td align="center" colspan="2">
<input type="radio" name="delfichero" value="delloc" checked=""> Eliminar solo vinculacion con el fichero </br>
<input type="radio" name="delfichero" value="delfichero" > Eliminar fichero y todas sus vinculaciones
</td></tr>';
}
?>
<tr><td align="center" colspan="2">&nbsp;</td></tr>
<tr><td align="center" colspan="2">
<?php
if($LNXERP_bloqueado == "NO")
{
    echo '<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> ';
}
?>
<a class="btncancel" href="index.php?module=hr&section=nominas"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
</td></tr>
</table>


</form>
