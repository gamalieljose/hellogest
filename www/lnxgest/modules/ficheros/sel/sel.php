<script type="text/javascript">
function muestra_tab_subirarchivo() 
{
	document.getElementById('tab-subirarchivo').style.display = 'inline';
	document.getElementById('tab-buscararchivo').style.display = 'none';
	document.getElementById('lista-buscararchivo').style.display = 'none';
	
	document.getElementById('btn_tab_subirarchivo').className = 'btn_tab_sel';
	document.getElementById('btn_tab_buscararchivo').className = 'btn_tab';
	
	

}

function muestra_tab_buscararchivo() 
{
	document.getElementById('tab-subirarchivo').style.display = 'none';
	document.getElementById('tab-buscararchivo').style.display = 'inline';
	document.getElementById('lista-buscararchivo').style.display = 'inline';

	document.getElementById('btn_tab_subirarchivo').className = 'btn_tab';
	document.getElementById('btn_tab_buscararchivo').className = 'btn_tab_sel';
}


function sel_fichero(nomficherito) 
{
	document.getElementById('msgseleccionafichero').style.display = 'inline';
	document.getElementById("lbl_nom_fichero").innerHTML = nomficherito;
}

function sel_fichero_cierra() 
{
	document.getElementById('msgseleccionafichero').style.display = 'none';
}
</script>
<style>
.fondonegro {

  width: 100%;
  min-height: 100%;
  height: auto !important;
  position: fixed;
  top:0;
  left:0;
z-index: 1;
  height: 500px;
  width: 100%;
  background: rgba(200, 200, 200, 0.5);
}


.msg_contenido {
   background-color: #fff;
	width: 400px;
	margin-left: calc(50% - 200px);
	margin-top: 100px;
	border: 2px solid #6678b1;
}
</style>
<?php
$url_origen = $_POST["url_origen"];
$farchivo_module = $_POST["archivo_module"];
$farchivo_linea0 = $_POST["archivo_linea0"];
$farchivo_linea1 = $_POST["archivo_linea1"];
$farchivo_linea2 = $_POST["archivo_linea2"];
$farchivo_display = $_POST["archivo_display"];
$farchivo_publico = $_POST["archivo_publico"];
$farchivo_cat = $_POST["archivo_cat"];
if($farchivo_cat == ''){$farchivo_cat = '0';}

$flstbuscarpor = $_POST["lstbuscarpor"];
//A - buscar por nombre o descripcion
//B - busca por contenido
?>




<div class="grupotabs">
	<div class="campoencoger">

	<a href="javascript:muestra_tab_subirarchivo();" class="btn_tab_sel" id="btn_tab_subirarchivo">Subir archivo</a> 
	<a href="javascript:muestra_tab_buscararchivo();" class="btn_tab" id="btn_tab_buscararchivo" >Buscar archivo</a> 

	</div>
</div>

<div id="tab-subirarchivo">
<form name="form1" action ="index.php?module=ficheros&section=selsave" enctype="multipart/form-data" method="POST">


	<input type="hidden" name="haccion" value="subefichero"/>
	<?php
	echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
	echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
	echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
	echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
	echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
	echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
	echo '<input type="hidden" name="archivo_publico" value="'.$farchivo_publico.'"/>';
	echo '<input type="hidden" name="archivo_cat" value="'.$farchivo_cat.'"/>';
	echo '<input type="hidden" name="hbuscarcheck" value=""/>';
	?>
	
	<div class="row">
		<div class="col-sm-2" align="left">
			Fichero
		</div>
		<div class="col" align="left">
			<input type="file" name="fileficherito" required=""/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Descripción
		</div>
		<div class="col" align="left">
			<input type="text" name="txtfichero" required="" style="width: 100%"/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Privacidad
		</div>
		<div class="col" align="left">
			<select name="lstpublico" style="width: 100%">
				<option value="0" >Privado</option>
				<option value="1" selected="">Publico</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Categoria
		</div>
		<div class="col" align="left">
			<select name="lstcat" style="width: 100%">
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


	<div align="center" class="rectangulobtnsguardar" >

	<button type="submit" class="btnsubmit" >
		<i class="hidephonview fa fa-check-circle fa-lg"></i> Subir Archivo
	</button>

	<a class="btncancel" href="<?php echo $url_origen; ?>"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
	 

	</div>
	
	</form>
</div>


<div id="tab-buscararchivo" style="display: none;">
<form name="form2" action ="index.php?module=ficheros&section=sel" method="POST">

<?php
echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
echo '<input type="hidden" name="archivo_publico" value="'.$farchivo_publico.'"/>';
echo '<input type="hidden" name="archivo_cat" value="'.$farchivo_cat.'"/>';
echo '<input type="hidden" name="hbuscarcheck" value="SI"/>';

?>
	<div class="tblbuscar">
		<div class="row">
			<div class="col-sm-3" align="left">
				<select name="lstbuscarpor" style="width: 100%;">
