<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script type="text/javascript">
function muestra_nuevocontacto() 
{
    document.getElementById("div_nuevocontacto").style.display = "inline";
}

function oculta_nuevocontacto() 
{
    document.getElementById("div_nuevocontacto").style.display = "none";
}
</script>
<script type="text/javascript">
function validarformulario() 
{
    var radios = document.getElementsByName('optcontacto');
    var radiovalor = "";
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            radiovalor = radios[i].value;

            // only one radio can be logically checked, don't check the rest
            break;
        }
    }
    var cuentaerror = 0;
    if (radiovalor == "existente")
    {        
        if(document.getElementById("txtnotas").value == '' ){cuentaerror = cuentaerror +1;}
    }
    
    if (radiovalor == "nuevo")
    {
        if(document.getElementById("txtcontacto").value == ''){cuentaerror = cuentaerror +1;}
		if(document.getElementById("txtnotas").value == '' ){cuentaerror = cuentaerror +1;}
        
    }
    
    if(cuentaerror > 0)
    {
        alert("Complete los campos necesarios para validar la inserción de datos");
                
    }
    else
    {
        
        document.getElementById('frmnotas').submit();
        
    }    
    
}
</script>
<script language="javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃ³ximo',
  
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

<?php
$idcamp = $_GET["idcamp"];
$idlinea = $_GET["idlinea"];
$idnota = $_GET["id"];

echo '  <p><a href="index.php?module=crm&section=campseg&action=del&idcamp='.$idcamp.'&idlinea='.$idlinea.'&id='.$idnota.'" class="btnenlacecancel" >Eliminar</a></p>';

$sqltercero = $mysqli->query("SELECT * FROM ".$prefixsql."crm_camp_notas where id = '".$idnota."'");
$row = mysqli_fetch_assoc($sqltercero);
$dbidtercero = $row["idtercero"];
$dbidcontacto = $row["idcontacto"];
$dbfecha = $row["fecha"];
$dbnota = $row["nota"];

$dbllamada = $row["llamada"];
$dbvisita = $row["visita"];
$dbemail = $row["email"];
$dbotros = $row["otros"];


    $xfecha = explode("-", $dbfecha);
    $fdia = $xfecha[2];
    $fmes = $xfecha[1];
    $fano = $xfecha[0];

    $fechita = $fdia."/".$fmes."/".$fano;


$sqltercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$dbidtercero."'");
$row = mysqli_fetch_assoc($sqltercero);
$lbl_tercero = $row["razonsocial"];

?>
<form name="frmnotas" id="frmnotas" method="POST" action="index.php?module=crm&section=campseg&action=save">
<input type="hidden" name="haccion" value="update" />

<input type="hidden" name="hidnota" value="<?php echo $idnota; ?>" />
<input type="hidden" name="hidcamp" value="<?php echo $idcamp; ?>" />
<input type="hidden" name="hidlinea" value="<?php echo $idlinea; ?>" />

<input type="hidden" name="hidtercero" value="<?php echo $dbidtercero; ?>" />


<div class="row">
  <div class="col-sm-2" align="left">
    Fecha de Visita
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="10" value="'.$fechita.'" name="txtfecha" id="dpkfecha" required="" autocomplete="off" class="campoencoger" >'; ?>
  </div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Tercero
	</div>
	<div class="col" align="left">
		<?php echo $lbl_tercero; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" align="left">
		<input type="hidden" name="optcontacto" value="existente" />Contacto
	</div>
	<div class="col" align="left">
	<select name="lstcontacto" id="lstcontacto" class="campoencoger">
		<?php 
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$dbidtercero."' order by nombre");
        if($dbidcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>- sin asignar -</option>'; 
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
                    if($dbidcontacto == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["nombre"].'</option>'; 
		}

		?>
	</select>
	
	</div>
</div>


<div class="row">
	<div class="col-sm-2" align="left">
		Notas
	</div>
	<div class="col" align="left">
		<textarea name="txtnotas" id="txtnotas" style="width: 100%;"><?php echo $dbnota; ?></textarea>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Acciones comerciales
	</div>
	<div class="col" align="left">
<?php
	if($dbllamada == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';} 
		echo '<label><input type="checkbox" name="chkacllamada" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-phone"></i> Llamada </label> </br>';
	if($dbvisita == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		echo '<label><input type="checkbox" name="chkacvisita" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-user"></i> Visita </label> </br>';
	if($dbemail == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';} 
		echo '<label><input type="checkbox" name="chkacemail" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-envelope"></i> e-mail </label> </br>';
	if($dbotros == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		echo '<label><input type="checkbox" name="chkacotros" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-comment-dots"></i> Otros </label> </br>';
?>
	</div>
</div>


<div align="center" class="rectangulobtnsguardar">

    <input type="button" class="btnsubmit" name="btnnuevousuario" value="Guardar" onclick="validarformulario()"/>

<?php echo ' <a href="index.php?module=crm&section=campterceros&id='.$idcamp.'" class="btncancel">Cancelar</a>'; ?>

</div>

</form>


<div class="row">
	<div class="col maintitle">
		Seguimiento
	</div>
</div>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."crm_camp_notas where idcamp = '".$idcamp."' and idtercero = '".$dbidtercero."' order by fecha desc");	
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
	
	if($col["id"] == $idnota)
	{
		$pintacolor = "maintitle";
	}
	
	if($col["idcontacto"] == '0')
	{
		$lbl_contacto = '';
	}
	else
	{
		$sqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_contacto = $rowaux["nombre"];
	}
	
	
	echo "<div class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
	echo '<div class="row" >';

	$xfecha = explode("-", $col["fecha"]);
	$lbl_fecha = $xfecha[2].'/'.$xfecha[1].'/'.$xfecha[0];
	
	echo '<div class="col-sm-2">
		<a href="index.php?module=crm&section=campseg&action=edit&idcamp='.$idcamp.'&idlinea='.$idlinea.'&id='.$col["id"].'" ><b>'.$lbl_fecha.'</b></a>
	</div>
	<div class="col">
		'.$col["nota"].'
	</div>
	<div class="col-sm-2">';
	// añadimos los iconos que correspondan
	if($col["llamada"] == "1"){echo '<i class="fa fa-fw fa-phone" title="Llamada" alt="Llamada"></i> ';}
	if($col["visita"] == "1"){echo '<i class="fa fa-fw fa-user"  title="Visita" alt="Visita"></i> ';}
	if($col["email"] == "1"){echo '<i class="fa fa-fw fa-envelope" title="email" alt="email"></i> ';}
	if($col["otros"] == "1"){echo '<i class="fa fa-fw fa-comment-dots" title="Otros" alt="Otros"></i> ';}
	
	echo '</div>
	<div class="col-sm-2">
		'.$lbl_contacto.'
	</div>
</div>';

echo '</div>';
	
}
?>