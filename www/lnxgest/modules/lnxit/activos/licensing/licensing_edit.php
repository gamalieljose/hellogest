<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script languague="javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃ±o',
  dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','SÃ¡bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});


});
</script>
<script languague="javascript">
function infpasexist() {
    div = document.getElementById("div_infopass");
    div.style.display = "";

    div = document.getElementById("div_infopass_new");
    div.style.display = "none";
}
function infpasnew() {
    div = document.getElementById("div_infopass_new");
    div.style.display = "";

    div = document.getElementById("div_infopass");
    div.style.display = "none";
}

function vinculainfopass() 
{
  var cns_idinfopass = document.getElementById("txtidinfopass").value;
    
      $.ajax({
      
      type   : 'POST',
      url     : "modules/lnxit/ajax/ajx_checkinfopass.php",
      data    : {idinfopass : cns_idinfopass},
                      
      success : function (resultado) {

      // response = respuesta del servidor.
    response = JSON.parse(resultado);
      
    var rs_existeinfopass = response["existeinfopass"];

    if(rs_existeinfopass > 0 || cns_idinfopass == 0)
    {
      document.getElementById("divimgcheckinfopass").innerHTML = '<img src="img/yes.png" /> Correcto';
      document.getElementById("hcontrol_infopass").value = 'OK';
      
    }
    else
    {
      document.getElementById("divimgcheckinfopass").innerHTML = '<img src="img/no.png" /> No existe';
      document.getElementById("hcontrol_infopass").value = 'NO';

    }

            
    }

  });
}

function validaformulario() 
{
  var campo_dpkfecha = document.getElementById("dpkfecha").value;
  var campo_txtlicencia = document.getElementById("txtlicencia").value;
  var campo_txtproducto = document.getElementById("txtproducto").value;
  var opcion_infopass = document.getElementById("optinfopass_new").checked;

  if(campo_dpkfecha != '' && campo_txtlicencia != '' && campo_txtproducto != '')
  {
    
    if(opcion_infopass == true )
    {
      
      var campo_infpas_txtusuario = document.getElementById("infpas_txtusuario").value;
      var campo_infpas_txtpassword = document.getElementById("infpas_txtpassword").value;

      if(campo_infpas_txtusuario != '' && campo_infpas_txtpassword != '')
      {
        
        document.getElementById("formlicencia").submit();
      }
      else
      {
        
        alert('Rellene los campos obligatorios, como el usuario y la contraseña');
      }

    }
    else
    {
      
      document.getElementById("formlicencia").submit();
    }
    
  }
  else
  {
    alert('Rellene los campos obligatorios');
  }
  
        
}
</script>

<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_licensing where id = '".$_GET["idlicencia"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbproducto = $row["producto"];
$dblicencia = $row["licencia"];
$dbfecha = $row["fecha"];
$dbcantidad = $row["cantidad"];
$dbidlic = $row["idlic"];
$dbidinfopass = $row["idinfopass"];

$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$cfecha = $fdia."/".$fmes."/".$fano;