<?php
if($flstbuscarpor == 'A'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="A" '.$seleccionado.'>Buscar por nombre</option>';
if($flstbuscarpor == 'B'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="B" '.$seleccionado.'>Buscar por contenido</option>';
?>
				</select>
			</div>
			<div class="col" align="left">
				<?php echo '<input type="text" value="'.$_POST["txtbuscar"].'" name="txtbuscar" class="campoencoger"/> '; ?>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-3" align="left">
				Ordenar
			</div>
			<div class="col" align="left">
				<select name="lstcampoordenar" style="width: 100%;">
					<option value="nombre">Fichero</option>
					<option value="extension">extension</option>
					<option value="descripcion">Descripcion</option>
				</select>
			</div>
			<div class="col" align="left">
				<select name="lstorden" style="width: 100%;">
				<option value="asc">Ascendente</option>
				<option value="desc">Descendente</option>
				</select>
			</div>
		</div>	
	</div>



	<div align="center" class="rectangulobtnsguardar" >

	<button type="submit" class="btnsubmit">
		<i class="hidephonview fa fa-check-circle fa-lg"></i>Buscar Archivo
	</button>

	<a class="btncancel" href="<?php echo $url_origen; ?>"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
	 

	</div>





</div>

</form>

<div id="lista-buscararchivo" style="display: none;">
<form name="form3" action ="index.php?module=ficheros&section=selsave" method="POST">
<input type="hidden" name="haccion" value="selfichero"/>
<?php
echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
echo '<input type="hidden" name="archivo_publico" value="'.$farchivo_publico.'"/>';
echo '<input type="hidden" name="archivo_cat" value="'.$farchivo_cat.'"/>';

?>

<p> </p>

<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Fichero</td>
<td width="32"> </td>
<td>Descripcion</td>
<td width="80"> </td>
</tr>



<?php

$ftxtbuscar = $_POST["txtbuscar"];
$flstcampoordenar = $_POST["lstcampoordenar"];
$flstorden = $_POST["lstorden"];


if($flstcampoordenar <> '')
{

	if($flstbuscarpor == 'A')
	{
		$cnssql = "SELECT * from ".$prefixsql."ficheros where nombre like '".$ftxtbuscar."%' or descripcion like '".$ftxtbuscar."%' order by ".$flstcampoordenar." ".$flstorden;	
	}
	if($flstbuscarpor == 'B')
	{
		$cnssql = "SELECT ".$prefixsql."ficheros_keyword.idfichero as id, ".$prefixsql."ficheros.nombre, ".$prefixsql."ficheros.extension, ".$prefixsql."ficheros.descripcion FROM ".$prefixsql."ficheros_keyword INNER JOIN ".$prefixsql."ficheros on (".$prefixsql."ficheros_keyword.idfichero = ".$prefixsql."ficheros.id) where ".$prefixsql."ficheros_keyword.palabrasclave like '%".$ftxtbuscar."%' order by ".$prefixsql."ficheros.".$flstcampoordenar." ".$flstorden;	
	}
	$ConsultaMySql= $mysqli->query($cnssql);
	$color = '1';
	while($ficheros = mysqli_fetch_array($ConsultaMySql))
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

		$fchr_extension = $ficheros["extension"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_ext where extension = '".$fchr_extension."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$icono = $rowaux["icono"];
		$lbltituloicono = $rowaux["display"];
		

		if($icono != '')
		{
			$imgicono = '<img src="img/extensions/'.$icono.'" alt="'.$lbltituloicono.'" title="'.$lbltituloicono.'" />';
		}
		else 
		{
			$imgicono = $fchr_extension;
		}

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td align="center"><input type="radio" onclick="';
		echo "sel_fichero('".$ficheros["nombre"]."')";
	echo '" value="'.$ficheros ["id"].'" name="optfichero"></td>';
	
	
	
	echo '<td>'.$ficheros["nombre"].'</td>';
	echo '<td>'.$imgicono.'</td>';
	echo '<td>'.$ficheros["descripcion"].'</td>';
	echo '<td><a class="btnedit"  href="modules/ficheros/download.php?id='.$ficheros ["id"].'">Download</a></td>';
	echo '</tr>';
		
	}
}
?>

</table>

</div>



<div class="fondonegro" style="display: none;" id="msgseleccionafichero">


	<div class="msg_contenido">
	
	<div class="row">
		<div class="col maintitle">¿Desea usar este archivo?</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
		Fichero
		</div>
		<div class="col" align="left">
			<div id="lbl_nom_fichero"></div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-2" align="left">
		
		</div>
		<div class="col" align="left">
			<select name="lstpublico" style="width: 100%;">
				<option value="0" >Privado</option>
				<option value="1" >Publico</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
		Nota
		</div>
		<div class="col" align="left">
			<input type="text" value="" name="txtnota" style="width: 100%;"/>
		</div>
	</div>
<p> </p>

	


			<div align="center">
			<button type="submit" class="btnsubmit">
					<i class="hidephonview fa fa-check-circle fa-lg"></i>Usar fichero
				</button>

				<a class="btncancel" href="javascript:sel_fichero_cierra();"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
			</div>
		</div>
	</div>
	
	</form>
	
</div>
<?php
if($_POST["hbuscarcheck"] == "SI")
{
	echo '<script language="javascript">muestra_tab_buscararchivo();</script>';
}

?>