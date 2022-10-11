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
<script src="modules/gastos/ajax/ajx_series-gastos.js"></script> 

<?php
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"]; 
?>

<form name="frmgasto" method="POST" action="index.php?module=gastos&section=gastos&action=save" enctype="multipart/form-data" >
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=gastos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="new"/>

<div class="row">
    <div class="col-sm-2" align="left">
         Empresa
    </div>
    <div class="col" align="left">
         <?php
        $cnsempresas= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
	echo '<select id="lstempresas" name="lstempresas" class="campoencoger">';
	while($colempresa = mysqli_fetch_array($cnsempresas))
	{
            if($colempresa["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$colempresa["id"].'" '.$seleccionado.'>'.$colempresa["razonsocial"].'</option>';
        }
        echo '</select>';
                
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
         Serie
    </div>
    <div class="col" align="left">
<?php
echo '<select id="lstseries" name="lstseries" class="campoencoger">';


        $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'GC' and idempresa = '".$dbidempresa."' ");
            while($columna = mysqli_fetch_array($ConsultaMySql))
            {
                if($flstseries > 0)
                {
                    $workserie = $flstseries;
                    $pordefecto = ' SELECTED';
                    $displayserie = $columna["serie"];
                }
                else 
                {
                    
                
                    if($columna["dft"] == '1')
                    {
                            $pordefecto = ' SELECTED';
                            $workserie = $columna["id"];
                            $displayserie = $columna["serie"];
                            $idempresaserie = $columna['idempresa'];
        
                            $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$idempresaserie."'");
                            $rowaux = mysqli_fetch_assoc($cnsaux);
                            $dbrazonsocial = $rowaux['razonsocial'];
                            
                    }
                    else
					{
						$pordefecto = '';
                        $workserie = $columna["id"];
                        $displayserie = $columna["serie"];
					}
                }
                    echo '<option value="'.$workserie.'" '.$pordefecto.'>'.$displayserie.'</option>'; 
            }
	echo '</select>';
	?>  
    </div>
</div>



<div class="row">
<div class="col maintitle">
    Gasto
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Fecha
</div>
<div class="col">
<?php
$fechahoy = date("d/m/Y");
?>
    <input type="text" value="<?php echo $fechahoy; ?>" name="dpkfecha" id="dpkfecha" style="width: 100px;" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Usuario
</div>
<div class="col">
    <select name="lstuser" style="width: 100%;">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
    
}
?>
    </select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Tipo Gasto
</div>
<div class="col">
    <select name="lsttipogasto" style="width: 100%;">
    <option value="0" selected="">-Sin especificar-</option>
	<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."gastos_tipo order by tipogasto");	
while($col = mysqli_fetch_array($cnssql))
{
	echo '<option value="'.$col["id"].'">'.$col["tipogasto"].'</option>';
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
    <input type="text" value="" name="txtdescripcion" style="width: 100%;"  maxlength="50" required=""/>
</div>
</div>

<div class="row">
  <div class="col-sm-2">
	Importe
  </div>
  <div class="col-sm-2">
	<input type="number" step="0.01" maxlength="10" value="0" name="txtimporte" id="txtimporte" style="width: 100%;"/>
  </div>
</div>


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