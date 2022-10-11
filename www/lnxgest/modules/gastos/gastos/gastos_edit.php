<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 
<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script language="javascript">

$().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfecha_value").val(dateText);
		}
    });
    


});
</script>
<script src="modules/ficheros/ajax/one_fichero.js"></script>


<?php
$idregistro = $_GET["id"];

$sqlregistro = $mysqli->query("select * from ".$prefixsql."gastos where id = '".$idregistro."'"); 
$row = mysqli_fetch_assoc($sqlregistro);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
$dbfecha = $row["fecha"];
	$xtemp = explode("-", $dbfecha);
	$lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

$dbidtipogasto = $row["idtipogasto"];
$dbdescripcion = $row["descripcion"];
$dbimporte = $row["importe"];
$dbiduser = $row["iduser"];
$dbaprobado = $row["aprobado"];

$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$idregistro."'"); 
$row = mysqli_fetch_assoc($sqlfichero);
$dbidfichero = $row["idfichero"];

//Verificamos si esta configurada la opcion de aprobar los gastos
$sqlfichero = $mysqli->query("select * from ".$prefixsql."gastos_cfg where opcion = 'APROBAR'"); 
$row = mysqli_fetch_assoc($sqlfichero);
$cfg_aprobar = $row["valor"];


if($cfg_aprobar == "YES")
{
	//si esta la opcion de aprobar
	$mostrar_btn = "NO";
	if(lnx_check_perm(5101) > 0)
	{
		//Tenemos permiso para validar el prodcuto
		$mostrar_btn = "YES";
	}
	if($dbaprobado == 0 )
	{
		//Si no esta ni aprobado ni rechazado, entonces podemos editar
		$mostrar_btn = "YES";
	}
	
}
else
{
	//no esta la opcion de aprobar configurada o esta deshabilitada
	$mostrar_btn = "YES";
}

if($mostrar_btn == "YES")
{
echo '<form name="frmgasto" method="POST" action="index.php?module=gastos&section=gastos&action=save" enctype="multipart/form-data" >';
}
?>
<div align="center" class="rectangulobtnsguardar"> 
<?php
if($mostrar_btn == "YES")
{
	echo '<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> ';
}

?>
<a href="index.php?module=gastos&section=gastos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update"/>
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>


<div class="row maintitle">
    <div class="col-sm-2" align="left">
         Gasto
    </div>
    <div class="col" align="left">
<?php echo $dbcodigo; ?>
	</div>
