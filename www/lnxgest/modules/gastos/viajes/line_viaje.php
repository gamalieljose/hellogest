<script src="modules/ficheros/ajax/one_fichero.js"></script>

<input type="hidden" name="htipoevento" value="VIAJE"/> 

<div class="row">
<div class="col maintitle">
<?php
if($idlinea > 0 )
{
    echo 'Editando viaje';
}
else
{
    echo 'Nuevo viaje';
}
?>
    
</div>
</div>


<div class="row">
<div class="col-sm-2">
    Reserva
</div>
<div class="col">
    <input type="text" name="txtreserva" value="<?php echo $db_reserva; ?>" maxlength="50" style="width: 100%;" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Asiento
</div>
<div class="col">
    <input type="text" name="txtasiento" value="<?php echo $db_asiento; ?>" maxlength="50" style="width: 100%;" />
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Nota
</div>
<div class="col">
    <textarea name="txtdescripcion" maxlength="250" style="width: 100%;"><?php echo $db_descripcion; ?></textarea>
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