$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$_GET["id"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbtratarcomo = $rowaux["tratarcomo"]; //Tratar el activo como licencias
$dbactivo_idtercero = $rowaux["idtercero"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbactivo_idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$db_tercero_razonsocial = $rowaux["razonsocial"];
?>



					   
<form name="formlicencia" id="formlicencia" action="index.php?module=lnxit&section=activos&ss=licensing&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$_GET["idlicencia"].'" name="hidlicencia"/>';


?>
<input type="hidden" value="update" name="haccion"/>


<div class="row">
<div class="col maintitle">
Editando licencia
</div>
</div>

<div class="row">
<div class="col-sm-2">
  Fecha
</div>
<div class="col">
<?php
echo '<input type="text" name="dpkfecha" id="dpkfecha" required="" value="'.$cfecha.'" >';
?>
</div>
</div>
<?php
if($dbtratarcomo == "1")
{

?>

<div class="row">
<div class="col-sm-2">
  Producto
</div>
<div class="col">
  <input type="text" name="txtproducto" id="txtproducto" required="" value="<?php echo $dbproducto; ?>" class="campoencoger">
</div>
</div>
<div class="row">
<div class="col-sm-2">
  Licencia
</div>
<div class="col">
  <input type="text" name="txtlicencia" id="txtlicencia" required="" value="<?php echo $dblicencia; ?>" class="campoencoger">
</div>
</div>


<?php
if($dbtratarcomo == "1")
{

  echo '<div class="row">
  <div class="col-sm-2">
    Adquiridas
  </div>
  <div class="col">
    <input type="number" value="'.$dbcantidad.'" name="txtlicadquiridas" min="0" max="9999" >
  </div>
  </div>';

  echo '<div class="row maintitle">
  <div class="col-sm-2">
    ID Infopass</br>
  </div>
  <div class="col">
  <label onclick="javascript:infpasexist();"><input type="radio" name="optinfopass" id="optinfopass_exis" value="existente" checked=""/> Usar existente </label> <label onclick="javascript:infpasnew();"><input type="radio" name="optinfopass" id="optinfopass_new" value="nuevoinfopass" selected=""/> Crear nuevo </label>
  </div>
  </div>';

  echo '<div class="row" id="div_infopass">
  <div class="col-sm-2">
  ID infopass
  </div>
  <div class="col">
    <input type="number" value="'.$dbidinfopass.'" name="txtidinfopass" id="txtidinfopass" min="0" onblur="vinculainfopass()" /> <span id="divimgcheckinfopass">';
    if($dbidinfopass > 0)
    {    
      echo '<img src="img/yes.png" /> Correcto';
    }
    echo '</span>
    <input type="hidden" value="OK" name="hcontrol_infopass" id="hcontrol_infopass" />
  </div>
</div>';

echo '<div id="div_infopass_new" style="display: none;">
  <div class="row">
    <div class="col-sm-2" align="left">
      Tercero
    </div>
    <div class="col" align="left">
   '.$db_tercero_razonsocial.' 
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2" align="left">
      usuario
    </div>
    <div class="col" align="left">
  
  <input type="text" maxlength="50" name="infpas_txtusuario" id="infpas_txtusuario" style="width: 100%;">
  
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2" align="left">
      Password
    </div>
    <div class="col" align="left">
    <input type="text" maxlength="50" name="infpas_txtpassword" id="infpas_txtpassword" style="width: 100%;" />
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2" align="left">
      e-mail aosciado
    </div>
    <div class="col" align="left">
          <input type="text" maxlength="50" name="infpas_txtemail" style="width: 100%;" />
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-2" align="left">
      Donde
    </div>
    <div class="col" align="left">
          <input type="text" maxlength="50" name="infpas_txtdonde" style="width: 100%;" />
    </div>
   </div> 
  <div class="row">
  <div class="col-sm-2" align="left">
    URL web
  </div>
  <div class="col" align="left">
  
  <input type="text" maxlength="255" name="infpas_txturlweb" placeholder="http:// Ruta acceso web" style="width: 100%;" />
  
  </div>
  </div>
  <div class="row">
    <div class="col-sm-2" align="left">
      Notas
    </div>
    <div class="col" align="left">
          <textarea maxlength="50" name="infpas_txtnotas" style="width: 100%;" ></textarea> 
    </div>
  </div>
</div>
</div>';


}


}
else 
{
  


?>





<table width="100%">
<tr class="maintitle">
<th colspan="2">Producto / Licencia</th>
<th align="center" width="80">Disponibilidad</th>
</tr>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."ita_activos where tratarcomo = '1' and idtercero = '".$dbactivo_idtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    
  $sqlaux = $mysqli->query("select sum(cantidad) as cantidad from ".$prefixsql."it_licensing where idactivo = '".$col["id"]."' "); 
  $rowaux = mysqli_fetch_assoc($sqlaux);
  $lbl_cantidad_total = $rowaux["cantidad"];

  $sqlaux = $mysqli->query("select sum(cantidad) as cantidad from ".$prefixsql."it_licensing where idactivo = '".$_GET["id"]."' and idlic > '0' "); 
  $rowaux = mysqli_fetch_assoc($sqlaux);
  $lbl_cantidad_lic = $rowaux["cantidad"];
  if($lbl_cantidad_lic == ''){$lbl_cantidad_lic = '0';}
  


    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

    echo '<td colspan="2">'.$col["nombre"].'</td>';
    echo '<td align="center">'.$lbl_cantidad_lic.'/'.$lbl_cantidad_total.'</td>';
    echo '</tr>';

    $cnssqllic = $mysqli->query("select * from ".$prefixsql."it_licensing where idactivo = '".$col["id"]."'");	
    while($collic = mysqli_fetch_array($cnssqllic))
    {
      $sqlaux = $mysqli->query("select sum(cantidad) as cantidad from ".$prefixsql."it_licensing where idlic = '".$collic["id"]."' "); 
      $rowaux = mysqli_fetch_assoc($sqlaux);
      $lbl_cantidad_lic = $rowaux["cantidad"];
      if($lbl_cantidad_lic == ''){$lbl_cantidad_lic = '0';}
        
      if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
            
      echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
      
      if($dbidlic == $collic["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
      
      echo '<td width="40" align="center"><input type="radio" value="'.$collic["id"].'" name="optlicencia" '.$seleccionado.' /> </td>';
      echo '<td>'.$collic["licencia"].'</td>';
      echo '<td align="center">'.$lbl_cantidad_lic.'/'.$collic["cantidad"].'</td>';
      echo '</tr>';
    }

}


?>
</table>

<?php
}

?>


<div align="center" class="rectangulobtnsguardar"> 
<?php
if($dbtratarcomo == "1")
{
  echo '<a href="javascript:validaformulario();" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</a> ';  
}
else 
{
  echo '<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>  ';
}
?>
<?php echo '<a href="index.php?module=lnxit&section=activos&ss=licensing&id='.$_GET["id"].'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> '; ?>
</div>




</form>



<?php
if($dbtratarcomo == "1")
{
?>

<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th width="100">ID Activo</th>
<th>Activos donde está instalada esta licencia</th>
</tr>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."it_licensing where idlic = '".$_GET["idlicencia"]."'");	
while($col = mysqli_fetch_array($cnssql))
{
  $sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$col["idactivo"]."' "); 
  $rowaux = mysqli_fetch_assoc($sqlaux);
  $lbl_activo = $rowaux["nombre"];

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    
    echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$col["idactivo"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["idactivo"].'</td>';
    echo '<td>'.$lbl_activo.'</td>';
    echo '</tr>';
}


?>


</table>
<?php
}
?>