</div>
<?php
if($cfg_aprobar == "YES")
{

echo '<div class="row">
<div class="col-sm-2">
    
</div>
<div class="col">';

if(lnx_check_perm(5101) > 0)
{
if($dbaprobado == "-1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="radio" value="-1" name="chkaprobado" '.$seleccionado.' /> Rechazado </label> ';
if($dbaprobado == "0"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="radio" value="0" name="chkaprobado" '.$seleccionado.' /> Sin validar </label> ';
if($dbaprobado == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="radio" value="1" name="chkaprobado" '.$seleccionado.' /> Aprobado </label> ';
}
else
{
	//Como no tiene permisos para aprobar un gasto, solo muestra el texto de aprobado o rechazado.
	if($dbaprobado == "-1"){$lbl_aprobado = 'Rechazado';}
	if($dbaprobado == "0"){$lbl_aprobado = 'Sin validar';}
	if($dbaprobado == "1"){$lbl_aprobado = 'Aprobado';}
	echo '<input type="hidden" value="'.$dbaprobado.'" name="chkaprobado" />'.$lbl_aprobado;
}
echo '</div>
</div>';
}
else
{
	echo '<input type="hidden" value="0" name="chkaprobado" />';
}
?>

<div class="row">
<div class="col-sm-2">
    Fecha
</div>
<div class="col">

    <input type="text" value="<?php echo $lbl_fecha; ?>" name="dpkfecha" id="dpkfecha" style="width: 100px;" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Usuario
</div>
<div class="col">
    <select name="lstuser" class="campoencoger">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' or id = '".$dbiduser."' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $dbiduser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}
?>
    </select>
</div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
         Tipo Gasto
    </div>
    <div class="col" align="left">
	<select name="lsttipogasto" class="campoencoger">
<?php
if($dbidtipogasto == 0){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';

        
$cnssql= $mysqli->query("select * from ".$prefixsql."gastos_tipo order by tipogasto");	
while($col = mysqli_fetch_array($cnssql))
{
	if($dbidtipogasto == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["tipogasto"].'</option>';
}
?>            
	</select>
    </div>
</div>

<div class="row">
<div class="col-sm-2">
    Descripcion
</div>
<div class="col">
    <input type="text" value="<?php echo $dbdescripcion; ?>" name="txtdescripcion" style="width: 100%;"  maxlength="50" required=""/>
</div>
</div>

<div class="row">
  <div class="col-sm-2">
	Importe
  </div>
  <div class="col-sm-2">
	<input type="number" step="0.01" maxlength="10" value="<?php echo $dbimporte; ?>" name="txtimporte" id="txtimporte" style="width: 100%;"/>
  </div>
</div>
<?php
if($dbidfichero > 0)
{
echo '<div class="row">
  <div class="col-sm-2">
	Fichero anexado
  </div>
  <div class="col-sm-2">
	<a href="modules/ficheros/download.php?id='.$dbidfichero.'" target="_blank" class="btnedit">Descargar</a>
  </div>
</div>';

}
?>
<div class="row">
    <div class="col maintitle" align="left">
        Fichero adjunto
    </div>
</div>
<p></p>
<div class="grupotabs">


	<a id="btn_tab_subirarchivo" class="btn_tab_sel" href="javascript:muestra_tab_subirarchivo();"  ><i class="hidephonview fa fa-file-upload fa-lg"></i> Subir archivo</a> 
	<a id="btn_tab_buscararchivo" class="btn_tab" href="javascript:muestra_tab_buscararchivo();" ><i class="hidephonview fa fa-search fa-lg"></i> Buscar archivo</a> 

	
</div>
<input type="hidden" name="hficheroone" id="hficheroone" value="uploadfile" />
<div id="tab-subirarchivo">
	<div class="row">
		<div class="col-sm-2" align="left">
			Fichero
		</div>
		<div class="col" align="left">
			<input type="file" name="fch_fileficherito" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Descripción
		</div>
		<div class="col" align="left">
			<input type="text" name="fch_txtfichero" value="" style="width: 100%"/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Privacidad
		</div>
		<div class="col" align="left">
			<select name="fch_lstpublico" style="width: 100%">
				<option value="0" selected="" >Privado</option>
				<option value="1" >Publico</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Categoria
		</div>
		<div class="col" align="left">
			<select name="fch_lstcat" style="width: 100%">
				<option value="0" selected="" >Sin categoria</option>
		<?php
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
			while($colcat = mysqli_fetch_array($ConsultaMySql))
			{
				echo '<option value="'.$colcat["id"].'" >'.$colcat["categoria"].'</option>';
			}

		?>		
			</select>
		</div>
	</div>

</div>



<div id="tab-buscararchivo" style="display: none;">
	<div class="tblbuscar">
		<div class="row">
			<div class="col-sm-3" align="left">
				<select name="lstbuscarporfichero" id="lstbuscarporfichero" style="width: 100%;">
<?php
if($flstbuscarpor == 'A'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="A" '.$seleccionado.'>Buscar por nombre</option>';
if($flstbuscarpor == 'B'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="B" '.$seleccionado.'>Buscar por contenido</option>';
?>
				</select>
			</div>
			<div class="col" align="left">
				<?php echo '<input type="text" value="'.$_POST["txtbuscar"].'" name="txtbuscarfichero" id="txtbuscarfichero" style="width:100%;"/> '; ?>
			</div>
            <div class="col-sm-3" align="left">
                <a href="javascript:buscarfichero();" class="btnsubmit"><i class="hidephonview fa fa-search fa-lg"></i> Buscar Archivo</a>
            </div>
		</div>	
		<div class="row">
			<div class="col-sm-3" align="left">
				Ordenar
			</div>
			<div class="col" align="left">
				<select name="lstcampoordenarfchr" id="lstcampoordenarfchr" style="width: 100%;">
					<option value="nombre">Fichero</option>
					<option value="extension">extension</option>
					<option value="descripcion">Descripcion</option>
					<option value="fsubido">Fecha</option>
				</select>
			</div>
			<div class="col" align="left">
				<select name="lstordenfchr" id="lstordenfchr" style="width: 100%;">
				<option value="asc">Ascendente</option>
				<option value="desc">Descendente</option>
				</select>
			</div>
		</div>	
	</div>





<div id="divrsficheros"></div>
</div>

</form>